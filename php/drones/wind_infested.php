<?php
 
$pageURI = $_GET["_escaped_fragment_"];
$loadThisPage = explode("/", $pageURI);
$lang='fr';


$go404 = false;

// Google fout-il le premier slash dans son escaped fragment ou pas ??
if($loadThisPage[0] == 'fr')
{
	$ltp = $loadThisPage[1];
}elseif($loadThisPage[1] == 'fr')
{
	$ltp = $loadThisPage[2];
}

//print_r($loadThisPage);


	//echo "window.location='#!/$lang/".$ltp."';";
	
	if($ltp=='home' or $ltp=='actus')
	{
		if($ltp=='actus'){$_GET['newsId']=$loadThisPage[3];}
		include("php/spawningpool/cntnt/home.php");
		
	}elseif($ltp=='Historique-Ligue')
	{
		//echo '<script language="javascript">show404();</script>';
		include("php/spawningpool/cntnt/storicu.php");
	}elseif($ltp=='Selection-Corse')
	{
		//echo '<script language="javascript">show404();</script>';
		include("php/spawningpool/cntnt/blackheads.php");
	}elseif($ltp=='404')
	{
		//echo '<script language="javascript">show404();</script>';
		include("php/spawningpool/cntnt/404.php");
	}else
	{
		include("php/spawningpool/cntnt/404.php");
	}



?>
