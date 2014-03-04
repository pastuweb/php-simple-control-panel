<?php include '../settings.php'; ?>
<?php
//ricevo i parametri AJAX
$Tabs = $_POST['tabs'];
$idrecord = $_POST['idrecord'];

//eseguo operazione SQL

$result_tabs = null;
if($Tabs == 1){
	$tabella = "pubblicita";
	$query='SELECT TITOLO, URL 
			FROM '.$tabella.' 
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 2){
	$tabella = "links";
	$query='SELECT TITOLO, URL 
			FROM '.$tabella.'  
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 3){
	$tabella = "attestati";
	$query='SELECT TITOLO, URL 
			FROM '.$tabella.' 
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 5){
	$tabella = "foto";
	$query='SELECT  TITOLO, DESCRIZIONE 
			FROM '.$tabella.' 
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 6){
	$tabella = "downloads";
	$query='SELECT TITOLO, DESCRIZIONE, URL 
			FROM '.$tabella.' 
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 7){
	$tabella = "lavori";
	$query='SELECT TITOLO, DESCRIZIONE, URL 
			FROM '.$tabella.'  
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 9){
	$tabella = "listino";
	$query='SELECT TITOLO, DESCRIZIONE, PREZZO  
			FROM '.$tabella.' 
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}else if($Tabs == 10){
	$tabella = "video";
	$query='SELECT TITOLO, DESCRIZIONE 
			FROM '.$tabella.' 
			WHERE ID='.$idrecord;
	$result_tabs=mysql_query($query, $db) or die(mysql_error($db));
}

//creo la risposta XML
header('Content-Type: text/xml');     
header('Cache-Control: no-cache');
header('pragma: no-cache');
echo '<?xml version="1.0"?>';     
echo "<response>";
	echo "<edit>";
	while($row = mysql_fetch_array($result_tabs)){
		extract($row);
		if($Tabs == 1){
			echo '<riga titolo="'.$TITOLO.'" url="'.$URL.'"></riga>';
		}else if($Tabs == 2){
			echo '<riga titolo="'.$TITOLO.'" url="'.$URL.'" ></riga>';
		}else if($Tabs == 3){
			echo '<riga titolo="'.$TITOLO.'" url="'.$URL.'" ></riga>';
		}else if($Tabs == 5){
			echo '<riga titolo="'.$TITOLO.'" >'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 6){
			echo '<riga titolo="'.$TITOLO.'" url="'.$URL.'" >'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 7){
			echo '<riga titolo="'.$TITOLO.'" url="'.$URL.'" >'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 9){
			echo '<riga titolo="'.$TITOLO.'" prezzo="'.$PREZZO.'">'.$DESCRIZIONE.'</riga>';
		}else if($Tabs == 10){
			echo '<riga titolo="'.$TITOLO.'">'.$DESCRIZIONE.'</riga>';
		}
	}
	echo "</edit>";
echo "</response>";
 ?>