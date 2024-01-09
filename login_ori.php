<!DOCTYPE html >
<html >
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
<link rel="shortcut icon" href="icon.png" />
<link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>

</head>
<style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

 * {
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: 'Roboto Condensed', sans-serif
 }

 body {
     background: #ecf0f3
 }

.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
    from {
        -webkit-transform: scale(0)
    }
    to {
        -webkit-transform: scale(1)
    }
}
@keyframes animatezoom {
    from {
        transform: scale(0)
    }
    to {
        transform: scale(1)
    }
}
 .wrapper {
     max-width: 370px;
     min-height: 550px;
     margin: 80px auto;
     padding: 40px 30px 30px 30px;
     background-color: #ecf0f3;
   /*  border-radius: 15px; */
  border: 0px solid #fff;
     box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
	  border-top-right-radius:80px;
border-bottom-left-radius:38px;
border-top:0px solid #fff;
 }
 .wrapper:hover {
  
     box-shadow: 25px 25px 30px #cbced1, -25px -25px 30px #fff;
	 max-width: 372px;
	
 }
 .logos {
     width: 90px;
     margin: auto
 }

 .logos img {
     width: 100%;
     height: 90px;
     object-fit: cover;
     border-radius: 50%;
     box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff
 }

 .wrapper .name {
     font-weight: 600;
     font-size: 1.4rem;
     letter-spacing: 1.3px;
     padding-left: 10px;
     color: #555
 }

 .wrapper .form-field input {
     width: 100%;
     display: block;
     border: none;
     outline: none;
     background: none;
     font-size: 1rem;
     color: #666;
     padding: 15px 20px 15px 15px;
	 letter-spacing: 2px;
 }

 .wrapper .form-field {
     padding-left: 10px;
     margin-bottom: 20px;
     border-radius: 20px;
     box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff
 }

 .wrapper .form-field .fas {
     color: #555
 }

 .wrapper .btn {
     box-shadow: none;
     width: 100%;
     height: 45px;
     background-color: #03A9F4;
     color: #fff;
     border-radius: 25px;
     box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
     letter-spacing: 1.3px
 }

 .wrapper .btn:hover {
   box-shadow: none;
     background-color: #039BE5;
	 letter-spacing: 4px;
	  box-shadow: 3px 3px 3px #fff, -3px -3px 3px #fff;
 }

 .wrapper a {
     text-decoration: none;
     font-size: 0.8rem;
     color: #03A9F4
 }

 .wrapper a:hover {
     color: #039BE5
 }
.tombol {
    border: 0px solid #3fbafe;
    color: #3fbafe;
    cursor: pointer;
    font-family: 'Roboto Condensed';
    font-weight: bold;
    border-color: #ffffff;
    color: #fff;
    /*tulisan*/
    box-shadow: 0 0 40px 40px #3fbafe
        /*background tombol*/
    inset, 0 0 0 0 #3fbafe;
    transition: all 150ms ease-in-out;
    width: 88%;
    border-radius: 14px;
    height: 45px;
}

.tombol:hover,
.btn:focus {
    color: #fff;
    outline: 0;
    box-shadow: 0 0 10px 0 transparent inset, 0 0 10px 4px #3fbafe;
 	background-color:transparent;
	letter-spacing: 6px;
}
.glow{
font-size:18px;

background-color: #999;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;
	  letter-spacing: 3px;
	
}

.embos{
font-size:22px;

background-color: #666666;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    color: transparent;
    text-shadow: rgba(255,255,255,0.5) 0px 3px 3px;
	  letter-spacing: 2px;
				 }
</style>
<body>
<div class="wrapper animate">
  <center>  <div class="logos"> <img src="rsudx.png" alt="" width="60" height="60"> </div>
    <div style="padding-top:30px;padding-bottom:35px"> <span class="glow"> REMUNERASI</span><span class="embos"> <br><b>RSUD INDRAMAYU</b></span> </div>
    <form class="p-3 mt-3" action="user_levels.php" method="post">
	
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="USERNAME" id="NIP" placeholder="Username" required> </div>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="PWD" id="PWD" placeholder="Password" required> </div> 
			<br><button class="btn mt-3 tombol">Login</button>
    </form><br><br>
    <div><a style="color:#3fbafe;font-size:10px" > KANAP I - 201511011 &#10095;&#10095; </a><a style="color:#999;font-size:10px" >&copy; 2021<?= strtoupper($singhead1) ?> - <?php echo date("Y"); ?></a> </div>
  </center>
</div>
</body>
</html>
