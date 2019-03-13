<?php
	include('inc/checkfunctions.php');

	if(!$PROCEED) {
		include('inc/result_err.php');
		exit();
	}

	if((isset($_GET['u'])) && (strlen($_GET['u'])>0))
		include('inc/result.php');
	else
		include('inc/input.php');
?>
