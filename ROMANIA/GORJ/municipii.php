<?php
$municipii =
[
    createMunicipiu("TÂRGU JIU", [
        createAdresaCompleta("municipiul TÂRGU JIU, judetul GORJ, România", "municipiul TARGU JIU, judetul GORJ, Romania"),
        createLoc("TÂRGU JIU", "oras"),
        createLoc("Bârsești", "sat", createAdresaCompleta("sat Bârsesti, municipiul TÂRGU JIU, judetul Gorj, România", "sat Barsesti, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Drăgoeni", "sat", createAdresaCompleta("sat Drăgoeni, municipiul TÂRGU JIU, judetul Gorj, România", "sat Dragoeni, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Iezureni", "sat", createAdresaCompleta("sat Iezureni, municipiul TÂRGU JIU, judetul Gorj, România", "sat Iezureni, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Polata", "sat", createAdresaCompleta("sat Polata, municipiul TÂRGU JIU, judetul Gorj, România", "sat Polata, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Preajba Mare", "sat", createAdresaCompleta("sat Preajba Mare, municipiul TÂRGU JIU, judetul Gorj, România", "sat Preajba Mare, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Romanești", "sat", createAdresaCompleta("sat Romanești, municipiul TÂRGU JIU, judetul Gorj, România", "sat Romanesti, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Slobozia", "sat", createAdresaCompleta("sat Slobozia, municipiul TÂRGU JIU, judetul Gorj, România", "sat Slobozia, municipiul TARGU JIU, judetul Gorj, Romania")),
        createLoc("Ursați", "sat", createAdresaCompleta("sat Ursati, municipiul TÂRGU JIU, judetul Gorj, România", "sat Ursati, municipiul TARGU JIU, judetul Gorj, Romania")),
    ]),
    createMunicipiu("MOTRU", [
        createAdresaCompleta("municipiul MOTRU, judetul GORJ, România", "municipiul MOTRU, judetul GORJ, Romania"),
        createLoc("MOTRU", "oras", [
            createLoc("Lupoița", "sat", createAdresaCompleta("sat Lupoița, municipiul MOTRU, judetul Gorj, România", "sat Lupoita, municipiul MOTRU, judetul Gorj, Romania")),
            createLoc("Râpa", "sat", createAdresaCompleta("sat Râpa, municipiul MOTRU, judetul Gorj, România", "sat Rapa, municipiul MOTRU, judetul Gorj, Romania")),
            createLoc("Roșiuța", "sat", createAdresaCompleta("sat Roșiuța, municipiul MOTRU, judetul Gorj, România", "sat Rosiuta, municipiul MOTRU, judetul Gorj, Romania")),
        ]),
        createLoc("Dealu Pomilor", "sat", createAdresaCompleta("sat Dealu Pomilor, municipiul MOTRU, judetul Gorj, România", "sat Dealu Pomilor, municipiul MOTRU, judetul Gorj, Romania")),
        createLoc("Horăști", "sat", createAdresaCompleta("sat Horăști, municipiul MOTRU, judetul Gorj, România", "sat Horasti, municipiul MOTRU, judetul Gorj, Romania")),
        createLoc("Însurăței ", "sat", createAdresaCompleta("sat Însurăței, municipiul MOTRU, judetul Gorj, România", "sat Insuratei, municipiul MOTRU, judetul Gorj, Romania")),
        createLoc("Leurda", "sat", createAdresaCompleta("sat Leurda, municipiul MOTRU, judetul Gorj, România", "sat Leurda, municipiul MOTRU, judetul Gorj, Romania")),
        createLoc("Ploștina", "sat", createAdresaCompleta("sat Ploștina, municipiul MOTRU, judetul Gorj, România", "sat Plostina, municipiul MOTRU, judetul Gorj, Romania")),
    ]),
];
?>
