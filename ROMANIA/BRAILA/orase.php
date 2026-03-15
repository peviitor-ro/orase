<?php
$orase=[
            createOras("FĂUREI",[
			    createAdresaCompleta("orasul FĂUREI, judetul BRAILA, România", "orasul FAUREI, judetul BRAILA, Romania"),
			    createLoc("FĂUREI", "oras",),
				]),
            createOras("IANCA",[
			    createAdresaCompleta("orasul FĂUREI, judetul BRAILA, România", "orasul FAUREI, judetul BRAILA, Romania"),
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
			    createAdresaCompleta("orasul FĂUREI, judetul BRAILA, România", "orasul FAUREI, judetul BRAILA, Romania"),
			    createLoc("ÎNSURĂȚEI", "oras",[
						createLoc("Lacu Rezii", "sat"),
						createLoc("Măru Roșu", "sat"),
						createLoc("Valea Călmățuiului", "sat"),
				  ]),				  
			]),
];

?>