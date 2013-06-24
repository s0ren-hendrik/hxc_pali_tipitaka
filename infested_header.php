<?php

$inf = $_GET['_escaped_fragment_'];

$loadThisPage = explode("/", $inf);
// Google fout-il le premier slash dans son escaped fragment ou pas ??
if($loadThisPage[0] == 'fr')
{
	$ltp = $loadThisPage[1];
}elseif($loadThisPage[1] == 'fr')
{
	$ltp = $loadThisPage[2];
}

if(eregi('home', $inf))
{
	echo '<title>'.MAIN_TITLE.'</title>
	<meta name="description" content="'.MAIN_DESC.'" />';
}elseif(eregi('actus', $inf))
{
	$newsId = $loadThisPage[3];
	
	$rst = mysql_query("SELECT COUNT(id) FROM actus WHERE lnk='$newsId';");
	$nb = mysql_num_rows($rst);
	if($nb==1)
	{
		$ntitle = mysql_fetch_object(mysql_query("SELECT title FROM actus WHERE lnk='$newsId'"));
		echo '<title>'.$ntitle->title." - ".MAIN_TITLE.'</title>';
	}else
	{
		echo '<title>'.MAIN_TITLE.'</title>';
	}
	
	echo '
	<meta name="description" content="'.MAIN_DESC.'" />';
}elseif($ltp == 'football')
{
	echo '<title>Les bases du Football Américain - '.MAIN_TITLE.'</title>';
	echo '
	<meta name="description" content="'.MAIN_DESC.'" />';
}else
{
	echo '<title>'.MAIN_TITLE.'</title>
	<meta name="description" content="'.MAIN_DESC.'" />';
}

?>
