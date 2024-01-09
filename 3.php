<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description" content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>SIMRA | RealisasiAnggaran</title>
	
    <!-- <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" /> -->
    <link rel="icon" type="image/png" sizes="16x16" href="rsudimy/assets/images/dasb.png">
    <!-- <link href="rsudimy/gaya.css" rel="stylesheet"> -->
    <link href="rsudimy/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="rsudimy/assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="rsudimy/dist/css/style.css" rel="stylesheet">
    <link href="rsudimy/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="css/Theme/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Sweetalert 2 CSS -->
	<link rel="stylesheet" href="sweet/sweetalert2.min.css">
    <script src="./jscss/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<link rel="stylesheet" href="./view/style.css">
<script type="text/javascript" src="./view/js.js"></script>
<script src="./view/chart_js.js"></script>
<style>
    #balik {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background: #0a9f92;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 4px;
    }

    #balik:hover {
        background: radial-gradient(circle, #5af3e6 10%, #0a9f92 90%);
        font-size: 19px;
    }
</style>
<button onClick="topFunction()" id="balik" title="Go to top"><i class="fa fa-angle-double-up"></i></button>
<body class="skin-default-dark fixed-layout">

    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">SIMRA | MONITORING REALISASI ANGGARAN RSUD INDRAMAYU</p>
        </div>
    </div>
    
    <div id="main-wrapper">
        <header class="topbar" style="background: radial-gradient(circle, #fff 10%, #e6faf8  90%);">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark;padding-left:0px">
                <div class="navbar-header" style="border-right: 0px;padding-left:0px">
                    <a class="navbar-brand" href="#" style="border-right: 0px;padding-top:10px" >
                        <!-- Logo icon --><br>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="rsudimy/assets/images/rs-icon.png" alt="homepage" class="dark-logo" />
                            <img src="rsudimy/assets/images/rs-text.png" alt="homepage" class="dark-logo" />
                      
                    </a>
                </div>
                
               
       <a class="waves-effect waves-dark" href="3.php?link=RBA" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">RBA</span></a>
       <a class="waves-effect waves-dark" href="3.php?link=#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Realisasi</span></a>
        <a class="waves-effect waves-dark" href="index.php?link=PENDAPATAN" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Detail</span></a>
       <a class="waves-effect waves-dark" href="index.php?link=BELANJA" aria-expanded="false"><i class="fa  fa-bar-chart-o"></i><span class="hide-menu">Belanja</span></a>
       
   
    </header>

        <div class="container-fluid">
            <div class="row page-titles">
             
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" >Home</a></li>
                            <li class="breadcrumb-item active"><?php $link = $_GET['link'];
                                                                if (empty($link)) {
                                                                    echo "Dasboard";
                                                                } else {
                                                                    echo $_GET['link'];
                                                                } ?></li>
                        </ol>
                    </div>
                </div>
            </div>

            <?php include("link.php"); ?>

</div>
    </div>
</div>


<footer class="footer" style="text-align: center;font-size:12px;margin-left:0px">
    © <?php echo date('Y'); ?> SIM Realisasi Anggaran RSUD Indramayu </footer>
    </div>
    <!-- <script src="rsudimy/assets/node_modules/jquery/jquery-3.2.1.min.js"></script> -->
    <script src="rsudimy/assets/node_modules/popper/popper.min.js"></script>
    <script src="rsudimy/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="rsudimy/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="rsudimy/dist/js/waves.js"></script>
    <script src="rsudimy/dist/js/sidebarmenu.js"></script>
    <script src="rsudimy/dist/js/custom.min.js"></script>
    <script src="rsudimy/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="rsudimy/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="rsudimy/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="rsudimy/assets/node_modules/d3/d3.min.js"></script>
    <script src="rsudimy/assets/node_modules/c3-master/c3.min.js"></script>
    <script src="rsudimy/dist/js/dashboard1.js"></script>
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
<script>
	//Get the button
	var mybutton = document.getElementById("balik");

	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function() {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			mybutton.style.display = "block";
		} else {
			mybutton.style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>