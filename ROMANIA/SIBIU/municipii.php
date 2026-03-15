<?php
$municipii =
[
            createMunicipiu("SIBIU", [
				createAdresaCompleta("municipiul SIBIU, judetul SIBIU, România", "municipiul SIBIU, judetul SIBIU, Romania"),
                    createLoc("SIBIU", "oras"),
					createLoc("Păltiniș", "sat"),
                ]),
            createMunicipiu("MEDIAȘ", [
				createAdresaCompleta("municipiul SIBIU, judetul SIBIU, România", "municipiul SIBIU, judetul SIBIU, Romania"),
                    createLoc("MEDIAȘ", "oras",[
							createLoc("Ighișu Nou", "sat"),]),
					
                ]),				
			
];
?>