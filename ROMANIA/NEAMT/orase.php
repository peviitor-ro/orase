<?php
$orase = [
    createOras("BICAZ", [
				createAdresaCompleta("orasul BICAZ, judetul NEAMT, România", "orasul BICAZ, judetul NEAMT, Romania"),
        createLoc("BICAZ", "oras", [
            createLoc("Izvoru Alb", "sat"),
            createLoc("Potoci", "sat"),
            createLoc("Secu", "sat"),
        ]),
        createLoc("Capșa", "sat"),
        createLoc("Dodeni", "sat"),
        createLoc("Izvoru Muntelui", "sat"),
    ]),

    createOras("TÂRGU-NEAMȚ", [
				createAdresaCompleta("orasul BICAZ, judetul NEAMT, România", "orasul BICAZ, judetul NEAMT, Romania"),
        createLoc("TÂRGU-NEAMȚ", "oras"),
        createLoc("Blebea", "sat"),
        createLoc("Humulești", "sat"),
        createLoc("Humuleștii Noi", "sat"),

    ]),

    createOras("ROZNOV", [
				createAdresaCompleta("orasul BICAZ, judetul NEAMT, România", "orasul BICAZ, judetul NEAMT, Romania"),
        createLoc("ROZNOV", "oras", [
            createLoc("Chintinici", "sat"),
            createLoc("Slobozia", "sat"),
        ]),
    ]),
];
