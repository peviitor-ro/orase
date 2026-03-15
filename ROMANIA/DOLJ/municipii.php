<?php
$municipii =
	[
		createMunicipiu("CRAIOVA", [
				createAdresaCompleta("municipiul CRAIOVA, judetul DOLJ, România", "municipiul CRAIOVA, judetul DOLJ, Romania"),
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
				createAdresaCompleta("municipiul CRAIOVA, judetul DOLJ, România", "municipiul CRAIOVA, judetul DOLJ, Romania"),
			createLoc("BĂILEȘTI", "oras"),
			createLoc("Balasan", "sat"),
		]),
		createMunicipiu("CALAFAT", [
				createAdresaCompleta("municipiul CRAIOVA, judetul DOLJ, România", "municipiul CRAIOVA, judetul DOLJ, Romania"),
			createLoc("CALAFAT", "oras", [
				createLoc("Basarabi", "sat"),
				createLoc("Ciupercenii Vechi", "sat"),
				createLoc("Golenți", "sat"),
			]),

		]),

	];
