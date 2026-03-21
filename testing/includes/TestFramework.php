<?php
require_once __DIR__ . '/../../util/functions.php';

class TestRunner {
    private $tests = [];
    private $passed = 0;
    private $failed = 0;
    private $results = [];
    
    public function addTest($name, callable $testFn) {
        $this->tests[] = [
            'name' => $name,
            'fn' => $testFn
        ];
    }
    
    public function run() {
        echo "\n";
        echo "╔══════════════════════════════════════════════════════════════════════╗\n";
        echo "║           ORASE API - TEST FRAMEWORK v1.0                          ║\n";
        echo "╚══════════════════════════════════════════════════════════════════════╝\n\n";
        
        foreach ($this->tests as $test) {
            $this->runTest($test['name'], $test['fn']);
        }
        
        $this->printSummary();
        return $this->failed === 0;
    }
    
    private function runTest($name, callable $fn) {
        echo "▶ {$name}... ";
        
        try {
            $result = $fn();
            
            if ($result === true || (is_array($result) && $result['status'] === 'pass')) {
                echo "\033[32m✓ PASSED\033[0m\n";
                $this->passed++;
                $this->results[] = ['name' => $name, 'status' => 'passed', 'message' => ''];
            } else {
                $message = is_array($result) ? $result['message'] : 'Test failed';
                echo "\033[31m✗ FAILED\033[0m\n";
                echo "  └─ {$message}\n";
                $this->failed++;
                $this->results[] = ['name' => $name, 'status' => 'failed', 'message' => $message];
            }
        } catch (Exception $e) {
            echo "\033[31m✗ ERROR\033[0m\n";
            echo "  └─ {$e->getMessage()}\n";
            $this->failed++;
            $this->results[] = ['name' => $name, 'status' => 'error', 'message' => $e->getMessage()];
        }
    }
    
    private function printSummary() {
        $total = $this->passed + $this->failed;
        $percent = $total > 0 ? round(($this->passed / $total) * 100) : 0;
        
        echo "\n";
        echo "══════════════════════════════════════════════════════════════════════\n";
        echo "  SUMMARY\n";
        echo "══════════════════════════════════════════════════════════════════════\n";
        echo "  Total:  {$total}\n";
        echo "  Passed: \033[32m{$this->passed}\033[0m\n";
        echo "  Failed: \033[31m{$this->failed}\033[0m\n";
        echo "  Rate:   {$percent}%\n";
        echo "══════════════════════════════════════════════════════════════════════\n";
        
        if ($this->failed > 0) {
            echo "\n\033[31mFailed Tests:\033[0m\n";
            foreach ($this->results as $r) {
                if ($r['status'] !== 'passed') {
                    echo "  • {$r['name']}\n";
                    if (!empty($r['message'])) {
                        echo "    └─ {$r['message']}\n";
                    }
                }
            }
        }
    }
    
    public function getResults() {
        return $this->results;
    }
}

class Assert {
    public static function assertEquals($expected, $actual, $message = '') {
        if ($expected !== $actual) {
            $msg = "Expected: '{$expected}' but got: '{$actual}'";
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
    
    public static function assertTrue($value, $message = '') {
        if ($value !== true) {
            $msg = "Expected true but got: " . var_export($value, true);
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
    
    public static function assertFalse($value, $message = '') {
        if ($value !== false) {
            $msg = "Expected false but got: " . var_export($value, true);
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
    
    public static function assertContains($needle, $haystack, $message = '') {
        if (is_array($haystack)) {
            $found = false;
            foreach ($haystack as $item) {
                if ($item === $needle || (is_string($item) && strpos($item, $needle) !== false)) {
                    $found = true;
                    break;
                }
            }
        } else {
            $found = strpos($haystack, $needle) !== false;
        }
        
        if (!$found) {
            $msg = "Expected '{$needle}' to be in: " . (is_array($haystack) ? implode(', ', $haystack) : $haystack);
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
    
    public static function assertNotEmpty($value, $message = '') {
        if (empty($value)) {
            $msg = "Expected non-empty value";
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
    
    public static function assertArrayHasKey($key, $array, $message = '') {
        if (!is_array($array) || !array_key_exists($key, $array)) {
            $msg = "Expected array to have key: '{$key}'";
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
    
    public static function assertCount($expected, $array, $message = '') {
        $actual = count($array);
        if ($expected !== $actual) {
            $msg = "Expected count: {$expected} but got: {$actual}";
            if ($message) $msg .= " - {$message}";
            return ['status' => 'fail', 'message' => $msg];
        }
        return ['status' => 'pass'];
    }
}
