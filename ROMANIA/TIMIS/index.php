<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "timis.php";

			
echo json_encode($timis, JSON_PRETTY_PRINT);

?>
