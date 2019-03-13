<html>
<?php
	include('head.php');
?>
<body onkeypress="bindEnterEvent(window.event);">
	<!--
	<div id="workinprogress">Work in progress</div>
	-->
	<div id="container">
		<form method="get" id="downform" name="downform" action="./" onsubmit="return formSubmit()">
		Is
		<input type="text" name="u" id="url_input" value="google.com" onclick="clearInput(this);" onkeypress="bindEnterEvent(window.event);" tabindex=1>
		down
		<a href="" onclick="formSubmit();" tabindex=3>or not?</a>
		<br/>
		<p style="font-size:0.7em;">
		Timeout: <input type="text" name="t" id="timeout_input" value="30" onclick="clearInput(this);" onfocus="clearInput(this);" onkeypress="bindEnterEvent(window.event);" tabindex=2> seconds
		</p>
		<input type="submit" style="display: none;" tabindex=4>
		</form>

		<div class="ad-container" style="display:none;">
			Web Hosting built for designers &amp; developers -&gt; <a href="http://gk.site5.com/t/635">Special Offer</a>
		</div>
	</div>
	<?php
		include('cnr.php');
	?>
</body>
</html>
