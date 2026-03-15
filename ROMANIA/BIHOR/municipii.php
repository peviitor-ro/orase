<?php
$municipii =
[
		createMunicipiu("ORADEA", [
                    createLoc("ORADEA", "oras", createAdresaCompleta("municipiul ORADEA, judetul BIHOR, România", "municipiul ORADEA, judetul BIHOR, Romania")),
                ], createAdresaCompleta("municipiul ORADEA, judetul BIHOR, România", "municipiul ORADEA, judetul BIHOR, Romania")),	
		createMunicipiu("BEIUȘ", [
                    createLoc("BEIUȘ", "oras", createAdresaCompleta("municipiul BEIUȘ, judetul BIHOR, România", "municipiul BEIUS, judetul BIHOR, Romania")),
                    createLoc("Delani", "sat", createAdresaCompleta("sat Delani, municipiul BEIUȘ, judetul BIHOR, România", "sat Delani, municipiul BEIUS, judetul BIHOR, Romania")),
                ], createAdresaCompleta("municipiul BEIUȘ, judetul BIHOR, România", "municipiul BEIUS, judetul BIHOR, Romania")),	
		createMunicipiu("MARGHITA", [
                    createLoc("MARGHITA", "oras", createAdresaCompleta("municipiul MARGHITA, judetul BIHOR, România", "municipiul MARGHITA, judetul BIHOR, Romania")),
                    createLoc("Cheț", "sat", createAdresaCompleta("sat Cheț, municipiul MARGHITA, judetul BIHOR, România", "sat Chet, municipiul MARGHITA, judetul BIHOR, Romania")),
					createLoc("Ghenetea", "sat", createAdresaCompleta("sat Ghenetea, municipiul MARGHITA, judetul BIHOR, România", "sat Ghenetea, municipiul MARGHITA, judetul BIHOR, Romania")),
                ], createAdresaCompleta("municipiul MARGHITA, judetul BIHOR, România", "municipiul MARGHITA, judetul BIHOR, Romania")),	
		createMunicipiu("SALONTA", [
                    createLoc("SALONTA", "oras", createAdresaCompleta("municipiul SALONTA, judetul BIHOR, România", "municipiul SALONTA, judetul BIHOR, Romania")),
                ], createAdresaCompleta("municipiul SALONTA, judetul BIHOR, România", "municipiul SALONTA, judetul BIHOR, Romania")),
			
];
?>