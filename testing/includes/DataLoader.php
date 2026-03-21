<?php

class DataLoader {
    private $basePath;
    
    public function __construct($basePath = null) {
        $this->basePath = $basePath ?? __DIR__ . '/../../ROMANIA';
    }
    
    public function getJudetePath() {
        return $this->basePath;
    }
    
    public function loadCountyData($judet) {
        $judetPath = $this->basePath . '/' . $judet;
        
        if (!is_dir($judetPath)) {
            throw new Exception("County folder not found: {$judet}");
        }
        
        $municipii = [];
        $orase = [];
        $comune = [];
        
        require $judetPath . '/municipii.php';
        require $judetPath . '/orase.php';
        require $judetPath . '/comune.php';
        
        $data = [
            'name' => $judet,
            'municipii' => $municipii,
            'orase' => $orase,
            'comune' => $comune
        ];
        
        return $data;
    }
    
    public function getAllCounties() {
        $folders = glob($this->basePath . '/*', GLOB_ONLYDIR);
        $counties = [];
        
        foreach ($folders as $folder) {
            $name = basename($folder);
            if ($name !== 'functions.php' && $name !== 'index.php') {
                $counties[] = $name;
            }
        }
        
        return $counties;
    }
    
    public function extractAllLocalities($countyData) {
        $localities = [];
        
        foreach ($countyData['municipii'] as $municipiu) {
            $localities[] = [
                'name' => $municipiu->nume,
                'type' => 'municipiu',
                'adresaCompleta' => $this->getAdresaCompleta($municipiu)
            ];
            
            if (isset($municipiu->loc)) {
                foreach ($municipiu->loc as $loc) {
                    $localities = array_merge($localities, $this->extractVillages($loc, 'municipiu', $municipiu->nume));
                }
            }
        }
        
        foreach ($countyData['orase'] as $oras) {
            $localities[] = [
                'name' => $oras->nume,
                'type' => 'oras',
                'adresaCompleta' => $this->getAdresaCompleta($oras)
            ];
            
            if (isset($oras->loc)) {
                foreach ($oras->loc as $loc) {
                    if (isset($loc->tip) && $loc->tip === 'oras') {
                        if (isset($loc->loc)) {
                            foreach ($loc->loc as $subLoc) {
                                $localities[] = [
                                    'name' => $subLoc->nume,
                                    'type' => $subLoc->tip ?? 'sat',
                                    'parent' => $oras->nume,
                                    'parentType' => 'oras',
                                    'adresaCompleta' => $this->getAdresaCompleta($subLoc)
                                ];
                            }
                        }
                    } else {
                        $localities = array_merge($localities, $this->extractVillages($loc, 'oras', $oras->nume));
                    }
                }
            }
        }
        
        foreach ($countyData['comune'] as $comuna) {
            $localities[] = [
                'name' => $comuna->nume,
                'type' => 'comuna',
                'adresaCompleta' => $this->getAdresaCompleta($comuna)
            ];
            
            if (isset($comuna->loc)) {
                foreach ($comuna->loc as $loc) {
                    $localities = array_merge($localities, $this->extractVillages($loc, 'comuna', $comuna->nume));
                }
            }
        }
        
        return $localities;
    }
    
    private function extractVillages($loc, $parentType, $parentName) {
        $villages = [];
        
        if (isset($loc->tip) && $loc->tip === 'sat') {
            $villages[] = [
                'name' => $loc->nume,
                'type' => 'sat',
                'parent' => $parentName,
                'parentType' => $parentType,
                'adresaCompleta' => $this->getAdresaCompleta($loc)
            ];
        }
        
        if (isset($loc->loc) && is_array($loc->loc)) {
            foreach ($loc->loc as $subLoc) {
                $villages = array_merge($villages, $this->extractVillages($subLoc, $parentType, $parentName));
            }
        }
        
        return $villages;
    }
    
    private function getAdresaCompleta($obj) {
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
            }
        }
        
        return ['withDiacritics' => '', 'withoutDiacritics' => ''];
    }
    
    private function getAdresaFromLoc($loc) {
        if (is_array($loc) && isset($loc[0]) && isset($loc[1])) {
            return [
                'withDiacritics' => $loc[0],
                'withoutDiacritics' => $loc[1]
            ];
        }
        return ['withDiacritics' => '', 'withoutDiacritics' => ''];
    }
    
    public function searchLocalities($countyData, $query) {
        $results = [];
        $localities = $this->extractAllLocalities($countyData);
        
        $queryUpper = strtoupper($query);
        $queryNoDiac = strtoupper(removeDiacritics($query));
        
        foreach ($localities as $loc) {
            $nameUpper = strtoupper($loc['name']);
            $nameNoDiac = strtoupper(removeDiacritics($loc['name']));
            
            if ($nameUpper === $queryUpper || $nameNoDiac === $queryUpper) {
                $results[] = $loc;
            }
        }
        
        return $results;
    }
}
