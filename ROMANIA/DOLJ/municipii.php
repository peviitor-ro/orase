<?php
$municipii =
[
    createMunicipiu("CRAIOVA", [
        createAdresaCompleta("municipiul CRAIOVA, judetul DOLJ, România", "municipiul CRAIOVA, judetul DOLJ, Romania"),
        createLoc("CRAIOVA", "oras", [
            createLoc("Cernele", "sat", createAdresaCompleta("sat Cernele, municipiul CRAIOVA, judetul Dolj, România", "sat Cernele, municipiul CRAIOVA, judetul Dolj, Romania")),
            createLoc("Cernele de Sus", "sat", createAdresaCompleta("sat Cernele de Sus, municipiul CRAIOVA, judetul Dolj, România", "sat Cernele de Sus, municipiul CRAIOVA, judetul Dolj, Romania")),
            createLoc("Izvorul Rece", "sat", createAdresaCompleta("sat Izvorul Rece, municipiul CRAIOVA, judetul Dolj, România", "sat Izvorul Rece, municipiul CRAIOVA, judetul Dolj, Romania")),
            createLoc("Rovine", "sat", createAdresaCompleta("sat Rovine, municipiul CRAIOVA, judetul Dolj, România", "sat Rovine, municipiul CRAIOVA, judetul Dolj, Romania")),
        ]),
        createLoc("Făcăi", "sat", createAdresaCompleta("sat Făcăi, municipiul CRAIOVA, judetul Dolj, România", "sat Facai, municipiul CRAIOVA, judetul Dolj, Romania")),
        createLoc("Mofleni", "sat", createAdresaCompleta("sat Mofleni, municipiul CRAIOVA, judetul Dolj, România", "sat Mofleni, municipiul CRAIOVA, judetul Dolj, Romania")),
        createLoc("Popoveni", "sat", createAdresaCompleta("sat Popoveni, municipiul CRAIOVA, judetul Dolj, România", "sat Popoveni, municipiul CRAIOVA, judetul Dolj, Romania")),
        createLoc("Șimnicu de Jos", "sat", createAdresaCompleta("sat Șimnicu de Jos, municipiul CRAIOVA, judetul Dolj, România", "sat Simnicu de Jos, municipiul CRAIOVA, judetul Dolj, Romania")),
    ]),
    createMunicipiu("BĂILEȘTI", [
        createAdresaCompleta("municipiul BĂILEȘTI, judetul DOLJ, România", "municipiul BAILESTI, judetul DOLJ, Romania"),
        createLoc("BĂILEȘTI", "oras"),
        createLoc("Balasan", "sat", createAdresaCompleta("sat Balasan, municipiul BĂILEȘTI, judetul Dolj, România", "sat Balasan, municipiul BAILESTI, judetul Dolj, Romania")),
    ]),
    createMunicipiu("CALAFAT", [
        createAdresaCompleta("municipiul CALAFAT, judetul DOLJ, România", "municipiul CALAFAT, judetul DOLJ, Romania"),
        createLoc("CALAFAT", "oras", [
            createLoc("Basarabi", "sat", createAdresaCompleta("sat Basarabi, municipiul CALAFAT, judetul Dolj, România", "sat Basarabi, municipiul CALAFAT, judetul Dolj, Romania")),
            createLoc("Ciupercenii Vechi", "sat", createAdresaCompleta("sat Ciupercenii Vechi, municipiul CALAFAT, judetul Dolj, România", "sat Ciupercenii Vechi, municipiul CALAFAT, judetul Dolj, Romania")),
            createLoc("Golenți", "sat", createAdresaCompleta("sat Golenți, municipiul CALAFAT, judetul Dolj, România", "sat Golenti, municipiul CALAFAT, judetul Dolj, Romania")),
        ]),
    ]),
];
?>
