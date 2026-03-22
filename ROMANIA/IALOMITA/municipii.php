<?php
$municipii =
[
    createMunicipiu("SLOBOZIA", [
        createAdresaCompleta("municipiul SLOBOZIA, judetul IALOMITA, România", "municipiul SLOBOZIA, judetul IALOMITA, Romania"),
        createLoc("SLOBOZIA", "oras"),
        createLoc("Bora", "sat", createAdresaCompleta("sat Bora, municipiul SLOBOZIA, judetul Ialomita, România", "sat Bora, municipiul SLOBOZIA, judetul Ialomita, Romania")),
        createLoc("Slobozia Nouă", "sat", createAdresaCompleta("sat Slobozia Nouă, municipiul SLOBOZIA, judetul Ialomita, România", "sat Slobozia Noua, municipiul SLOBOZIA, judetul Ialomita, Romania")),
    ]),	

    createMunicipiu("FETEȘTI", [
        createAdresaCompleta("municipiul FETEȘTI, judetul IALOMITA, România", "municipiul FETESTI, judetul IALOMITA, Romania"),
        createLoc("FETEȘTI", "oras"),
        createLoc("Buliga", "sat", createAdresaCompleta("sat Buliga, municipiul FETEȘTI, judetul Ialomita, România", "sat Buliga, municipiul FETESTI, judetul Ialomita, Romania")),
        createLoc("Fetești-Gară", "sat", createAdresaCompleta("sat Fetești-Gară, municipiul FETEȘTI, judetul Ialomita, România", "sat Fetesti-Gara, municipiul FETESTI, judetul Ialomita, Romania")),
        createLoc("Vlașca", "sat", createAdresaCompleta("sat Vlașca, municipiul FETEȘTI, judetul Ialomita, România", "sat Vlasca, municipiul FETESTI, judetul Ialomita, Romania")),
    ]),	

    createMunicipiu("URZICENI", [
        createAdresaCompleta("municipiul URZICENI, judetul IALOMITA, România", "municipiul URZICENI, judetul IALOMITA, Romania"),
        createLoc("URZICENI", "oras"),
    ]),					
    
];
?>
