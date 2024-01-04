<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "arges.php";

			
echo json_encode($arges, JSON_PRETTY_PRINT);

?>
