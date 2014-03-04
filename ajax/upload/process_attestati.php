<?php  include '../../settings.php'; ?>
<?php
if($_POST['id_3_edit'] != "00"){
	//MODIFICA
	$titolo = $_POST['titolo_3'];
	$url = $_POST['url_3'];
	if($url == null || $url == ""){
		$url = "";
	}else{
		$url = "http://" . $url;
	}
	
	//eseguo operazione SQL
	$arg1 = mysql_real_escape_string($titolo);
	$arg2 = mysql_real_escape_string($url);
	$query = 'UPDATE attestati SET titolo = "' . $arg1  .'", url = "' . $arg2  .'" WHERE id = '. $_POST['id_3_edit'];
	$result_edit = mysql_query($query, $db) or die(mysql_error($db));
	header("location: ../../inserimento.php?errore=modifica");
	
	
}else{
	//INSERISCI
	//campi
	$titolo = $_POST['titolo_3'];
	$immagine_tmp_name = $_FILES['immagine_3']['tmp_name'];
	$immagine_size = $_FILES['immagine_3']['size'];
	$pdf_zip_tmp_name = $_FILES['pdf_zip_3']['tmp_name'];
	$pdf_zip_name = $_FILES['pdf_zip_3']['name'];
	$pdf_zip_size = $_FILES['pdf_zip_3']['size'];
	$url = $_POST['url_3'];
	
	$flag ="";
	$last_id = null;
	//CONTROLLO LATO CLIENT
	//assegno valori di default
	if($url == null || $url == ""){
		$url = "";
	}else{
		$url = "http://" . $url;
	}
	
	//controllo dimensione
	if($immagine_tmp_name != null && $immagine_size > $DIM_PNG){
		header("location: ../../inserimento.php?errore=dimensione");
		$flag ="";
	}
	if($pdf_zip_tmp_name != null  && $pdf_zip_tmp_size > $DIM_PDF){
		header("location: ../../inserimento.php?errore=dimensione");
		$flag ="";
	}
	
	//inserisco i dati
	if( $pdf_zip_tmp_name == null && $immagine_tmp_name == null ) {
		//solo Titolo e URL(forse)
		$arg1 = mysql_real_escape_string($titolo);
		$arg3 = mysql_real_escape_string($url);
		$query = 'INSERT INTO attestati (titolo, immagine, url, pdf_zip) VALUES ("'.$arg1.'", null, "'.$arg3.'", null)';
		$result = mysql_query($query, $db) or die(mysql_error($db));
		
		$flag ="";
		header("location: ../../inserimento.php?errore=nessuno");
		
	}else if($immagine_tmp_name != null && $immagine_size < $DIM_PNG && $pdf_zip_tmp_name == null){
		$flag="img";
	}else if($pdf_zip_tmp_name != null && $pdf_zip_tmp_size < $DIM_PDF && $immagine_tmp_name == null){
		$flag="pdf_zip";
	}else if($immagine_tmp_name != null  && $immagine_size < $DIM_PNG && $pdf_zip_tmp_name != null  && $pdf_zip_tmp_size < $DIM_PDF){
		$flag="img_pdf_zip";
	}
	
	if($flag != "" ){
		
		if($flag == "img" || $flag=="img_pdf_zip"){
			//OK recupera le informazioni sull'immagine appena caricata
			list($width, $height, $type, $attr) = getimagesize($immagine_tmp_name);
			//si assicura che il file caricato sia effettivamente un tipo di immagine supportato
			switch($type){
				case IMAGETYPE_PNG:
					$image = imagecreatefrompng($immagine_tmp_name) or die('Errore generico nel file.');
					$ext = '.png';
					break;
				default:
					header("location: ../../inserimento.php?errore=tipofile");//NON CAPITA MAI
					break;
			}
	
			$arg1 = mysql_real_escape_string($titolo);
			$arg3 = mysql_real_escape_string($url);
			$query = 'INSERT INTO attestati (titolo, immagine, url, pdf_zip) VALUES ("'.$arg1.'", "temp", "'.$arg3.'", "")';
			$result = mysql_query($query, $db) or die(mysql_error($db));
		
			//recupera l'id che MySQL ha generato automaticamente
			$last_id = mysql_insert_id();
			//utilizzo il TIME come NOME dell'immagine
			$imagename = time()+1 . $ext;
	
			$query = 'UPDATE attestati SET immagine = "' . $imagename . '" WHERE immagine = "temp" and id = '.$last_id;
			$result = mysql_query($query, $db) or die(mysql_error($db));
		
			//crea miniatura
				$thumb = imagecreatetruecolor($thumb_width, $thumb_height);
				imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);
			//ridimensiona sorgente
				$new_image = imagecreatetruecolor($new_width, $new_height);
				imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			
			//salva l'immagine nella sua destinazione finale
			switch($type){
				case IMAGETYPE_PNG:
					imagepng($new_image, $fld_attestati . '/' . $imagename);
					imagepng($thumb, $fld_attestati_thumbs . '/' . $imagename);
					break;
			}
			imagedestroy($image);
			imagedestroy($new_image);
			imagedestroy($thumb);
			
		}
		
		if($flag == "pdf_zip" || $flag == "img_pdf_zip"){
			
			if($flag == "pdf_zip"){
				$arg1 = mysql_real_escape_string($titolo);
				$arg3 = mysql_real_escape_string($url);
				$query = 'INSERT INTO attestati (titolo, immagine, url, pdf_zip) VALUES ("'.$arg1.'", null, "'.$arg3.'", null)';
				$result = mysql_query($query, $db) or die(mysql_error($db));
				$last_id = mysql_insert_id();
			}
					
			//upload PDF o ZIP
			copy($pdf_zip_tmp_name , $fld_attestati . "/" . $pdf_zip_name);
			
			$query = 'UPDATE  attestati SET pdf_zip= "' . $pdf_zip_name . '" WHERE id = '.$last_id;
			$result = mysql_query($query, $db) or die(mysql_error($db));	
		}
		
			header("location: ../../inserimento.php?errore=nessuno"); 
	}
}
?> 