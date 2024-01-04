<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "sibiu.php";

			
echo json_encode($sibiu, JSON_PRETTY_PRINT);

?>
