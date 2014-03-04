<?php include '../settings.php'; ?>
<?php
//ricevo i parametri AJAX
$Tabs = $_POST['tabs'];

//eseguo operazione SQL

$result_tabs = null;
if($Tabs == 1){
	$tabella = "pubblicita";
	$query='SELECT ID, TITOLO, URL 
			FROM '.$tabella.' 
			ORDER BY ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 2){
	$tabella = "links";
	$query='SELECT links.ID as ID_LINK, TITOLO, URL, TIPO
			FROM '.$tabella.', tipi 
			WHERE ID_TIPO_LINK=tipi.ID and categoria="LINKS" 
			ORDER BY links.ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 3){
	$tabella = "attestati";
	$query='SELECT ID, TITOLO, URL 
			FROM '.$tabella.' 
			ORDER BY ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 5){
	$tabella = "foto";
	$query='SELECT foto.ID as ID_FOTO, TITOLO, DESCRIZIONE, TIPO 
			FROM '.$tabella.', tipi 
			WHERE ID_TIPO_FOTO=tipi.ID and categoria="FOTO" 
			ORDER BY foto.ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 6){
	$tabella = "downloads";
	$query='SELECT downloads.ID as ID_DOWN, TITOLO, DESCRIZIONE, URL, TIPO 
			FROM '.$tabella.', tipi 
			WHERE ID_TIPO_DOWNLOAD=tipi.ID and categoria="DOWNLOADS" 
			ORDER BY downloads.ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 7){
	$tabella = "lavori";
	$query='SELECT lavori.ID as ID_LAV, TITOLO, DESCRIZIONE, URL, TIPO 
			FROM '.$tabella.', tipi 
			WHERE ID_TIPO_LAVORO=tipi.ID and categoria="LAVORI"  
			ORDER BY lavori.ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 8){
	$tabella = "altro";
	$query='SELECT testata, CV_ita, CV_eng, omaggi, novita, news, messaggio_aziendale 
			FROM '.$tabella;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
	
}else if($Tabs == 9){
	$tabella = "listino";
	$query='SELECT listino.ID as ID_LISTINO, TITOLO, DESCRIZIONE, PREZZO, TIPO 
			FROM '.$tabella.', tipi 
			WHERE ID_TIPO_LISTINO=tipi.ID and categoria="LISTINO"  
			ORDER BY listino.ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 10){
	$tabella = "video";
	$query='SELECT video.ID as ID_VIDEO, TITOLO, DESCRIZIONE, TIPO 
			FROM '.$tabella.', tipi 
			WHERE ID_TIPO_VIDEO=tipi.ID and categoria="VIDEO" 
			ORDER BY video.ID DESC';
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}


//creo la risposta XML
header('Content-Type: text/xml');     
header('Cache-Control: no-cache');
header('pragma: no-cache');
echo '<?xml version="1.0"?>';     
echo "<response>";
	
	while($row = mysql_fetch_array($result_tabs)){
		extract($row);
		if($Tabs == 1){
			echo '<riga id="'.$ID.'" titolo="'.$TITOLO.'" url="'.$URL.'"></riga>';
		}else if($Tabs == 2){
			echo '<riga id="'.$ID_LINK.'" titolo="'.$TITOLO.'" url="'.$URL.'" tipo="'.$TIPO.'"></riga>';
		}else if($Tabs == 3){
			echo '<riga id="'.$ID.'" titolo="'.$TITOLO.'" url="'.$URL.'" ></riga>';
		}else if($Tabs == 5){
			echo '<riga id="'.$ID_FOTO.'" titolo="'.$TITOLO.'" tipo="'.$TIPO.'">'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 6){
			echo '<riga id="'.$ID_DOWN.'" titolo="'.$TITOLO.'" url="'.$URL.'" tipo="'.$TIPO.'">'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 7){
			echo '<riga id="'.$ID_LAV.'" titolo="'.$TITOLO.'" url="'.$URL.'" tipo="'.$TIPO.'">'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 8){//ha una SOLA RIGA
			echo '<riga>';
			echo '
					<contenuto tipo="testata">'.$testata.'</contenuto>
					<contenuto tipo="cv_ita">'.$CV_ita.'</contenuto>
					<contenuto tipo="cv_eng">'.$CV_eng.'</contenuto>
					<contenuto tipo="omaggi">'.$omaggi.'</contenuto>
					<contenuto tipo="novita">'.$novita.'</contenuto>
					<contenuto tipo="news">'.$news.'</contenuto>
					<contenuto tipo="messaggio_aziendale">'.$messaggio_aziendale.'</contenuto>
				';
			echo '</riga>';
		}else if($Tabs == 9){
			echo '<riga id="'.$ID_LISTINO.'" titolo="'.$TITOLO.'" prezzo="'.$PREZZO.'" tipo="'.$TIPO.'">'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 10){
			echo '<riga id="'.$ID_VIDEO.'" titolo="'.$TITOLO.'" tipo="'.$TIPO.'">'.$DESCRIZIONE.'</riga>';
		}
	}
	
echo "</response>";
 ?>