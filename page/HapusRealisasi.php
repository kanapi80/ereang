<?
include("../include/connect.php");
$id=$_GET['id'];
$IdBel=$_GET['idBel'];
$link=$_GET['link'];

$ins="delete from t_billbelanja where Id='".$id."' ";
mysql_query($ins);


$tnota=mysql_query('SELECT SUM(RealisasiAnggaran) as Realisasi from t_billbelanja where IdBelanja="'.$IdBel.'"   ');
$data=mysql_fetch_array($tnota); 

@mysql_query("update t_belanja set RealisasiAnggaran='$data[Realisasi]' where Id= '".$IdBel."'  ")or die(mysql_error());


header("Location:../index.php?link=$link&verif=1&id=$IdBel");
?>