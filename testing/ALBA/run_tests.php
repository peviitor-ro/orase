<?php

class AlbaTestRunner
{
    private string $baseUrl = 'https://orase.peviitor.ro';
    private array $results = [];
    private string $runId;
    private string $reportPath;

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
        
        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
        } else {
            $context = stream_context_create([
                'http' => [
                    'timeout' => 30,
                    'ignore_errors' => true
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ]);
            $response = @file_get_contents($url, false, $context);
            $httpCode = 200;
            $error = '';
            if ($response === false) {
                $httpCode = 0;
                $error = 'file_get_contents failed';
            }
        }

        return [
            'body' => $response,
            'httpCode' => $httpCode,
            'error' => $error
        ];
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
            if (strtoupper($judet['nume']) === 'ALBA') {
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

        if (strtoupper($data['nume']) !== 'ALBA') {
            $this->log('FAIL', 'testAlbaEndpointAccessible', "Expected ALBA, got {$data['nume']}");
            return;
        }

        $this->log('PASS', 'testAlbaEndpointAccessible');
    }

    public function testMunicipii(): void
    {
        $response = $this->makeRequest('/ROMANIA/ALBA/');
        $data = json_decode($response['body'], true);
        
        $municipii = $data['municipiu'] ?? [];
        if (empty($municipii)) {
            $this->log('FAIL', 'testMunicipii', 'No municipii found');
            return;
        }

        $expectedMunicipii = ['ALBA IULIA', 'AIUD', 'BLAJ', 'SEBEȘ'];
        $foundMunicipii = [];
        
        foreach ($municipii as $m) {
            $foundMunicipii[] = $m['nume'];
            
            if (empty($m['adresaCompleta'])) {
                $this->log('FAIL', "testMunicipiu_adresaCompleta_{$m['nume']}", 'Missing adresaCompleta');
            } else {
                $this->log('PASS', "testMunicipiu_adresaCompleta_{$m['nume']}");
            }
        }

        foreach ($expectedMunicipii as $expected) {
            if (!in_array($expected, $foundMunicipii)) {
                $this->log('FAIL', "testMunicipiu_exists_$expected", 'Municipiu not found');
            } else {
                $this->log('PASS', "testMunicipiu_exists_$expected");
            }
        }
    }

    public function testOrase(): void
    {
        $response = $this->makeRequest('/ROMANIA/ALBA/');
        $data = json_decode($response['body'], true);
        
        $orase = $data['oras'] ?? [];
        if (empty($orase)) {
            $this->log('FAIL', 'testOrase', 'No orase found');
            return;
        }

        $testedOrase = 0;
        foreach ($orase as $oras) {
            $orasName = $oras['nume'];
            
            if (empty($oras['adresaCompleta'])) {
                $this->log('FAIL', "testOras_adresaCompleta_$orasName", 'Missing adresaCompleta');
            } else {
                $this->log('PASS', "testOras_adresaCompleta_$orasName");
                $testedOrase++;
            }

            $localitati = $oras['localitate'] ?? [];
            foreach ($localitati as $localitate) {
                if ($localitate['tip'] === 'sat') {
                    if (empty($localitate['adresaCompleta'])) {
                        $this->log('FAIL', "testSat_in_oras_{$orasName}_{$localitate['nume']}", 'Missing adresaCompleta');
                    } else {
                        $this->log('PASS', "testSat_in_oras_{$orasName}_{$localitate['nume']}");
                    }
                }
            }
        }

        $this->log('PASS', 'testOrase_summary', "Tested $testedOrase orase with adresaCompleta");
    }

    public function testComune(): void
    {
        $response = $this->makeRequest('/ROMANIA/ALBA/');
        $data = json_decode($response['body'], true);
        
        $comune = $data['comuna'] ?? [];
        
        $testedComune = 0;
        foreach ($comune as $c) {
            $comunaName = $c['nume'];
            
            if (empty($c['adresaCompleta'])) {
                $this->log('FAIL', "testComuna_adresaCompleta_$comunaName", 'Missing adresaCompleta');
            } else {
                $this->log('PASS', "testComuna_adresaCompleta_$comunaName");
                $testedComune++;
            }

            $localitati = $c['localitate'] ?? [];
            foreach ($localitati as $localitate) {
                if (empty($localitate['adresaCompleta'])) {
                    $this->log('FAIL', "testSat_in_comuna_{$comunaName}_{$localitate['nume']}", 'Missing adresaCompleta');
                } else {
                    $this->log('PASS', "testSat_in_comuna_{$comunaName}_{$localitate['nume']}");
                }
            }
        }

        if (empty($comune)) {
            $this->log('FAIL', 'testComune', 'No comune found');
        } else {
            $this->log('PASS', 'testComune_summary', "Tested $testedComune comune with adresaCompleta");
        }
    }

    public function testSearchWithDiacritics(): void
    {
        $testCases = [
            ['query' => 'ALBA IULIA', 'expected' => 'ALBA IULIA'],
            ['query' => 'BĂRĂBANȚ', 'expected' => 'Bărăbanț'],
            ['query' => 'MICEȘTI', 'expected' => 'Micești'],
            ['query' => 'AIUD', 'expected' => 'AIUD'],
            ['query' => 'BLAJ', 'expected' => 'BLAJ'],
            ['query' => 'SEBEȘ', 'expected' => 'SEBEȘ'],
            ['query' => 'ABRUD', 'expected' => 'ABRUD'],
        ];

        foreach ($testCases as $tc) {
            $encodedQuery = urlencode($tc['query']);
            $response = $this->makeRequest("/search/?q=$encodedQuery&judet=ALBA");
            
            if ($response['httpCode'] !== 200) {
                $this->log('FAIL', "testSearch_diacritics_{$tc['query']}", "HTTP {$response['httpCode']}");
                continue;
            }

            $data = json_decode($response['body'], true);
            $results = $data['results'] ?? [];

            $found = false;
            foreach ($results as $result) {
                if (isset($result['data']['nume']) && 
                    (strtoupper($result['data']['nume']) === strtoupper($tc['expected']) || 
                     strtoupper(removeDiacritics($result['data']['nume'])) === strtoupper(removeDiacritics($tc['expected'])))) {
                    $found = true;
                    break;
                }
            }

            $this->log($found ? 'PASS' : 'FAIL', "testSearch_diacritics_{$tc['query']}",
                $found ? "Found '{$tc['query']}'" : "Not found '{$tc['query']}'");
        }
    }

    public function testSearchWithoutDiacritics(): void
    {
        $testCases = [
            ['query' => 'ALBA IULIA', 'expected' => 'ALBA IULIA'],
            ['query' => 'BARABANT', 'expected' => 'Barabant'],
            ['query' => 'MICESTI', 'expected' => 'Micesti'],
            ['query' => 'AIUD', 'expected' => 'AIUD'],
            ['query' => 'BLAJ', 'expected' => 'BLAJ'],
            ['query' => 'SEBES', 'expected' => 'SEBES'],
            ['query' => 'ABRUD', 'expected' => 'ABRUD'],
        ];

        foreach ($testCases as $tc) {
            $encodedQuery = urlencode($tc['query']);
            $response = $this->makeRequest("/search/?q=$encodedQuery&judet=ALBA");
            
            if ($response['httpCode'] !== 200) {
                $this->log('FAIL', "testSearch_no_diacritics_{$tc['query']}", "HTTP {$response['httpCode']}");
                continue;
            }

            $data = json_decode($response['body'], true);
            $results = $data['results'] ?? [];

            $found = false;
            foreach ($results as $result) {
                if (isset($result['data']['nume']) && 
                    (strtoupper(removeDiacritics($result['data']['nume'])) === strtoupper($tc['query']))) {
                    $found = true;
                    break;
                }
            }

            $this->log($found ? 'PASS' : 'FAIL', "testSearch_no_diacritics_{$tc['query']}",
                $found ? "Found '{$tc['query']}'" : "Not found '{$tc['query']}'");
        }
    }

    public function testSearchJudetAlba(): void
    {
        $testCases = ['ALBA', 'Alba'];
        
        foreach ($testCases as $query) {
            $encodedQuery = urlencode($query);
            $response = $this->makeRequest("/search/?q=$encodedQuery");
            
            if ($response['httpCode'] !== 200) {
                $this->log('FAIL', "testSearch_judet_$query", "HTTP {$response['httpCode']}");
                continue;
            }

            $data = json_decode($response['body'], true);
            $results = $data['results'] ?? [];

            $found = false;
            foreach ($results as $result) {
                if ($result['type'] === 'judet' && 
                    (strtoupper($result['data']['nume']) === 'ALBA' || 
                     strtoupper($result['data']['numeDiacritice'] ?? '') === 'ALBA')) {
                    $found = true;
                    break;
                }
            }

            $this->log($found ? 'PASS' : 'FAIL', "testSearch_judet_$query",
                $found ? "Found judet ALBA" : "Judet ALBA not found");
        }
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
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { color: #333; margin-bottom: 20px; }
        .summary { display: flex; gap: 20px; margin-bottom: 30px; }
        .stat { background: white; padding: 20px 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .stat.passed { border-left: 4px solid #28a745; }
        .stat.failed { border-left: 4px solid #dc3545; }
        .stat.skipped { border-left: 4px solid #ffc107; }
        .stat-value { font-size: 32px; font-weight: bold; color: #333; }
        .stat-label { color: #666; font-size: 14px; margin-top: 5px; }
        .tests { background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); overflow: hidden; }
        .test-header { background: #f8f9fa; padding: 15px 20px; border-bottom: 1px solid #eee; font-weight: 600; }
        .test-row { display: flex; align-items: center; padding: 12px 20px; border-bottom: 1px solid #eee; }
        .test-row:last-child { border-bottom: none; }
        .test-row.pass { background: #d4edda; }
        .test-row.fail { background: #f8d7da; }
        .test-icon { width: 30px; font-size: 18px; }
        .test-name { flex: 1; font-family: monospace; font-size: 14px; }
        .test-message { color: #666; font-size: 12px; max-width: 400px; }
        .test-time { color: #999; font-size: 12px; min-width: 150px; text-align: right; }
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
        
        <div class="tests">
            <div class="test-header">Test Results</div>
HTML;

        foreach ($this->results as $r) {
            $icon = $r['status'] === 'PASS' ? '✓' : ($r['status'] === 'FAIL' ? '✗' : '○');
            $class = strtolower($r['status']);
            $html .= <<<ROW
            <div class="test-row $class">
                <span class="test-icon">$icon</span>
                <span class="test-name">{$r['test']}</span>
                <span class="test-message">{$r['message']}</span>
                <span class="test-time">{$r['timestamp']}</span>
            </div>
ROW;
        }

        $html .= <<<FOOTER
        </div>
        <div class="footer">
            Generated by AlbaTestRunner | Oras API Testing
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

    public function run(): void
    {
        echo "========================================\n";
        echo "  ALBA County API Test Suite\n";
        echo "  Run ID: {$this->runId}\n";
        echo "========================================\n\n";

        echo "Testing endpoints...\n";
        $this->testAlbaInJudeteEndpoint();
        $this->testAlbaEndpointAccessible();
        
        echo "\nTesting data structure...\n";
        $this->testMunicipii();
        $this->testOrase();
        $this->testComune();
        
        echo "\nTesting search functionality...\n";
        $this->testSearchWithDiacritics();
        $this->testSearchWithoutDiacritics();
        $this->testSearchJudetAlba();
        
        echo "\n";
        $this->generateReport();
        
        $failed = array_filter($this->results, fn($r) => $r['status'] === 'FAIL');
        if (!empty($failed)) {
            exit(1);
        }
    }
}

if (!function_exists('removeDiacritics')) {
    function removeDiacritics(string $text): string
    {
        $diacritics = ['ă', 'â', 'ș', 'ț', 'Ă', 'Â', 'Ș', 'Ț', 'é', 'É', 'î', 'Î', 'ă'];
        $replacements = ['a', 'a', 's', 't', 'A', 'A', 'S', 'T', 'e', 'E', 'i', 'I', 'a'];
        return str_replace($diacritics, $replacements, $text);
    }
}

require_once __DIR__ . '/../../ROMANIA/functions.php';

$runner = new AlbaTestRunner();
$runner->run();
