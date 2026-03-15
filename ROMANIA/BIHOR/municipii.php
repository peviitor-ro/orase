<?php
$municipii =
[
		createMunicipiu("ORADEA", [
                    createLoc("ORADEA", "oras", createAdresaCompleta("municipiul ORADEA, judetul BIHOR, România")),
                ], createAdresaCompleta("municipiul ORADEA, judetul BIHOR, România")),	
		createMunicipiu("BEIUȘ", [
                    createLoc("BEIUȘ", "oras", createAdresaCompleta("municipiul BEIUȘ, judetul BIHOR, România")),
                    createLoc("Delani", "sat", createAdresaCompleta("sat Delani, municipiul BEIUȘ, judetul BIHOR, România")),
                ], createAdresaCompleta("municipiul BEIUȘ, judetul BIHOR, România")),	
		createMunicipiu("MARGHITA", [
                    createLoc("MARGHITA", "oras", createAdresaCompleta("municipiul MARGHITA, judetul BIHOR, România")),
                    createLoc("Cheț", "sat", createAdresaCompleta("sat Cheț, municipiul MARGHITA, judetul BIHOR, România")),
					createLoc("Ghenetea", "sat", createAdresaCompleta("sat Ghenetea, municipiul MARGHITA, judetul BIHOR, România")),
                ], createAdresaCompleta("municipiul MARGHITA, judetul BIHOR, România")),	
		createMunicipiu("SALONTA", [
                    createLoc("SALONTA", "oras", createAdresaCompleta("municipiul SALONTA, judetul BIHOR, România")),
                ], createAdresaCompleta("municipiul SALONTA, judetul BIHOR, România")),
			
];
?>