<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "gorj.php";

			
echo json_encode($gorj, JSON_PRETTY_PRINT);

?>
