<?
include("../include/connect.php");
$id=$_POST['idbill'];
$IdBel=$_POST['idbel'];
$link=$_POST['link'];
$poto= $_POST['jumlah'];
$jumlah=str_replace(['Rp.','.'],['',''],$poto);





@mysql_query("update t_billbelanja set RealisasiAnggaran='$jumlah' where Id= '".$id."'  ")or die(mysql_error());

$tnota=mysql_query('SELECT SUM(RealisasiAnggaran) as Realisasi from t_billbelanja where IdBelanja="'.$IdBel.'"   ');
$data=mysql_fetch_array($tnota); 

@mysql_query("update t_belanja set RealisasiAnggaran='$data[Realisasi]' where Id= '".$IdBel."'  ")or die(mysql_error());


header("Location:../index.php?link=BELANJA&verif=1&id=$IdBel");
?>