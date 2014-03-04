<?php include '../settings.php'; ?>
<?php
//ricevo i parametri AJAX
$idrecord = $_POST['idrecord'];
$tabella = $_POST['tabella'];

//eseguo operazione SQL
$query = 'DELETE FROM '.$tabella.' WHERE id = '. $idrecord;
$result_delete = mysql_query($query, $db) or die(mysql_error($db));

//creo la risposta XML
header('Content-Type: text/xml');     
header('Cache-Control: no-cache');
header('pragma: no-cache');
echo '<?xml version="1.0"?>';     
echo "<response>";
	
	echo "<delete>";
 	if($result_delete)
		echo "OK";
	else
		echo "KO";
	echo "</delete>";
	
echo "</response>";
 ?>