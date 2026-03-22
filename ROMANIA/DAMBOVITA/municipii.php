<?php
$municipii =
[
	 createMunicipiu("TÂRGOVIȘTE", [
		createLoc("TÂRGOVIȘTE", "oras", [
			createLoc("Priseaca", "sat", createAdresaCompleta("sat Priseaca, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România", "sat Priseaca, municipiul TARGOVISTE, judetul DAMBOVITA, Romania")),
		], createAdresaCompleta("orasul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România", "orasul TARGOVISTE, judetul DAMBOVITA, Romania")),
	], createAdresaCompleta("municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România", "municipiul TARGOVISTE, judetul DAMBOVITA, Romania")),
	 createMunicipiu("MORENI", [
		createLoc("MORENI", "oras", createAdresaCompleta("orasul MORENI, judetul DÂMBOVIȚA, România", "orasul MORENI, judetul DAMBOVITA, Romania")),
	], createAdresaCompleta("municipiul MORENI, judetul DÂMBOVIȚA, România", "municipiul MORENI, judetul DAMBOVITA, Romania")),
			
];
?>
