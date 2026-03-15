<?php
$municipii =
[
        createMunicipiu("PITEȘTI", [
            createLoc("PITEȘTI", "oras", createAdresaCompleta("orasul PITEȘTI, municipiul PITEȘTI, judetul ARGEȘ, România", "orasul PITESTI, municipiul PITESTI, judetul ARGES, Romania")),
        ], createAdresaCompleta("municipiul PITEȘTI, judetul ARGEȘ, România", "municipiul PITESTI, judetul ARGES, Romania")),
        createMunicipiu("CÂMPULUNG", [
            createLoc("CÂMPULUNG", "oras", createAdresaCompleta("orasul CÂMPULUNG, municipiul CÂMPULUNG, judetul ARGEȘ, România", "orasul CAMPULUNG, municipiul CAMPULUNG, judetul ARGES, Romania")),
            createLoc("Valea Rumâneștilor", "oras", createAdresaCompleta("orasul Valea Rumâneștilor, municipiul CÂMPULUNG, judetul ARGEȘ, România", "orasul Valea Rumanestilor, municipiul CAMPULUNG, judetul ARGES, Romania")),
        ], createAdresaCompleta("municipiul CÂMPULUNG, judetul ARGEȘ, România", "municipiul CAMPULUNG, judetul ARGES, Romania")),
        createMunicipiu("CURTEA DE ARGEȘ", [
            createLoc("CURTEA DE ARGEȘ", "oras", createAdresaCompleta("orasul CURTEA DE ARGEȘ, municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România", "orasul CURTEA DE ARGES, municipiul CURTEA DE ARGES, judetul ARGES, Romania")),
            createLoc("Noapteș", "oras", createAdresaCompleta("orasul Noapteș, municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România", "orasul Noaptes, municipiul CURTEA DE ARGES, judetul ARGES, Romania")),
        ], createAdresaCompleta("municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România", "municipiul CURTEA DE ARGES, judetul ARGES, Romania")),
        
];
?>
