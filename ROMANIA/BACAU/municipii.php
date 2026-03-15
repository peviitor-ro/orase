<?php
$municipii =
[
                createMunicipiu("BACĂU", [
                    createLoc("BACĂU", "oras", createAdresaCompleta("municipiul BACĂU, judetul BACĂU, România")),
                ], createAdresaCompleta("municipiul BACĂU, judetul BACĂU, România")),
                createMunicipiu("MOINEȘTI", [
                    createLoc("MOINEȘTI", "oras", createAdresaCompleta("municipiul MOINEȘTI, judetul BACĂU, România")),
                    createLoc("Găzărie ", "sat", createAdresaCompleta("sat Găzărie, municipiul MOINEȘTI, judetul BACĂU, România")),
                ], createAdresaCompleta("municipiul MOINEȘTI, judetul BACĂU, România")),
                createMunicipiu("ONEȘTI", [
                    createLoc("ONEȘTI", "oras", createAdresaCompleta("municipiul ONEȘTI, judetul BACĂU, România")),
                    createLoc("Borzești", "sat", createAdresaCompleta("sat Borzești, municipiul ONEȘTI, judetul BACĂU, România")),
                    createLoc("Slobozia", "sat", createAdresaCompleta("sat Slobozia, municipiul ONEȘTI, judetul BACĂU, România")),
                ], createAdresaCompleta("municipiul ONEȘTI, judetul BACĂU, România")),
];
?>