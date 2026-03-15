<?php
$orase = [
    createOras("BICAZ", [
				createAdresaCompleta("NEAMT"),
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
				createAdresaCompleta("NEAMT"),
        createLoc("TÂRGU-NEAMȚ", "oras"),
        createLoc("Blebea", "sat"),
        createLoc("Humulești", "sat"),
        createLoc("Humuleștii Noi", "sat"),

    ]),

    createOras("ROZNOV", [
				createAdresaCompleta("NEAMT"),
        createLoc("ROZNOV", "oras", [
            createLoc("Chintinici", "sat"),
            createLoc("Slobozia", "sat"),
        ]),
    ]),
];
