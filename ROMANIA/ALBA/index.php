<?php
header("Access-Control-Allow-Origin: *");

require_once "../functions.php";
require_once "alba.php";

			
echo json_encode($alba, JSON_PRETTY_PRINT);

?>
