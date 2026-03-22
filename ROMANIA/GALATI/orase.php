<?php
$orase=[
    createOras("BEREȘTI", [
        createAdresaCompleta("orasul BEREȘTI, judetul GALATI, România", "orasul BERESTI, judetul GALATI, Romania"),
        createLoc("BEREȘTI", "oras"),
    ]),
    createOras("TÂRGU BUJOR", [
        createAdresaCompleta("orasul TÂRGU BUJOR, judetul GALATI, România", "orasul TARGU BUJOR, judetul GALATI, Romania"),
        createLoc("TÂRGU BUJOR", "oras", [
            createLoc("Moscu", "sat", createAdresaCompleta("sat Moscu, orasul TÂRGU BUJOR, judetul Galati, România", "sat Moscu, orasul TARGU BUJOR, judetul Galati, Romania")),
            createLoc("Umbrărești", "sat", createAdresaCompleta("sat Umbrărești, orasul TÂRGU BUJOR, judetul Galati, România", "sat Umbraresti, orasul TARGU BUJOR, judetul Galati, Romania")),
        ]),
    ]),			
];
?>
