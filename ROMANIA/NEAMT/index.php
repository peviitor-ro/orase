<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "neamt.php";

			
echo json_encode($neamt, JSON_PRETTY_PRINT);

?>
