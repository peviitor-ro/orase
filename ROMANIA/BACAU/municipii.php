<?php
$municipii =
[
                createMunicipiu("BACĂU", [
                    createLoc("BACĂU", "oras", createAdresaCompleta("municipiul BACĂU, judetul BACĂU, România", "municipiul BACAU, judetul BACAU, Romania")),
                ], createAdresaCompleta("municipiul BACĂU, judetul BACĂU, România", "municipiul BACAU, judetul BACAU, Romania")),
                createMunicipiu("MOINEȘTI", [
                    createLoc("MOINEȘTI", "oras", createAdresaCompleta("municipiul MOINEȘTI, judetul BACĂU, România", "municipiul MOINESTI, judetul BACAU, Romania")),
                    createLoc("Găzărie ", "sat", createAdresaCompleta("sat Găzărie, municipiul MOINEȘTI, judetul BACĂU, România", "sat Gazarie, municipiul MOINESTI, judetul BACAU, Romania")),
                ], createAdresaCompleta("municipiul MOINEȘTI, judetul BACĂU, România", "municipiul MOINESTI, judetul BACAU, Romania")),
                createMunicipiu("ONEȘTI", [
                    createLoc("ONEȘTI", "oras", createAdresaCompleta("municipiul ONEȘTI, judetul BACĂU, România", "municipiul ONESTI, judetul BACAU, Romania")),
                    createLoc("Borzești", "sat", createAdresaCompleta("sat Borzești, municipiul ONEȘTI, judetul BACĂU, România", "sat Borzesti, municipiul ONESTI, judetul BACAU, Romania")),
                    createLoc("Slobozia", "sat", createAdresaCompleta("sat Slobozia, municipiul ONEȘTI, judetul BACĂU, România", "sat Slobozia, municipiul ONESTI, judetul BACAU, Romania")),
                ], createAdresaCompleta("municipiul ONEȘTI, judetul BACĂU, România", "municipiul ONESTI, judetul BACAU, Romania")),
];
?>