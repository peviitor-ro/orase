<?php
$municipii =
	[
		createMunicipiu("CRAIOVA", [
				createAdresaCompleta("DOLJ"),
			createLoc("CRAIOVA", "oras", [
				createLoc("Cernele", "sat"),
				createLoc("Cernele de Sus", "sat"),
				createLoc("Izvorul Rece", "sat"),
				createLoc("Rovine", "sat"),
			]),
			createLoc("Făcăi", "sat"),
			createLoc("Mofleni", "sat"),
			createLoc("Popoveni", "sat"),
			createLoc("Șimnicu de Jos", "sat"),
		]),
		createMunicipiu("BĂILEȘTI", [
				createAdresaCompleta("DOLJ"),
			createLoc("BĂILEȘTI", "oras"),
			createLoc("Balasan", "sat"),
		]),
		createMunicipiu("CALAFAT", [
				createAdresaCompleta("DOLJ"),
			createLoc("CALAFAT", "oras", [
				createLoc("Basarabi", "sat"),
				createLoc("Ciupercenii Vechi", "sat"),
				createLoc("Golenți", "sat"),
			]),

		]),

	];
