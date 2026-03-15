<?php
$municipii =
[
            createMunicipiu("TIMIȘOARA", [
				createAdresaCompleta("municipiul TIMIȘOARA, judetul TIMIS, România", "municipiul TIMISOARA, judetul TIMIS, Romania"),
                    createLoc("TIMIȘOARA", "oras"),
                ]),
            createMunicipiu("LUGOJ", [
				createAdresaCompleta("municipiul TIMIȘOARA, judetul TIMIS, România", "municipiul TIMISOARA, judetul TIMIS, Romania"),
                    createLoc("LUGOJ", "oras",[
							createLoc("Măguri", "sat"),
							createLoc("Tapia", "sat"),
							]),
                ]),		
			
];
?>