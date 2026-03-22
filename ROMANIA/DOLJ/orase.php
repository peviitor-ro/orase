<?php
$orase=[
    createOras("BECHET", [
        createAdresaCompleta("orasul BECHET, judetul DOLJ, România", "orasul BECHET, judetul DOLJ, Romania"),
        createLoc("BECHET", "oras"),
    ]),	
    createOras("DĂBULENI", [
        createAdresaCompleta("orasul DĂBULENI, judetul DOLJ, România", "orasul DABULENI, judetul DOLJ, Romania"),
        createLoc("DĂBULENI", "oras", [
            createLoc("Chiașu", "sat", createAdresaCompleta("sat Chiașu, orasul DĂBULENI, judetul Dolj, România", "sat Chiasu, orasul DABULENI, judetul Dolj, Romania")),
        ]),
    ]),
    createOras("FILIAȘI", [
        createAdresaCompleta("orasul FILIAȘI, judetul DOLJ, România", "orasul FILIASI, judetul DOLJ, Romania"),
        createLoc("FILIAȘI", "oras", [
            createLoc("Almăjel", "sat", createAdresaCompleta("sat Almăjel, orasul FILIAȘI, judetul Dolj, România", "sat Almajel, orasul FILIASI, judetul Dolj, Romania")),
            createLoc("Bâlta", "sat", createAdresaCompleta("sat Bâlta, orasul FILIAȘI, judetul Dolj, România", "sat Balta, orasul FILIASI, judetul Dolj, Romania")),
            createLoc("Braniște", "sat", createAdresaCompleta("sat Braniște, orasul FILIAȘI, judetul Dolj, România", "sat Braniste, orasul FILIASI, judetul Dolj, Romania")),
            createLoc("Fratoștița", "sat", createAdresaCompleta("sat Fratoștița, orasul FILIAȘI, judetul Dolj, România", "sat Fratostita, orasul FILIASI, judetul Dolj, Romania")),
            createLoc("Răcarii de Sus", "sat", createAdresaCompleta("sat Răcarii de Sus, orasul FILIAȘI, judetul Dolj, România", "sat Racarii de Sus, orasul FILIASI, judetul Dolj, Romania")),
            createLoc("Uscăci", "sat", createAdresaCompleta("sat Uscăci, orasul FILIAȘI, judetul Dolj, România", "sat Uscaaci, orasul FILIASI, judetul Dolj, Romania")),
        ]),
    ]),
    createOras("ȘEGARCEA", [
        createAdresaCompleta("orasul ȘEGARCEA, judetul DOLJ, România", "orasul SEGARCEA, judetul DOLJ, Romania"),
        createLoc("ȘEGARCEA", "oras"),
    ]),			
];
?>
