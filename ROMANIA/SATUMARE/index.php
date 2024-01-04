<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "satumare.php";

			
echo json_encode($satumare, JSON_PRETTY_PRINT);

?>
