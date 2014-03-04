<?php  include '../../settings.php'; ?>
<?php
if($_POST['id_6_edit'] != "00"){
	//MODIFICA
	$titolo = $_POST['titolo_6'];
	$descrizione = $_POST['descrizione_6'];
	$url = $_POST['url_6'];
	if($url == null || $url == ""){
		$url = "";
	}else{
		$url = "http://" . $url;
	}
	
	//eseguo operazione SQL
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($descrizione);
	$arg3 = mysql_real_escape_string($url);
	$query = 'UPDATE downloads SET titolo = "' . $arg1  .'", descrizione = "' . $arg2  .'", url = "' . $arg3  .'" WHERE id = '. $_POST['id_6_edit'];
	$result_edit = mysql_query($query, $db) or die(mysql_error($db));
	header("location: ../../inserimento.php?errore=modifica");
	
	
}else{
	//INSERISCI
	//campi
	$titolo = $_POST['titolo_6'];
	$descrizione = $_POST['descrizione_6'];
	$pdf_zip_tmp_name = $_FILES['pdf_zip_6']['tmp_name'];
	$pdf_zip_name = $_FILES['pdf_zip_6']['name'];
	$pdf_zip_size = $_FILES['pdf_zip_6']['size'];
	$url = $_POST['url_6'];
	$tipo = $_POST['tipo_downloads'];
	
	$id_tipo = null;
	$flag ="";
	$last_id = null;
	
	$query='SELECT ID  
			FROM tipi WHERE categoria = \'DOWNLOADS\' and tipo = "'.$tipo.'" ';
	$result_tipo=mysql_query($query, $db) or die(mysql_error($db));
	while($row = mysql_fetch_array($result_tipo)){
		extract($row);
		$id_tipo = $ID;
	}
	
	//CONTROLLO LATO CLIENT
	//assegno valori di default
	if($url == null || $url == ""){
		$url = "";
	}else{
		$url = "http://" . $url;
	}
	
	//controllo dimensione
	if($pdf_zip_tmp_name != null  && $pdf_zip_tmp_size > $DIM_PDF){
		header("location: ../../inserimento.php?errore=dimensione");
		$flag ="";
	}
	
	//inserisco i dati
	if($pdf_zip_tmp_name == null){
		//solo Titolo e URL(forse)
		$arg1 = mysql_real_escape_string($titolo);
		$arg2 = mysql_real_escape_string($descrizione);
		$arg3 = mysql_real_escape_string($url);
		$query = 'INSERT INTO downloads (titolo, descrizione, url, pdf_zip, id_tipo_download) VALUES ("'.$arg1.'", "'.$arg2.'", "'.$arg3.'", null, '.$id_tipo.')';
		$result = mysql_query($query, $db) or die(mysql_error($db));
		
		$flag ="";
		header("location: ../../inserimento.php?errore=nessuno");
		
	}else if($pdf_zip_tmp_name != null && $pdf_zip_tmp_size < $DIM_PDF){
		$flag="pdf_zip";
	}
	
	if($flag != "" ){
				
			if($flag == "pdf_zip"){
				$arg1 = mysql_real_escape_string($titolo);
				$arg2 = mysql_real_escape_string($descrizione);
				$arg3 = mysql_real_escape_string($url);
				$query = 'INSERT INTO downloads (titolo, descrizione, url, pdf_zip, id_tipo_download) VALUES ("'.$arg1.'", "'.$arg2.'", "'.$arg3.'", null, '.$id_tipo.')';
				$result = mysql_query($query, $db) or die(mysql_error($db));
				$last_id = mysql_insert_id();
			}
					
			//upload PDF o ZIP
			copy($pdf_zip_tmp_name , $fld_download . "/" . $pdf_zip_name);
			
			$query = 'UPDATE  downloads SET pdf_zip= "' . $pdf_zip_name . '" WHERE id = '.$last_id;
			$result = mysql_query($query, $db) or die(mysql_error($db));	
	
		
			header("location: ../../inserimento.php?errore=nessuno"); 
	}
}
?> 