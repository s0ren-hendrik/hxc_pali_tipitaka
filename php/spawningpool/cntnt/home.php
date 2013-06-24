<h2>Welcome to Online Pāḷi Tipiṭaka Website!</h2>

<h3>Browse the Tipiṭaka</h3>


<div id="summary">
	<?php
	include("php/spawningpool/cntnt/summary.php");
	?>
</div>





<?php
/*
$tux="";
$dat = mysql_fetch_object(mysql_query("SELECT * FROM pc_content WHERE id='1' "));

function zo($matches)
{
	$divid =  $matches[0]."_".substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 5, 5);
	return '<a class="palidef" onmouseover="use(\'onFly\', \''.$matches[0].'\', \'en_US\', \''.$divid.'\');" onmouseout="clearTimeout(window.t);">'.$matches[0].'<div class="def" id="'.$divid.'">Translating word ...</div></a>';
}
$tux = preg_replace_callback("/([a-zA-Z0-9aābcdḍeghiījklḷmṃŋnñṅṇoprstṭuūvy]+)/","zo",$dat->content);



?>

<div class="reading">
	<h2><?php echo $dat->title ?></h2>
	<h3>&nbsp;</h3>
	<?php echo nl2br($tux); ?>
</div>
<div class="reading2">
	<?php
	$dat = mysql_fetch_object(mysql_query("SELECT * FROM pc_content WHERE id='2' "));
	?>
	<h2><?php echo $dat->title ?></h2>
	<h3><?php echo $dat->tr_title ?></h3>
	<?php echo nl2br($dat->content); ?>
	<hr>
	<p class="notes"><?php echo nl2br($dat->notes); ?></p>
</div>
*/

?>
