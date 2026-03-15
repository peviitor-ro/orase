<?php
$municipii =
[
            createMunicipiu("TÂRGU MUREȘ", [
				createAdresaCompleta("MURES", "MURES"),
                    createLoc("TÂRGU MUREȘ", "oras"),
                    createLoc("Mureșeni", "sat"),
                    createLoc("Remetea", "sat"),
                ]),
            createMunicipiu("REGHIN", [
				createAdresaCompleta("MURES", "MURES"),
                    createLoc("REGHIN", "oras"),
                    createLoc("Apalina", "sat"),
                    createLoc("Iernuțeni", "sat"),
                ]),
            createMunicipiu("SIGHIȘOARA", [
				createAdresaCompleta("MURES", "MURES"),
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
				createAdresaCompleta("MURES", "MURES"),
                    createLoc("TÂRNĂVENI", "oras",[
							createLoc("Bobohalma", "sat"),
								]),
                    createLoc("Botorca", "sat"),
                    createLoc("Cuștelnic", "sat"),
                ]),				
			
];
?>