<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "dolj.php";

			
echo json_encode($dolj, JSON_PRETTY_PRINT);

?>
