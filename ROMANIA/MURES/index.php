<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "mures.php";

			
echo json_encode($mures, JSON_PRETTY_PRINT);

?>
