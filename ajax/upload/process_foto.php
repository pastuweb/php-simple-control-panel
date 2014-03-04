<?php  include '../../settings.php'; ?>
<?php
if($_POST['id_5_edit'] != "00"){
	//MODIFICA
	$titolo = $_POST['titolo_5'];
	$descrizione = $_POST['descrizione_5'];
	
	//eseguo operazione SQL
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($descrizione);
	$query = 'UPDATE foto SET titolo = "' . $arg1  .'", descrizione = "' . $arg2  .'" WHERE id = '. $_POST['id_5_edit'];
	$result_edit = mysql_query($query, $db) or die(mysql_error($db));
	header("location: ../../inserimento.php?errore=modifica");
	
	
}else{
	//INSERISCI
	//campi
	$titolo = $_POST['titolo_5'];
	$immagine_tmp_name = $_FILES['foto_5']['tmp_name'];
	$immagine_size = $_FILES['foto_5']['size'];
	$descrizione = $_POST['descrizione_5'];
	$tipo = $_POST['tipo_foto'];
	
	$id_tipo = null;
	
	$query='SELECT ID  
			FROM tipi WHERE categoria = \'FOTO\' and tipo = "'.$tipo.'" ';
	$result_tipo=mysql_query($query, $db) or die(mysql_error($db));
	while($row = mysql_fetch_array($result_tipo)){
		extract($row);
		$id_tipo = $ID;
	}
	
	$flag ="";
	$last_id = null;
	//CONTROLLO LATO CLIENT
	//assegno valori di default
	if($descrizione == null || $descrizione == ""){
		$descrizione = "";
	}
	
	//controllo dimensione
	if($immagine_tmp_name != null && $immagine_size > $DIM_PNG){
		header("location: ../../inserimento.php?errore=dimensione");
		$flag ="";
	}
	
	//inserisco i dati
	if($immagine_tmp_name == null){
		//solo Titolo e Tipo
		$arg1 = mysql_real_escape_string($titolo);
		$arg2 = mysql_real_escape_string($descrizione);
		$query = 'INSERT INTO foto (titolo, descrizione, foto, id_tipo_foto) VALUES ("'.$arg1.'", "'.$args2.'", null, '.$id_tipo.')';
		$result = mysql_query($query, $db) or die(mysql_error($db));
		
		$flag ="";
		header("location: ../../inserimento.php?errore=nessuno");
		
	}else if($immagine_tmp_name != null && $immagine_size < $DIM_PNG){
		$flag="img";
	}
	
	if($flag != "" ){
		
		if($flag == "img"){
			//OK recupera le informazioni sull'immagine appena caricata
			list($width, $height, $type, $attr) = getimagesize($immagine_tmp_name);
			//si assicura che il file caricato sia effettivamente un tipo di immagine supportato
			switch($type){
				case IMAGETYPE_PNG:
					$image = imagecreatefrompng($immagine_tmp_name) or die('Errore generico nel file.');
					$ext = '.png';
					break;
				case IMAGETYPE_JPEG:
					$image = imagecreatefromjpeg($immagine_tmp_name) or die('Errore generico nel file.');
					$ext = '.jpg';
					break;
				default:
					header("location: ../../inserimento.php?errore=tipofile");//NON CAPITA MAI
					break;
			}
	
			$arg1 = mysql_real_escape_string($titolo);
			$arg2 = mysql_real_escape_string($descrizione);
			$query = 'INSERT INTO foto (titolo, descrizione, foto, id_tipo_foto) VALUES ("'.$arg1.'", "'.$arg2.'", "temp", '.$id_tipo.')';
			$result = mysql_query($query, $db) or die(mysql_error($db));
		
			//recupera l'id che MySQL ha generato automaticamente
			$last_id = mysql_insert_id();
			//utilizzo il TIME come NOME dell'immagine
			$imagename = time()+1 . $ext;
	
			$query = 'UPDATE foto SET foto = "' . $imagename . '" WHERE foto = "temp" and id = '.$last_id;
			$result = mysql_query($query, $db) or die(mysql_error($db));
		
			//crea miniatura
				$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
				imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
			//ridimensiona sorgente
					$new_width = $width * 80 / 100;
					$new_height = $height * 80 / 100;
					
					
				$new_image = imagecreatetruecolor($new_width, $new_height);
				imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			
			//salva l'immagine nella sua destinazione finale
			switch($type){
				case IMAGETYPE_PNG:
					imagepng($new_image, $fld_foto . '/' . $imagename);
					imagepng($thumb, $fld_foto_thumbs . '/' . $imagename);
					break;
				case IMAGETYPE_JPEG:
					imagejpeg($new_image, $fld_foto . '/' . $imagename);
					imagejpeg($thumb, $fld_foto_thumbs . '/' . $imagename);
					break;
			}
			imagedestroy($image);
			imagedestroy($new_image);
			imagedestroy($thumb);
			
		}
			
		header("location: ../../inserimento.php?errore=nessuno"); 
	}
}
?> 