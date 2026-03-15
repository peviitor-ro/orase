<?php
$orase = [
    createOras("AMARA", [
				createAdresaCompleta("IALOMITA", "IALOMITA"),
        createLoc("AMARA", "oras", [
            createLoc("Amara Nouă", "sat"),
        ]),
    ]),

    createOras("CĂZĂNEȘTI", [
				createAdresaCompleta("IALOMITA", "IALOMITA"),
        createLoc("CĂZĂNEȘTI", "oras"),
    ]),

    createOras("FIERBINȚI-TÂRG", [
				createAdresaCompleta("IALOMITA", "IALOMITA"),
        createLoc("FIERBINȚI-TÂRG", "oras", [
            createLoc("Fierbinții de Jos", "sat"),
            createLoc("Fierbinții de Sus", "sat"),
            createLoc("Grecii de Jos", "sat"),
        ]),
    ]),

    createOras("ȚĂNDĂREI", [
				createAdresaCompleta("IALOMITA", "IALOMITA"),
        createLoc("ȚĂNDĂREI", "oras"),
    ]),
];


?>
