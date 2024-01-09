<?php
session_start();
include "../include/connect.php";
date_default_timezone_set('Asia/Jakarta');
#error_reporting(0);

$id=$_POST['id'];
$link=$_POST['link'];
 if($_POST['opsi']=="foto"){
 

$foto = $_FILES["foto"]["name"];
$tanggal=date('YmdHis');


$uploadDir = "../img/foto/";
 // Apabila ada file yang di-upload
 if(is_uploaded_file($_FILES['foto']['tmp_name'])){
 $uploadFile = $_FILES['foto'];


// Extract nama file
 $extractFile = pathinfo($uploadFile['name']);
 $size = $_FILES['foto']['size']; //untuk mengetahui ukuran file
 $tipe = $_FILES['foto']['type'];// untuk mengetahui tipe file
 
 //Dibawah ini adalah untuk mengatur format gambar yang dapat di uplada ke server.
 //Anda bisa tambahakan jika ingin memasukan format yang lain tergantung kebutuhan anda.
 
 $exts =array('image/jpg','image/jpeg','image/pjpeg','image/png','image/x-png');
 if(!in_array(($tipe),$exts)){
 echo 'Format file yang di izinkan hanya JPG, JPEG dan PNG';
 exit;
 }
 // dibawah ini script untuk mengatur ukuran file yang dapat di upload ke server
 if(($size !=0)&&($size>5000000)){
 exit('Ukuran gambar terlalu besar (Max 5 Mb)!');
 }
 }
 
 $sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
 $handle = opendir($uploadDir);
 while(false !== ($file = readdir($handle))){ // Looping isi file pada directory tujuan
 // Apabila ada file dengan awalan yg sama dengan nama file di uplaod
 if(strpos($file,$extractFile['filename']) !== false)
 $sameName++; // Tambah data file yang sama
 }
 
 /* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
 * nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
// $newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];
 $newName = empty($sameName) ? $uploadFile['name'] : $id.'('.$tanggal.').'.$extractFile['extension'];
# $newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$tanggal.').'.$extractFile['extension'];
 
 if(move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$newName)){
  
$rubah=mysql_query("update m_pptk set Foto='$newName' where KodePptk='$id' ");

// $sql = "INSERT INTO r_pegawai (GRUP,IDP,DATA1)
// VALUES ('FOTO','$id', '$newName')";
// $rubah2 = mysql_query($sql);

echo "<SCRIPT>
<!--
document.location='../index.php?link=$link';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../index.php?link=$link!';
//-->
</SCRIPT>";
}

}
 
 
 
 
 
 
 if($_POST['opsi']=="biodata"){
  
$nama=$_POST['nama'];
$gd=$_POST['gd'];
$gb=$_POST['gb'];
$jk=$_POST['jk'];
#$tmp_lahir=$_POST['tmp_lahir'];
$tmp_lahir=ucwords(strtolower($_POST['tmp_lahir']));
$tgl_lahir=$_POST['tgl_lahir'];
$alamat=$_POST['alamat'];
#$desa=$_POST['desa'];
$desa=ucwords(strtolower($_POST['desa']));
#$kec=$_POST['kec'];
$kec=ucwords(strtolower($_POST['kec']));
#$kab=$_POST['kab'];
$kab=ucwords(strtolower($_POST['kab']));
$kawin=$_POST['kawin'];
$gold=$_POST['gold'];
$agama=$_POST['agama'];
$ktp=$_POST['ktp'];
$telp=$_POST['telp'];
$email=$_POST['email'];

$status=$_POST['status'];
$tgl_status=$_POST['tgl_status'];
$no_induk=$_POST['no_induk'];
$gol=$_POST['gol'];
$profesi=$_POST['profesi'];
$jabatan=$_POST['jabatan'];
$ruangan=$_POST['ruangan'];
$unit=$_POST['unit'];

$pend=$_POST['pend'];
$jurusan=$_POST['jurusan'];
$kampus=$_POST['kampus'];
$no_ijazah=$_POST['no_ijazah'];
$no_mhs=$_POST['no_mhs'];
$tgl_ijazah=$_POST['tgl_ijazah'];

$no_str=$_POST['no_str'];
$tgl_str=$_POST['tgl_str'];
$no_sipp=$_POST['no_sipp'];
$tgl_sipp=$_POST['tgl_sipp'];

 
$rubah=mysql_query("update m_pegawai set GD='$gd',NAMA='".mysql_real_escape_string($nama)."',GB='$gb',TMP_LAHIR='$tmp_lahir',TGL_LAHIR='$tgl_lahir',JK='$jk',STATUS='$status',TGL_STATUS='$tgl_status',NO_INDUK='$no_induk',GOL='$gol',ALAMAT='$alamat',DESA='$desa',KEC='$kec',KAB='$kab',KAWIN='$kawin',GOLD='$gold',AGAMA='$agama',KTP='$ktp',TELP='$telp',EMAIL='$email',PROFESI='$profesi',RUANGAN='$ruangan',UNIT='$unit',JABATAN='$jabatan',PEND='$pend',JURUSAN='$jurusan',KAMPUS='$kampus',NO_IJAZAH='$no_ijazah',NO_MHS='$no_mhs',TGL_IJAZAH='$tgl_ijazah',NO_STR='$no_str',TGL_STR='$tgl_str',NO_SIPP='$no_sipp',TGL_SIPP='$tgl_sipp' where ID='$id' ");
 

if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
 
 
 
 
 
 if($_POST['opsi']=="pendidikan"){
   
$institusi=$_POST['institusi']; 
$jenjang=$_POST['jenjang']; 
$jurusan=$_POST['jurusan']; 
$tahun=$_POST['tahun']; 


$sql = "INSERT INTO r_pegawai (GRUP,IDP,IDX,IDY,DATA1,DATA2)
VALUES ('PENDIDIKAN','$id','$jenjang', '$jurusan', '$institusi', '$tahun')";
$rubah = mysql_query($sql);


if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
  if($_POST['opsi']=="penempatan"){
   
$tgl1=$_POST['tgl1']; 
$tgl2=$_POST['tgl2']; 
$ruangan=$_POST['ruangan']; 
$jabatan=$_POST['jabatan']; 


$sql = "INSERT INTO r_pegawai (GRUP,IDP,IDX,IDY,TGL1,TGL2)
VALUES ('PENEMPATAN','$id','$ruangan', '$jabatan', '$tgl1', '$tgl2')";
$rubah = mysql_query($sql);


if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
 
  if($_POST['opsi']=="pelatihan"){
   
$tgl1=$_POST['tgl1']; 
$tgl2=$_POST['tgl2']; 
$pelatihan=$_POST['pelatihan']; 
$institusi=$_POST['institusi']; 


$sql = "INSERT INTO r_pegawai (GRUP,IDP,IDX,DATA1,TGL1,TGL2)
VALUES ('PELATIHAN','$id','$pelatihan', '$institusi', '$tgl1', '$tgl2')";
$rubah = mysql_query($sql);


if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
 
 
 
 if($_POST['opsi']=="dokumen"){
 
$dokumen=$_POST['dokumen']; 
$keterangan=$_POST['keterangan']; 

$foto = $_FILES["foto"]["name"];
$tanggal=date('YmdHis');


$uploadDir = "../kepegawaian/file/";
 // Apabila ada file yang di-upload
 if(is_uploaded_file($_FILES['foto']['tmp_name'])){
 $uploadFile = $_FILES['foto'];


// Extract nama file
 $extractFile = pathinfo($uploadFile['name']);
 $size = $_FILES['foto']['size']; //untuk mengetahui ukuran file
 $tipe = $_FILES['foto']['type'];// untuk mengetahui tipe file
 
 //Dibawah ini adalah untuk mengatur format gambar yang dapat di uplada ke server.
 //Anda bisa tambahakan jika ingin memasukan format yang lain tergantung kebutuhan anda.
 
 // dibawah ini script untuk mengatur ukuran file yang dapat di upload ke server
 if(($size !=0)&&($size>5000000)){
 exit('Ukuran file terlalu besar (Max 5 Mb)!');
 }
 }
 
 $sameName = 0; // Menyimpan banyaknya file dengan nama yang sama dengan file yg diupload
 $handle = opendir($uploadDir);
 while(false !== ($file = readdir($handle))){ // Looping isi file pada directory tujuan
 // Apabila ada file dengan awalan yg sama dengan nama file di uplaod
 if(strpos($file,$extractFile['filename']) !== false)
 $sameName++; // Tambah data file yang sama
 }
 
 /* Apabila tidak ada file yang sama ($sameName masih '0') maka nama file pakai 
 * nama ketika diupload, jika $sameName > 0 maka pakai format "namafile($sameName).ext */
// $newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$sameName.').'.$extractFile['extension'];
 $newName = empty($sameName) ? $uploadFile['name'] : $id.'('.$tanggal.').'.$extractFile['extension'];
# $newName = empty($sameName) ? $uploadFile['name'] : $extractFile['filename'].'('.$tanggal.').'.$extractFile['extension'];
 
 if(move_uploaded_file($uploadFile['tmp_name'],$uploadDir.$newName)){
  
#$rubah=mysql_query("update m_pegawai set FOTO='$newName' where ID='$id' ");
$sql = "INSERT INTO r_pegawai (GRUP,IDP,IDX,DATA1,DATA2)
VALUES ('DOKUMEN','$id','$dokumen', '$keterangan', '$newName')";
$rubah = mysql_query($sql);


echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$id&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}

}
 
 
 
 
 
 
 if($_GET['opsi']=="x"){
  
$idp=$_GET['id']; 
$idx=$_GET['idx'];
 
$rubah=mysql_query("update r_pegawai set ONOFF='OFF' where ID='$idx' and IDP='$idp' ");
 

if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$idp';
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=f1&ID=$idp&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
 
 
 
 if($_GET['opsi']=="on"){
  
$idp=$_GET['id'];  
 
$rubah=mysql_query("update m_pegawai set ONOFF='ON' where ID='$idp'  ");
 

if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=d1&ID=$idp'; 
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=d1&ID=$idp&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
 
  if($_GET['opsi']=="off"){
  
$idp=$_GET['id'];  
 
$rubah=mysql_query("update m_pegawai set ONOFF='OFF' where ID='$idp'  ");
 

if($rubah){
	echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=d1&ID=$idp'; 
//-->
</SCRIPT>";
}
else{
echo "<SCRIPT>
<!--
document.location='../idx_pegawai.php?link=d1&ID=$idp&pesan=Gagal Menyimpan!';
//-->
</SCRIPT>";
}
 
 }
 
 
 
 
mysql_close();
?>