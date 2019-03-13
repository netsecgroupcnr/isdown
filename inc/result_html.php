<html>
<?php
	include('head.php');
?>
<body style="">
	<!--
	<div id="workinprogress">Work in progress</div>
	-->
	<div id="container">
		<?
		$CHECKAGAINSTRING="Want to check another site?";
		if($WRONGURL):
			$CHECKAGAINSTRING="Want to try again?";
		?>
		What? <?=$URL?> doesn't look like a public site.
		<?
		elseif($ISUP):
		?>
		This site rocks! <a href="<?=$URL?>" class="domain"><?=$URL?></a> is up from here.
		<?
		else:
		?>
		That's not availability! <a href="<?=$URL?>" class="domain"><?=$URL?></a> looks down from here.
		<?
		endif;
		?>
		<p><a href="./"><?=$CHECKAGAINSTRING?></a></p>
	</div>
	<div id="federatedresults"></div>
	<div id="resulttypes">
		<?php
			$baseformaturl=$_SERVER['REQUEST_URI'];
		?>
		View this result in <a class="smalllink" href="<?=$baseformaturl?>&f=xml" target="_new">XML</a> or <a class="smalllink" href="<?=$baseformaturl?>&f=json" target="_new">JSON</a>.
	</div>
	<div id="federatedresults">
		<iframe id="map" src="map.php?u=<?=$URL?>&t=<?=$timeout?>" style="width:100%;"></iframe>
		<?php
			include('cnr.php');
		?>
	</div>
</body>
</head>
