<?php
$municipii =
[
            createMunicipiu("SIBIU", [
				createAdresaCompleta("SIBIU", "SIBIU"),
                    createLoc("SIBIU", "oras"),
					createLoc("Păltiniș", "sat"),
                ]),
            createMunicipiu("MEDIAȘ", [
				createAdresaCompleta("SIBIU", "SIBIU"),
                    createLoc("MEDIAȘ", "oras",[
							createLoc("Ighișu Nou", "sat"),]),
					
                ]),				
			
];
?>