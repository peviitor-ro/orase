<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "galati.php";

			
echo json_encode($galati, JSON_PRETTY_PRINT);

?>
