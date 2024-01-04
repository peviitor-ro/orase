<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "constanta.php";

			
echo json_encode($constanta, JSON_PRETTY_PRINT);

?>
