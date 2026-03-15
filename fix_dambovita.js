const fs = require('fs');

function fixNestedCreateLoc(filename) {
    let content = fs.readFileSync(filename, 'utf8');
    
    // Fix the TÂRGOVIȘTE entry - make Priseaca nested inside
    const oldStr = `createMunicipiu("TÂRGOVIȘTE", [
		createLoc("TÂRGOVIȘTE", "oras", createAdresaCompleta("orasul TÂRGOVIȘTE, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
		createLoc("Priseaca", "sat", createAdresaCompleta("sat Priseaca, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
	], createAdresaCompleta("municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),`;
    
    const newStr = `createMunicipiu("TÂRGOVIȘTE", [
		createLoc("TÂRGOVIȘTE", "oras", [
			createLoc("Priseaca", "sat", createAdresaCompleta("sat Priseaca, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
		], createAdresaCompleta("orasul TÂRGOVIȘTE, municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),
	], createAdresaCompleta("municipiul TÂRGOVIȘTE, judetul DÂMBOVIȚA, România")),`;
    
    content = content.replace(oldStr, newStr);
    fs.writeFileSync(filename, content);
    console.log(`Fixed ${filename}`);
}

fixNestedCreateLoc('C:/sebi/opencode_ai/orase/ROMANIA/DAMBOVITA/municipii.php');
