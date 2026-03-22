<?php
$municipii =
[
    createMunicipiu("PITEȘTI", [
        createLoc("PITEȘTI", "oras", createAdresaCompleta("orasul PITEȘTI, judetul ARGEȘ, România", "orasul PITESTI, judetul ARGES, Romania")),
    ], createAdresaCompleta("municipiul PITEȘTI, judetul ARGEȘ, România", "municipiul PITESTI, judetul ARGES, Romania")),
    createMunicipiu("CÂMPULUNG", [
        createLoc("CÂMPULUNG", "oras", createAdresaCompleta("orasul CÂMPULUNG, judetul ARGEȘ, România", "orasul CAMPULUNG, judetul ARGES, Romania")),
        createLoc("Valea Rumâneștilor", "oras", createAdresaCompleta("orasul Valea Rumâneștilor, judetul ARGEȘ, România", "orasul Valea Rumânestilor, judetul ARGES, Romania")),
    ], createAdresaCompleta("municipiul CÂMPULUNG, judetul ARGEȘ, România", "municipiul CAMPULUNG, judetul ARGES, Romania")),
    createMunicipiu("CURTEA DE ARGEȘ", [
        createLoc("CURTEA DE ARGEȘ", "oras", createAdresaCompleta("orasul CURTEA DE ARGEȘ, judetul ARGEȘ, România", "orasul CURTEA DE ARGES, judetul ARGES, Romania")),
        createLoc("Noapteș", "oras", createAdresaCompleta("orasul Noapteș, judetul ARGEȘ, România", "orasul Noaptes, judetul ARGES, Romania")),
    ], createAdresaCompleta("municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România", "municipiul CURTEA DE ARGES, judetul ARGES, Romania")),
];
?>
