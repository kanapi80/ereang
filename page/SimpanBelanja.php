<?php
session_start();
include("../include/connect.php");
#error_reporting(0);
$link=$_POST['link'];
$bulan=$_POST['bulan'];
$poto= $_POST['jumlah'];
$jumlah=str_replace(['Rp.','.'],['',''],$poto);
//$jumlah=$_POST['jumlah'];
$periode=$_POST['periode'];
$nip=$_POST['nip'];
$date=date('Y-m-d');
$ket=$_POST['keterangan'];
$op=$_POST['op'];
$id=$_POST['id'];
$status=$_POST['status'];


$mysql 	= mysql_query('select * from t_belanja WHERE Id="'.$id.'"');
mysql_num_rows($mysql) ;
$data = mysql_fetch_array($mysql);
$thn=$data['TahunAnggaran'];
$blnrealisasi="$bulan-$thn";
$up=$data['RealisasiAnggaran'];
$JumlahRealisasi=$up+$jumlah;

$simpan="insert into t_billbelanja
(IdBelanja,BlnRealisasi,TahunAnggaran,RealisasiAnggaran,TglInput,Nip,NamaBelanja,KdBelanja,KdPptk,NamaPptk) 
values('$id','$bulan','".$data['TahunAnggaran']."','$jumlah','$date','$nip','".$data['NamaBelanja']."','".$data['KdBelanja']."','".$data['KdPptk']."','".$data['NamaPptk']."')";
$berhasil=mysql_query($simpan); 

@mysql_query("UPDATE t_belanja 
SET RealisasiAnggaran='$JumlahRealisasi' where Id='".$id."' ")or die(mysql_error());


if($berhasil){
echo "<SCRIPT>
<!--
document.location='../index.php?link=$link&verif=1&id=$id';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
alert('Gagal Menyimpan!!');
document.location='../index.php?link=$link&verif=1&id=$id';
//-->
</SCRIPT>";
} 

mysql_close();
?>