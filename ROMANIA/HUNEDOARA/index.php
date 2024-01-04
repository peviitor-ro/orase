<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "hunedoara.php";

			
echo json_encode($hunedoara, JSON_PRETTY_PRINT);

?>
