<?php
$municipii =
[
            createMunicipiu("RÂMNICU VÂLCEA", [
				createAdresaCompleta("municipiul RÂMNICU VÂLCEA, judetul VALCEA, România", "municipiul RAMNICU VALCEA, judetul VALCEA, Romania"),
                    createLoc("RÂMNICU VÂLCEA", "oras",[
							createLoc("Goranu", "sat"),
							createLoc("Fețeni", "sat"),
							createLoc("Lespezi", "sat"),
							createLoc("Săliștea", "sat"),
					]),
					createLoc("Aranghel", "sat"),
					createLoc("Căzănești", "sat"),
					createLoc("Copăcelu", "sat"),
					createLoc("Dealu Malului", "sat"),
					createLoc("Poenari", "sat"),
					createLoc("Priba", "sat"),
					createLoc("Râureni", "sat"),
					createLoc("Stolniceni", "sat"),
					createLoc("Troian", "sat"),
                ]),		

            createMunicipiu("DRĂGĂȘANI", [
				createAdresaCompleta("municipiul RÂMNICU VÂLCEA, judetul VALCEA, România", "municipiul RAMNICU VALCEA, judetul VALCEA, Romania"),
                    createLoc("DRĂGĂȘANI", "oras"),
					createLoc("Valea Caselor", "sat"),
					createLoc("Zărneni", "sat"),
					createLoc("Zlătărei", "sat"),
                ]),				
			
];
?>