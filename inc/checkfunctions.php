<?php
	$LOSTFUNCTIONS = array();

	$f = 'curl_init';
	if(!function_exists('curl_init')) array_push($LOSTFUNCTIONS, $f);

	$PROCEED = (count($LOSTFUNCTIONS) <= 0);
?>

