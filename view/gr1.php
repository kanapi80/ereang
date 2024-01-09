<div class="col-lg-12">
          <!-- <div class="card" style="background: radial-gradient(#60efbc, #0a9f92);"> -->
          <div class="card" >
            <div class="card-body">
                <div class="d-flex m-b-30 align-items-center no-block">
                    <h5 class="card-title "><i class="fa fa-book"></i>&nbsp;&nbsp;Grafik Realisasi Anggaran</h5>
                    <div class="ml-auto">

                    </div>
                </div>

<?php
include("config.php");
$koneksi  = mysqli_connect("192.168.21.26", "kanapi", "bangkit", "ereang");
$merk  = mysqli_query($koneksi, "SELECT NAMA FROM t_belanja group by KdPptk order by KdPptk asc");
	/* Getting demo_viewer table data */
	$sql = "SELECT SUM(RealisasiAnggaran) as xx FROM t_belanja 
			GROUP BY KdPptk ORDER BY KdPptk";
	$viewer = mysqli_query($mysqli,$sql);
	$viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
	$viewer = json_encode(array_column($viewer, 'xx'),JSON_NUMERIC_CHECK);

	/* Getting demo_click table data */
	$sql = "SELECT SUM(PaguAnggaran) as count FROM t_belanja 
			GROUP BY  KdPptk ORDER BY KdPptk";
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
            text: 'Pagu & Realisasi Anggaran <?php echo $tahun;?>'
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
            name: 'P a g u <?php 
$dep  = "select  SUM(PaguAnggaran) as PaguAnggaran,sum(RealisasiAnggaran) as Realisasi 
FROM t_belanja where Status='ON' AND TahunAnggaran =".$tahun." group by TahunAnggaran ";
$qe   = mysql_query($dep); 
$deps = mysql_fetch_assoc($qe);
echo $tahun; echo " : "; echo number_format($deps['PaguAnggaran']);?>',
            data: data_click
        }, {
            name: 'Realisasi <?php 
$dep  = "select  SUM(PaguAnggaran) as PaguAnggaran,sum(RealisasiAnggaran) as Realisasi 
FROM t_belanja where Status='ON' AND TahunAnggaran =".$tahun." group by TahunAnggaran ";
$qe   = mysql_query($dep); 
$deps = mysql_fetch_assoc($qe);
echo $tahun; echo " : "; echo number_format($deps['Realisasi']);?>',
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
</div>



            </div>
        </div>
    </div>