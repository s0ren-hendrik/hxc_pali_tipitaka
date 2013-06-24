<?php

	//echo "alert('heya');";

	if(isset($_POST['nom'])){$nom = addslashes($_POST['nom']);}else{$nom = "";}
	if(isset($_POST['club'])){$societe = addslashes($_POST['club']);}else{$societe = "";}
	if(isset($_POST['email'])){$email = addslashes($_POST['email']);}else{$email = "";}
	if(isset($_POST['message'])){$mess = addslashes($_POST['message']);}else{$mess = "";}
	//echo "alert('heya $message');";

	srand((double)microtime()*1000000);
	$boundary = md5(uniqid(rand()));
	$titre = "Contact SINS"; // ******************* METTRE LE TITRE DU MAIL
	$header ="From: $email\n"; // ******************* METTRE LE MAIL FROM
	$header .="Reply-To: $email\n"; // ******************* METTRE LE REPLY
	$header .="MIME-Version: 1.0\n";
	$header .="Content-Type: multipart/alternative;boundary=$boundary\n";
	$message = "\nThis is a multi-part message in MIME format.";
	$message .="\n--$boundary\nContent-Type: text/html;charset=\"iso-8859-1\"\n\n";
	$message .= '
	<html>
	<body>
	<table style="width:500px">
		<tr><td>
			*Nom : '.$nom.'<br>
			Club :  '.$societe.'<br>
			*Email : '.$email.'<br>
			Message : '.$mess.'<br>
		</td></tr>
	</table>
	</body>
	</html>
	';
	$message .="\n--$boundary--\n end of the multi-part";
	@mail("n.alfonsi@mental-orb.com",$titre,$message,$header);

	
	echo "hx.setEvent(\$H({update:'contactform', load:'php/spawningpool/cntnt/contact2.php', lang: 'fr'}));";
	
	
	?>
