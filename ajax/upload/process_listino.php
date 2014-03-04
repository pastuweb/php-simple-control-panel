<?php  include '../../settings.php'; ?>
<?php
if($_POST['id_9_edit'] != "00"){
	//MODIFICA
	$titolo = $_POST['titolo_9'];
	$descrizione = $_POST['descrizione_9'];
	$prezzo = $_POST['prezzo_9'];

	
	//eseguo operazione SQL
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($descrizione);
	$query = 'UPDATE listino SET titolo = "' . $arg1  .'", descrizione = "' . $arg2  .'", prezzo = ' . $prezzo  .' WHERE id = '. $_POST['id_9_edit'];
	$result_edit = mysql_query($query, $db) or die(mysql_error($db));
	header("location: ../../inserimento.php?errore=modifica");
	
	
}else{
	//INSERISCI
	//campi
	$titolo = $_POST['titolo_9'];
	$descrizione = $_POST['descrizione_9'];
	$prezzo = $_POST['prezzo_9'];
	$tipo = $_POST['tipo_listino'];
	
	$id_tipo = null;
	
	$query='SELECT ID  
			FROM tipi WHERE categoria = \'LISTINO\' and tipo = "'.$tipo.'" ';
	$result_tipo=mysql_query($query, $db) or die(mysql_error($db));
	while($row = mysql_fetch_array($result_tipo)){
		extract($row);
		$id_tipo = $ID;
	}
	//CONTROLLO LATO CLIENT
	
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($descrizione);
	$query = 'INSERT INTO listino (titolo, descrizione, prezzo, id_tipo_listino) VALUES ("'.$arg1.'", "'.$arg2.'", '.$prezzo.','.$id_tipo.')';
	$result = mysql_query($query, $db) or die(mysql_error($db));
	
	header("location: ../../inserimento.php?errore=nessuno");
}
?> 

