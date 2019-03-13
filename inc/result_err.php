<html>
<?php
	include('head.php');

	function getuninstalledfunctions() {
		global $LOSTFUNCTIONS;
		$res = '';
		foreach($LOSTFUNCTIONS as $f) {
			if($res!='') $res .= ', ';
			$res .= $f;
		}
		return $res;
	}
?>
<body style="">
	<h1>Error: Please install and check <?=getuninstalledfunctions();?> functions</h1>
</body>
</head>
