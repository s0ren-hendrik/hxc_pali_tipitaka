<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="all,follow" />
	<meta name="keywords" content="<?= MAIN_KW ?>" />
	<?php
	if(!isset($_GET['_escaped_fragment_']))
	{
	?><script type="text/javascript" src="javascript/prototype/prototype.js"></script>
	<script type="text/javascript" src="javascript/scriptaculous/scriptaculous.js"></script>
	<script type="text/javascript" src="javascript/hive/hive.js"></script>
	<script type="text/javascript" src="javascript/hatchery.js"></script>
	<?php
	}
	?>
    
    <link rel="stylesheet" media="screen,projection" type="text/css" href="css/zergus.css" />
<?php
	// ***************** GOOGLE ANALYTICS
	if(GOOG_ANAL != "")
	{
		?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?= GOOG_ANAL ?>']);
			_gaq.push(['_trackPageview']);
			
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<?php
	}
	
	// ***************** GOOGLE SPIDER
		if(isset($_GET['_escaped_fragment_']))
		{
			include("infested_header.php");
		}else
		{
			?>
			<title><?= MAIN_TITLE ?></title>
			<meta name="description" content="<?= MAIN_DESC ?>" />
			<?php
		}
	?>
	<link rel="shortcut icon" href="favicon.png" />
</head>

<body>

<div id="topbar">
	<div class="left">Tipitaka Index - Pali Dictionary - About</div>
	<div class="right">English</div>
</div>

<div id="header">
	<h1>Pali Tipitaka, the Pali Canon for everyone.</h1>
	<h3>Read the Tipitaka by contrast from Pali to English, Chinese, French...</h3>
</div>

<div id="toolsmenu">
	<table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<th colspan="2"><b>Options :</b></th>
			<th><b>Search the Tipitaka :</b></th>
		</tr>
		<tr>
			<td>
				<input type="checkbox" id="contrastreading" value="1" checked="checked"> Enable side by side reading
				<br/>
				<br/>
				<select id="lang1">
					<option value="pa"> Pali</option>
					<option value="en_US"> English</option>
					<option value="vi_VN"> Tiếng Việt</option>
					<option value="zh_TW"> 中文 (繁體)</option>
					<option value="zh_CN"> 中文 (简体)</option>
					<option value="fr_FR"> Français</option>
				</select>
				
				&nbsp;+&nbsp;
				<select id="lang2">
					<option value="xn"> Notes (if available)</option>
					<option value="en_US"> English</option>
					<option value="vi_VN"> Tiếng Việt</option>
					<option value="zh_TW"> 中文 (繁體)</option>
					<option value="zh_CN"> 中文 (简体)</option>
					<option value="fr_FR"> Français</option>
				</select>
			</td>
			<td>
				<input type="checkbox" id="tooltiptranslate" value="1" checked="checked"> Translate Pali words in hover tooltips
				<br/>
				<br/>Translation language :
				<select id="tooltiplang">
					<option value="en_US"> English</option>
					<option value="vi_VN"> Tiếng Việt</option>
					<option value="zh_TW"> 中文 (繁體)</option>
					<option value="zh_CN"> 中文 (简体)</option>
					<option value="fr_FR"> Français</option>
				</select>
			</td>
			<td>
				By terms : <input type="text" id="search_term" value="e.g. Vessali" onfocus="this.value='';" />
				<br/>
				<br/>
				By theme : <input type="text" id="search_term" value="e.g. Rules" onfocus="this.value='';" />
			</td>
		</tr>	
	</table>
</div>

<div id="xcontent">

</div>


<div id="footer">
	
</div>

<div id="loadScreen" style="display:none;"><img src="images/malv.png" alt="loading" /> Loading ...</div>

<script language="javascript">
<?php
if(!isset($_GET['_escaped_fragment_']))
{
	?>
	oldURL = '';
	var xlng= window.location.hash;
	xlng = xlng.toString().split('/');
	//alert(xlng[1]);
	xlng[1] = xlng[1] || 0;
	if(xlng[1]==0)
	{
		use('setLang');
	}else
	{
		forcingWind();
	}
	<?php
}
?>
</script>
</body>
</html>
