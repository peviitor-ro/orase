<?php
$municipii = [
    createMunicipiu("DEVA", [
        createAdresaCompleta("municipiul DEVA, judetul HUNEDOARA, România", "municipiul DEVA, judetul HUNEDOARA, Romania"),
        createLoc("DEVA", "oras", [
            createLoc("Archia", "sat", createAdresaCompleta("sat ArchIA, municipiul DEVA, judetul Hunedoara, România", "sat ArchIA, municipiul DEVA, judetul Hunedoara, Romania")),
            createLoc("Bârcea Mică", "sat", createAdresaCompleta("sat Bârcea Mică, municipiul DEVA, judetul Hunedoara, România", "sat Barcea Mica, municipiul DEVA, judetul Hunedoara, Romania")),
            createLoc("Cristur", "sat", createAdresaCompleta("sat Cristur, municipiul DEVA, judetul Hunedoara, România", "sat Cristur, municipiul DEVA, judetul Hunedoara, Romania")),
        ]),
        createLoc("Sântuhalm", "sat", createAdresaCompleta("sat Sântuhalm, municipiul DEVA, judetul Hunedoara, România", "sat Santuhalm, municipiul DEVA, judetul Hunedoara, Romania")),
    ]),
    createMunicipiu("BRAD", [
        createAdresaCompleta("municipiul BRAD, judetul HUNEDOARA, România", "municipiul BRAD, judetul HUNEDOARA, Romania"),
        createLoc("BRAD", "oras", [
            createLoc("Mesteacăn", "sat", createAdresaCompleta("sat Mesteacăn, municipiul BRAD, judetul Hunedoara, România", "sat Mesteacan, municipiul BRAD, judetul Hunedoara, Romania")),
            createLoc("Potingani", "sat", createAdresaCompleta("sat Potingani, municipiul BRAD, judetul Hunedoara, România", "sat Potingani, municipiul BRAD, judetul Hunedoara, Romania")),
            createLoc("Ruda-Brad", "sat", createAdresaCompleta("sat Ruda-Brad, municipiul BRAD, judetul Hunedoara, România", "sat Ruda-Brad, municipiul BRAD, judetul Hunedoara, Romania")),
            createLoc("Țărățel", "sat", createAdresaCompleta("sat Țărățel, municipiul BRAD, judetul Hunedoara, România", "sat Taratel, municipiul BRAD, judetul Hunedoara, Romania")),
            createLoc("Valea Bradului", "sat", createAdresaCompleta("sat Valea Bradului, municipiul BRAD, judetul Hunedoara, România", "sat Valea Bradului, municipiul BRAD, judetul Hunedoara, Romania")),
        ]),
    ]),
    createMunicipiu("HUNEDOARA", [
        createAdresaCompleta("municipiul HUNEDOARA, judetul HUNEDOARA, România", "municipiul HUNEDOARA, judetul HUNEDOARA, Romania"),
        createLoc("HUNEDOARA", "oras", [
            createLoc("Boș", "sat", createAdresaCompleta("sat Boș, municipiul HUNEDOARA, judetul Hunedoara, România", "sat Bos, municipiul HUNEDOARA, judetul Hunedoara, Romania")),
            createLoc("Groș", "sat", createAdresaCompleta("sat Groș, municipiul HUNEDOARA, judetul Hunedoara, România", "sat Gros, municipiul HUNEDOARA, judetul Hunedoara, Romania")),
            createLoc("Hășdat", "sat", createAdresaCompleta("sat Hășdat, municipiul HUNEDOARA, judetul Hunedoara, România", "sat Hasdat, municipiul HUNEDOARA, judetul Hunedoara, Romania")),
            createLoc("Peștișu Mare", "sat", createAdresaCompleta("sat Peștișu Mare, municipiul HUNEDOARA, judetul Hunedoara, România", "sat Pestisu Mare, municipiul HUNEDOARA, judetul Hunedoara, Romania")),
        ]),
        createLoc("Răcăștia", "sat", createAdresaCompleta("sat Răcăștia, municipiul HUNEDOARA, judetul Hunedoara, România", "sat Racastia, municipiul HUNEDOARA, judetul Hunedoara, Romania")),
    ]),
    createMunicipiu("LUPENI", [
        createAdresaCompleta("municipiul LUPENI, judetul HUNEDOARA, România", "municipiul LUPENI, judetul HUNEDOARA, Romania"),
        createLoc("LUPENI", "oras"),
    ]),
    createMunicipiu("ORĂȘTIE", [
        createAdresaCompleta("municipiul ORĂȘTIE, judetul HUNEDOARA, România", "municipiul ORASTIE, judetul HUNEDOARA, Romania"),
        createLoc("ORĂȘTIE", "oras"),
    ]),
    createMunicipiu("PETROȘANI", [
        createAdresaCompleta("municipiul PETROȘANI, judetul HUNEDOARA, România", "municipiul PETROSANI, judetul HUNEDOARA, Romania"),
        createLoc("PETROȘANI", "oras"),
        createLoc("Dâlja Mare", "sat", createAdresaCompleta("sat Dâlja Mare, municipiul PETROȘANI, judetul Hunedoara, România", "sat Dalja Mare, municipiul PETROSANI, judetul Hunedoara, Romania")),
        createLoc("Dâlja Mică", "sat", createAdresaCompleta("sat Dâlja Mică, municipiul PETROȘANI, judetul Hunedoara, România", "sat Dalja Mica, municipiul PETROSANI, judetul Hunedoara, Romania")),
        createLoc("Peștera", "sat", createAdresaCompleta("sat Peștera, municipiul PETROȘANI, judetul Hunedoara, România", "sat Pestera, municipiul PETROSANI, judetul Hunedoara, Romania")),
        createLoc("Slătinioara", "sat", createAdresaCompleta("sat Slătinioara, municipiul PETROȘANI, judetul Hunedoara, România", "sat Slatinioara, municipiul PETROSANI, judetul Hunedoara, Romania")),
    ]),
    createMunicipiu("VULCAN", [
        createAdresaCompleta("municipiul VULCAN, judetul HUNEDOARA, România", "municipiul VULCAN, judetul HUNEDOARA, Romania"),
        createLoc("VULCAN", "oras"),
        createLoc("Dealu Babii", "sat", createAdresaCompleta("sat Dealu Babii, municipiul VULCAN, judetul Hunedoara, România", "sat Dealu Babii, municipiul VULCAN, judetul Hunedoara, Romania")),
        createLoc("Jiu-Paroșeni", "sat", createAdresaCompleta("sat Jiu-Paroșeni, municipiul VULCAN, judetul Hunedoara, România", "sat Jiu-Paroseni, municipiul VULCAN, judetul Hunedoara, Romania")),
    ]),
];
?>
