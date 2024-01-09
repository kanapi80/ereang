<?php 
ini_set('display_errors',0);	
ini_set('memory_limit' , '128M');
 $hostname = '192.168.21.26';
 $database = 'ereang';
 $username = 'kanapi';
 $password = 'bangkit';
//   $hostname = '192.168.71.3';
//  $database = 'aplikasi';
//  $username = 'admin';
//  $password = 'S!MRSGos2';

/*$hostname = 'localhost';
$database = 'ereang';
$username = 'root';
$password = '';*/
$connect = mysql_connect($hostname, $username, $password,true,65536) or die(mysql_error()); 
mysql_select_db($database,$connect)or die(mysql_error());
define ('_BASE_','http://'.$_SERVER['HTTP_HOST'].'/ereang/');
define ('_POPUPTIME_','50000');

$data=mysql_fetch_array(mysql_query("SELECT * FROM profil"));

$rstitle = $data['rstitle'];
$singrstitl = $data['singrstitl'];
$singhead1 = $data['singhead1'];
$singsurat = $data['singsurat'];
$header1 = $data['header1'];
$header2 = $data['header2'];
$header3 = $data['header3'];
$header4 = $data['header4'];
$KDRS = $data['kdrs'];
$KelasRS = $data['KelasRS'];
$NamaRS = $data['NamaRS'];
$KDTarifINACBG = $data['kdtarifnacbg'];