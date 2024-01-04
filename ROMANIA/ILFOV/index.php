<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "ilfov.php";

			
echo json_encode($ilfov, JSON_PRETTY_PRINT);

?>
