<?php include './settings.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Login Pannello di Controllo - PastuWeb</title>
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
		
	});
</script>
</head>
<body>
	<div id="divPastuweb" class="cssPastuweb ui-corner-all ui-state-default">
	<a href="http://www.pastuweb.com" style="cursor:pointer;border:0px;" target="_blank"><img src="./images/logo_pastuweb.png" style="border:0px;" alt="Logo PastuWeb" class="logoPastuweb"/></a>
	
		<img id="help" src="./images/help.png" alt="Help" style="position:absolute;top:50px;right:50px;cursor:pointer;width:70px;"> 
	
	<div id="divLogin" class="cssLogin ui-corner-all ui-widget ui-state-highlight">
		<p style="text-align:center;font-weight:bold;">
		Accesso al Pannello di Controllo<br>
		<span style="color:#FF0000;"><?php echo $sito_web?></span>
		</p>
		
		<form name="formLOGIN" method="post" action="./admin.php">
			Username: <br><input   name="txtuser" type="text" value=""  size="30"  maxlength="30" ><br>
			Password: <br><input   name="txtpass" type="password" value=""  size="30"  maxlength="30" ><br>
			<br>
			<div style="float:right;">
				<input  id="submitLogin" class="ui-button ui-widget ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Login">
				<input  id="resetLogin" class="ui-button ui-widget ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
			</div>
			<div style="clear:right"></div>
		</form>
	</div>
	
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