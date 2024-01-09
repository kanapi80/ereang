<?php
session_start();
include("../include/connect.php");
#error_reporting(0);
$link = $_POST['link'];
$bulan = $_POST['bulan'];
$jumlah = $_POST['jumlah'];
$periode = $_POST['periode'];
$nip = $_POST['nip'];
$date = date('Y-m-d');
$ket = $_POST['keterangan'];
$op = $_POST['op'];
$id = $_POST['id'];
$status = $_POST['status'];
$link = $_POST['link'];
$idx = $_POST['idx'];
// $op = '1';
// $id = $_GET['id'];


$mysql 	= mysql_query('select * from t_pendapatan WHERE Id="' . $id . '"');
mysql_num_rows($mysql);
$data = mysql_fetch_array($mysql);

if ($op == "edit") {
	$statusq = "UPDATE t_pendapatan SET 
	PaguAnggaran='$jumlah'
	 WHERE Id = '$id'";
	$berhasil = mysql_query($statusq);
} elseif ($op == "simpan") {
	$simpan = "insert into t_billpendapatan 
(IdPendapatan,KodeGrupRekening,NamaGrupRekening,KodeRekening,NamaUraian,TahunAnggaran,Status,JumlahPen,Bulan,TglInput,Nip) 
values('$id','" . $data['KodeGrupRekening'] . "','" . $data['NamaGrupRekening'] . "','" . $data['KodeRekening'] . "','" . $data['NamaUraian'] . "','" . $data['TahunAnggaran'] . "','$status','$jumlah','$bulan','$date','$nip')";
	$berhasil = mysql_query($simpan);
} elseif ($op == "hapus") {
	$berhasil = "delete from t_billpendapatan where Id='" . $idx . "' ";
	mysql_query($berhasil);
}

if ($berhasil) {
	echo "<SCRIPT>
<!--
document.location='../index.php?link=$link&verif=1&id=$id';
//-->
</SCRIPT>";
} else {
	echo "<SCRIPT>
<!--
alert('Gagal Menyimpan!!');
document.location='../index.php?link=$link&verif=1&id=$id';
//-->
</SCRIPT>";
}

mysql_close();
