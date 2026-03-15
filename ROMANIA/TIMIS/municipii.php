<?php
$municipii =
[
            createMunicipiu("TIMIȘOARA", [
				createAdresaCompleta("TIMIS"),
                    createLoc("TIMIȘOARA", "oras"),
                ]),
            createMunicipiu("LUGOJ", [
				createAdresaCompleta("TIMIS"),
                    createLoc("LUGOJ", "oras",[
							createLoc("Măguri", "sat"),
							createLoc("Tapia", "sat"),
							]),
                ]),		
			
];
?>