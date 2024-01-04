<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "botosani.php";

			
echo json_encode($botosani, JSON_PRETTY_PRINT);

?>
