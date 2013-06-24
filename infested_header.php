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
}else
{
	echo '<title>'.MAIN_TITLE.'</title>
	<meta name="description" content="'.MAIN_DESC.'" />';
}

?>
