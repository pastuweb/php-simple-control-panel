<?php  include '../../settings.php'; ?>
<?php
if($_POST['id_2_edit'] != "00"){
	//MODIFICA
	$titolo = $_POST['titolo_2'];
	$url = $_POST['url_2'];
	if($url == null || $url == ""){
		$url = "";
	}else{
		$url = "http://" . $url;
	}
	
	//eseguo operazione SQL
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($url);
	$query = 'UPDATE links SET titolo = "' . $arg1  .'", url = "' . $arg2  .'" WHERE id = '. $_POST['id_2_edit'];
	$result_edit = mysql_query($query, $db) or die(mysql_error($db));
	header("location: ../../inserimento.php?errore=modifica");
	
	
}else{
	//INSERISCI
	//campi
	$titolo = $_POST['titolo_2'];
	$url = $_POST['url_2'];
	$tipo = $_POST['tipo_links'];
	
	$id_tipo = null;
	$url = "http://" . $url;
	
	$query='SELECT ID  
			FROM tipi WHERE categoria = \'LINKS\' and tipo = "'.$tipo.'" ';
	$result_tipo=mysql_query($query, $db) or die(mysql_error($db));
	while($row = mysql_fetch_array($result_tipo)){
		extract($row);
		$id_tipo = $ID;
	}
	//CONTROLLO LATO CLIENT
	
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($url);
	$query = 'INSERT INTO links (titolo, url, id_tipo_link) VALUES ("'.$arg1.'", "'.$arg2.'", '.$id_tipo.')';
	$result = mysql_query($query, $db) or die(mysql_error($db));
	
	header("location: ../../inserimento.php?errore=nessuno");
}
?> 

