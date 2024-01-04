<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "bistritanasaud.php";

			
echo json_encode($bistritanasaud, JSON_PRETTY_PRINT);

?>
