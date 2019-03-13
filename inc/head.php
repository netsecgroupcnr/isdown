<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="description" content="Distributed check if a publish web service is availabile/reachable">
	<link rel="shortcut icon" href="img/icon.png" type="image/png">
	<title>Is Your Website Down or Not?</title>
	<?php
		include('analytics.php');
	?>
	<style type="text/css">
		#workinprogress{width:50%;margin:0 auto;padding:1em;background-color:#ffffaa;color:#303000;border:1px solid #303030;margin-top:1em;}
		body{background-color:#fff;color:#333;font-family:Arial,Verdana,sans-serif;font-size:62.5%;margin:0% 5% 0 5%;text-align:center;}
		a,a:visited,a:active{color:#0080ff;text-decoration:underline;}
		a:hover{text-decoration:none;}
		input[type=text]{border:1px solid #ccc;color:#ccc;font-size:1em;padding:4px 6px 4px 6px;}
		.domain{font-weight:bold;}
		a.adlink{color: orange;}
		a.smalllink{text-decoration:none;}
		#container{clear:both;font-size:3em;margin:auto;margin-top:10%;}
		#url_input{width:250px;}
		#timeout_input{width:50px;text-align:center;}
		#coupon{font-size: 0.4em;}
		#us{margin:auto;margin-top:2em;font-size:1.0em;}
		#federatedresults{margin:1em;height:1em;}
		#federatedresults iframe{border:none;height:350px;}
	</style>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script type="text/javascript">
		function clearInput(e) {
			if (e.cleared) { return; }
			e.cleared = true;
			e.value = '';
			e.style.color = '#000';
		}
		function formSubmit() {
			url = document.getElementById('url_input').value;
			timeout = document.getElementById('timeout_input').value;
			window.location = './?u='+url+'&t='+timeout;
			return false;
		}
		function bindEnterEvent(e) {
			if (e.keyCode == 13) { // 13 = enter key
				formSubmit();
				return false; // ignore default event
			}
		}
	</script>
</head>
