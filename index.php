<?php

include("_start.php");

if(isset($_GET['404']))
{
	header("location:/#!/".DEF_LANG."/404");
}else
{
	if(MOBILE_SITE)
	{
		mobile_device_detect(MOBILE_URL);
	}
	
	if(!ALLOW_IE6 && isIE6Client($_SERVER['HTTP_USER_AGENT']))
	{
		include("_noIE6.php");
	}else
	{
		include("_load.php");
	}
}

?>