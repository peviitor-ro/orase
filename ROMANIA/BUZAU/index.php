<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "buzau.php";

			
echo json_encode($buzau, JSON_PRETTY_PRINT);

?>
