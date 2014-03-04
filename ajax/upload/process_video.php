<?php  include '../../settings.php'; ?>
<?php
if($_POST['id_10_edit'] != "00"){
	//MODIFICA
	$titolo = $_POST['titolo_10'];
	$descrizione = $_POST['descrizione_10'];

	
	//eseguo operazione SQL
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($descrizione);
	$query = 'UPDATE video SET titolo = "' . $arg1  .'", descrizione = "' . $arg2  .'" WHERE id = '. $_POST['id_10_edit'];
	$result_edit = mysql_query($query, $db) or die(mysql_error($db));
	header("location: ../../inserimento.php?errore=modifica");
	
	
}else{
	//INSERISCI
	//campi
	$titolo = $_POST['titolo_10'];
	$descrizione = $_POST['descrizione_10'];
	$video_tmp_name = $_FILES['video_10']['tmp_name'];
	$video_name = $_FILES['video_10']['name'];
	$video_size = $_FILES['video_10']['size'];
	$tipo = $_POST['tipo_video'];
	
	$id_tipo = null;
	$flag ="";
	$last_id = null;
	
	$query='SELECT ID  
			FROM tipi WHERE categoria = \'VIDEO\' and tipo = "'.$tipo.'" ';
	$result_tipo=mysql_query($query, $db) or die(mysql_error($db));
	while($row = mysql_fetch_array($result_tipo)){
		extract($row);
		$id_tipo = $ID;
	}
	
	//CONTROLLO LATO CLIENT
	
	//controllo dimensione
	if($video_tmp_name != null  && $video_tmp_size > $DIM_VIDEO){
		header("location: ../../inserimento.php?errore=dimensione");
		$flag ="";
	}
	
	//inserisco i dati
	if($video_tmp_name == null){
		//solo Titolo e URL(forse)
		$arg1 = mysql_real_escape_string($titolo);
		$arg2 = mysql_real_escape_string($descrizione);
		$query = 'INSERT INTO video (titolo, descrizione, video, id_tipo_video) VALUES ("'.$arg1.'", "'.$arg2.'", null, '.$id_tipo.')';
		$result = mysql_query($query, $db) or die(mysql_error($db));
		
		$flag ="";
		header("location: ../../inserimento.php?errore=nessuno");
		
	}else if($video_tmp_name != null && $video_tmp_size < $DIM_VIDEO){
		$flag="video";
	}
	
	if($flag != "" ){
		
			if($flag == "video"){
				$arg1 = mysql_real_escape_string($titolo);
				$arg2 = mysql_real_escape_string($descrizione);
				$query = 'INSERT INTO video (titolo, descrizione, video, id_tipo_video) VALUES ("'.$arg1.'", "'.$arg2.'", null, '.$id_tipo.')';
				$result = mysql_query($query, $db) or die(mysql_error($db));
				$last_id = mysql_insert_id();
			}
					
			//upload MP4
			move_uploaded_file($video_tmp_name , $fld_video . "/" . $video_name);
			
			$query = 'UPDATE  video SET video= "' . $video_name . '" WHERE id = '.$last_id;
			$result = mysql_query($query, $db) or die(mysql_error($db));	
		
			header("location: ../../inserimento.php?errore=nessuno"); 
	}
}
?> 