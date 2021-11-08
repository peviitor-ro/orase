<?php
header("Access-Control-Allow-Origin: *");

$url = 'http://zimbor.go.ro/solr/romania/select?q.op=OR&q=*%3A*&omitHeader=true';
$response = new stdClass();
if(isset($_GET['localitate']))  {
	  $localitate = $_GET['localitate'];
	  $url .= "&fq=localitate%3A".$localitate; 
								}
	  
if(isset($_GET['judet'])) 		{
		$judet = $_GET['judet'];
		$url .= "&fq=judet%3A".urlencode($judet);

		$string = file_get_contents($url);
		$json = json_decode($string, true);
		
		$response -> id = $json["response"]["docs"][0]["id"];
		                    } else {
    $response -> error = "not enough info";

							}
echo json_encode($response);

?>