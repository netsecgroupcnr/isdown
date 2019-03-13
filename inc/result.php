<?php
function isup($url, $timeout) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
	curl_setopt($ch, CURLOPT_HEADER, true);
	//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'HEAD');
	//curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
	curl_setopt($ch, CURLOPT_NOBODY, true);
	$before = microtime(true);
	$data = curl_exec($ch);
	$after = microtime(true);
	curl_close($ch);
	$ISUP = 0;
	if(strlen($data)>0) $ISUP = 1;
	//$RESULT = (strlen($data)>0)
	if(($after-$before) > $timeout) $ISUP = 0;
	$RESULT = array( 'isup' => $ISUP, 'responsetime' => ($after-$before) );
	return $RESULT;
}

$timeout = 30;
$URL=$_GET['u'];
if(!strpos($URL, "//"))
	$URL="http://$URL";
$WRONGURL=false;
if(!strpos($URL, "."))
	$WRONGURL=true;

if(isset($_GET['t'])) // && $_GET['t'] != undefined)
	$timeout = $_GET['t'];

$IP = $URL;
$IP = str_replace('http://', '', $IP);
$IP = str_replace('https://', '', $IP);
$IP = gethostbyname($IP);

$ISUPRESULT = isup($URL, $timeout);

$RESPONSETIME = $ISUPRESULT['responsetime'];

$ISUP = true;
if(!$ISUPRESULT['isup']) {
	$ISUP = false;
	//$RESPONSETIME = 0;
}
if($RESPONSETIME>$timeout) {
	$ISUP = false;
}

$FORMAT='html';
if(isset($_GET['f'])) $FORMAT=$_GET['f'];
if($FORMAT=='xml')
	include_once('result_xml.php');
elseif($FORMAT=='json')
	include_once('result_json.php');
else
	include_once('result_html.php');
?>
