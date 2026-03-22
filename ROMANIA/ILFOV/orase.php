<?php
$orase = [
    createOras("BRAGADIRU", [
        createAdresaCompleta("orasul BRAGADIRU, judetul ILFOV, România", "orasul BRAGADIRU, judetul ILFOV, Romania"),
        createLoc("BRAGADIRU", "oras"),
    ]),

    createOras("BUFTEA", [
        createAdresaCompleta("orasul BUFTEA, judetul ILFOV, România", "orasul BUFTEA, judetul ILFOV, Romania"),
        createLoc("BUFTEA", "oras", [
            createLoc("Buciumeni", "sat", createAdresaCompleta("sat Buciumeni, orasul BUFTEA, judetul Ilfov, România", "sat Buciumeni, orasul BUFTEA, judetul Ilfov, Romania")),
        ]),
    ]),

    createOras("CHITILA", [
        createAdresaCompleta("orasul CHITILA, judetul ILFOV, România", "orasul CHITILA, judetul ILFOV, Romania"),
        createLoc("CHITILA", "oras", [
            createLoc("Rudeni", "sat", createAdresaCompleta("sat Rudeni, orasul CHITILA, judetul Ilfov, România", "sat Rudeni, orasul CHITILA, judetul Ilfov, Romania")),
        ]),
    ]),

    createOras("MĂGURELE", [
        createAdresaCompleta("orasul MĂGURELE, judetul ILFOV, România", "orasul MAGURELE, judetul ILFOV, Romania"),
        createLoc("MĂGURELE", "oras", [
            createLoc("Alunișu", "sat", createAdresaCompleta("sat Alunișu, orasul MĂGURELE, judetul Ilfov, România", "sat Alunisu, orasul MAGURELE, judetul Ilfov, Romania")),
            createLoc("Dumitrana", "sat", createAdresaCompleta("sat Dumitrana, orasul MĂGURELE, judetul Ilfov, România", "sat Dumitrana, orasul MAGURELE, judetul Ilfov, Romania")),
            createLoc("Pruni", "sat", createAdresaCompleta("sat Pruni, orasul MĂGURELE, judetul Ilfov, România", "sat Pruni, orasul MAGURELE, judetul Ilfov, Romania")),
            createLoc("Vârteju", "sat", createAdresaCompleta("sat Vârteju, orasul MĂGURELE, judetul Ilfov, România", "sat Varteju, orasul MAGURELE, judetul Ilfov, Romania")),
        ]),
    ]),

    createOras("OTOPENI", [
        createAdresaCompleta("orasul OTOPENI, judetul ILFOV, România", "orasul OTOPENI, judetul ILFOV, Romania"),
        createLoc("OTOPENI", "oras", [
            createLoc("Odăile", "sat", createAdresaCompleta("sat Odăile, orasul OTOPENI, judetul Ilfov, România", "sat Odaila, orasul OTOPENI, judetul Ilfov, Romania")),
        ]),
    ]),

    createOras("PANTELIMON", [
        createAdresaCompleta("orasul PANTELIMON, judetul ILFOV, România", "orasul PANTELIMON, judetul ILFOV, Romania"),
        createLoc("PANTELIMON", "oras"),
    ]),

    createOras("POPEȘTI-LEORDENI", [
        createAdresaCompleta("orasul POPEȘTI-LEORDENI, judetul ILFOV, România", "orasul POPESTI-LEORDENI, judetul ILFOV, Romania"),
        createLoc("POPEȘTI-LEORDENI", "oras"),
    ]),

    createOras("VOLUNTARI", [
        createAdresaCompleta("orasul VOLUNTARI, judetul ILFOV, România", "orasul VOLUNTARI, judetul ILFOV, Romania"),
        createLoc("VOLUNTARI", "oras"),
    ]),
];
?>
