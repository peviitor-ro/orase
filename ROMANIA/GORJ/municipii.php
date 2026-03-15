<?php
$municipii =
[
		createMunicipiu("TÂRGU JIU", [
				createAdresaCompleta("GORJ"),
                    createLoc("TÂRGU JIU", "oras"),
					createLoc("Bârsești", "sat"),
					createLoc("Drăgoeni", "sat"),
					createLoc("Iezureni", "sat"),
					createLoc("Polata", "sat"),
					createLoc("Preajba Mare", "sat"),
					createLoc("Romanești", "sat"),
					createLoc("Slobozia", "sat"),
					createLoc("Ursați", "sat"),
					
                ]),
		createMunicipiu("MOTRU", [
				createAdresaCompleta("GORJ"),
                    createLoc("MOTRU", "oras",[
							createLoc("Lupoița", "sat"),
							createLoc("Râpa", "sat"),
							createLoc("Roșiuța", "sat"),
							]),
					createLoc("Dealu Pomilor", "sat"),
					createLoc("Horăști", "sat"),
					createLoc("Însurăței ", "sat"),
					createLoc("Leurda", "sat"),
					createLoc("Ploștina", "sat"),
                ]),				
			
];
?>
