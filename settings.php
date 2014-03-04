<?php
$sito_web = "domino.com";
$username = "username";
$password = "password";

$thumb_width = 122;
$thumb_height = 142;

$new_width = 400;
$new_height = 300;
//dimensioni file upload
$DIM_PNG = 5242880;
$DIM_PDF = 6291456;
$DIM_VIDEO = 6291456;

/****************  CARTELLE ********************/
$fld_pubblicita = "../../pubblicita"; //contiene .png(formato originale)
$fld_pubblicita_thumbs = "../../pubblicita/thumbs"; //contiene .png(formato ridotto)

$fld_attestati = "../../attestati"; //contiene .png (formato originale), .pdf e .zip
$fld_attestati_thumbs = "../../attestati/thumbs"; //contiene .png(formato ridotto)

$fld_foto = "../../foto"; //contiene .png(formato originale)
$fld_foto_thumbs = "../../foto/thumbs"; //contiene .png(formato ridotto)

$fld_download = "../../downloads"; //contiene .zip e .pdf

$fld_lavori = "../../lavori"; //contiene .png(formato originale), .zip e .pdf
$fld_lavori_thumbs = "../../lavori/thumbs"; //contiene .png(formato ridotto)

$fld_video = "../../video"; //contiene .mp4

/****************  Parametri per accesso al DATABASE ********************/
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'admin');

$db=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or 
die('Unable to connect. Check your connection parameter');
mysql_select_db(DB_DATABASE,$db) or die(mysql_error($db));
mysql_query("set names 'utf8'"); //MOLTO IMPORTANTE per la visualizzazione dei caratteri accentati.

/****************  Attivazione SEZIONI del Pannello di Controllo (1=attivo, 0=disattivo) ********************/
$flag_foto = 1;
$flag_video = 1; 
$flag_lavori = 1; 
$flag_pubblicita = 1; 
$flag_links = 1; 
$flag_attestati = 1; 
$flag_downloads = 1;
$flag_altro = 1;
	$flag_testata = 1;
	$flag_CV_ita = 1;
	$flag_CV_eng = 1;
	$flag_omaggi = 1;
	$flag_novita = 1;
	$flag_news = 1;
	$flag_messaggio_aziendale = 1;

//sezioni particolari
$flag_listino = 1;

/****************  Tabella TIPI ********************/
/*
 * Attenzione: La tabella TIPI la modifico solo IO!!!!
 */
//Elenco TIPO LINKS
if($flag_links == 1){
$query='SELECT DISTINCT tipo 
		FROM tipi WHERE categoria = \'LINKS\' ORDER BY TIPO';
$result_tipo_links=mysql_query($query, $db) or die(mysql_error($db));
}
//Elenco TIPO FOTO
if($flag_foto == 1){
$query='SELECT DISTINCT tipo 
		FROM tipi WHERE categoria = \'FOTO\' ORDER BY TIPO';
$result_tipo_foto=mysql_query($query, $db) or die(mysql_error($db));
}
//Elenco TIPO VIDEO
if($flag_video == 1){
$query='SELECT DISTINCT tipo 
		FROM tipi WHERE categoria = \'VIDEO\' ORDER BY TIPO';
$result_tipo_video=mysql_query($query, $db) or die(mysql_error($db));
}
//Elenco TIPO DOWNLOADS
if($flag_downloads == 1){
$query='SELECT DISTINCT tipo 
		FROM tipi WHERE categoria = \'DOWNLOADS\' ORDER BY TIPO';
$result_tipo_downloads=mysql_query($query, $db) or die(mysql_error($db));
}
//Elenco TIPO LAVORI
if($flag_lavori == 1){
$query='SELECT DISTINCT tipo 
		FROM tipi WHERE categoria = \'LAVORI\' ORDER BY TIPO';
$result_tipo_lavori=mysql_query($query, $db) or die(mysql_error($db));
}
//Elenco TIPO LISTINO
if($flag_listino == 1){
$query='SELECT DISTINCT tipo 
		FROM tipi WHERE categoria = \'LISTINO\' ORDER BY TIPO';
$result_tipo_listino=mysql_query($query, $db) or die(mysql_error($db));
}
?>