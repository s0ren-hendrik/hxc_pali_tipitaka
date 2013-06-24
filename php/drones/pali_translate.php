<?php

$term = addslashes($_GET['term']);
$lang = addslashes($_GET['lang']);

$in  =  array('ṃ','ṭ');
$out = array('_','_');
$match = str_replace($in, $out, $term);
$match = ucfirst(strtolower($match));
$def=mysql_fetch_array(mysql_query("SELECT id FROM palidic_terms WHERE term LIKE '".$match."' LIMIT 1"));
if($def[0]!="")
{
	$xdef = mysql_fetch_array(mysql_query("SELECT `content` FROM palidic_trans WHERE parent_term='".$def[0]."' AND lang='$lang'; "));
	echo strip_tags($xdef[0]);
}else
{
	echo "Word not found";
}


?>
