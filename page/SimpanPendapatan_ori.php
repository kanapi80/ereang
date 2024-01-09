<?php
session_start();
include("../include/connect.php");
#error_reporting(0);
$link=$_POST['link'];
$bulan=$_POST['bulan'];
$jumlah=$_POST['jumlah'];
$periode=$_POST['periode'];
$nip=$_POST['nip'];
$date=date('Y-m-d');
$ket=$_POST['keterangan'];
$op=$_POST['op'];
$id=$_POST['id'];
$status=$_POST['status'];


$mysql 	= mysql_query('select * from t_pendapatan WHERE Id="'.$id.'"');
mysql_num_rows($mysql) ;
$data = mysql_fetch_array($mysql);

if($op!="edit")
{
	$statusq = "UPDATE x_SettingKlaim SET 
	tanggal='$date',jumlah='$jumlah',periode='$periode',nip='$nip',status='$status',tgl_input='$date',ket='$ket',KdCrb='$crb'
	 WHERE id = '$id'" ;
	$berhasil = mysql_query($statusq);
}else{   
$simpan="insert into t_billpendapatan 
(IdPendapatan,KodeGrupRekening,NamaGrupRekening,KodeRekening,NamaUraian,TahunAnggaran,Status,JumlahPen,Bulan,TglInput,Nip) 
values('$id','".$data['KodeGrupRekening']."','".$data['NamaGrupRekening']."','".$data['KodeRekening']."','".$data['NamaUraian']."','".$data['TahunAnggaran']."','$status','$jumlah','$bulan','$date','$nip')";
$berhasil=mysql_query($simpan); 
}

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