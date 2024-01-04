<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "covasna.php";

			
echo json_encode($covasna, JSON_PRETTY_PRINT);

?>
