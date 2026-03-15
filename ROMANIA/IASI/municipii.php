<?php
$municipii =
[
		createMunicipiu("IAȘI", [
				createAdresaCompleta("IASI"),
                    createLoc("IAȘI", "oras"),
					
                ]),
		createMunicipiu("PAȘCANI", [
				createAdresaCompleta("IASI"),
                    createLoc("PAȘCANI", "oras"),
					createLoc("Blăgești", "sat"),
					createLoc("Boșteni", "sat"),
					createLoc("Gâștești", "sat"),
					createLoc("Lunca", "sat"),
					createLoc("Sodomeni", "sat"),
					
                ]),				
			
];
?>