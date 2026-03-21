<?php
$orase=[
            createOras("FĂUREI",[
			    createAdresaCompleta("orasul FĂUREI, judetul BRAILA, România", "orasul FAUREI, judetul BRAILA, Romania"),
			    createLoc("FĂUREI", "oras"),
			]),
            createOras("IANCA",[
			    createAdresaCompleta("orasul IANCA, judetul BRAILA, România", "orasul IANCA, judetul BRAILA, Romania"),
			    createLoc("IANCA", "oras",[
						createLoc("Berlești", "sat", createAdresaCompleta("sat Berlești, orasul IANCA, judetul Brăila, România", "sat Bertesti, orasul IANCA, judetul Braila, Romania")),
						createLoc("Gara Ianca", "sat", createAdresaCompleta("sat Gara Ianca, orasul IANCA, judetul Brăila, România", "sat Gara Ianca, orasul IANCA, judetul Braila, Romania")),
						createLoc("Oprișenești", "sat", createAdresaCompleta("sat Oprișenești, orasul IANCA, judetul Brăila, România", "sat Oprisenesti, orasul IANCA, judetul Braila, Romania")),
						createLoc("Perișoru", "sat", createAdresaCompleta("sat Perișoru, orasul IANCA, judetul Brăila, România", "sat Perisoru, orasul IANCA, judetul Braila, Romania")),
						createLoc("Plopu", "sat", createAdresaCompleta("sat Plopu, orasul IANCA, judetul Brăila, România", "sat Plopu, orasul IANCA, judetul Braila, Romania")),
						createLoc("Târlele Filiu", "sat", createAdresaCompleta("sat Târlele Filiu, orasul IANCA, judetul Brăila, România", "sat Tarlele Filiu, orasul IANCA, judetul Braila, Romania")),
				]),
			]),

            createOras("ÎNSURĂȚEI",[
			    createAdresaCompleta("orasul ÎNSURĂȚEI, judetul BRAILA, România", "orasul INSURATEI, judetul BRAILA, Romania"),
			    createLoc("ÎNSURĂȚEI", "oras",[
						createLoc("Lacu Rezii", "sat", createAdresaCompleta("sat Lacu Rezii, orasul ÎNSURĂȚEI, judetul Brăila, România", "sat Lacu Rezii, orasul INSURATEI, judetul Braila, Romania")),
						createLoc("Măru Roșu", "sat", createAdresaCompleta("sat Măru Roșu, orasul ÎNSURĂȚEI, judetul Brăila, România", "sat Maru Rosu, orasul INSURATEI, judetul Braila, Romania")),
						createLoc("Valea Călmățuiului", "sat", createAdresaCompleta("sat Valea Călmățuiului, orasul ÎNSURĂȚEI, judetul Brăila, România", "sat Valea Calmatuiului, orasul INSURATEI, judetul Braila, Romania")),
				]),
			]),
];
?>
