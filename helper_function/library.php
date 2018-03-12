<?php

function echoJsonResult($data, $success){
	$api_product =  array();
	$api_product['results'] = $data;
	$api_product['success'] = $success;	

	Header('Content-Type: application/json');
	echo json_encode($api_product);
}

?>