<?php
require_once __DIR__ . '/includes/TestFramework.php';
require_once __DIR__ . '/includes/DataLoader.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain; charset=UTF-8");

$testType = isset($_GET['type']) ? $_GET['type'] : 'all';
$judet = isset($_GET['judet']) ? $_GET['judet'] : 'ALBA';

$runner = new TestRunner();
$loader = new DataLoader();

switch ($testType) {
    case 'structure':
        runStructureTests($runner, $loader, $judet);
        break;
    case 'adresa':
        runAdresaCompletaTests($runner, $loader, $judet);
        break;
    case 'search':
        runSearchTests($runner, $loader, $judet);
        break;
    case 'diacritics':
        runDiacriticsTests($runner, $loader, $judet);
        break;
    case 'case':
        runCaseSensitivityTests($runner, $loader, $judet);
        break;
    case 'all':
    default:
        runAllTests($runner, $loader, $judet);
        break;
}

$success = $runner->run();
exit($success ? 0 : 1);

function runAllTests($runner, $loader, $judet) {
    echo "\n\033[36mRunning ALL tests for {$judet} county...\033[0m\n";
    runStructureTests($runner, $loader, $judet);
    runAdresaCompletaTests($runner, $loader, $judet);
    runSearchTests($runner, $loader, $judet);
    runDiacriticsTests($runner, $loader, $judet);
    runCaseSensitivityTests($runner, $loader, $judet);
}

