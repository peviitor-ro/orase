<?php
header("Access-Control-Allow-Origin: *");
require_once "../functions.php";
require_once "teleorman.php";

			
echo json_encode($teleorman, JSON_PRETTY_PRINT);

?>
