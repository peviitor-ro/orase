<?php

class AlbaTestRunner
{
    private string $baseUrl = 'https://orase.peviitor.ro';
    private array $results = [];
    private string $runId;
    private string $reportPath;
    private array $testData = [
        'municipii' => [],
        'orase' => [],
        'comune' => [],
        'sate' => []
    ];
    private array $albaData = [];

    public function __construct()
    {
        $this->runId = date('Y-m-d_His');
        $this->reportPath = __DIR__ . '/reports/' . $this->runId;
        if (!is_dir($this->reportPath)) {
            mkdir($this->reportPath, 0777, true);
        }
    }

    private function log(string $status, string $testName, string $message = ''): void
    {
        $this->results[] = [
            'status' => $status,
            'test' => $testName,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        $icon = $status === 'PASS' ? '✓' : ($status === 'FAIL' ? '✗' : '○');
        echo "$icon [$status] $testName" . ($message ? " - $message" : "") . "\n";
    }

    private function makeRequest(string $endpoint): array
    {
        $url = $this->baseUrl . $endpoint;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Test Client');
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        return [
            'body' => $response,
            'httpCode' => $httpCode,
            'error' => $error
        ];
    }

    private function loadTestData(): void
    {
        $basePath = __DIR__;
        
        $municipiiFile = $basePath . '/municipii.txt';
        if (file_exists($municipiiFile)) {
            $lines = file($municipiiFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line)) {
                    $this->testData['municipii'][] = $line;
                }
            }
        }
        
