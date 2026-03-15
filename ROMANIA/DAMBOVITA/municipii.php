<?php
$municipii =
[
	 createMunicipiu("TÂRGOVIȘTE", [
		createLoc("TÂRGOVIȘTE", "oras", [
			createLoc("Priseaca", "sat", createAdresaCompleta("sat Priseaca, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
		], createAdresaCompleta("orasul TÂRGOVIȘTE, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
	], createAdresaCompleta("municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
	 createMunicipiu("MORENI", [
		createLoc("MORENI", "oras", createAdresaCompleta("orasul MORENI, municipiul MORENI, judetul DÂMBOVIȚA, România")),
	], createAdresaCompleta("municipiul MORENI, judetul DÂMBOVIȚA, România")),
			
];
?>
