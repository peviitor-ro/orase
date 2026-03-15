<?php
$municipii =
[
            createMunicipiu("SUCEAVA", [
				createAdresaCompleta("SUCEAVA"),
                    createLoc("SUCEAVA", "oras"),
                ]),
            createMunicipiu("CÂMPULUNG MOLDOVENESC", [
				createAdresaCompleta("SUCEAVA"),
                    createLoc("CÂMPULUNG MOLDOVENESC", "oras"),
													]),
            createMunicipiu("FĂLTICENI", [
				createAdresaCompleta("SUCEAVA"),
                    createLoc("FĂLTICENI", "oras"),
					createLoc("Șoldănești", "sat"),
					createLoc("Țarna Mare", "sat"),
                ]),
            createMunicipiu("RĂDĂUȚI", [
				createAdresaCompleta("SUCEAVA"),
                    createLoc("RĂDĂUȚI", "oras"),
					]),
            createMunicipiu("VATRA DORNEI", [
				createAdresaCompleta("SUCEAVA"),
                    createLoc("VATRA DORNEI", "oras"),
					createLoc("Argestru", "sat"),
					createLoc("Roșu", "sat"),
					createLoc("Todireni", "sat"),
                ]),
];
?>