        $oraseFile = $basePath . '/orase.txt';
        if (file_exists($oraseFile)) {
            $lines = file($oraseFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line)) {
                    $this->testData['orase'][] = $line;
                }
            }
        }
        
        $comuneFile = $basePath . '/comune.txt';
        if (file_exists($comuneFile)) {
            $lines = file($comuneFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                $line = trim($line);
                if (!empty($line)) {
                    $this->testData['comune'][] = $line;
                }
            }
        }
        
        $sateFile = $basePath . '/sate.txt';
        if (file_exists($sateFile)) {
            $lines = file($sateFile, FILE_IGNORE_NEW_LINES);
            $currentComuna = null;
            foreach ($lines as $line) {
                $line = trim($line);
                if (empty($line)) {
                    $currentComuna = null;
                    continue;
                }
                $noDiac = $this->removeDiacritics($line);
                if ($noDiac === mb_strtoupper($line) && strlen($line) <= 30 && substr_count($line, ' ') <= 2) {
                    $currentComuna = $line;
                    if (!isset($this->testData['sate'][$currentComuna])) {
                        $this->testData['sate'][$currentComuna] = [];
                    }
                } elseif ($currentComuna !== null) {
                    $this->testData['sate'][$currentComuna][] = $line;
                }
            }
        }
        
        echo "Loaded test data:\n";
        echo "  - Municipii: " . count($this->testData['municipii']) . "\n";
        echo "  - Orase: " . count($this->testData['orase']) . "\n";
        echo "  - Comune: " . count($this->testData['comune']) . "\n";
        echo "  - Sate groups: " . count($this->testData['sate']) . "\n";
        echo "  - Total sate: " . array_sum(array_map('count', $this->testData['sate'])) . "\n";
    }

    private function loadAlbaData(): void
    {
        $response = $this->makeRequest('/ROMANIA/ALBA/');
        
        if ($response['httpCode'] !== 200) {
            $this->log('FAIL', 'loadAlbaData', "Failed to load ALBA data: HTTP {$response['httpCode']}");
            return;
        }
        
        $this->albaData = json_decode($response['body'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->log('FAIL', 'loadAlbaData', 'Invalid JSON response');
            return;
        }
        
        $this->log('PASS', 'loadAlbaData', 'ALBA data loaded successfully');
    }

    private function findInAlbaData(string $name, string $type): ?array
    {
        $nameUpper = mb_strtoupper($name);
        $nameNormalized = $this->removeDiacritics($nameUpper);
        
        switch ($type) {
            case 'municipiu':
                foreach ($this->albaData['municipiu'] ?? [] as $m) {
                    if ($this->matchName($m['nume'], $name)) {
                        return $m;
                    }
                }
                break;
                
            case 'oras':
                foreach ($this->albaData['oras'] ?? [] as $o) {
                    if ($this->matchName($o['nume'], $name)) {
                        return $o;
                    }
                }
                foreach ($this->albaData['municipiu'] ?? [] as $m) {
                    foreach ($m['localitate'] ?? [] as $l) {
                        if (($l['tip'] ?? '') === 'oras' && $this->matchName($l['nume'], $name)) {
                            return $l;
                        }
                    }
                }
                break;
                
            case 'comuna':
                foreach ($this->albaData['comuna'] ?? [] as $c) {
                    if ($this->matchName($c['nume'], $name)) {
                        return $c;
                    }
                }
                break;
                
            case 'sat':
                foreach ($this->albaData['municipiu'] ?? [] as $m) {
                    foreach ($m['localitate'] ?? [] as $l) {
                        if (($l['tip'] ?? '') === 'sat' && $this->matchName($l['nume'], $name)) {
                            return $l;
                        }
                    }
                }
                foreach ($this->albaData['oras'] ?? [] as $o) {
                    foreach ($o['localitate'] ?? [] as $l) {
                        if (($l['tip'] ?? '') === 'sat' && $this->matchName($l['nume'], $name)) {
                            return $l;
                        }
                    }
                }
                foreach ($this->albaData['comuna'] ?? [] as $c) {
                    foreach ($c['localitate'] ?? [] as $l) {
                        if (($l['tip'] ?? '') === 'sat' && $this->matchName($l['nume'], $name)) {
                            return $l;
                        }
                    }
                }
                break;
        }
        
        return null;
    }

    private function matchName(string $dataName, string $testName): bool
    {
        $dataUpper = mb_strtoupper($dataName);
        $testUpper = mb_strtoupper($testName);
        
        if ($dataUpper === $testUpper) {
            return true;
        }
        
        if ($this->removeDiacritics($dataUpper) === $this->removeDiacritics($testUpper)) {
            return true;
        }
        
        return false;
    }

    private function removeDiacritics(string $text): string
    {
        $diacritics = ['Ă', 'Â', 'Ș', 'Ț', 'Î', 'ă', 'â', 'ș', 'ț', 'î', 'É', 'é'];
        $replacements = ['A', 'A', 'S', 'T', 'I', 'a', 'a', 's', 't', 'i', 'E', 'e'];
        return str_replace($diacritics, $replacements, $text);
    }

    public function testAlbaInJudeteEndpoint(): void
    {
        $response = $this->makeRequest('/');
        
        if ($response['httpCode'] !== 200) {
            $this->log('FAIL', 'testAlbaInJudeteEndpoint', "HTTP {$response['httpCode']}");
            return;
        }

        $data = json_decode($response['body'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->log('FAIL', 'testAlbaInJudeteEndpoint', 'Invalid JSON response');
            return;
        }

        $judete = $data['judet'] ?? [];
        $found = false;
        foreach ($judete as $judet) {
            if ($this->matchName($judet['nume'], 'ALBA')) {
                $found = true;
                break;
            }
        }

        $this->log($found ? 'PASS' : 'FAIL', 'testAlbaInJudeteEndpoint', 
            $found ? 'ALBA found in judete endpoint' : 'ALBA not found in judete endpoint');
    }

    public function testAlbaEndpointAccessible(): void
    {
        $response = $this->makeRequest('/ROMANIA/ALBA/');
        
        if ($response['httpCode'] !== 200) {
            $this->log('FAIL', 'testAlbaEndpointAccessible', "HTTP {$response['httpCode']}");
            return;
        }

        $data = json_decode($response['body'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->log('FAIL', 'testAlbaEndpointAccessible', 'Invalid JSON response');
            return;
        }

        if (!$this->matchName($data['nume'], 'ALBA')) {
            $this->log('FAIL', 'testAlbaEndpointAccessible', "Expected ALBA, got {$data['nume']}");
            return;
        }

        $this->log('PASS', 'testAlbaEndpointAccessible');
    }

    public function testAllMunicipii(): void
    {
        echo "\nTesting municipii...\n";
        $passed = 0;
        $failed = 0;
        
        foreach ($this->testData['municipii'] as $municipiu) {
            $testName = "municipiu_exists_" . $this->sanitizeName($municipiu);
            
            $found = $this->findInAlbaData($municipiu, 'municipiu');
            
            if ($found === null) {
                $this->log('FAIL', $testName, "'$municipiu' not found in ALBA data");
                $failed++;
                continue;
            }
            
            $this->log('PASS', $testName, "'$municipiu' exists");
            $passed++;
            
            $testNameAdr = "municipiu_adresa_" . $this->sanitizeName($municipiu);
            if (empty($found['adresaCompleta'])) {
                $this->log('FAIL', $testNameAdr, "'$municipiu' missing adresaCompleta");
                $failed++;
            } else {
                $this->log('PASS', $testNameAdr, "'$municipiu' has adresaCompleta");
                $passed++;
            }
            
            $testNameSearch = "municipiu_search_" . $this->sanitizeName($municipiu);
            $foundInSearch = $this->searchForLocality($municipiu);
            if ($foundInSearch) {
                $this->log('PASS', $testNameSearch, "'$municipiu' found in search");
                $passed++;
            } else {
                $this->log('FAIL', $testNameSearch, "'$municipiu' not found in search");
                $failed++;
            }
        }
        
        echo "Municipii: $passed passed, $failed failed\n";
    }

    public function testAllOrase(): void
    {
        echo "\nTesting orase...\n";
        $passed = 0;
        $failed = 0;
        
        foreach ($this->testData['orase'] as $oras) {
            $testName = "oras_exists_" . $this->sanitizeName($oras);
            
            $found = $this->findInAlbaData($oras, 'oras');
            
            if ($found === null) {
                $this->log('FAIL', $testName, "'$oras' not found in ALBA data");
                $failed++;
                continue;
            }
            
            $this->log('PASS', $testName, "'$oras' exists");
            $passed++;
            
            $testNameAdr = "oras_adresa_" . $this->sanitizeName($oras);
            if (empty($found['adresaCompleta'])) {
                $this->log('FAIL', $testNameAdr, "'$oras' missing adresaCompleta");
                $failed++;
            } else {
                $this->log('PASS', $testNameAdr, "'$oras' has adresaCompleta");
                $passed++;
            }
            
            $testNameSearch = "oras_search_" . $this->sanitizeName($oras);
            $foundInSearch = $this->searchForLocality($oras);
            if ($foundInSearch) {
                $this->log('PASS', $testNameSearch, "'$oras' found in search");
                $passed++;
            } else {
                $this->log('FAIL', $testNameSearch, "'$oras' not found in search");
                $failed++;
            }
        }
        
        echo "Orase: $passed passed, $failed failed\n";
    }

    public function testAllComune(): void
    {
        echo "\nTesting comune...\n";
        $passed = 0;
        $failed = 0;
        
        foreach ($this->testData['comune'] as $comuna) {
            $testName = "comuna_exists_" . $this->sanitizeName($comuna);
            
            $found = $this->findInAlbaData($comuna, 'comuna');
            
            if ($found === null) {
                $this->log('FAIL', $testName, "'$comuna' not found in ALBA data");
                $failed++;
                continue;
            }
            
            $this->log('PASS', $testName, "'$comuna' exists");
            $passed++;
            
            $testNameAdr = "comuna_adresa_" . $this->sanitizeName($comuna);
            if (empty($found['adresaCompleta'])) {
                $this->log('FAIL', $testNameAdr, "'$comuna' missing adresaCompleta");
                $failed++;
            } else {
                $this->log('PASS', $testNameAdr, "'$comuna' has adresaCompleta");
                $passed++;
            }
            
            $testNameSearch = "comuna_search_" . $this->sanitizeName($comuna);
            $foundInSearch = $this->searchForLocality($comuna);
            if ($foundInSearch) {
                $this->log('PASS', $testNameSearch, "'$comuna' found in search");
                $passed++;
            } else {
                $this->log('FAIL', $testNameSearch, "'$comuna' not found in search");
                $failed++;
            }
        }
        
        echo "Comune: $passed passed, $failed failed\n";
    }

    public function testAllSate(): void
    {
        echo "\nTesting sate...\n";
        $passed = 0;
        $failed = 0;
        
        foreach ($this->testData['sate'] as $comunaName => $sateList) {
            foreach ($sateList as $sat) {
                $testName = "sat_exists_" . $this->sanitizeName($sat);
                
                $found = $this->findInAlbaData($sat, 'sat');
                
                if ($found === null) {
                    $this->log('FAIL', $testName, "'$sat' not found in ALBA data");
                    $failed++;
                    continue;
                }
                
                $this->log('PASS', $testName, "'$sat' exists");
                $passed++;
                
                $testNameAdr = "sat_adresa_" . $this->sanitizeName($sat);
                if (empty($found['adresaCompleta'])) {
                    $this->log('FAIL', $testNameAdr, "'$sat' missing adresaCompleta");
                    $failed++;
                } else {
                    $this->log('PASS', $testNameAdr, "'$sat' has adresaCompleta");
                    $passed++;
                }
                
                $testNameSearch = "sat_search_" . $this->sanitizeName($sat);
                $foundInSearch = $this->searchForLocality($sat);
                if ($foundInSearch) {
                    $this->log('PASS', $testNameSearch, "'$sat' found in search");
                    $passed++;
                } else {
                    $this->log('FAIL', $testNameSearch, "'$sat' not found in search");
                    $failed++;
                }
            }
        }
        
        echo "Sate: $passed passed, $failed failed\n";
    }

    private function searchForLocality(string $name): bool
    {
        $encodedQuery = urlencode($name);
        $response = $this->makeRequest("/search/?q=$encodedQuery&judet=ALBA");
        
        if ($response['httpCode'] !== 200) {
            return false;
        }
        
        $data = json_decode($response['body'], true);
        $results = $data['results'] ?? [];
        
        foreach ($results as $result) {
            if (isset($result['data']['nume']) && $this->matchName($result['data']['nume'], $name)) {
                return true;
            }
        }
        
        $noDiac = $this->removeDiacritics($name);
        if ($noDiac !== $name) {
            return $this->searchForLocality($noDiac);
        }
        
        return false;
    }

    private function sanitizeName(string $name): string
    {
        return preg_replace('/[^a-zA-Z0-9ăâșțîĂÂȘȚÎ]/u', '_', $name);
    }

    public function generateReport(): void
    {
        $passed = 0;
        $failed = 0;
        $skipped = 0;

        foreach ($this->results as $r) {
            if ($r['status'] === 'PASS') $passed++;
            elseif ($r['status'] === 'FAIL') $failed++;
            else $skipped++;
        }

        $totalSate = array_sum(array_map('count', $this->testData['sate']));

        $totalTests = $passed + $failed;
        $html = <<<HTML
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALBA County Test Report - {$this->runId}</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; padding: 20px; }
        .container { max-width: 1400px; margin: 0 auto; }
        h1 { color: #333; margin-bottom: 20px; }
        .summary { display: flex; gap: 20px; margin-bottom: 30px; flex-wrap: wrap; }
        .stat { background: white; padding: 20px 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); min-width: 150px; }
        .stat.passed { border-left: 4px solid #28a745; }
        .stat.failed { border-left: 4px solid #dc3545; }
        .stat.skipped { border-left: 4px solid #ffc107; }
        .stat-value { font-size: 32px; font-weight: bold; color: #333; }
        .stat-label { color: #666; font-size: 14px; margin-top: 5px; }
        .data-summary { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .data-summary h2 { margin-bottom: 15px; font-size: 18px; }
        .data-summary ul { list-style: none; display: flex; gap: 30px; flex-wrap: wrap; }
        .data-summary li { background: #e9ecef; padding: 8px 15px; border-radius: 4px; }
        .data-summary .count { font-weight: bold; color: #495057; margin-right: 5px; }
        .tests { background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden; }
        .test-header { background: #f8f9fa; padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: 600; }
        .test-row { display: flex; align-items: center; padding: 8px 20px; border-bottom: 1px solid #eee; font-size: 13px; }
        .test-row:last-child { border-bottom: none; }
        .test-row.pass { background: #d4edda; }
        .test-row.fail { background: #f8d7da; }
        .test-icon { width: 30px; font-size: 16px; }
        .test-name { flex: 1; font-family: monospace; font-size: 12px; word-break: break-all; }
        .test-message { color: #666; font-size: 11px; max-width: 300px; margin-left: 10px; }
        .test-time { color: #999; font-size: 11px; min-width: 150px; text-align: right; margin-left: 10px; }
        .footer { margin-top: 20px; color: #666; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🏛️ ALBA County Test Report</h1>
        <p style="color: #666; margin-bottom: 20px;">Run ID: {$this->runId}</p>
        
        <div class="summary">
            <div class="stat passed">
                <div class="stat-value">$passed</div>
                <div class="stat-label">✅ Passed</div>
            </div>
            <div class="stat failed">
                <div class="stat-value">$failed</div>
                <div class="stat-label">❌ Failed</div>
            </div>
            <div class="stat skipped">
                <div class="stat-value">$skipped</div>
                <div class="stat-label">⏭️ Skipped</div>
            </div>
        </div>
        
        <div class="data-summary">
            <h2>Test Data Coverage</h2>
            <ul>
                <li><span class="count">{$this->countTestData('municipii')}</span>Municipii</li>
                <li><span class="count">{$this->countTestData('orase')}</span>Orase</li>
                <li><span class="count">{$this->countTestData('comune')}</span>Comune</li>
                <li><span class="count">{$totalSate}</span>Sate</li>
                <li><span class="count">{$this->countTestData('all')}</span>Total</li>
            </ul>
        </div>
        
        <div class="tests">
            <div class="test-header">Test Results ({$totalTests} total)</div>
HTML;

        foreach ($this->results as $r) {
            $icon = $r['status'] === 'PASS' ? '✓' : ($r['status'] === 'FAIL' ? '✗' : '○');
            $class = strtolower($r['status']);
            $escapedName = htmlspecialchars($r['test'], ENT_QUOTES, 'UTF-8');
            $escapedMessage = htmlspecialchars($r['message'], ENT_QUOTES, 'UTF-8');
            $html .= <<<ROW
            <div class="test-row $class">
                <span class="test-icon">$icon</span>
                <span class="test-name">$escapedName</span>
                <span class="test-message">$escapedMessage</span>
                <span class="test-time">{$r['timestamp']}</span>
            </div>
ROW;
        }

        $html .= <<<FOOTER
        </div>
        <div class="footer">
            Generated by AlbaTestRunner | Oras API Testing | Total localities tested: {$this->countTestData('all')}
        </div>
    </div>
</body>
</html>
FOOTER;

        $reportFile = $this->reportPath . '/report.html';
        file_put_contents($reportFile, $html);
        
        $jsonFile = $this->reportPath . '/results.json';
        file_put_contents($jsonFile, json_encode([
            'runId' => $this->runId,
            'timestamp' => date('Y-m-d H:i:s'),
            'testData' => [
                'municipii' => count($this->testData['municipii']),
                'orase' => count($this->testData['orase']),
                'comune' => count($this->testData['comune']),
                'sate' => $totalSate
            ],
            'summary' => [
                'passed' => $passed,
                'failed' => $failed,
                'skipped' => $skipped,
                'total' => count($this->results)
            ],
            'results' => $this->results
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        echo "\n📄 Report saved to: $reportFile\n";
        echo "📊 JSON results saved to: $jsonFile\n";
    }

    private function countTestData(string $type): int
    {
        switch ($type) {
            case 'municipii': return count($this->testData['municipii']);
            case 'orase': return count($this->testData['orase']);
            case 'comune': return count($this->testData['comune']);
            case 'sate': return array_sum(array_map('count', $this->testData['sate']));
            case 'all': return count($this->testData['municipii']) + count($this->testData['orase']) + count($this->testData['comune']) + array_sum(array_map('count', $this->testData['sate']));
            default: return 0;
        }
    }

    public function run(): void
    {
        echo "========================================\n";
        echo "  ALBA County API Test Suite\n";
        echo "  Run ID: {$this->runId}\n";
        echo "========================================\n\n";

        echo "Loading test data...\n";
        $this->loadTestData();
        
        echo "\nLoading ALBA data from API...\n";
        $this->loadAlbaData();
        
        echo "\nTesting endpoints...\n";
        $this->testAlbaInJudeteEndpoint();
        $this->testAlbaEndpointAccessible();
        
        echo "\nTesting all localities...\n";
        $this->testAllMunicipii();
        $this->testAllOrase();
        $this->testAllComune();
        $this->testAllSate();
        
        echo "\n";
        $this->generateReport();
        
        $failed = array_filter($this->results, fn($r) => $r['status'] === 'FAIL');
        $passed = array_filter($this->results, fn($r) => $r['status'] === 'PASS');
        
        echo "\n========================================\n";
        echo "  SUMMARY\n";
        echo "========================================\n";
        echo "  Total tests: " . count($this->results) . "\n";
        echo "  Passed: " . count($passed) . "\n";
        echo "  Failed: " . count($failed) . "\n";
        echo "========================================\n";
        
        if (!empty($failed)) {
            echo "\n⚠️  Failed tests:\n";
            foreach ($failed as $f) {
                echo "  - {$f['test']}: {$f['message']}\n";
            }
            exit(1);
        }
    }
}

$runner = new AlbaTestRunner();
$runner->run();
