<div class="row">
    <div class="col-lg-12">
        <?php
        session_start();
        include("include/connect.php");
        require_once('page/new_pagination.php');
        $sekarang = date('Y');
        $nama = "";
        if (!empty($_GET['nama'])) {
            $nama = $_GET['nama'];
        }

        if ($nama != "") {
            if ($search != "") {
                $search = $search . " AND a.NamaPptk LIKE '%" . $nama . "%' ";
            } else {
                $search = "AND a.NamaPptk LIKE '%" . $nama . "%' ";
            }
        }
        
        
        $thn = "";
        if (!empty($_GET['thn'])) {
            $thn = $_GET['thn'];
        }

        if ($thn != "") {
            if ($search != "") {
                $search = $search . " AND b.TahunAnggaran = '" . $thn . "' ";
            } else {
                $search = "AND b.TahunAnggaran = '" . $thn . "' ";
            }
        }

        ?>
        <div align="center">
            <form name="formsearch" method="get">
                <table width="100%" style="background-color:transparent">
                    <tr>
                        <td width="70%">
                            <input type="text" name="nama" value="<? if ($nama != "") {
                                                                        echo $nama;
                                                                    } ?>" placeholder="Nama" class="form-control" />
                        </td>
                        <td width="10%">
                            <select name="thn" class="form-control">
                                <option value="<?= date('Y'); ?>" <? if ($thn == date('Y')) echo "selected='selected'"; ?>>
                                    <?= date('Y'); ?>
                                </option>
                                <option value="<?= date('Y') - 1; ?>" <? if ($thn == date('Y') - 1) echo "selected='selected'"; ?>>
                                    <?= date('Y') - 1; ?>
                                </option>
                                <option value="<?= date('Y') - 2; ?>" <? if ($thn == date('Y') - 2) echo "selected='selected'"; ?>>
                                    <?= date('Y') - 2; ?>
                                </option>
                            </select>
                        </td>
                        <td colspan="4" style="color:#FFFFFF;font-weight:bold">
                            <input type="hidden" name="link" value="<?= $_GET['link']; ?>" />
                            &nbsp;&nbsp;  <button type="submit" class="btn btn-outline-success"><i class="fa fa-search"></i>&nbsp;&nbsp;C a r i</button>
                        </td>
                    </tr>
                </table>
                <br>
            </form>
            <div class="row">
    
                <?php
   if ($_GET['tahun']==$tahun){
    $ranx = "SELECT a.*,sum(b.PaguAnggaran) as Anggaran,SUM(b.RealisasiAnggaran)as Realisasi, b.TahunAnggaran from m_pptk  a 
    left join t_belanja b ON b.KdPptk = a.KodePptk   where a.Status='ON'  and b.TahunAnggaran= ".$tahun." Group by a.KodePptk order by a.NamaPptk ASC ";
    }else{
        $ranx = "SELECT a.*,sum(b.PaguAnggaran) as Anggaran,SUM(b.RealisasiAnggaran)as Realisasi, b.TahunAnggaran from m_pptk  a 
        left join t_belanja b ON b.KdPptk = a.KodePptk   where a.Status='ON' " . $search . "  Group by a.KodePptk order by a.NamaPptk ASC ";
    }

             
                $ranapx    = mysql_query($ranx);
                //   $rnpx = mysql_fetch_array($ranapx);
                while ($rnpx = mysql_fetch_array($ranapx)) {
                ?>
                 <div class="col-lg-3 ">
                        <div class="card " style="background: radial-gradient(#60efbc, #0a9f92);">
                            <div class="card-body ">
                                <center>
                                    <div class="d-flex m-b-30 align-items-center no-block ">
                                        <!-- <h5 class="card-title"><?= $rnpx['NamaPptk']; ?></h5> -->
                                        <div class="ml-auto">
                                        </div>
                                    </div>
                                    <span style="font-size:30px;color:#fff">
                                        <div><? if (!empty($rnpx['Foto'])) { ?>
                                                <img src="img/foto/<?= $rnpx['Foto'] ?>" class="img-circle zoom" width="120" height="120" />
                                            <? } else { ?><img src="img/pp.jpg" class="img-circle zoom" width="60" height="60" /><? } ?>
                                        </div> <br><?= $rnpx['ranap']; ?>
                                    </span>
                                    <!-- <br>PASIEN -->
                                    <h6 class="card-title"><?= $rnpx['NamaPptk']; ?></h6>
                                    <h7 class="text-mute">NIP. <?= $rnpx['Nip']; ?></h7>
                                </center>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row text-center m-b-20">
                                    <div class="col-lg-6 col-md-4 m-t-20">
                                        <h7 class="text-muted"> PAGU</h7>
                                        <span class="btn m-t-5 m-r-5 btn-outline-danger"><a style="font-size: 10px;"><? echo number_format($rnpx['Anggaran'], 2, ',', '.'); ?></a></span>
                                    </div>
                                    <div class="col-lg-6 col-md-4 m-t-20">
                                        <h7 class="text-muted">REALISASI </h7>
                                        <span class="btn m-t-5 m-r-5 btn-success"><a style="font-size: 10px;"><? echo number_format($rnpx['Realisasi'], 2, ',', '.'); ?></a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <? } ?>
<!-- 
                <div class="col-lg-12 col-md-4 m-t-20">
            <a href="index.php?link=#" class="btn m-t-10 m-r-5 btn-outline-info">
                KEMBALI </a>
            </div> -->
        </div>
    </div>
</div>
</div>