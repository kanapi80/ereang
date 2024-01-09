<?php

 include("../include/connect.php");
date_default_timezone_set('Asia/Jakarta'); 
$ID=$_POST['ID'];
$TJ=$_POST['TJ'];
$KH=$_POST['KH'];
$BK=$_POST['BK'];
$link=$_POST['link'];

@mysql_query(" UPDATE m_pegawai 
SET TJ='$TJ', KH='$KH',BK='$BK', ST_INDEK='SELESAI' WHERE ID='$ID'  ")or die(mysql_error());

@mysql_query(" UPDATE m_pegawai 
SET XX=X1+X2+X3+X4+X5+X6+TJ+KH+BK WHERE ID='$ID'  ")or die(mysql_error());

echo "<SCRIPT>
document.location='../index.php?link=$link';
</SCRIPT>";
/*}
else{
echo "<SCRIPT>
alert('Gagal Menyimpan !!');
document.location='../index.php?link=PEGAWAI';
</SCRIPT>";
}*/
mysql_close();


?>