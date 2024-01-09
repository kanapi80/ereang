<div class="row">
    <div class="col-lg-12">
        <div class="card" style="background: radial-gradient(circle, #fff 10%,  transparent 60%);" >
            <div class="card-body">

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="grap/style.css" type="text/css" />
<script src="grap/js.js"></script>

<script>
$(document).ready(function(){
    barChart();

    $(window).resize(function(){
        barChart();
    });

    function barChart(){
        $('.bar-chart').find('.progress').each(function(){
            var itemProgress = $(this),
            itemProgressWidth = $(this).parent().width() * ($(this).data('persen') / 100);
            itemProgress.css('width', itemProgressWidth);
        });
    }
});
</script>
</head>
<body>

     
<div class="containerx" style="width:100%">
   
    <div class="bar-chart">
        <!-- legend label -->
        <div class="legend" > <B><h5>REALISASI ANGGARAN <?php echo $tahun;?></h5></B>
            <!-- <div class="label">
                <h4>25</h4>
            </div>
            <div class="label">
                <h4>50</h4>
            </div>
            <div class="label">
                <h4>75</h4>
            </div>
            <div class="label last">
                <h4>100</h4>
            </div> -->
        </div>
<?php
$koneksi  = mysqli_connect("192.168.21.26", "kanapi", "bangkit", "ereang");
if ($_SESSION['ROLES']=="30"){
$pagu   = mysqli_query($koneksi, "SELECT sum(PaguAnggaran) as PAGU,
        sum(RealisasiAnggaran) as realisasi,NAMA,NamaPptk FROM t_belanja where TahunAnggaran='".$tahun."' group by KdPptk order by KdPptk asc");
}else{
    $pagu   = mysqli_query($koneksi, "SELECT PaguAnggaran as PAGU,
        RealisasiAnggaran as realisasi,NAMA,NamaBelanja as NamaPptk FROM t_belanja where KdPptk='".$_GET['KdPptk']."'  and  TahunAnggaran='".$tahun."' order by PaguAnggaran desc");
}?>

        <!-- bar -->
        <div class="chart clearfix">
		<?php while ($x = mysqli_fetch_array($pagu)) { ?>
            <div class="item">
                <div class="bar">
                    <span class="persen"><button type="button" name="tom" class="btn btn-outline-danger sm-btn" data-toggle="tooltip" data-placement="top" title="<?php  echo number_format($x['realisasi'], 2, ',', '.');?>"> <?php $rrs=$x['realisasi']; $pp=$x['PAGU'];  $ppp = round($rrs  / $pp * 100, 0); echo $ppp,"&nbsp;%";?></button></span>

                    <div class="progress" data-persen="<?php $rrs=$x['realisasi']; $pp=$x['PAGU'];  $ppp = round($rrs  / $pp * 100, 0); echo $ppp;?>" >
                        <span class="title" data-toggle="tooltip" data-placement="top" title="<?php  echo number_format($x['PAGU'], 2, ',', '.');?>" ><?php echo $x['NamaPptk'];?>
						<!--<button type="button" name="tom" class="btn btn-outline-info sm-btn" ><?php  echo number_format($x['PAGU'], 2, ',', '.');?></button>-->
						 </span>
                    </div>
                </div>
            </div>
<? }?>
       
    </div>
</div>
  </div>
   
      
    </div>  </div>  </div>
</body>
</html>
<div class="col-lg-12 col-md-4 m-t-20">
            <a href="view.php?link=DETAIL" class="btn m-t-10 m-r-5 btn-outline-info">
                KEMBALI </a>
        </div>
    </div>

