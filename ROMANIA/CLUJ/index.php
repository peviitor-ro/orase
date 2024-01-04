<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "cluj.php";

			
echo json_encode($cluj, JSON_PRETTY_PRINT);

?>
