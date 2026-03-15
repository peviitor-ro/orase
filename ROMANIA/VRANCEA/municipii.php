<?php
$municipii =
	[
		createMunicipiu("FOCȘANI", [
				createAdresaCompleta("municipiul FOCȘANI, judetul VRANCEA, România", "municipiul FOCSANI, judetul VRANCEA, Romania"),
			createLoc("FOCȘANI", "oras"),
			createLoc("Mândrești-Moldova", "sat"),
			createLoc("Mândrești-Munteni", "sat"),
		]),

		createMunicipiu("ADJUD", [
				createAdresaCompleta("municipiul FOCȘANI, judetul VRANCEA, România", "municipiul FOCSANI, judetul VRANCEA, Romania"),
			createLoc("ADJUD", "oras", [
				createLoc("Adjudu Vechi", "sat"),
				createLoc("Șișcani", "sat"),
			]),
			createLoc("Burcioaia", "sat"),
		]),

	];
