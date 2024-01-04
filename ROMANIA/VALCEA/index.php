<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "valcea.php";

			
echo json_encode($valcea, JSON_PRETTY_PRINT);

?>
