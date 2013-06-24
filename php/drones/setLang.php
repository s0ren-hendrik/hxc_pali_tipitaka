<?php

$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$lang = strtolower($language{0}.$language{1});

if(!@eregi($lang, ACCEPT_LANG)){$lang=strtolower(DEF_LANG);}

echo "document.location='#!/$lang/".START_URL."';";
//echo "wind('".START_URL."');";

?>
