<?php
$municipii =
[
            createMunicipiu("SUCEAVA", [
				createAdresaCompleta("municipiul SUCEAVA, judetul SUCEAVA, România", "municipiul SUCEAVA, judetul SUCEAVA, Romania"),
                    createLoc("SUCEAVA", "oras"),
                ]),
            createMunicipiu("CÂMPULUNG MOLDOVENESC", [
				createAdresaCompleta("municipiul SUCEAVA, judetul SUCEAVA, România", "municipiul SUCEAVA, judetul SUCEAVA, Romania"),
                    createLoc("CÂMPULUNG MOLDOVENESC", "oras"),
													]),
            createMunicipiu("FĂLTICENI", [
				createAdresaCompleta("municipiul SUCEAVA, judetul SUCEAVA, România", "municipiul SUCEAVA, judetul SUCEAVA, Romania"),
                    createLoc("FĂLTICENI", "oras"),
					createLoc("Șoldănești", "sat"),
					createLoc("Țarna Mare", "sat"),
                ]),
            createMunicipiu("RĂDĂUȚI", [
				createAdresaCompleta("municipiul SUCEAVA, judetul SUCEAVA, România", "municipiul SUCEAVA, judetul SUCEAVA, Romania"),
                    createLoc("RĂDĂUȚI", "oras"),
					]),
            createMunicipiu("VATRA DORNEI", [
				createAdresaCompleta("municipiul SUCEAVA, judetul SUCEAVA, România", "municipiul SUCEAVA, judetul SUCEAVA, Romania"),
                    createLoc("VATRA DORNEI", "oras"),
					createLoc("Argestru", "sat"),
					createLoc("Roșu", "sat"),
					createLoc("Todireni", "sat"),
                ]),
];
?>