function runStructureTests($runner, $loader, $judet) {
    echo "\n\033[33m─── Structure Tests ───\033[0m\n";
    
    $runner->addTest("County folder exists", function() use ($loader, $judet) {
        $path = $loader->getJudetePath() . '/' . $judet;
        if (!is_dir($path)) {
            return ['status' => 'fail', 'message' => "Folder not found: {$path}"];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("County has municipii.php", function() use ($loader, $judet) {
        $path = $loader->getJudetePath() . '/' . $judet . '/municipii.php';
        if (!file_exists($path)) {
            return ['status' => 'fail', 'message' => "File not found: {$path}"];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("County has orase.php", function() use ($loader, $judet) {
        $path = $loader->getJudetePath() . '/' . $judet . '/orase.php';
        if (!file_exists($path)) {
            return ['status' => 'fail', 'message' => "File not found: {$path}"];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("County has comune.php", function() use ($loader, $judet) {
        $path = $loader->getJudetePath() . '/' . $judet . '/comune.php';
        if (!file_exists($path)) {
            return ['status' => 'fail', 'message' => "File not found: {$path}"];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("County has index.php", function() use ($loader, $judet) {
        $path = $loader->getJudetePath() . '/' . $judet . '/index.php';
        if (!file_exists($path)) {
            return ['status' => 'fail', 'message' => "File not found: {$path}"];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("County data loads correctly", function() use ($loader, $judet) {
        try {
            $data = $loader->loadCountyData($judet);
            if (empty($data['municipii']) && empty($data['orase']) && empty($data['comune'])) {
                return ['status' => 'fail', 'message' => 'No data loaded'];
            }
            return ['status' => 'pass'];
        } catch (Exception $e) {
            return ['status' => 'fail', 'message' => $e->getMessage()];
        }
    });
    
    $runner->addTest("Municipii are defined", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $result = Assert::assertNotEmpty($data['municipii'], 'Municipii array should not be empty');
        return $result['status'] === 'fail' ? $result : (count($data['municipii']) > 0 ? ['status' => 'pass'] : ['status' => 'fail', 'message' => 'No municipii found']);
    });
    
    $runner->addTest("Orașe are defined", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $result = Assert::assertNotEmpty($data['orase'], 'Orașe array should not be empty');
        return $result['status'] === 'fail' ? $result : (count($data['orase']) > 0 ? ['status' => 'pass'] : ['status' => 'fail', 'message' => 'No orașe found']);
    });
    
    $runner->addTest("Comune are defined", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $result = Assert::assertNotEmpty($data['comune'], 'Comune array should not be empty');
        return $result['status'] === 'fail' ? $result : (count($data['comune']) > 0 ? ['status' => 'pass'] : ['status' => 'fail', 'message' => 'No comune found']);
    });
}

function runAdresaCompletaTests($runner, $loader, $judet) {
    echo "\n\033[33m─── Adresa Completa Tests ───\033[0m\n";
    
    $runner->addTest("Municipii have adresaCompleta", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        foreach ($data['municipii'] as $m) {
            if (!isset($m->adresaCompleta)) {
                $failures[] = $m->nume;
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing adresaCompleta for: ' . implode(', ', $failures)];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Orașe have adresaCompleta", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        foreach ($data['orase'] as $o) {
            $addr = getAdresaCompleta($o);
            if (empty($addr['withDiacritics'])) {
                $failures[] = $o->nume;
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing adresaCompleta for: ' . implode(', ', $failures)];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Comune have adresaCompleta", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        foreach ($data['comune'] as $c) {
            $addr = getAdresaCompleta($c);
            if (empty($addr['withDiacritics'])) {
                $failures[] = $c->nume;
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing adresaCompleta for: ' . implode(', ', $failures)];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Villages have adresaCompleta", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        $allVillages = [];
        foreach ($data['municipii'] as $m) {
            if (isset($m->loc)) {
                foreach ($m->loc as $loc) {
                    collectVillages($loc, $m->nume, $allVillages);
                }
            }
        }
        foreach ($data['orase'] as $o) {
            if (isset($o->loc)) {
                foreach ($o->loc as $loc) {
                    collectVillages($loc, $o->nume, $allVillages);
                }
            }
        }
        foreach ($data['comune'] as $c) {
            if (isset($c->loc)) {
                foreach ($c->loc as $loc) {
                    collectVillages($loc, $c->nume, $allVillages);
                }
            }
        }
        
        foreach ($allVillages as $v) {
            if (empty($v['adresa'])) {
                $failures[] = $v['name'] . ' (parent: ' . $v['parent'] . ')';
            }
        }
        
        if (count($failures) > 10) {
            return ['status' => 'fail', 'message' => 'Missing adresaCompleta for ' . count($failures) . ' villages (showing first 10): ' . implode(', ', array_slice($failures, 0, 10))];
        } elseif (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing adresaCompleta for: ' . implode(', ', $failures)];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("adresaCompleta contains 'România'", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        foreach ($data['orase'] as $o) {
            $addr = getAdresaCompleta($o);
            if (empty($addr['withDiacritics']) || strpos($addr['withDiacritics'], 'România') === false) {
                $failures[] = $o->nume;
            }
        }
        
        foreach ($data['comune'] as $c) {
            $addr = getAdresaCompleta($c);
            if (empty($addr['withDiacritics']) || strpos($addr['withDiacritics'], 'România') === false) {
                $failures[] = $c->nume;
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing "România" in: ' . implode(', ', array_slice($failures, 0, 5))];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("adresaCompleta contains county name", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        foreach ($data['orase'] as $o) {
            $addr = getAdresaCompleta($o);
            if (empty($addr['withDiacritics']) || strpos($addr['withDiacritics'], 'judetul ' . $judet) === false) {
                $failures[] = $o->nume;
            }
        }
        
        foreach ($data['comune'] as $c) {
            $addr = getAdresaCompleta($c);
            if (empty($addr['withDiacritics']) || strpos($addr['withDiacritics'], 'judetul ' . $judet) === false) {
                $failures[] = $c->nume;
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing county in: ' . implode(', ', array_slice($failures, 0, 5))];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("adresaCompleta has diacritics and non-diacritics versions", function() use ($loader, $judet) {
        $data = $loader->loadCountyData($judet);
        $failures = [];
        
        foreach ($data['orase'] as $o) {
            $addr = getAdresaCompleta($o);
            if (empty($addr['withDiacritics']) || empty($addr['withoutDiacritics'])) {
                $failures[] = $o->nume;
            }
        }
        
        foreach ($data['comune'] as $c) {
            $addr = getAdresaCompleta($c);
            if (empty($addr['withDiacritics']) || empty($addr['withoutDiacritics'])) {
                $failures[] = $c->nume;
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Missing both versions in: ' . implode(', ', array_slice($failures, 0, 5))];
        }
        return ['status' => 'pass'];
    });
}

function runSearchTests($runner, $loader, $judet) {
    echo "\n\033[33m─── Search Tests ───\033[0m";
    
    $data = $loader->loadCountyData($judet);
    
    $runner->addTest("Search finds exact municipiu name", function() use ($loader, $judet, $data) {
        foreach ($data['municipii'] as $m) {
            $results = $loader->searchLocalities($data, $m->nume);
            if (empty($results)) {
                return ['status' => 'fail', 'message' => "Cannot find: {$m->nume}"];
            }
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search finds exact oras name", function() use ($loader, $judet, $data) {
        foreach ($data['orase'] as $o) {
            $results = $loader->searchLocalities($data, $o->nume);
            if (empty($results)) {
                return ['status' => 'fail', 'message' => "Cannot find: {$o->nume}"];
            }
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search finds exact comuna name", function() use ($loader, $judet, $data) {
        foreach ($data['comune'] as $c) {
            $results = $loader->searchLocalities($data, $c->nume);
            if (empty($results)) {
                return ['status' => 'fail', 'message' => "Cannot find: {$c->nume}"];
            }
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search finds ALBA IULIA", function() use ($loader, $judet, $data) {
        $results = $loader->searchLocalities($data, 'ALBA IULIA');
        if (empty($results)) {
            return ['status' => 'fail', 'message' => 'Cannot find ALBA IULIA'];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search finds ABRUD", function() use ($loader, $judet, $data) {
        $results = $loader->searchLocalities($data, 'ABRUD');
        if (empty($results)) {
            return ['status' => 'fail', 'message' => 'Cannot find ABRUD'];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search finds CUGIR", function() use ($loader, $judet, $data) {
        $results = $loader->searchLocalities($data, 'CUGIR');
        if (empty($results)) {
            return ['status' => 'fail', 'message' => 'Cannot find CUGIR'];
        }
        return ['status' => 'pass'];
    });
}

function runDiacriticsTests($runner, $loader, $judet) {
    echo "\n\033[33m─── Diacritics Tests ───\033[0m\n";
    
    $data = $loader->loadCountyData($judet);
    
    $testCases = [
        ['query' => 'Bărăbanț', 'expected' => 'Bărăbanț'],
        ['query' => 'Micești', 'expected' => 'Micești'],
        ['query' => 'Pâclișa', 'expected' => 'Pâclișa'],
        ['query' => 'Sâncrai', 'expected' => 'Sâncrai'],
        ['query' => 'Țifra', 'expected' => 'Țifra'],
        ['query' => 'Ștei-Arieșeni', 'expected' => 'Ștei-Arieșeni'],
        ['query' => 'Întregalde', 'expected' => 'Întregalde'],
    ];
    
    foreach ($testCases as $tc) {
        $testName = "Search with diacritics: {$tc['query']}";
        $runner->addTest($testName, function() use ($loader, $data, $tc) {
            $results = $loader->searchLocalities($data, $tc['query']);
            if (empty($results)) {
                return ['status' => 'fail', 'message' => "Cannot find '{$tc['query']}' with diacritics"];
            }
            
            $found = false;
            foreach ($results as $r) {
                if ($r['name'] === $tc['expected']) {
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                return ['status' => 'fail', 'message' => "Found '{$tc['query']}' but name mismatch"];
            }
            return ['status' => 'pass'];
        });
    }
    
    $runner->addTest("Search without diacritics finds diacritic names", function() use ($loader, $judet, $data) {
        $failures = [];
        $testCases = ['Bărăbanț', 'Țifra', 'Întregalde'];
        
        foreach ($testCases as $tc) {
            $noDiac = removeDiacritics($tc);
            $results = $loader->searchLocalities($data, $noDiac);
            if (empty($results)) {
                $failures[] = "{$noDiac} (should find {$tc})";
            }
        }
        
        if (!empty($failures)) {
            return ['status' => 'fail', 'message' => 'Cannot find without diacritics: ' . implode(', ', $failures)];
        }
        return ['status' => 'pass'];
    });
}

function runCaseSensitivityTests($runner, $loader, $judet) {
    echo "\n\033[33m─── Case Sensitivity Tests ───\033[0m\n";
    
    $data = $loader->loadCountyData($judet);
    
    $runner->addTest("Search lowercase finds uppercase", function() use ($loader, $judet, $data) {
        $results = $loader->searchLocalities($data, 'alba iulia');
        if (empty($results)) {
            return ['status' => 'fail', 'message' => 'Cannot find "alba iulia" with lowercase'];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search mixed case finds uppercase", function() use ($loader, $judet, $data) {
        $results = $loader->searchLocalities($data, 'Alba Iulia');
        if (empty($results)) {
            return ['status' => 'fail', 'message' => 'Cannot find "Alba Iulia" with mixed case'];
        }
        return ['status' => 'pass'];
    });
    
    $runner->addTest("Search uppercase finds itself", function() use ($loader, $judet, $data) {
        $results = $loader->searchLocalities($data, 'ALBA IULIA');
        if (empty($results)) {
            return ['status' => 'fail', 'message' => 'Cannot find "ALBA IULIA" with uppercase'];
        }
        return ['status' => 'pass'];
    });
}

function getAdresaCompleta($obj) {
    if (isset($obj->adresaCompleta)) {
        if (is_array($obj->adresaCompleta)) {
            return [
                'withDiacritics' => $obj->adresaCompleta[0] ?? '',
                'withoutDiacritics' => $obj->adresaCompleta[1] ?? ''
            ];
        }
        return ['withDiacritics' => '', 'withoutDiacritics' => ''];
    }
    
    if (isset($obj->loc)) {
        foreach ($obj->loc as $loc) {
            if (isset($loc->adresaCompleta)) {
                if (is_array($loc->adresaCompleta)) {
                    return [
                        'withDiacritics' => $loc->adresaCompleta[0] ?? '',
                        'withoutDiacritics' => $loc->adresaCompleta[1] ?? ''
                    ];
                }
            }
            if (is_array($loc) && isset($loc[0]) && isset($loc[1])) {
                return [
                    'withDiacritics' => $loc[0],
                    'withoutDiacritics' => $loc[1]
                ];
            }
        }
    }
    
    return ['withDiacritics' => '', 'withoutDiacritics' => ''];
}

function collectVillages($loc, $parentName, &$allVillages) {
    if (isset($loc->tip) && $loc->tip === 'sat') {
        $addrText = '';
        if (isset($loc->loc) && is_array($loc->loc)) {
            $addrText = $loc->loc[0] ?? '';
        }
        $allVillages[] = [
            'name' => $loc->nume,
            'parent' => $parentName,
            'adresa' => $addrText
        ];
    }
    
    if (isset($loc->loc) && is_array($loc->loc)) {
        foreach ($loc->loc as $subLoc) {
            if (is_object($subLoc)) {
                collectVillages($subLoc, $parentName, $allVillages);
            }
        }
    }
}
