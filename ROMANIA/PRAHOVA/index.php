<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "prahova.php";

			
echo json_encode($prahova, JSON_PRETTY_PRINT);

?>
