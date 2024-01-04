<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "vaslui.php";

			
echo json_encode($vaslui, JSON_PRETTY_PRINT);

?>
