<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "suceava.php";

			
echo json_encode($suceava, JSON_PRETTY_PRINT);

?>
