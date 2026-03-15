<?php
$orase=[
            createOras("FĂUREI",[
			    createAdresaCompleta("BRAILA", "BRAILA"),
			    createLoc("FĂUREI", "oras",),
				]),
            createOras("IANCA",[
			    createAdresaCompleta("BRAILA", "BRAILA"),
			    createLoc("IANCA", "oras",[
						createLoc("Berlești", "sat"),
						createLoc("Gara Ianca", "sat"),
						createLoc("Oprișenești", "sat"),
						createLoc("Perișoru", "sat"),
						createLoc("Plopu", "sat"),
						createLoc("Târlele Filiu", "sat"),
										]),
				  ]),

            createOras("ÎNSURĂȚEI",[
			    createAdresaCompleta("BRAILA", "BRAILA"),
			    createLoc("ÎNSURĂȚEI", "oras",[
						createLoc("Lacu Rezii", "sat"),
						createLoc("Măru Roșu", "sat"),
						createLoc("Valea Călmățuiului", "sat"),
				  ]),				  
			]),
];

?>