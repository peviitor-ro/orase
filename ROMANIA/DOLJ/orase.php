<?php
$orase=[

			createOras("BECHET", [
				createAdresaCompleta("DOLJ"),
			    createLoc("BECHET", "oras"),
			                     ]),
	
			createOras("DĂBULENI", [
				createAdresaCompleta("DOLJ"),
			    createLoc("DĂBULENI", "oras",[
					createLoc("Chiașu", "sat"),
							]),
			                     ]),
			createOras("FILIAȘI", [
				createAdresaCompleta("DOLJ"),
			    createLoc("FILIAȘI", "oras",[
					createLoc("Almăjel", "sat"),
				        createLoc("Bâlta", "sat"),
				      	createLoc("Braniște", "sat"),
				      	createLoc("Fratoștița", "sat"),
				      	createLoc("Răcarii de Sus", "sat"),
				      	createLoc("Uscăci", "sat"),
							]),
			                     ]),
			createOras("ȘEGARCEA", [
				createAdresaCompleta("DOLJ"),
			    createLoc("ȘEGARCEA", "oras"),
			                     ]),
			
];

?>
