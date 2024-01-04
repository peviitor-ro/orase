<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "carasseverin.php";

			
echo json_encode($carasseverin, JSON_PRETTY_PRINT);

?>
