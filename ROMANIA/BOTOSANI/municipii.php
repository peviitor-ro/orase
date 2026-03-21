<?php
$municipii =
[
		createMunicipiu("BOTOȘANI", [
                    createAdresaCompleta("municipiul BOTOȘANI, judetul BOTOSANI, România", "municipiul BOTOSANI, judetul BOTOSANI, Romania"),
                    createLoc("BOTOȘANI", "oras", createAdresaCompleta("orasul BOTOȘANI, municipiul BOTOȘANI, judetul BOTOSANI, România", "orasul BOTOSANI, municipiul BOTOSANI, judetul BOTOSANI, Romania")),
                ]),	
		createMunicipiu("DOROHOI", [
                    createAdresaCompleta("municipiul DOROHOI, judetul BOTOSANI, România", "municipiul DOROHOI, judetul BOTOSANI, Romania"),
                    createLoc("DOROHOI", "oras", createAdresaCompleta("orasul DOROHOI, municipiul DOROHOI, judetul BOTOSANI, România", "orasul DOROHOI, municipiul DOROHOI, judetul BOTOSANI, Romania")),
                    createLoc("Dealu Mare", "sat", createAdresaCompleta("sat Dealu Mare, municipiul DOROHOI, judetul BOTOSANI, România", "sat Dealu Mare, municipiul DOROHOI, judetul BOTOSANI, Romania")),
					createLoc("Loturi Enescu", "sat", createAdresaCompleta("sat Loturi Enescu, municipiul DOROHOI, judetul BOTOSANI, România", "sat Loturi Enescu, municipiul DOROHOI, judetul BOTOSANI, Romania")),
                    createLoc("Progresul", "sat", createAdresaCompleta("sat Progresul, municipiul DOROHOI, judetul BOTOSANI, România", "sat Progresul, municipiul DOROHOI, judetul BOTOSANI, Romania")),
                ]),					
			
];
?>
