<?php
$municipii =
[
            createMunicipiu("SUCEAVA", [
				createAdresaCompleta("SUCEAVA", "SUCEAVA"),
                    createLoc("SUCEAVA", "oras"),
                ]),
            createMunicipiu("CÂMPULUNG MOLDOVENESC", [
				createAdresaCompleta("SUCEAVA", "SUCEAVA"),
                    createLoc("CÂMPULUNG MOLDOVENESC", "oras"),
													]),
            createMunicipiu("FĂLTICENI", [
				createAdresaCompleta("SUCEAVA", "SUCEAVA"),
                    createLoc("FĂLTICENI", "oras"),
					createLoc("Șoldănești", "sat"),
					createLoc("Țarna Mare", "sat"),
                ]),
            createMunicipiu("RĂDĂUȚI", [
				createAdresaCompleta("SUCEAVA", "SUCEAVA"),
                    createLoc("RĂDĂUȚI", "oras"),
					]),
            createMunicipiu("VATRA DORNEI", [
				createAdresaCompleta("SUCEAVA", "SUCEAVA"),
                    createLoc("VATRA DORNEI", "oras"),
					createLoc("Argestru", "sat"),
					createLoc("Roșu", "sat"),
					createLoc("Todireni", "sat"),
                ]),
];
?>