<?php
$tahun = date('Y');
$pg = "select  SUM(PaguAnggaran) as PaguAnggaran,sum(RealisasiAnggaran) as Realisasi 
    FROM t_belanja where Status='ON' AND TahunAnggaran =".$tahun." and KdPptk='" . $_SESSION['KDUNIT'] . "' group by TahunAnggaran ";
$pgw    = mysql_query($pg);
$pegawai = mysql_fetch_array($pgw);
$yy = $pegawai['PaguAnggaran'];
$xx = $pegawai['Realisasi'];
echo $tahun;
?>
<!-- Row -->
<div class="row">
    <!-- Column -->
    <div class="col-lg-3 col-xlg-3 col-md-5">
        <div class="card" style="background:radial-gradient(#60efbc, #0a9f92);">
            <div class="card-body">
                <?php
                $myquery = "SELECT * FROM m_pptk
WHERE KodePptk='" . $_SESSION["KDUNIT"] . "' ";
                $get = mysql_query($myquery) or die(mysql_error());
                $data = mysql_fetch_assoc($get);
                ?>
                <form action="page/SimpanFoto.php" method="post" enctype="multipart/form-data">
                    <center class="m-t-30"> <? if (!empty($data['Foto'])) { ?>
                            <img src="img/foto/<?= $data['Foto'] ?>" class="img-circle" width="190" height="190" />
                        <? } else { ?><img src="img/pp.jpg" class="img-circle" width="190" height="190" /><? } ?>
                        <h4 class="card-title m-t-10"><b><?= $data['GD']; ?> <?= strtoupper($data['NamaPptk']); ?><? if (!empty($data['GB'])) {
                                                                                                                        echo ", ";
                                                                                                                        echo $data['GB'];
                                                                                                                    } ?></b></h4>
                        <h6 class="card-subtitle"><a style="color:dimgray">NIP. <?= $data['Nip']; ?> </a></h6>
                        <input type="hidden" value="<?= $data['KodePptk'] ?>" name="id" />
                        <input type="hidden" value="foto" name="opsi" />
                        <input type="hidden" value="<?= $_GET['link']; ?>" name="link" />
                        <input type="file" class="btn m-t-10 m-r-5 btn-outline-success" name="foto" style="width:100%" id="foto" /><br />
                        <button style="width:100%" class="btn m-t-10 m-r-5 btn-success"><span>Update Foto</span></button>
            </div>
            </form>

        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-4 col-xlg-9 col-md-7">
        <div class="card" style="background:radial-gradient(#fff, transparent);">
            <!-- Tab panes -->
            <div class="card-body">

                <div class="table-responsive" style="padding-left:20px;padding-right:10px">
                    <span style="font-size:18px;color:#3fbafe;text-align:left"><b><i class="fa fa-vcard"></i>&nbsp;&nbsp;GRAFIK</b></span>
                    <canvas id="rba" width="120" height="108">
                </div>
                <div class="col-lg-12 col-md-4 m-t-20">
                    <a href="index.php?link=RealisasiAnggaran" class="btn m-t-10 m-r-5 btn-outline-info">
                        Detail </a>
                </div>
            </div>

        </div>

    </div>
    <!-- Column -->
    <?php

    $koneksi  = mysqli_connect("192.168.21.26", "kanapi", "bangkit", "ereang");
    $pagu   = mysqli_query($koneksi, "SELECT PaguAnggaran as PAGU,
        RealisasiAnggaran as realisasi,NAMA,NamaBelanja as NamaPptk, TahunAnggaran FROM t_belanja where KdPptk='" . $_SESSION['KDUNIT'] . "'  AND TahunAnggaran =".$tahun." order by TahunAnggaran,PaguAnggaran desc");
    ?>
    <div class="col-lg-5 col-xlg-9 col-md-7">
        <div class="card">
            <!-- Tab panes -->
            <div class="card-body">
                <div class="table-responsive" style="padding-left:20px;padding-right:10px">
                    <span style="font-size:18px;color:#3fbafe;text-align:left"><b><i class="fa fa-book"></i>&nbsp;&nbsp;RINCIAN BELANJA</b></span>
                    <table class="table" style="font-size:11px">
                        <tr style="font-weight:bold;background-color:#0a9f92;color:white;text-align:center;">
                            <td width="3%">NO </td>
                            <td width="70%" align="left">URAIAN </td>
                            <td width="27%">PAGU </td>
                            <td width="27%">TAHUN </td>
                        </tr> <?php $NO = 0;
                                while ($x = mysqli_fetch_array($pagu)) { ?>

                            <tr>
                                <td align="center"> <? $NO = ($NO + 1);
                                                    if ($_GET['page'] == 0) {
                                                        $hal = 0;
                                                    } else {
                                                        $hal = $_GET['page'] - 1;
                                                    }
                                                    echo ($hal * 10) + $NO; ?> </td>
                                <td> <?php echo $x['NamaPptk']; ?> </td>
                                <td align="right"><?php echo number_format($x['PAGU'], 2, ',', '.'); ?> </td>
                                <td align="right"><?php echo $x['TahunAnggaran']; ?> </td>
                            </tr> <? } ?>
                        <tr style="font-weight:bold;background-color:#0a9f92;color:white">
                            <td></td>
                            <td>Jumlah</td>
                            <td align="right"><?php echo number_format($yy, 2, ',', '.'); ?> </td>
                            <td></td>
                        </tr>


                    </table>

                </div>
                <div class="table-responsive" style="padding-left:20px;padding-right:10px">

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <div class="col-lg-12 col-md-4 m-t-20">
        <a href="index.php?link=PEGAWAI" class="btn m-t-10 m-r-5 btn-outline-info">
            KEMBALI </a>
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
                        '#0a9f92',
                        'red'
                    ],
                    borderColor: [
                        '#0a9f92',
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