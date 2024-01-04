<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "mehedinti.php";

			
echo json_encode($mehedinti, JSON_PRETTY_PRINT);

?>
