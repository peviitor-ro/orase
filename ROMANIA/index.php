<?php
// test on https://onlinephp.io/
// based on https://legislatie.just.ro/Public/DetaliiDocument/189
// created by sebiboga && dianadascalu2




require_once "functions.php";

require_once "BUCURESTI/bucuresti.php";

require_once "ALBA/alba.php";
require_once "ARAD/arad.php";
require_once "ARGES/arges.php";
require_once "BACAU/bacau.php";
require_once "BIHOR/bihor.php";
require_once "BISTRITANASAUD/bistritanasaud.php";
require_once "BOTOSANI/botosani.php";
require_once "BRASOV/brasov.php";
require_once "BRAILA/braila.php";
require_once "BUZAU/buzau.php";
require_once "CARASSEVERIN/carasseverin.php";
require_once "CALARASI/calarasi.php";
require_once "CLUJ/cluj.php";
require_once "CONSTANTA/constanta.php";
require_once "COVASNA/covasna.php";
require_once "DAMBOVITA/dambovita.php";
require_once "DOLJ/dolj.php";
require_once "GALATI/galati.php";
require_once "GIURGIU/giurgiu.php";
require_once "GORJ/gorj.php";
require_once "HARGHITA/harghita.php";
require_once "HUNEDOARA/hunedoara.php";
require_once "IALOMITA/ialomita.php";

$judete = [$alba,$arad,$arges,$bacau,$bihor,$bistritanasaud,$botosani,$brasov,$braila,$buzau,$carasseverin,
			$calarasi,$cluj,$constanta,$covasna,$dambovita,$dolj,$galati,$giurgiu,$gorj,$harghita,$hunedoara,$ialomita];

// aici cream Romania
$tara = createTara(
    "LEGE nr. 2 din 16 februarie 1968",
    "https://legislatie.just.ro/Public/DetaliiDocument/189",
    "România",$judete,$bucuresti);
	
echo json_encode($tara, JSON_PRETTY_PRINT);
?>