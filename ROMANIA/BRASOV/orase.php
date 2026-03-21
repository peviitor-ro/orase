<?php
$orase=[
            createOras("GHIMBAV",[
			    createAdresaCompleta("orasul GHIMBAV, judetul BRASOV, România", "orasul GHIMBAV, judetul BRASOV, Romania"),
			    createLoc("GHIMBAV", "oras"),
			]),						  
            createOras("PREDEAL",[
			    createAdresaCompleta("orasul PREDEAL, judetul BRASOV, România", "orasul PREDEAL, judetul BRASOV, Romania"),
			    createLoc("PREDEAL", "oras"),
				createLoc("Pârâul Rece", "sat", createAdresaCompleta("sat Pârâul Rece, orasul PREDEAL, judetul Brasov, România", "sat Paraul Rece, orasul PREDEAL, judetul Brasov, Romania")),
				createLoc("Timișu de Jos", "sat", createAdresaCompleta("sat Timișu de Jos, orasul PREDEAL, judetul Brasov, România", "sat Timisu de Jos, orasul PREDEAL, judetul Brasov, Romania")),
				createLoc("Timișu de Sus", "sat", createAdresaCompleta("sat Timișu de Sus, orasul PREDEAL, judetul Brasov, România", "sat Timisu de Sus, orasul PREDEAL, judetul Brasov, Romania")),
			]),		
            createOras("RÂȘNOV",[
			    createAdresaCompleta("orasul RÂȘNOV, judetul BRASOV, România", "orasul RASNOV, judetul BRASOV, Romania"),
			    createLoc("RÂȘNOV", "oras"),
			]),	
            createOras("RUPEA",[
			    createAdresaCompleta("orasul RUPEA, judetul BRASOV, România", "orasul RUPEA, judetul BRASOV, Romania"),
			    createLoc("RUPEA", "oras",[
					createLoc("Fișer", "sat", createAdresaCompleta("sat Fișer, orasul RUPEA, judetul Brasov, România", "sat Fiser, orasul RUPEA, judetul Brasov, Romania")),
				]),
			]),	
            createOras("VICTORIA",[
			    createAdresaCompleta("orasul VICTORIA, judetul BRASOV, România", "orasul VICTORIA, judetul BRASOV, Romania"),
			    createLoc("VICTORIA", "oras"),
			]),
            createOras("ZĂRNEȘTI",[
			    createAdresaCompleta("orasul ZĂRNEȘTI, judetul BRASOV, România", "orasul ZARNESTI, judetul BRASOV, Romania"),
			    createLoc("ZĂRNEȘTI", "oras",[
					createLoc("Tohanu Nou", "sat", createAdresaCompleta("sat Tohanu Nou, orasul ZĂRNEȘTI, judetul Brasov, România", "sat Tohanu Nou, orasul ZARNESTI, judetul Brasov, Romania")),
				]),
			]),							   
];
?>
