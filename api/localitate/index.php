<?php
header("Access-Control-Allow-Origin: *");

$url = 'http://zimbor.go.ro/solr/romania/select?q.op=OR&q=*%3A*&omitHeader=true';

if(isset($_GET['localitate']))  {
	  $localitate = $_GET['localitate'];
	  $url .= "&fq=localitate%3A".$localitate; 
								}
	  
if(isset($_GET['judet'])) 		{
		$judet = $_GET['judet'];
		$url .= "&fq=judet%3A".$judet;
		}

	
$string = file_get_contents($url);
$json = json_encode($string, true);

echo $json["response"]["docs"][0]["id"];






?>