<div class="col-lg-12">
          <div class="card" style="background: radial-gradient(#60efbc, #0a9f92);">
          <!-- <div class="card" > -->
            <div class="card-body">
                <div class="d-flex m-b-30 align-items-center no-block">
                    <h5 class="card-title "><i class="fa fa-book"></i>&nbsp;&nbsp;Grafik Top Realisasi Anggaran</h5>
                    <div class="ml-auto">

                    </div>
                </div>

<?php
include("config.php");
$koneksi  = mysqli_connect("192.168.21.26", "kanapi", "bangkit", "ereang");

$merk  = mysqli_query($koneksi, "SELECT NAMA,SUM(RealisasiAnggaran) as zz FROM t_belanja group by KdPptk order by zz DESC limit 5");
	/* Getting demo_viewer table data */
	$sql = "SELECT SUM(RealisasiAnggaran) as xx FROM t_belanja 
			GROUP BY KdPptk ORDER BY xx DESC limit 5";
	$viewer = mysqli_query($mysqli,$sql);
	$viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
	$viewer = json_encode(array_column($viewer, 'xx'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	$sql = "SELECT SUM(PaguAnggaran) as count, SUM(RealisasiAnggaran) as vv FROM t_belanja 
			GROUP BY  KdPptk ORDER BY vv DESC limit 5";
	$click = mysqli_query($mysqli,$sql);
	$click = mysqli_fetch_all($click,MYSQLI_ASSOC);
	$click = json_encode(array_column($click, 'count'),JSON_NUMERIC_CHECK);
?>

<script type="text/javascript">
$(function () { 
    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: [<?php while ($x = mysqli_fetch_array($merk)) { echo '"' . $x['NAMA'] . '",';}?>]
        },
        yAxis: {
            title: {
                text: 'Rate'
            }
        },
        series: [{
            name: 'P a g u',
            data: data_click
        }, {
            name: 'Realisasi',
            data: data_viewer
        }]
    });
});
</script>

    
            <div class="col-md-12">
           
                <div class="panel-heading"></div>
           
             
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>

       



        <div class="row">
<?php

   include("include/connect.php");
   $koneksi  = mysqli_connect("192.168.21.26", "kanapi", "bangkit", "ereang");
  $ranx = "SELECT a.*,sum(b.PaguAnggaran) as Anggaran,SUM(b.RealisasiAnggaran)as Realisasi from m_pptk  a 
  left join t_belanja b ON b.KdPptk = a.KodePptk 
  where a.Status='ON' " . $search . " Group by b.KdPptk order by Realisasi DESC limit 5 ";
  $ranapx	= mysql_query($ranx);
//   $rnpx = mysql_fetch_array($ranapx);
  while ($rnpx = mysql_fetch_array($ranapx)){
?>


<div class="col-lg-4 ">
<div class="card " style="background: radial-gradient(#1fe4f5 10%, #3fbafe  90%);">
<div class="card-body ">
<center> <div class="d-flex m-b-30 align-items-center no-block ">
 <!-- <h5 class="card-title"><?=$rnpx['NamaPptk'];?></h5> -->
    <div class="ml-auto">
        
    </div>
</div>
<span style="font-size:30px;color:#fff">    <div ><? if (!empty($rnpx['Foto'])) { ?>
                                                            <img src="img/foto/<?= $rnpx['Foto'] ?>" class="img-circle zoom" width="120" height="120" />
                                                        <? } else { ?><img src="img/pp.jpg" class="img-circle zoom" width="60" height="60" /><? } ?></div> <br><?=$rnpx['ranap'];?></span>
<!-- <br>PASIEN -->
<h6 class="card-title"><?=$rnpx['NamaPptk'];?></h6>
<h7 class="text-mute">NIP. <?=$rnpx['Nip'];?></h7>
</center>
</div>
<div class="card-body bg-light">
    <div class="row text-center m-b-20">
        <div class="col-lg-6 col-md-4 m-t-20">
             <h7 class="text-muted"> P a g u</h7> <br>
            <span class="btn m-t-5 m-r-5 btn-info"><a style="font-size: 10px;"><? echo number_format($rnpx['Anggaran'], 2, ',', '.'); ?></a></span>
        </div>
        <div class="col-lg-6 col-md-4 m-t-20">
            <h7 class="text-muted">Realisasi  </h7><br>
            <span class="btn m-t-5 m-r-5 btn-success"><a style="font-size: 10px;"><? echo number_format($rnpx['Realisasi'], 2, ',', '.'); ?></a></span>
        </div>
        </div>
        </div>
    </div>
</div>

<? } ?>

