<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "maramures.php";

			
echo json_encode($maramures, JSON_PRETTY_PRINT);

?>
