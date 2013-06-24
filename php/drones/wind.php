<?php

/**
 * Hive Core JavaScript Library v2.4
 * http://hcore.mental-orb.com/
 *
 * Copyright 2010, mental orb
 *
 * Based on Prototype v1.6.0.3 & Scriptaculous v1.8.3
 * Documentation : http://hcore.mental-orb.com/docs/
 * 
 * 
 * 
 */
 
 
 /* *************************************************************
 
 URL should look like : #!/language/root/cat/cat/cat/...
 
 Where language is : en / fr ...
 root (the page to load) : home (/ summary) / tipitaka (for reading)
 cat/cat/cat... : the arbo path eg. : #!/en/tipitaka/tipitaka-mula/vinaya/parajika... 
  
 ******************************************************************/
 
 
// wind.php > explode href > load modules
$subMarine = $_GET['ScndArg'];
$pageURI = $_GET["href"];


$loadThisPage = explode("!", $pageURI);
$loadThisPage = explode("/", $loadThisPage[1]);
if(!empty($loadThisPage[1]) and @eregi($loadThisPage[1], ACCEPT_LANG))
{
	$lang = $loadThisPage[1];
}else
{
	$lang=strtolower(DEF_LANG);
}

// On compte le nombre d'arg pour savoir dans quel cas on se trouve
if(count($loadThisPage) < 3)
{
	$loadDat = START_URL;
	//echo "alert('DEF');";
}else
{
	$loadDat = $loadThisPage[2];
	//echo "alert('CHOOSE');";
}


//echo "hx.setEvent(\$H({type:'static', method: scrolltotop}));";

if($loadDat=='home' or $loadDat=='summary')
{
	// For the summary, we proceed by the last name of the path
	$endingPath = end($loadThisPage);
	
	// loading the home template
	echo "hx.setEvent(\$H({update:'xcontent', load:'php/spawningpool/cntnt/_tpl_summary.php'}));";
	
	echo "hx.setEvent(\$H({update:'content', load:'php/spawningpool/cntnt/home.php', lang: '$lang', path:'$endingPath'}));";
	
	
	echo "window.document.title = '".MAIN_TITLE."';";
	
}elseif($loadDat=='tipitaka')
{
	// loading the book template
	echo "hx.setEvent(\$H({update:'xcontent', load:'php/spawningpool/cntnt/_tpl_book.php'}));";
	
	// For the summary, we proceed by the last name of the path
	$endingPath = end($loadThisPage);
	
	echo "hx.setEvent(\$H({update:'bookcontent', load:'php/spawningpool/cntnt/reading.php', lang: '$lang', path:'$endingPath'}));";
	
	
}else
{	
	echo "hx.setEvent(\$H({update:'content', lang: '$lang', load:'php/spawningpool/cntnt/404.php'}));";
	echo "window.document.title = '404 Page not found - ".MAIN_TITLE."';";
}


// Changement de page, on relance Analytics
if(GOOG_ANAL != "")
{
	echo "hx.setEvent(\$H({drn:'googAnal', callbackJS: 'force' }));";
}

?>