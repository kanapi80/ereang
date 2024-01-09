<div class="col-lg-12">
        <div class="card" style="background: radial-gradient(#60efbc, #0a9f92);">
            <div class="card-body">
                <div class="d-flex m-b-30 align-items-center no-block">
                    <h5 class="card-title "><i class="fa fa-book"></i>&nbsp;&nbsp;Grafik RBA</h5>
                    <div class="ml-auto">

                    </div>
                </div>
<script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
 <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
 <style>
 canvas {
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
 }
 .box-2 {
 width: 200px;
 padding: 20px;
 /* background: red; */
 color: white;
 /* code di bawah ini akan membuat div berada di tengah-tengah */
 position: absolute;
 top: 50%;
 left: 50%;
 transform: translate(-50%, -50%);
 }
 </style>

 <div id="container">
  <canvas id="canvas"></canvas>
 </div>

 <?php 
 //misal ada 2 dealer
 $dealer = 2;
 for($d=1;$d<=$dealer;$d++)
 {
  //kemudian misal data dari bulan 1 hingga bulan 12
  for($b=1;$b<=16;$b++)
  {
   $data[$d][$b] = rand(0,999);
  }
 }

 function random_color()
 {  
   return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
 }
 ?>
<?php
$koneksi   = mysqli_connect("localhost", "root", "", "ereang");
$merk      = mysqli_query($koneksi, "SELECT NAMA FROM t_belanja group by KdPptk order by KdPptk asc");
$pagu      = mysqli_query($koneksi, "SELECT sum(PaguAnggaran) as PAGU FROM t_belanja group by KdPptk order by KdPptk asc");
$ril      = mysqli_query($koneksi, "SELECT sum(RealisasiAnggaran) as realisasi FROM t_belanja group by KdPptk order by KdPptk asc");
?>

 <script>
  var MONTHS = [<?php while ($x = mysqli_fetch_array($merk)) { echo '"' . $x['NAMA'] . '",';}?>];
  var color = Chart.helpers.color;
  var barChartData = {
   labels: MONTHS,
   datasets: [
   <?php 
   for($d=1;$d<=$dealer;$d++)
   {
    $color = random_color();
   ?>
    {
     label: '<?php echo "PAGU $d";?>',
     backgroundColor: color('<?php echo $color;?>').alpha(0.5).rgbString(),
     borderColor: '<?php echo $color;?>',
     borderWidth: 1,
     data: [
      <?php 
     while ($x = mysqli_fetch_array($pagu)) { echo '"' . $x['PAGU'] . '",';}
      {
        echo '"' . $x['PAGU'] . '",';
     }
     {
      echo '"' . $x['PAGU'] . '",';
   }
   
      ?> 
     ]
    },
   <?php  
   }
   ?>
   ]

  };

  window.onload = function() {
   var ctx = document.getElementById('canvas').getContext('2d');
   window.myBar = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
     responsive: true,
     legend: {
      position: 'top',
     },
     title: {
      display: true,
      text: 'Grafik Monitroing Pagu Anggaran 2022'
     }
    }
   });

  };

 </script>
 

      

 </div>
        </div>
    </div>