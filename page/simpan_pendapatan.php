<?php
session_start();
include("../include/connect.php");

$rupiah= $_POST['rupiah'];
$klaim=str_replace(['Rp.','.'],['',''],$rupiah);
$link=$_POST['linked'];
$KET='SELESAI';
$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];
$periode=$_POST['periode'];
$waktu=date('Y-m-d h:i:sa');
$NIP=$_SESSION['NIP'];
$kd_ruang=$_POST['kd_ruang'];

$query2 = "UPDATE t_penremun SET JUMLAH ='".$klaim."',KET='SELESAI',NIP='".$NIP."',TGL_INPUT='".$waktu."'
WHERE PERIODE = '".$periode."' and  KD_RUANG = '".$kd_ruang."'" ;
$hasil2 = mysql_query($query2);


$just = "UPDATE t_billremun SET JASA =PERSEN_INDEX * '".$klaim."'/100
WHERE PERIODE = '".$periode."' and  KD_RUANG = '".$_POST['kd_ruang']."' " ;
$jasa = mysql_query($just);

 if($hasil2){ 
	   echo "<SCRIPT>
				document.location='../index.php?link=$link';
			</SCRIPT>";
      }else{
        echo "<SCRIPT>
alert('Gagal Menyimpan !!');
document.location='../index.php?link=$link';
</SCRIPT>";
      }
?>
