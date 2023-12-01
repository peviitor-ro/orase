<?php
require_once "functions.php";
$alba ='';
createJudet(
            "ALBA",[
                createMunicipiu("ALBA IULIA", [
                    createLoc("ALBA IULIA", "oras"),
                    createLoc("Bărăbanț", "sat"),
                    createLoc("Micești", "sat"),
                    createLoc("Oarda", "sat"),
                    createLoc("Pâclișa", "sat"),
                ]),
                createMunicipiu("AIUD",[
				    createLoc("AIUD", "oras",[
					   createLoc("Ciumbrud", "sat"),
					   createLoc("Gârbova de Jos", "sat"),
					   createLoc("Gârbova de Sus", "sat"),
					   createLoc("Gârbovița", "sat"),
					   createLoc("Sâncrai", "sat"),
					   createLoc("Țifra", "sat"),
					                         ]),
					createLoc("Aiudul de Sus", "sat"),
					createLoc("Gâmbaș", "sat"),
					createLoc("Măgina", "sat"),
					createLoc("Păgida", "sat"),
				]),
                createMunicipiu("BLAJ",[
					createLoc("BLAJ", "oras",[
					       createLoc("Mănărade", "sat"),
					       createLoc("Spătac", "sat"),	   
					                             ]),
					createLoc("Deleni-Obârșie", "sat"),
					createLoc("Flitești", "sat"),
					createLoc("Izvoarele", "sat"),
					createLoc("Petrisat", "sat"),
					createLoc("Tiur", "sat"),
					createLoc("Veza", "sat"),
				          ]),
                createMunicipiu("SEBEȘ",[
				    createLoc("SEBEȘ", "oras",[
					      createLoc("Răhău", "sat"),
					    ]),
					createLoc("Lancrăm", "sat"),
					createLoc("Petrești", "sat"),
				]),
				
            ],
            );
			
echo json_encode($alba, JSON_PRETTY_PRINT);

?>