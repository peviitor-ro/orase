<?php
 header("Access-Control-Allow-Origin: *");
 
$url = 'http://zimbor.go.ro/solr/localhub/select?q=*%3A*&q.op=OR&omitHeader=true';

if(isset($_GET['id']))  {
	  $localitate = $_GET['id'];
	  $url .= '&fq=location_id:'.urlencode($localitate); 
	  $string = file_get_contents($url);
      echo $string;
     
	                    } else {
	   $response = new stdClass();
       $response -> error = "not enough info";
	   echo json_encode($response);

	 
							}


?>