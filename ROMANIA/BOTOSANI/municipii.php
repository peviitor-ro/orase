<?php
$municipii =
[
		createMunicipiu("BOTOȘANI", [
                    createAdresaCompleta("BOTOSANI"),
                    createLoc("BOTOȘANI", "oras"),
                ]),	
		createMunicipiu("DOROHOI", [
                    createAdresaCompleta("BOTOSANI"),
                    createLoc("DOROHOI", "oras"),
                    createLoc("Dealu Mare", "sat"),
					createLoc("Loturi Enescu", "sat"),
                    createLoc("Progresul", "sat"),
                ]),					
			
];
?>