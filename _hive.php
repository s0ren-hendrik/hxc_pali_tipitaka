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



require_once("_start.php");

if(isset($_GET["method"]))
{
	if($_GET["load"] != 'false')
	{
		$filename = $_GET["load"];
		if (file_exists($filename))
		{
			include($filename);
		}/*else
		{
			header("location:/#!/".DEF_LANG."/404");
		}*/
	}else
	{
		$filename = "php/drones/".$_GET["drn"].".php";
		if (file_exists($filename))
		{
			include("php/drones/".$_GET["drn"].".php");
		}
	}
}else
{
		$filename = "php/drones/".$_POST["drn"].".php";
		if (file_exists($filename))
		{
			include("php/drones/".$_POST["drn"].".php");
		}
}
?>