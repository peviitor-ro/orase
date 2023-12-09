<?php
$municipii =
[
            createMunicipiu("TÂRGU MUREȘ", [
                    createLoc("TÂRGU MUREȘ", "oras"),
                    createLoc("Mureșeni", "sat"),
                    createLoc("Remetea", "sat"),
                ]),
            createMunicipiu("REGHIN", [
                    createLoc("REGHIN", "oras"),
                    createLoc("Apalina", "sat"),
                    createLoc("Iernuțeni", "sat"),
                ]),
            createMunicipiu("SIGHIȘOARA", [
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
                    createLoc("TÂRNĂVENI", "oras",[
							createLoc("Bobohalma", "sat"),
								]),
                    createLoc("Botorca", "sat"),
                    createLoc("Cuștelnic", "sat"),
                ]),				
			
];
?>