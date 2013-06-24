<?php
session_start();
include("php/_global.php");
include("php/_config.php");

// Mysql connect
//$connect = @mysql_connect('localhost','lcfa','lesangelspuent') or die(mysql_error());
//@mysql_select_db('lcfa', $connect);
$connect = @mysql_connect('localhost','nicolas','aze123') or die(mysql_error());
@mysql_select_db('tipitaka', $connect);
@mysql_query("SET NAMES UTF8");



?>
