<div id="sumleft">
	<?php
	if(!isset($_GET['path']) or $_GET['path']=="home" or $_GET['path']=="summary" or $_GET['path']=="")
	{
		$idPath=0;
	}else
	{
		$path=$_GET['path'];
		$idPath = mysql_fetch_array(mysql_query("SELECT id FROM pc_tree WHERE `title`='".addslashes($path)."'; "));
		$idPath = $idPath[0];
		
	}
		
		
	$itLvl = mysql_fetch_array(mysql_query("SELECT `lvl`,`parent`,`title` FROM pc_tree WHERE id='$idPath';"));
	$ul=0;
	echo '<h3><a href="javascript:void(0);" onclick="use(\'sum\',\'\' ,\''.$_GET['lang'].'\');">Tipitaka\'s collections</a></h3>' ;
	$grunk=array(); 
	if($itLvl[1]!="0")
	{
		$lastParent = $itLvl[1];
		for($i=0;$i<=$itLvl[0];$i++)
		{
			$curParent = mysql_fetch_array(mysql_query("SELECT `title`, `parent` FROM pc_tree WHERE id='$lastParent';"));
			$grunk[] = $curParent[0];
			$lastParent = $curParent[1];
		}
	}
	arsort($grunk);
	
	foreach($grunk as $val)
	{
		if($val!="")
		{
			echo '<ul><li> - <a href="javascript:void(0);" onclick="use(\'sum\',\''.$val.'\' ,\''.$_GET['lang'].'\');"> '.$val.'</a></li>' ;
			$ul++;
		}
	}
	
	echo '<ul><li><h3>'.$itLvl[2].'</h3></li>
	' ;
	$ul++;
	
	$vagga = false;
	// if vagga not on lef page but right page
	echo "
	<ul>";
	$lst = mysql_query("SELECT `title`,`url` FROM pc_tree WHERE `parent`='$idPath' ORDER BY id ASC");
	while($dat = mysql_fetch_object($lst))
	{
		if($dat->url=="")	// not vagga
		{
			echo '
			<li> -<a href="javascript:void(0);" onclick="use(\'sum\',\''.$dat->title.'\' ,\''.$_GET['lang'].'\');"> '.$dat->title.'</a></li>';
		}else
		{
			$vagga = true;
		}
	}
	echo "
	</ul>";
	
	
	for($i=0;$i<$ul;$i++)
	{
		echo "</ul>\n";
	}
	
	
	?>
	
</div>
<div id="sumright">
	<?php
		// if vagga not on left page but right page
		if($vagga)
		{
			echo '<h3>'.$itLvl[2].'</h3>
			' ;
			echo "
			<ul>";
			$lst = mysql_query("SELECT * FROM pc_tree WHERE `parent`='$idPath' ORDER BY id ASC");
			while($dat = mysql_fetch_object($lst))
			{
				echo '
				<li> -<a href="#!/'.$_GET['lang'].'/tipitaka'.getParentUrl($dat->id).'/'.title2link($dat->title).'"> '.$dat->title.'</a></li>';
			}
			echo "
			</ul>";
		}else
		{
			$notes = mysql_fetch_array(mysql_query("SELECT `note` FROM pc_tree_notes WHERE related_node='$idPath';"));
			echo $notes[0];
		}
	?>
</div>
