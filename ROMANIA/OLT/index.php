<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "olt.php";

			
echo json_encode($olt, JSON_PRETTY_PRINT);

?>
