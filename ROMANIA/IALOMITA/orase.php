<?php
$orase = [
    createOras("AMARA", [
				createAdresaCompleta("IALOMITA"),
        createLoc("AMARA", "oras", [
            createLoc("Amara Nouă", "sat"),
        ]),
    ]),

    createOras("CĂZĂNEȘTI", [
				createAdresaCompleta("IALOMITA"),
        createLoc("CĂZĂNEȘTI", "oras"),
    ]),

    createOras("FIERBINȚI-TÂRG", [
				createAdresaCompleta("IALOMITA"),
        createLoc("FIERBINȚI-TÂRG", "oras", [
            createLoc("Fierbinții de Jos", "sat"),
            createLoc("Fierbinții de Sus", "sat"),
            createLoc("Grecii de Jos", "sat"),
        ]),
    ]),

    createOras("ȚĂNDĂREI", [
				createAdresaCompleta("IALOMITA"),
        createLoc("ȚĂNDĂREI", "oras"),
    ]),
];


?>
