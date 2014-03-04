<?php include '../settings.php'; ?>
<?php
//ricevo i parametri AJAX
$campo = $_POST['campo'];
$testo = $_POST['testo'];

$temp = mysql_real_escape_string($testo);

//eseguo operazione SQL
$query = 'UPDATE altro SET '.$campo.' = "' . $temp  .'" WHERE id =1';
$result_edit = mysql_query($query, $db) or die(mysql_error($db));

//creo la risposta XML
header('Content-Type: text/xml');     
header('Cache-Control: no-cache');
header('pragma: no-cache');
echo '<?xml version="1.0"?>';     
echo "<response>";
	
	echo "<edit>";
 	if($result_edit)
		echo "OK";
	else
		echo "KO";
	echo "</edit>";
	
echo "</response>";
 ?>