<?
date_default_timezone_set('Asia/Jakarta');
session_start();
include("../include/connect.php");
$IdBel=$_POST['id'];
$link=$_POST['link'];
$poto= $_POST['jumlah'];
$jumlah=str_replace(['Rp.','.'],['',''],$poto);
$pptk= $_POST['pptk'];
$tglinput=date('Y-m-d');
$user=$_SESSION['NIP'];
$namabelanja=$_POST['NamaBelanja'];
$pagu=$_POST['pagu'];

$mysql 	= mysql_query('select * from t_belanja WHERE Id="'.$IdBel.'"');
mysql_num_rows($mysql) ;
$datax = mysql_fetch_array($mysql);
$id=$datax['Id'];
$pagu=$datax['PaguAnggaran'];
$kdpptk=$datax['KdPptk'];
$thn=$datax['TahunAnggaran'];


$simpan="insert into t_riwayatpagu
(Id,PaguAnggaran,KdPptk,TahunAnggaran,TglPerubahan,User,PaguUpdate) 
values('$id','$pagu','$kdpptk','$thn','$tglinput','$user','$jumlah')";
$berhasil=mysql_query($simpan); 


@mysql_query("update t_belanja set NamaBelanja='$namabelanja',PaguAnggaran='$jumlah', KdPptk='$pptk' where Id= '".$IdBel."'  ")or die(mysql_error());
$tnota=mysql_query('SELECT NamaPptk,Nama from m_pptk where KodePptk="'.$pptk.'"   ');
$data=mysql_fetch_array($tnota); 
@mysql_query("update t_belanja set NamaPptk='$data[NamaPptk]',NAMA='$data[Nama]' where Id= '".$IdBel."'  ")or die(mysql_error());



header("Location:../index.php?link=BELANJA&edit=1&id=$IdBel");
?>