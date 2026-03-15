<?php
$municipii =
[
            createMunicipiu("TÂRGU MUREȘ", [
				createAdresaCompleta("municipiul TÂRGU MUREȘ, judetul MURES, România", "municipiul TARGU MURES, judetul MURES, Romania"),
                    createLoc("TÂRGU MUREȘ", "oras"),
                    createLoc("Mureșeni", "sat"),
                    createLoc("Remetea", "sat"),
                ]),
            createMunicipiu("REGHIN", [
				createAdresaCompleta("municipiul TÂRGU MUREȘ, judetul MURES, România", "municipiul TARGU MURES, judetul MURES, Romania"),
                    createLoc("REGHIN", "oras"),
                    createLoc("Apalina", "sat"),
                    createLoc("Iernuțeni", "sat"),
                ]),
            createMunicipiu("SIGHIȘOARA", [
				createAdresaCompleta("municipiul TÂRGU MUREȘ, judetul MURES, România", "municipiul TARGU MURES, judetul MURES, Romania"),
                    createLoc("SIGHIȘOARA", "oras",[
							createLoc("Hetiur", "sat"),
					]),
                    createLoc("Angofa", "sat"),
                    createLoc("Aurel Vlaicu", "sat"),
					createLoc("Rora", "sat"),
					createLoc("Șoromiclea", "sat"),
					createLoc("Venchi", "sat"),
					createLoc("Viilor", "sat"),
                ]),
            createMunicipiu("TÂRNĂVENI", [
				createAdresaCompleta("municipiul TÂRGU MUREȘ, judetul MURES, România", "municipiul TARGU MURES, judetul MURES, Romania"),
                    createLoc("TÂRNĂVENI", "oras",[
							createLoc("Bobohalma", "sat"),
								]),
                    createLoc("Botorca", "sat"),
                    createLoc("Cuștelnic", "sat"),
                ]),				
			
];
?>