<?php 
session_start();
include("include/connect.php");

// $NIP1 		= $_SESSION['NIP'];
$US=$_POST['USERNAME'];
$PS=$_POST['PWD'];
$sql		="SELECT * FROM m_login WHERE NIP = '".$US."' AND PWD = '".$PS."' and status ='ON'"; 
$query 		= mysql_query($sql)or die(mysql_error());
$data  		= mysql_fetch_assoc($query);
if($query > 0){
	
	$_SESSION['SES_REG'] = $data['SES_REG'];
	$_SESSION['DEPARTEMEN'] = $data['DEPARTEMEN'];
	$_SESSION['KDUNIT'] = $data['KDUNIT'];
	$_SESSION['ROLES'] = $data['ROLES'];
	$_SESSION['id_user'] = $data['id_user'];
	$_SESSION['NIP'] = $data['NIP'];
	
	//USER
	if($data['ROLES']=="32") {
		$_SESSION['ROLES']="32";
		header("location:index.php?link=Profil");
		//MANAJEMEN
		}elseif($data['ROLES']=="30") {
		$_SESSION['ROLES']="30";
		header("location:index.php?link=#");
		}elseif($data['ROLES']=="90") {
		$_SESSION['ROLES']="90";
		header("location:index.php?link=#");
		}elseif($data['ROLES']=="91") {
		$_SESSION['ROLES']="91";
		header("location:index.php?link=#");
		//UNIT
		}elseif($data['ROLES']=="92") {
		$_SESSION['ROLES']="92";
		header("location:index.php?link=#");
		//DIREKTUR
		}elseif($data['ROLES']=="93") {
		$_SESSION['ROLES']="93";
		header("location:view.php?link=MAIN");

			
	}else {
		echo "<SCRIPT>
		<!--   
        alert('Username & Password Anda Salah!');
        history.back(self);
		//-->
		</SCRIPT>";
		// echo"no roles";
	}

}else{
	header('location:login.php');
}
?>