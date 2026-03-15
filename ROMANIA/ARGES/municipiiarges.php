<?php
$municipii =
[
        createMunicipiu("PITEȘTI", [
            createLoc("PITEȘTI", "oras", createAdresaCompleta("orasul PITEȘTI, municipiul PITEȘTI, judetul ARGEȘ, România")),
        ], createAdresaCompleta("municipiul PITEȘTI, judetul ARGEȘ, România")),
        createMunicipiu("CÂMPULUNG", [
            createLoc("CÂMPULUNG", "oras", createAdresaCompleta("orasul CÂMPULUNG, municipiul CÂMPULUNG, judetul ARGEȘ, România")),
            createLoc("Valea Rumâneștilor", "oras", createAdresaCompleta("orasul Valea Rumâneștilor, municipiul CÂMPULUNG, judetul ARGEȘ, România")),
        ], createAdresaCompleta("municipiul CÂMPULUNG, judetul ARGEȘ, România")),
        createMunicipiu("CURTEA DE ARGEȘ", [
            createLoc("CURTEA DE ARGEȘ", "oras", createAdresaCompleta("orasul CURTEA DE ARGEȘ, municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România")),
            createLoc("Noapteș", "oras", createAdresaCompleta("orasul Noapteș, municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România")),
        ], createAdresaCompleta("municipiul CURTEA DE ARGEȘ, judetul ARGEȘ, România")),
        
];
?>
