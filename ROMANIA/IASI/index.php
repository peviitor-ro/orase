<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "iasi.php";

			
echo json_encode($iasi, JSON_PRETTY_PRINT);

?>
