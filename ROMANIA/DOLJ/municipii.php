<?php
$municipii =
[
		createMunicipiu("CRAIOVA", [
                    createLoc("CRAIOVA", "oras",[
							createLoc("Cernele", "sat"),
							]),
					createLoc("Făcăi", "sat"),
					createLoc("Mofleni", "sat"),
					createLoc("Popoveni", "sat"),
					createLoc("Șimnicu de Jos", "sat"),
                ]),		
		createMunicipiu("BĂILEȘTI", [
                    createLoc("BĂILEȘTI", "oras"),
					createLoc("Balasan", "sat"),
                ]),	
		createMunicipiu("CALAFAT", [
                    createLoc("CALAFAT", "oras",[
							createLoc("Basarabi", "sat"),
							createLoc("Ciupercenii Vechi", "sat"),
							createLoc("Golenți", "sat"),
							]),
					
                ]),				
			
];
?>