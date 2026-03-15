<?php
$municipii =
[
            createMunicipiu("PIATRA-NEAMȚ", [
				createAdresaCompleta("NEAMT"),
                    createLoc("PIATRA-NEAMȚ", "oras"),
                    createLoc("Ciritei", "sat"),
                    createLoc("Doamna", "sat"),
					createLoc("Văleni", "sat"),
                ]),
            createMunicipiu("ROMAN", [
				createAdresaCompleta("NEAMT"),
                    createLoc("ROMAN", "oras"),
                ]),				
			
];
?>