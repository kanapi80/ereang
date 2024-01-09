<!--RBA-->
<?php

$pg = "select  SUM(PaguAnggaran) as PaguAnggaran,sum(RealisasiAnggaran) as Realisasi 
FROM t_belanja where Status='ON' AND TahunAnggaran =".$tahun." group by TahunAnggaran ";

$pgw    = mysql_query($pg);
$pegawai = mysql_fetch_array($pgw);
$yy = $pegawai['PaguAnggaran'];
$xx = $pegawai['Realisasi'];
?>
<div class="row">
    <div class="col-lg-6">
        <div class="card" style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%)">
            <div class="card-body">
                <div class="d-flex m-b-30 align-items-center no-block">
                    <h5 class="card-title "><i class="fa fa-edit"></i>&nbsp;&nbsp;REALISASI ANGGARAN <?php echo $tahun;?></h5>
                    <div class="ml-auto">

                    </div>
                </div>
                <canvas id="rba" width="80" height="50">


            </div>
            <div class="card-body bg-light">
                <div class="row text-center m-b-20">
                    <div class="col-lg-6 col-md-4 m-t-20">
                        <h4 class="m-b-0 font-light">
                            <? echo number_format($yy, 2, ',', '.'); ?> </h4>
                            <h3 class="text-muted">
                            <? $persen = round($pegawai['PaguAnggaran'] / $pegawai['PaguAnggaran'] * 100, 0);
                            echo $persen, "&nbsp;%"; ?></h3>
                    </div>
                    <div class="col-lg-6 col-md-4 m-t-20">
                        <h4 class="m-b-0 font-light"><? echo number_format($xx, 2, ',', '.'); ?> </h4>
                        <h3 class="text-muted"><? $persenz = round($pegawai['Realisasi']  / $pegawai['PaguAnggaran'] * 100, 0);
                                                    echo $persenz, "&nbsp;%"; ?> </h3>
                        <br>
                    </div>
                </div>
                <!-- <div class="col-lg-12 col-md-4 m-t-20">
                    <a href="index.php?link=RealisasiAnggaran" class="btn m-t-10 m-r-5 btn-outline-success">Detail</a>
                </div> -->
            </div>
        </div>
    </div>
    <!--END -->
   
    <?php
$pn = "select  SUM(a.PaguAnggaran) as PaguAnggaran 
FROM t_pendapatan a
where a.Status='ON'AND a.TahunAnggaran =".$tahun." group by a.TahunAnggaran ";
$pnd    = mysql_query($pn);
$pndt = mysql_fetch_array($pnd);
$pp = $pndt['PaguAnggaran'];

?>
    <?php
$pns = "select  sum(JumlahPen) as Realisasi 
FROM t_billpendapatan
where Status='ON' AND TahunAnggaran =".$tahun." group by TahunAnggaran ";
$pnds    = mysql_query($pns);
$pndts = mysql_fetch_array($pnds);
$rrs = $pndts['Realisasi'];
?>

    <div class="col-lg-6">
        <div class="card" style="background: radial-gradient(#60efbc, #0a9f92);">
            <div class="card-body">
                <div class="d-flex m-b-30 align-items-center no-block">
                    <h5 class="card-title "><i class="fa fa-book"></i>&nbsp;&nbsp;PENDAPATAN <?php echo $tahun;?></h5>
                    <div class="ml-auto">

                    </div>
                </div>
                <canvas id="pendapatan" width="80" height="50">


            </div>
            <div class="card-body bg-light">
                <div class="row text-center m-b-20">
                    <div class="col-lg-6 col-md-4 m-t-20">
                        <h4 class="m-b-0 font-light">
                            <? echo number_format($pp, 2, ',', '.'); ?> </h4>
                            <h3 class="text-muted">
                            <? $pppp = round($pp / $pp * 100, 0);
                            echo $pppp, "&nbsp;%"; ?></h3>
                    </div>
                    <div class="col-lg-6 col-md-4 m-t-20">
                        <h4 class="m-b-0 font-light"><? echo number_format($rrs, 2, ',', '.'); ?> </h4>
                        <h3 class="text-muted"><? $ppp = round($rrs  / $pp * 100, 0);
                                                    echo $ppp, "&nbsp;%"; ?> </h3>
                        <br>
                    </div>
                </div>
                <!-- <div class="col-lg-12 col-md-4 m-t-20">
                    <a href="index.php?link=DetailDashboard" class="btn m-t-10 m-r-5 btn-outline-success">Detail</a>
                </div> -->
            </div>
        </div>
    </div>
   
    <script>
        var ctx = document.getElementById("rba");
        var rba = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: [<?php while ($b = mysql_fetch_array($bulan)) {
                                echo '"' . $b['nama_ruangan'] . '",';
                            } ?>],
                labels: ["Pagu Anggaran", "Realisasi"],
                datasets: [{
                    label: 'RBA',
                    data: [<? echo $yy; ?>, <? echo $xx; ?>],
                    backgroundColor: [
                        'blue',
                        'red'
                    ],
                    borderColor: [
                        'blue',
                        'red'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
     <script>
        var ctx = document.getElementById("pendapatan");
        var pendapatan = new Chart(ctx, {
            type: 'bar',
            data: {
                // labels: [<?php while ($b = mysql_fetch_array($bulan)) {
                                echo '"' . $b['nama_ruangan'] . '",';
                            } ?>],
                labels: ["Target", "Realisasi "],
                datasets: [{
                    label: 'PENDAPATAN',
                    data: [<? echo $pp; ?>, <? echo $rrs; ?>],
                    backgroundColor: [
                        'green',
                        'red'
                    ],
                    borderColor: [
                        'green',
                        'red'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>