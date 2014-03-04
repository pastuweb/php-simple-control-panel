<?php include '../settings.php'; ?>
<?php
//ricevo i parametri AJAX
$cifra = $_POST['cifra'];
$tipo = $_POST['tipo'];
$tabella = $_POST['tabella'];
$id_tipo = null;

$query='SELECT ID  
		FROM tipi WHERE categoria = \'LISTINO\' and tipo = "'.$tipo.'" ';
$result_tipo=mysql_query($query, $db) or die(mysql_error($db));
while($row = mysql_fetch_array($result_tipo)){
	extract($row);
	$id_tipo = $ID;
}
//eseguo operazione SQL
$query = 'UPDATE '.$tabella.' SET prezzo = prezzo+' . $cifra  .' WHERE ID_TIPO_LISTINO = '.$id_tipo;
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