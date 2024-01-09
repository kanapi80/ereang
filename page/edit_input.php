<?php
	include("../include/connect.php");
	$id	= $_GET['idx'];
	$link =$_GET['link'];
	$name=$_GET['nip'];
$query = "UPDATE m_pegawai SET ST_INDEK ='TRX' WHERE ID = '$id'  " ;
$hasil = mysql_query($query);
header("Location:../index.php?link=$link");



	?>
