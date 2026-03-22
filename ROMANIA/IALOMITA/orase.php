<?php
$orase = [
    createOras("AMARA", [
        createAdresaCompleta("orasul AMARA, judetul IALOMITA, România", "orasul AMARA, judetul IALOMITA, Romania"),
        createLoc("AMARA", "oras", [
            createLoc("Amara Nouă", "sat", createAdresaCompleta("sat Amara Nouă, orasul AMARA, judetul Ialomita, România", "sat Amara Noua, orasul AMARA, judetul Ialomita, Romania")),
        ]),
    ]),

    createOras("CĂZĂNEȘTI", [
        createAdresaCompleta("orasul CĂZĂNEȘTI, judetul IALOMITA, România", "orasul CAZANESTI, judetul IALOMITA, Romania"),
        createLoc("CĂZĂNEȘTI", "oras"),
    ]),

    createOras("FIERBINȚI-TÂRG", [
        createAdresaCompleta("orasul FIERBINȚI-TÂRG, judetul IALOMITA, România", "orasul FIERBINTI-TARG, judetul IALOMITA, Romania"),
        createLoc("FIERBINȚI-TÂRG", "oras", [
            createLoc("Fierbinții de Jos", "sat", createAdresaCompleta("sat Fierbinții de Jos, orasul FIERBINȚI-TÂRG, judetul Ialomita, România", "sat Fierbintii de Jos, orasul FIERBINTI-TARG, judetul Ialomita, Romania")),
            createLoc("Fierbinții de Sus", "sat", createAdresaCompleta("sat Fierbinții de Sus, orasul FIERBINȚI-TÂRG, judetul Ialomita, România", "sat Fierbintii de Sus, orasul FIERBINTI-TARG, judetul Ialomita, Romania")),
            createLoc("Grecii de Jos", "sat", createAdresaCompleta("sat Grecii de Jos, orasul FIERBINȚI-TÂRG, judetul Ialomita, România", "sat Grecii de Jos, orasul FIERBINTI-TARG, judetul Ialomita, Romania")),
        ]),
    ]),

    createOras("ȚĂNDĂREI", [
        createAdresaCompleta("orasul ȚĂNDĂREI, judetul IALOMITA, România", "orasul TANDAREI, judetul IALOMITA, Romania"),
        createLoc("ȚĂNDĂREI", "oras"),
    ]),
];
?>
