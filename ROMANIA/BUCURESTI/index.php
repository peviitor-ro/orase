<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "bucuresti.php";

			
echo json_encode($bucuresti, JSON_PRETTY_PRINT);

?>
