<?php
$municipii =
[
            createMunicipiu("SIBIU", [
				createAdresaCompleta("SIBIU"),
                    createLoc("SIBIU", "oras"),
					createLoc("Păltiniș", "sat"),
                ]),
            createMunicipiu("MEDIAȘ", [
				createAdresaCompleta("SIBIU"),
                    createLoc("MEDIAȘ", "oras",[
							createLoc("Ighișu Nou", "sat"),]),
					
                ]),				
			
];
?>