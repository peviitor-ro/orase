<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "ialomita.php";

			
echo json_encode($ialomita, JSON_PRETTY_PRINT);

?>
