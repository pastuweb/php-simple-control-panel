<?php include './settings.php';
$login=0;
if( !isset($_POST['txtuser']) || !isset($_POST['txtuser'])  ){
	if( !isset($_COOKIE["user_pastuweb"]) && !isset($_COOKIE["pass_pastuweb"]) )  {
		//Login errato
		$login = 0;
	}else if($_COOKIE["user_pastuweb"] == $username && $_COOKIE["pass_pastuweb"] == $password){
		//Cookie CORRETTI
		$login = 1;
	}else{
		//Cookie errati
		$login = 0;
	}
}else if ( $_POST['txtuser'] != $username || $_POST['txtpass'] != $password ){
	//Login errato
	$login = 0;	
}else{
	//Login CORRETTO e creo i COOKIE
	$login = 1;
	setcookie ("user_pastuweb", $_POST['txtuser']) ; 
	setcookie ("pass_pastuweb", $_POST['txtpass']) ; 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Pannello di Controllo - PastuWeb</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
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

		$( "#tabs" ).tabs();

		$("table tr").not(':first').hover(
				  function () {
					  $(this).css("background","#ACACAC");
				  }, 
				  function () {
					  $(this).css("background","");
				  }
				);

		$("#accordion").accordion({ heightStyle: "content" });

		//Contattami
		$( "#help_dialog" ).dialog({
			autoOpen: false,
			modal:true,
			draggable:false,
			resizable:false,
			width: 450
		});
		$( "#help" ).click(function( event ) {
			$( "#help_dialog" ).dialog( "open" );
			event.preventDefault();
		});
		//Errore
		$( "#errore_dialog" ).dialog({
			autoOpen: false,
			modal:true,
			draggable:false,
			resizable:false,
			width: 450
		});
		

		$("#loggati").click(function () {
			window.open("./index.php","_self")
		});
		
		<?php include './moduli/autocomplete.php'; ?>
		<?php include './moduli/validazione_inserimento.php'; ?>
				         		
	});
