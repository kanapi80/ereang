<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.1/css/all.css' integrity='sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz' crossorigin='anonymous'>
	<link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
	<title>REMUNERASI RSUD IMY</title>
	<link rel="shortcut icon" href="icon.png" />
	<link rel="stylesheet" type="text/css" href="css/kay.css" />
	<!--<link href="dq_sirs.css" type="text/css" rel="stylesheet" />-->
	<link href="css/login.css" type="text/css" rel="stylesheet" />
 <script type="text/javascript" language="javascript" src="include/ajaxrequest.js"></script> 
	<script src="js/jquery-1.7.min.js" language="JavaScript" type="text/javascript"></script>
	
	<SCRIPT>
		function jumpTo(link) {
			var new_url = link;
			if ((new_url != "") && (new_url != null))
				window.location = new_url;
		}
		jQuery(document).ready(function() {
			jQuery("#NIP").keyup(function(event) {
				if (event.keyCode == 13) {
					MyAjaxRequest('valid_nip', 'include/process.php?NIP=', 'NIP');
					jQuery("#PWD").focus();
				}
			});
			jQuery("#PWD").keyup(function(event) {
				if (event.keyCode == 13) {
					MyAjaxRequest('valid_pwd','include/process.php?PWD=','PWD');
					jQuery('#frm').submit();
				}
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			var formInputs = $('input[type="text"],input[type="password"]');
			formInputs.focus(function() {

				$(this).parent().children('p.formLabel').addClass('formTop');
				$('div#formWrapper').addClass('darken-bg');
				$('div.logo').addClass('logo-active');
			});
			formInputs.focusout(function() {
				if ($.trim($(this).val()).length == 0) {
					$(this).parent().children('p.formLabel').removeClass('formTop');
				}
				$('div#formWrapper').removeClass('darken-bg');
				$('div.logo').removeClass('logo-active');
			});
			$('p.formLabel').click(function() {
				$(this).parent().children('.form-style').focus();
			});
		});
	</script>
<style>
	.urlImg {
    width: 90%;
	/* height:120px; */
    height: auto;
    display: block;
    background-image: url('img/loginq.png');
    text-align: center;
    background-repeat: no-repeat;

}

.urlImg:hover {
    background-image: url('img/loginqq.png');
}
</style>
</head>

<body>
	<?php include("include/connect.php"); ?>
	<BR>
	<div class="col-12 col-s-12"  >
	
	<center>
		<div style="width:400px"  >
			<form class="modal-content animate" action="user_levels.php" method="post">
				<?php
				if (isset($_POST['signin'])) {
					require_once("logins.php");
				}
				?>
				<!-- <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tables" > 
				<tr style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%);">
						<td align="center" style="padding:10px;height:50px;font-size:16px;color:white" />FORM LOGIN</td>
					</tr><tr style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%);">
						<td align="center" style="padding-top:10px;"><a href="#" class="urlImg" title="Sistem Informasi Remunerasi" style="width:200px;height:210px" /></td>
					</tr>
					<tr>
						<td align="center" style="padding-top:10px;font-size:18px;font-weight:bold"></td>
					</tr>
				</table> -->
				<center>
					<a href="#" class="urlImg" title="Corelangs link" style="width:395px;height:139px" /></a>
				</center>
				
				<br>
				<center> <span id="valid_nip"></span></center><br>
				<div class="form-item" align="center">
					<p class="formLabel"><i class="fa fa-user-md" style="color:#3fbafe;font-size:20px"></i>&nbsp;&nbsp;Username</p>
					<input id="NIP" type="text" name="USERNAME" onBlur="javascript: MyAjaxRequest('valid_nip','include/process.php?NIP=','NIP');return false;" class="form-style" autocomplete="off" />
				</div>
				<center><span id="valid_pwd"></span></center>
				<div class="form-item" align="center">
					<p class="formLabel"><i class="fa fa-key" style="color:#3fbafe;font-size:20px"></i>&nbsp;&nbsp;Password</p>
					<input type="password" id="PWD" name="PWD" class="form-style" />
					<br><br>
					<button class="tombol" name="LOGIN" id="LOGIN" onClick="document.getElementById('frm')" type="submit">LOGIN &nbsp;<i class="fas fa-cog fa-spin" ></i> </button>
					<br><br>	<br>
					<a style="color:#999999"> REMUNERASI | &copy; 2021<?= strtoupper($singhead1) ?> - <?php echo date("Y"); ?></a>
					<br>
				</div>
			</form>
		</div>
		<div class="col-4 col-s-12">
		</div>
</body>

</html>