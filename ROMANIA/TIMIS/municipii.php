<?php
$municipii =
[
            createMunicipiu("TIMIȘOARA", [
				createAdresaCompleta("TIMIS", "TIMIS"),
                    createLoc("TIMIȘOARA", "oras"),
                ]),
            createMunicipiu("LUGOJ", [
				createAdresaCompleta("TIMIS", "TIMIS"),
                    createLoc("LUGOJ", "oras",[
							createLoc("Măguri", "sat"),
							createLoc("Tapia", "sat"),
							]),
                ]),		
			
];
?>