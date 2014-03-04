<?php include './settings.php';
$login=0;
$errore=$_GET["errore"];
if ( isset($_COOKIE["user_pastuweb"]) && isset($_COOKIE["pass_pastuweb"]) ){
	if($_COOKIE["user_pastuweb"] == $username && $_COOKIE["pass_pastuweb"] == $password){
		$login = 1;	
	}else{
		$login = 0;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Inserimento Dati Pannello di Controllo - PastuWeb</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<meta name="AUTHOR" content="Pasturenzi Francesco">
<meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
<meta http-equiv="PRAGMA" content="NO-CACHE">
<meta name="ROBOTS" content="NONE,NOARCHIVE"> 
<meta name="GOOGLEBOT" content="NOARCHIVE"> 

<link type="text/css" href="./css/stile.css" rel="stylesheet" />
<link type="text/css" href="./css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />

<script type="text/javascript" src="./js/jquery-1.9.0.js"></script>
<script type="text/javascript" src="./js/jquery-ui-1.10.0.custom.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		$(".pulsanti").removeClass("hoverPulsante");
		$(".pulsanti").addClass("defaultPulsante");
		
		$(".pulsanti").hover(function () {
			$(this).addClass("hoverPulsante");
			$(this).removeClass("defaultPulsante");
		  }, 
		  function () {
			  $(this).addClass("defaultPulsante");
			  $(this).removeClass("hoverPulsante");
		  }
		);

		$("#indietro").click(function () {
			window.open("./admin.php","_self")
		});
		$("#loggati").click(function () {
			window.open("./index.php","_self")
		});
		
	});
</script>
</head>
<body>
	<div id="divPastuweb" class="cssPastuweb ui-corner-all ui-state-default">
	<a href="http://www.pastuweb.com" style="cursor:pointer;border:0px;" target="_blank"><img src="./images/logo_pastuweb.png" style="border:0px;" alt="Logo PastuWeb" class="logoPastuweb"/></a>
	
		<img id="help" src="./images/help.png" alt="Help" style="position:absolute;top:50px;right:50px;cursor:pointer;width:70px;"> 
	
	<?php if($login == 0){ ?>
	<div id="divErrore" class="cssErrore ui-corner-all ui-widget ui-state-error">
		<p style="text-align:center;font-weight:bold;">
		Pannello di Controllo<br>
		<span style="color:#FF0000;"><?php echo $sito_web?></span>
		</p>
		<p style="text-align:center;">
			Username e/o Password <strong>ERRATI</strong>.
		</p>
		<br>
		<div style="float:right">
			<input  id="loggati" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Loggati">
		</div>
		<div style="clear:right"></div>
	</div>
	<?php }else if($errore == "nessuno"){ ?>
	<div id="divInserimento" class="cssInserimento ui-corner-all ui-widget ui-state-highlight">
		<p style="text-align:center;font-weight:bold;">
		Inserimento Dati<br>
		<span style="color:#FF0000;"><?php echo $sito_web?></span>
		</p>
		<div>
			<div class="successo ui-corner-all">Inserimento ESEGUITO con SUCCESSO!</div>
		</div>
		<br>
		<div style="float:right">
			<input  id="indietro" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Indietro">
		</div>
		<div style="clear:right"></div>
	</div>
	<?php }else if($errore == "dimensione"){ ?>
	<div id="divInserimento" class="cssInserimento ui-corner-all ui-widget ui-state-highlight">
		<p style="text-align:center;font-weight:bold;">
		Inserimento Dati<br>
		<span style="color:#FF0000;"><?php echo $sito_web?></span>
		</p>
		<div>
			<div class="errore ui-corner-all">Inserimento FALLITO: controllare la DIMENSIONE dei files, se toppo grossi, <strong>CONTATTATEMI</strong>!</div>
		</div>
		<br>
		<div style="float:right">
			<input  id="indietro" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Indietro">
		</div>
		<div style="clear:right"></div>
	</div>
	<?php }else if($errore == "modifica"){ ?>
	<div id="divInserimento" class="cssInserimento ui-corner-all ui-widget ui-state-highlight">
		<p style="text-align:center;font-weight:bold;">
		Modifica Dati<br>
		<span style="color:#FF0000;"><?php echo $sito_web?></span>
		</p>
		<div>
			<div class="successo ui-corner-all">Modifica ESEGUITA con SUCCESSO!</div>
		</div>
		<br>
		<div style="float:right">
			<input  id="indietro" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Indietro">
		</div>
		<div style="clear:right"></div>
	</div>
	<?php } ?>
		<div id="power">
			<br>
			<img src="./images/ajax_powered.png" alt="AJAX Powered"> 
			<img src="./images/apache_powered.png" alt="APACHE Powered"> 
			<img src="./images/jquery_powered.png" alt="JQUERY Powered"> 
			<img src="./images/php_powered.gif" alt="PHP Powered"> 
			<img src="./images/mysql_powered.jpg" alt="MYSQL Powered">
			<img src="./images/ubuntu.png" alt="UBUNTU Powered">
		</div>
	</div>
	
	<?php include './moduli/dialog.php'; ?>
	
	<script type="text/javascript" src="./ajax/email.js"></script>
</body>
</html>