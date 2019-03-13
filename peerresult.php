<?php
$timeout = 30;
$URL=$_GET['u'];
$WRONGURL=false;
if(!strpos($URL, "."))
	$WRONGURL=true;

if(isset($_GET['t']))
	$timeout = $_GET['t'];

if(!isset($_GET['p'])) {
	echo "null";
	exit();
}
$federatedurl=$_GET['p'];
$PORT=80;
if(!isset($_GET['pp'])) {
	$PORT=$_GET['pp'];
}

$DELEGATEURL="$federatedurl/?u=$URL&t=$timeout&f=json";
$res = file_get_contents($DELEGATEURL);
if(strlen($res) <= 0) {
	echo "null";
	exit();
}
echo "$res";
?>
