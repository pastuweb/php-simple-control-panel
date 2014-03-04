<?php
//ricevo i parametri AJAX
$Nome = htmlentities($_POST['nome']);

$Email = htmlentities($_POST['email']);

$Ogg = htmlentities($_POST['ogg']);

$Mex = htmlentities($_POST['testo']);

$headers = 'From: '. $Email ."\r\n";
$mia_email = 'francesco.pasturenzi@gmail.com';
$subject = 'Conttatato da mobile';

$message = "".$Nome."\r\n".$Email."\r\nPROVENIENZA:Pannello di Controllo\r\nOGGETTO DEL MESSAGGIO: ".$subject."\r\n\r\nMESSAGGIO:\r\n".$Mex;

//eseguo operazione
$success = mail($mia_email, $subject, $message, $headers);

//creo la risposta XML
header('Content-Type: text/xml');     
header('Cache-Control: no-cache');
header('pragma: no-cache');
echo '<?xml version="1.0"?>';     
echo "<response>";
	echo "<email>";
 	if($success)
		echo "OK";
	else
		echo "KO";
	echo "</email>";
echo "</response>";
 ?>