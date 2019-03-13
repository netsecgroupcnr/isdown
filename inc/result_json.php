<?php
	$RES='down';
	if($WRONGURL)
		$RES='error';
	elseif($ISUP)
		$RES='up';
?>
{"url":"<?=$URL?>","ip": "<?=$IP?>","timeout":<?=$timeout?>,"result":"<?=$RES?>","responsetime":<?=$RESPONSETIME?>}
