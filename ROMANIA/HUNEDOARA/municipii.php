<?php
$municipii =
	[
		createMunicipiu("DEVA", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("DEVA", "oras", [
				createLoc("Archia", "sat"),
				createLoc("Bârcea Mică", "sat"),
				createLoc("Cristur", "sat"),
			]),
			createLoc("Sântuhalm", "sat")
		]),
		createMunicipiu("BRAD", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("BRAD", "oras", [
				createLoc("Mesteacăn", "sat"),
				createLoc("Potingani", "sat"),
				createLoc("Ruda-Brad", "sat"),
				createLoc("Țărățel", "sat"),
				createLoc("Valea Bradului", "sat"),
			]),
		]),
		createMunicipiu("HUNEDOARA", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("HUNEDOARA", "oras", [
				createLoc("Boș", "sat"),
				createLoc("Groș", "sat"),
				createLoc("Hășdat", "sat"),
				createLoc("Peștișu Mare", "sat"),
			]),
			createLoc("Răcăștia", "sat")
		]),
		createMunicipiu("LUPENI", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("LUPENI", "oras"),

		]),
		createMunicipiu("ORĂȘTIE", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("ORĂȘTIE", "oras"),

		]),
		createMunicipiu("PETROȘANI", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("PETROȘANI", "oras"),
			createLoc("Dâlja Mare", "sat"),
			createLoc("Dâlja Mică", "sat"),
			createLoc("Peștera", "sat"),
			createLoc("Slătinioara", "sat"),

		]),
		createMunicipiu("VULCAN", [
				createAdresaCompleta("HUNEDOARA", "HUNEDOARA"),
			createLoc("VULCAN", "oras"),
			createLoc("Dealu Babii", "sat"),
			createLoc("Jiu-Paroșeni", "sat"),

		]),

	];
