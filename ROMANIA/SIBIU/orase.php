<?php
$orase = [
    createOras("AGNITA", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("AGNITA", "oras"),
        createLoc("Coveș", "sat"),
        createLoc("Ruja", "sat"),
    ]),

    createOras("AVRIG", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("AVRIG", "oras", [
            createLoc("Bradu", "sat"),
            createLoc("Glâmboaca", "sat"),
            createLoc("Mârșa", "sat"),
            createLoc("Săcădate", "sat"),
        ]),
    ]),

    createOras("CISNĂDIE", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("CISNĂDIE", "oras"),
        createLoc("Cisnădioara", "sat"),
    ]),

    createOras("COPȘA MICĂ", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("COPȘA MICĂ", "oras"),
    ]),

    createOras("DUMBRĂVENI", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("DUMBRĂVENI", "oras"),
        createLoc("Ernea", "sat"),
        createLoc("Șaroș pe Târnave", "sat"),
    ]),

    createOras("MIERCUREA SIBIULUI", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("MIERCUREA SIBIULUI", "oras", [
            createLoc("Apoldu de Sus", "sat"),
            createLoc("Dobârca", "sat"),
        ]),
    ]),

    createOras("OCNA SIBIULUI", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("OCNA SIBIULUI", "oras", [
            createLoc("Topârcea", "sat"),
        ]),
    ]),

    createOras("SĂLIȘTE", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("SĂLIȘTE", "oras", [
            createLoc("Aciliu", "sat"),
            createLoc("Amnaș", "sat"),
            createLoc("Crinț", "sat"),
            createLoc("Fântânele", "sat"),
            createLoc("Galeș", "sat"),
            createLoc("Mag", "sat"),
            createLoc("Săcel", "sat"),
            createLoc("Sibiel", "sat"),
            createLoc("Vale", "sat"),
        ]),
    ]),

    createOras("TĂLMACIU", [
				createAdresaCompleta("SIBIU", "SIBIU"),
        createLoc("TĂLMACIU", "oras", [
            createLoc("Colonia Tălmaciu", "sat"),
            createLoc("Tălmăcel", "sat"),
        ]),
    ]),
];
