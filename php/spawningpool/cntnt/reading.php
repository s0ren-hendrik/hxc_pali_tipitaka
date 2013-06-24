<div id="bkct_left">
	<?php
	
	if(!isset($_GET['path']) or $_GET['path']=="home" or $_GET['path']=="summary" or $_GET['path']=="")
	{
		echo "<h3> ?? </h3>";
	}else
	{
		/*
		$path=$_GET['path'];
		$content = mysql_fetch_array(mysql_query("SELECT `content`, `title` FROM pc_content WHERE `parent` IN (SELECT id FROM pc_tree WHERE `title`='".addslashes(link2title($path))."'); "));
		$title = trim($content[1]);
		$content = trim($content[0]);
		
		function zo($matches)
		{
			$divid =  $matches[0]."_".substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 5, 5);
			return '<a class="palidef" onmouseover="use(\'onFly\', \''.$matches[0].'\', \'en_US\', \''.$divid.'\');" onmouseout="clearTimeout(window.t);">'.$matches[0].'<div class="def" id="'.$divid.'">Translating word ...</div></a>';
		}
		$tux = preg_replace_callback("/([a-zA-Z0-9aābcdḍeghiījklḷmṃŋnñṅṇoprstṭuūvy]+)/","zo",$content);
		
		?>
			<h2><?php echo $title ?></h2>
			<h3>&nbsp;</h3>
			<?php echo html_entity_decode($tux); ?>
		<?php
		*/
		$tux="";
		$dat = mysql_fetch_object(mysql_query("SELECT * FROM pc_content WHERE id='1' "));
		
		function zo($matches)
		{
			$divid =  $matches[0]."_".substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 5, 5);
			return '<a class="palidef" onmouseover="use(\'onFly\', \''.$matches[0].'\', \'en_US\', \''.$divid.'\');" onmouseout="clearTimeout(window.t);">'.$matches[0].'<div class="def" id="'.$divid.'">Translating word ...</div></a>';
		}
		$tux = preg_replace_callback("/([a-zA-Z0-9aābcdḍeghiījklḷmṃŋnñṅṇoprstṭuūvy]+)/","zo",$dat->content);

		
		?>
			<h2><?php echo $dat->title ?></h2>
			<h3>&nbsp;</h3>
			<?php echo nl2br($tux); ?>
		<?php
	}
	
	?>
	<div style="clear:both;">&nbsp;</div>
</div>

<div id="bkct_right">
	<?php
	$dat = mysql_fetch_object(mysql_query("SELECT * FROM pc_content WHERE id='2' "));
	?>
	<h2><?php echo $dat->title ?></h2>
	<h3><?php echo $dat->tr_title ?></h3>
	<?php echo nl2br($dat->content); ?>
	<hr>
	<p class="notes"><?php echo nl2br($dat->notes); ?></p>
	<div style="clear:both;">&nbsp;</div>
</div>

<div style="clear:both;">&nbsp;</div>
