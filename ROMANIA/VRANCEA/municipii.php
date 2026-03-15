<?php
$municipii =
	[
		createMunicipiu("FOCȘANI", [
				createAdresaCompleta("VRANCEA", "VRANCEA"),
			createLoc("FOCȘANI", "oras"),
			createLoc("Mândrești-Moldova", "sat"),
			createLoc("Mândrești-Munteni", "sat"),
		]),

		createMunicipiu("ADJUD", [
				createAdresaCompleta("VRANCEA", "VRANCEA"),
			createLoc("ADJUD", "oras", [
				createLoc("Adjudu Vechi", "sat"),
				createLoc("Șișcani", "sat"),
			]),
			createLoc("Burcioaia", "sat"),
		]),

	];
