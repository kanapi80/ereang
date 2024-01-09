<style>
.btn2 {
  background-color: transparent;
  /* background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%); */
  border:1px solid #CCCCCC;
  padding: 4px 6px;
  font-size: 12px;
  cursor: pointer;
  width:80px;
  border-color: #2fcffa;
  border-radius: 2px;
  color:dodgerblue;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
  
}
/* Darker background on mouse-over */
.btn2:hover {
  background-color:#2fcffa;
   color:#fff;
    font-weight:bold;
	border-radius:2px;
	transform: scale(1.15);
	font-weight:bold;
	font-size: 12px;
	box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
}
.btn3 {
	background-color:maroon;
   color:#fff;
    font-weight:bold;
	border-radius:2px;
	transform: scale(1.15);
	font-weight:bold;
	font-size: 12px;
	box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
	padding: 4px 6px;
	width:80px;
  border-color: ##F00;
  border-radius: 2px;
  
}
/* Darker background on mouse-over */

.btn3:hover {
	background-color: transparent;
  /* background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%); */
  border:1px solid #CCCCCC;
  padding: 4px 6px;
  font-size: 12px;
  cursor: pointer;
  width:80px;
  border-color: ##F00;
  border-radius: 2px;
  color:#F00;
  box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.2);
}
</style>
<?php
session_start();
header("Content-Type: text/html; charset=ISO-8859-15");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("connect.php");
include("function.php");
require_once('../ps_pagination.php');

//login validasi

if(!empty($_GET['NIP'])){
		  $ip	= getRealIpAddr();
		//   mysql_query('delete from tmp_cartbayar where IP = "'.$ip.'"');
		//   mysql_query('delete from tmp_orderpenunjang where ip = "'.$ip.'"');
		//   mysql_query('delete from tmp_cartresep where IP = "'.$ip.'"');
		  
  		  $sql="SELECT * FROM m_login WHERE NIP = '".$_GET['NIP']."'"; 
		  $query=mysql_query($sql)or die(mysql_error());
		  $data=mysql_fetch_assoc($query);
		  $NIP = $data['NIP'];
		  $KDUNIT = $data['KDUNIT'];
		   $id_user = $data['id_user'];
		   $IDS = $data['IDS'];
		  if($_GET['NIP'] == $NIP){
			  $_SESSION['NIP'] 		= $NIP;
			  $_SESSION['KDUNIT'] 	= $KDUNIT; 
			  $_SESSION['id_user'] 	= $id_user; 
			  $_SESSION['IDS'] 	= $IDS; 
			  echo	"<span class='btn2'> Username VALID</span>";
		  }else{
			  echo	"<span class='btn3'> Username TIDAK VALID</span>";
		  }
}

if(!empty($_GET['PWD'])){
		  $NIP1 = $_SESSION['NIP'];
  		  $sql="SELECT * FROM m_login WHERE NIP = '".$NIP1."' AND PWD = '".$_GET['PWD']."'"; 
		  $query = mysql_query($sql)or die(mysql_error());
		  $data  = mysql_fetch_assoc($query);
		  $PWD2  = $_GET['PWD'];
		  $PWD   = $data['PWD'];
		  $SES_REG  = $data['SES_REG'];
		  if($_GET['PWD'] == $PWD){			  	  
				  $_SESSION['SES_REG'] = $SES_REG; ?> 
				  <SCRIPT language="JavaScript">
					alert('test');
				  </SCRIPT>
<script>
jQuery(document).ready(function(event){
	jQuery("#PWD").keyup(function(event){
		if(event.keyCode == 13){
			jQuery("#LOGIN").click();
		}
	});
});
</script>
				  <input type="button" onclick="window.location='user_levels.php';" value=" LOGIN " class=" text "  name="LOGIN" id="LOGIN"/>
				  
				  <?
		  }else{
			  echo"<font color='red'>PASSWORD Tidak Valid</font>";
		  }
}
