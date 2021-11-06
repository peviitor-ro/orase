<?php
header("Access-Control-Allow-Origin: *");

$url = 'http://zimbor.go.ro/solr/romania/select?q.op=OR&q=*%3A*&omitHeader=true';

if(isset($_GET['nume']))  {
	  $localitate = $_GET['nume'];
	  $url .= "&fq=localitate%3A".$localitate; 
	  $string = file_get_contents($url);
      echo $string;

	                    } else {
	   $response = new stdClass();
       $response -> error = "not enough info";
	   echo json_encode($response);
							}


?>