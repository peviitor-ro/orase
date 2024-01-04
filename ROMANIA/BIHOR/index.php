<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "bihor.php";

			
echo json_encode($bihor, JSON_PRETTY_PRINT);

?>
