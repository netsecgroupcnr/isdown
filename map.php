<html>
<head>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<?php
	include("inc/head.php");

	$timeout = 30;
	$URL=$_GET['u'];
	if(!strpos($URL, "//"))
		$URL="http://$URL";
	$WRONGURL=false;
	if(!strpos($URL, "."))
		$WRONGURL=true;

	if(isset($_GET['t']))
		$timeout = $_GET['t'];
?>
</head>
<body style="margin:0;">
<div id="map-canvas" style="width:100%;height:100%;"></div>
<script>
var map;
function initialize() {
  var myLatlng = new google.maps.LatLng(40,22);
  var mapOptions = {
    zoom: 2,
    center: myLatlng
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

function showMarker(dns, dnsip, lat, lon, checkurl, checkip, responsetime, iconcolor) {
	var myLatlng = new google.maps.LatLng(lat, lon);
	var icon = 'http://maps.google.com/intl/en_us/mapfiles/ms/micons/'+iconcolor+'.png';
	var content = '<div style="height:220px;width:310px;"<p><b>Result from<br/><a href="'+dns+'" target="_new">'+dns+'</a><br/>('+dnsip+')</b></p><p>Check on<br/><a href="'+checkurl+'" target="_new">'+checkurl+'</a><br/>DNS Resolved to '+checkip+'</p><p>Server responded after<br/>'+responsetime+'<br/>seconds</p><p>Service status: '+(iconcolor=='green' ? 'up' : 'down')+'</p></div>';
	var infowindow = new google.maps.InfoWindow({
		content: content
	});
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: dns,
		icon: icon
	});
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
}

function checkPeerResult(id, dns, dbip, lat, lon, urltocheck, timeout, data) {
	data = JSON.parse(data);
	var checkurl = urltocheck;
	var checkip = 'Unknown';
	var responsetime = 'Unknown';
	var icon = 'black';
	if(data!=null) {
		checkurl = data.url;
		checkip = data.ip;
		responsetime = data.responsetime;
		if(data.result=='up') icon = 'green';
		else icon = 'red';
	}
	showMarker(dns, dbip, lat, lon, checkurl, checkip, responsetime, icon);
}

google.maps.event.addDomListener(window, 'load', initialize);
<?php
	include_once('inc/peers.php');
	foreach($PEERS as $P) {
		$fullurl = $P->protocol.'://'.$P->dns.(($P->port != 80 && $P->port != 443) ? ':'.$P->port : '').$P->path;
?>
		$.ajax({
			url: "peerresult.php?u=<?=$URL?>&t=<?=$timeout?>&p=<?=$fullurl?>&pp=<?=$P->port?>",
		}).done(function(data) {
			checkPeerResult(<?=$P->id?>, '<?=$fullurl?>', '<?=$P->ip?>', <?=$P->lat?>, <?=$P->lon?>, '<?=$URL?>', <?=$timeout?>, data);
		});
<?php
	}
?>
</script>

