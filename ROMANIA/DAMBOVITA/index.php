<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "dambovita.php";

			
echo json_encode($dambovita, JSON_PRETTY_PRINT);

?>