</script>
</head>
<body>
	<div id="divPastuweb" class="cssPastuweb ui-corner-all ui-state-default">
	<a href="http://www.pastuweb.com" style="cursor:pointer;border:0px;" target="_blank"><img src="./images/logo_pastuweb.png" alt="Logo PastuWeb" style="border:0px;" class="logoPastuweb"/></a>
	
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
	<?php }else{ ?>
	<div id="divAdmin" class="cssAdmin ui-corner-all ui-widget ui-state-highlight">
		<p style="text-align:center;font-weight:bold;">
		Pannello di Controllo<br>
		<span style="color:#FF0000;"><?php echo $sito_web?></span>
		</p>
		<div id="tabs">
			<ul>
				<?php if($flag_pubblicita == 1){ ?>
				<li><a id="tabs1_Pubbl" href="#tabs-1">Pubblicit&agrave;</a></li>
				<?php } ?>
				<?php if($flag_links == 1){ ?>
				<li><a id="tabs2_Links" href="#tabs-2">Links</a></li>
				<?php } ?>
				<?php if($flag_attestati == 1){ ?>
				<li><a id="tabs3_Attest" href="#tabs-3">Attestati</a></li>
				<?php } ?>
				<?php if($flag_foto == 1){ ?>
				<li><a id="tabs5_Foto" href="#tabs-5">Foto</a></li>
				<?php } ?>
				<?php if($flag_downloads == 1){ ?>
				<li><a id="tabs6_Download" href="#tabs-6">Download</a></li>
				<?php } ?>
				<?php if($flag_lavori == 1){ ?>
				<li><a id="tabs7_Lavori" href="#tabs-7">Lavori</a></li>
				<?php } ?>
				<?php if($flag_altro == 1){ ?>
				<li><a id="tabs8_Altro" href="#tabs-8">Altro</a></li>
				<?php } ?>
				<?php if($flag_listino == 1){ ?>
				<li><a id="tabs9_Listino" href="#tabs-9">Listino</a></li>
				<?php } ?>
				<?php if($flag_video == 1){ ?>
				<li><a id="tabs10_Video" href="#tabs-10">Video</a></li>
				<?php } ?>
			</ul>
			<?php if($flag_pubblicita == 1){ ?>
			<div id="tabs-1">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Pubblicit&agrave;</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
			
					<form enctype="multipart/form-data" name="formPubblicita"  method="post" action="./ajax/upload/process_pubblicita.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input  id="titolo_1" name="titolo_1" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Immagine: <br><input id="immagine_1"  name="immagine_1" type="file" value=""  size="50"  maxlength="300" >[solo <span style="color:#FF0000;">.png</span>, max <span style="color:#FF0000;">5MB</span>]<br>
						URL: <br><span style="color:#000000;">http://</span><input  id="url_1" name="url_1" type="text" value=""  size="60"  maxlength="300" ><br>
						<input  id="id_1_edit" name="id_1_edit" type="text" value="00" style="display:none;">
						<br>
						<div style="float:right;">
							<input  id="vero_submit_1" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_1" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_1_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_1" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>URL</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyPubbl">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			</div>
			</div>
			<?php } ?>
			<?php if($flag_links == 1){ ?>
			<div id="tabs-2">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Links</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formLinks" method="post" action="./ajax/upload/process_links.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input  id="titolo_2" name="titolo_2" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						URL: <br><span style="color:#000000;">http://</span><input id="url_2"  name="url_2" type="text" value=""  size="60"  maxlength="300" ><span style="color:#000000;"> *</span><br>
						<input  id="id_2_edit" name="id_2_edit" type="text" value="00" style="display:none;">
						
						<!--  Scegli un Tipo: <br><input id="tipo_links" name="tipo_links"><span style="color:#000000;"> *</span>-->
						Scegli un Tipo:
						<select id="tipo_links" name="tipo_links">
						    <option></option>
						    <?php 
								while($row_link = mysql_fetch_array($result_tipo_links)){
									extract($row_link);
							?>
							<option value="<?php echo $tipo?>"><?php echo $tipo?></option>
							<?php } ?>
						</select> <span style="color:#000000;"> *</span>
						<br>
						<div style="float:right;">
							<input  id="vero_submit_2" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_2" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_2_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_2" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>URL</th><th>Tipo</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyLinks">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			</div>
			</div>
			<?php } ?>
			<?php if($flag_attestati == 1){ ?>
			<div id="tabs-3">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Attestati</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formAttestati" method="post" action="./ajax/upload/process_attestati.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input  id="titolo_3" name="titolo_3" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Immagine: <br><input  id="immagine_3" name="immagine_3" type="file" value=""  size="50"  maxlength="300" >[solo <span style="color:#FF0000;">.png</span>, max 5MB]<br>
						URL: <br><span style="color:#000000;">http://</span><input id="url_3"  name="url_3" type="text" value=""  size="60"  maxlength="300" ><br>
						PDF o ZIP: <br><input  id="pdf_zip_3" name="pdf_zip_3" type="file" value=""  size="50"  maxlength="300" > [solo <span style="color:#FF0000;">.pdf</span> o <span style="color:#FF0000;">.zip</span>, max <span style="color:#FF0000;">6MB</span>]<br>
						<input  id="id_3_edit" name="id_3_edit" type="text" value="00" style="display:none;">
						<br>
						<div style="float:right;">
							<input  id="vero_submit_3" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_3" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_3_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_3" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>URL</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyAttest">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			</div>
			</div>
			<?php } ?>
			<?php if($flag_foto == 1){ ?>
			<div id="tabs-5">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Foto</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formFoto" method="post" action="./ajax/upload/process_foto.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input id="titolo_5"  name="titolo_5" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Descrizione: <br><textarea  id="descrizione_5" name="descrizione_5" rows="3" cols="50"></textarea><br>
						Foto: <br><input  id="foto_5" name="foto_5" type="file" value=""  size="50"  maxlength="200" ><span style="color:#000000;"> *</span> [solo <span style="color:#FF0000;">.png, .jpg</span>, max <span style="color:#FF0000;">5MB</span>]<br>
						<input  id="id_5_edit" name="id_5_edit" type="text" value="00" style="display:none;">
						<!-- Scegli un Tipo: <br><input id="tipo_foto"><span style="color:#000000;"> *</span> -->
						Scegli un Tipo:
						<select id="tipo_foto" name="tipo_foto">
						    <option></option>
						    <?php 
								while($row_foto = mysql_fetch_array($result_tipo_foto)){
									extract($row_foto);
							?>
							<option value="<?php echo $tipo?>"><?php echo $tipo?></option>
							<?php } ?>
						</select> <span style="color:#000000;"> *</span>
						<br>
						<div style="float:right;">
							<input  id="vero_submit_5" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_5" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_5_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_5" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>Descrizione</th><th>Tipo</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyFoto">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			
			</div>
			</div>
			<?php } ?>
			<?php if($flag_downloads == 1){ ?>
			<div id="tabs-6">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Download</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formDownloads" method="post" action="./ajax/upload/process_downloads.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input  id="titolo_6" name="titolo_6" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Descrizione: <br><textarea  id="descrizione_6" name="descrizione_6" rows="3" cols="50"></textarea><br>
						URL: <br><span style="color:#000000;">http://</span><input id="url_6"  name="url_6" type="text" value=""  size="60"  maxlength="200" ><br>
						PDF o ZIP: <br><input id="pdf_zip_6"  name="pdf_zip_6" type="file" value=""  size="50"  maxlength="200" > [solo <span style="color:#FF0000;">.pdf</span> o <span style="color:#FF0000;">.zip</span>, max <span style="color:#FF0000;">6MB</span>]<br>
						<input  id="id_6_edit" name="id_6_edit" type="text" value="00" style="display:none;">
						<!-- Scegli un Tipo: <br><input id="tipo_downloads"><span style="color:#000000;"> *</span>-->
						Scegli un Tipo:
						<select id="tipo_downloads" name="tipo_downloads">
						    <option></option>
						    <?php 
								while($row_downloads = mysql_fetch_array($result_tipo_downloads)){
									extract($row_downloads);
							?>
							<option value="<?php echo $tipo?>"><?php echo $tipo?></option>
							<?php } ?>
						</select> <span style="color:#000000;"> *</span>
						<br>
						<div style="float:right;">
							<input  id="vero_submit_6" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_6" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_6_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_6" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>Descrizione</th><th>URL</th><th>Tipo</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyDown">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			
			</div>
			</div>
			<?php } ?>
			<?php if($flag_lavori == 1){ ?>
			<div id="tabs-7">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Lavori</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formLavori" method="post" action="./ajax/upload/process_lavori.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input id="titolo_7"  name="titolo_7" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Descrizione: <br><textarea  id="descrizione_7" name="descrizione_7" rows="3" cols="50"></textarea><br>
						URL: <br><span style="color:#000000;">http://</span><input id="url_7"  name="url_7" type="text" value=""  size="60"  maxlength="200" ><br>
						PDF o ZIP: <br><input  id="pdf_zip_7" name="pdf_zip_7" type="file" value=""  size="50"  maxlength="200" > [solo <span style="color:#FF0000;">.pdf</span> o <span style="color:#FF0000;">.zip</span>, max <span style="color:#FF0000;">6MB</span>]<br>
						Immagine: <br><input  id="immagine_7" name="immagine_7" type="file" value=""  size="50"  maxlength="200" > [solo <span style="color:#FF0000;">.png</span>, max <span style="color:#FF0000;">5MB</span>]<br>
						<input  id="id_7_edit" name="id_7_edit" type="text" value="00" style="display:none;">
						<!-- Scegli un Tipo: <br><input id="tipo_lavori"><span style="color:#000000;"> *</span>-->
						Scegli un Tipo:
						<select id="tipo_lavori" name="tipo_lavori">
						    <option></option>
						    <?php 
								while($row_lavori = mysql_fetch_array($result_tipo_lavori)){
									extract($row_lavori);
							?>
							<option value="<?php echo $tipo?>"><?php echo $tipo?></option>
							<?php } ?>
						</select> <span style="color:#000000;"> *</span>
						<br>
						<div style="float:right;">
							<input  id="vero_submit_7" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_7" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_7_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_7" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>Descrizione</th><th>URL</th><th>Tipo</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyLavori">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			
			</div>
			</div>
			<?php } ?>
			<?php if($flag_altro == 1){ ?>
			<div id="tabs-8">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Altro</p>
					
					<?php include './moduli/altro.php'; ?>
					
			</div>
			<?php } ?>
			<?php if($flag_listino == 1){ ?>
			<div id="tabs-9">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Listino</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formListino" method="post" action="./ajax/upload/process_listino.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input  id="titolo_9" name="titolo_9" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Descrizione: <br><textarea id="descrizione_9"  name="descrizione_9" rows="3" cols="50"></textarea><br>
						Prezzo: <br><input  id="prezzo_9" name="prezzo_9" type="text" value=""  size="10"  maxlength="10" ><span style="color:#000000;"> *</span> [in &euro;]<br>
						<input  id="id_9_edit" name="id_9_edit" type="text" value="00" style="display:none;">
						<!-- Scegli un Tipo: <br><input id="tipo_listino"><div><span style="color:#000000;"> *</span></div>-->
						Scegli un Tipo:
						<select id="tipo_listino" name="tipo_listino">
						    <option></option>
						    <?php 
								while($row_listino = mysql_fetch_array($result_tipo_listino)){
									extract($row_listino);
							?>
							<option value="<?php echo $tipo?>"><?php echo $tipo?></option>
							<?php } ?>
						</select> <span style="color:#000000;"> *</span><br>
						<div style="float:right;">
							<input  id="vero_submit_9" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_9" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_9_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_9" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					
					<hr>
					<div style="color:#FF0000;">
					Incrementa di <input id="tipo_listino_cifra"> il tipo: <input id="tipo_listino_incremento"> <input  id="applica_incr_9" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Applica"><br>
					<span style="color:#000000;">(aggiungere il "<span style="color:#FF0000;">-</span>" davanti alla cifra se si vuole DECREMENTARE)</span>
					</div><br>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>Descrizione</th><th>Prezzo</th><th>Tipo</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyListino">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			
			</div>						
			</div>
			<?php } ?>
			<?php if($flag_video == 1){ ?>
			<div id="tabs-10">
			<p class="ui-corner-all ui-widget ui-state-highlight" style="padding:2px;background:#B2B2B2;">Pannello di Controllo <span style="color:#FF0000;font-weight:bold;"> - </span> Video</p>
			<div class="sezione ui-corner-all ui-widget ui-state-highlight">
					
					<form enctype="multipart/form-data" name="formVideo" method="post" action="./ajax/upload/process_video.php">
						<div style="padding:3px;color:#3366FF;">
						Titolo: <br><input id="titolo_10"  name="titolo_10" type="text" value=""  size="30"  maxlength="30" ><span style="color:#000000;"> *</span><br>
						Descrizione: <br><textarea id="descrizione_10"  name="descrizione_10" rows="3" cols="50"></textarea><br>
						Video: <br><input  id="video_10" name="video_10" type="file" value=""  size="50"  maxlength="200" > <span style="color:#000000;"> *</span> [solo <span style="color:#FF0000;">.mp4</span>, max <span style="color:#FF0000;">6MB</span>]<br>
						<input  id="id_10_edit" name="id_10_edit" type="text" value="00" style="display:none;">
						<!-- Scegli un Tipo: <br><input id="tipo_video"><span style="color:#000000;"> *</span>-->
						Scegli un Tipo:
						<select id="tipo_video" name="tipo_video">
						    <option></option>
						    <?php 
								while($row_video = mysql_fetch_array($result_tipo_video)){
									extract($row_video);
							?>
							<option value="<?php echo $tipo?>"><?php echo $tipo?></option>
							<?php } ?>
						</select> <span style="color:#000000;"> *</span>
						<br>
						<div style="float:right;">
							<input  id="vero_submit_10" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="submit"  value="Invia Dati">
							<input  id="submit_10" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Invia Dati">
							<input  id="submit_10_edit" style="display:none;" class="inserimento ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="button"  value="Modifica Dati">
							<input  id="reset_10" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" type="reset"  value="Reset">
						</div>
						<div style="clear:right"></div>
						</div>
						<div>(*) campi obbligatori.</div>
					</form>
					<hr>
			<table>
				<thead>
					<tr><th style="color:#FF0000;">ID</th><th>Titolo</th><th>Descrizione</th><th>Tipo</th><th style="color:#FF0000;">Delete</th><th style="color:#FF0000;">Edit</th></tr>
				</thead>
				<tbody id="tbodyVideo">
					<!-- riempito tramite AJAX -->
				</tbody>
			</table>
			
			</div>
			</div>
			<?php } ?>
		</div>
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
	<script type="text/javascript" src="./ajax/tabs_clicks.js"></script>
	<script type="text/javascript" src="./ajax/delete.js"></script>
	<script type="text/javascript" src="./ajax/edit.js"></script>
	<script type="text/javascript" src="./ajax/edit_altro.js"></script>
	<?php if($flag_listino == 1){ ?>
	<script type="text/javascript" src="./ajax/incrementa.js"></script>
	<?php }?>
</body>
</html>
