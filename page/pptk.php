<div class="row">
    <div class="col-lg-12">
        <!-- <div class="card" style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  60%);">
            <div class="card-body">
                <div class="d-flex m-b-0 align-items-center no-block">
                    <h5 class="card-title ">Daftar Nama PPTK </h5>

                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row text-center m-b-20">
                    <div class="col-lg-12 col-md-4 m-t-20">
                        <h7 class="m-b-0 font-light"> -->
        <?php
        session_start();
        include("include/connect.php");
        require_once('page/new_pagination.php');

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
                            &nbsp;&nbsp;
                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-search"></i>&nbsp;&nbsp;C a r i</button>
                        </td>
                    </tr>
                </table>
                <br>
            </form>
            <!--
                                <div class="table-responsive" id="table_search">
                                    <table width="100%" cellpadding="2px" cellspacing="0" id="myTable2">
                                        <tr align="center">
                                            <th width="3%" align="center">NO</th>
                                            <th width="5%">FOTO</th>
                                            <th width="16%" align="left">NAMA</th>
                                            <th width="12%" align="left">NIP</th>
                                            <th width="12%" align="left">PAGU ANGGARAN</th>
                                        </tr>
                                        <?
                                        $sql = "SELECT a.*,sum(b.PaguAnggaran) as Anggaran, b.TahunAnggaran from m_pptk  a 
                                        left join t_belanja b ON b.KdPptk = a.KodePptk 
                                        where a.Status='ON' " . $search . " Group by a.KodePptk order by a.NamaPptk ASC";
                                        $NO = 0;
                                        $pager = new PS_Pagination($connect, $sql, 10, 5,  "&nama=" . $nama, "index.php?link=PPTK&");

                                        $NO = 0;
                                        $rs = $pager->paginate();
                                        while ($data = mysql_fetch_array($rs)) { ?>
                                            <tr <? echo "class =";
                                                $count++;
                                                if ($count % 2) {
                                                    echo "tr4";
                                                } else {
                                                    echo "tr2";
                                                }
                                                ?>>
                                                <td align="center"><? $NO = ($NO + 1);
                                                                    if ($_GET['page'] == 0) {
                                                                        $hal = 0;
                                                                    } else {
                                                                        $hal = $_GET['page'] - 1;
                                                                    }
                                                                    echo ($hal * 10) + $NO; ?></td>
                                                <td align="center"><? if ($_SESSION['ROLES'] == '92') { ?>
                                                        <form action="page/SimpanFoto.php" method="post" enctype="multipart/form-data">
                                                            <div ><? if (!empty($data['Foto'])) { ?>
                                                                    <img src="img/foto/<?= $data['Foto'] ?>" class="img-circle" width="60" height="60" />
                                                                <? } else { ?><img src="img/pp.jpg" class="img-circle" width="60" height="60" /><? } ?>
                                                                <input type="hidden" value="<?= $data['KodePptk'] ?>" name="id" />
                                                                <input type="hidden" value="foto" name="opsi" />
                                                            </div>

                                                            <input type="hidden" value="<?= $_GET['link']; ?>" name="link" />
                                                            <div ><input type="file" class="form-cari" name="foto" id="foto" /><br><button class="btn m-t-10 m-r-5 btn-outline-info btn-sm"><span>Update</span></button>
                                                            </div>
                                                        </form><? } ?>
                                                        <? if ($_SESSION['ROLES'] == '30') { ?>
                                                    <div ><? if (!empty($data['Foto'])) { ?>
                                                            <img src="img/foto/<?= $data['Foto'] ?>" class="img-circle" width="60" height="60" />
                                                        <? } else { ?><img src="img/pp.jpg" class="img-circle" width="60" height="60" /><? } ?></div>
                                               <? } ?> </td>
                                                <td>
                                                    <h6><?php echo $data['NamaPptk']; ?></h6>
                                                </td>
                                                <td align="center"><?php echo $data['Nip']; ?></td>
                                                <td align="center"><?php echo $data['Anggaran']; ?></td>
                                              
                                              
                                                
                                            </tr>
                                        <?    }
                                        ?>
                                    </table>
                                </div>
                                <?php
                                echo "<div style='padding:5px;' align=\"center\"><br />";
                                echo $pager->renderFirst() . " | ";
                                echo $pager->renderPrev() . " | ";
                                echo $pager->renderNav() . " | ";
                                echo $pager->renderNext() . " | ";
                                echo $pager->renderLast();
                                echo "</div>";
                                ?>-->
            <!-- </div>
                    </div>
                </div>
            </div>
        </div> -->




            <div class="row">
                <?php
                $ranx = "SELECT a.*,sum(b.PaguAnggaran) as Anggaran,SUM(b.RealisasiAnggaran)as Realisasi, b.TahunAnggaran from m_pptk  a 
  left join t_belanja b ON b.KdPptk = a.KodePptk 
  where a.Status='ON' " . $search . " Group by a.KodePptk order by a.NamaPptk ASC ";
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

                <!-- <div class="col-lg-12 col-md-4 m-t-20">
            <a href="index.php?link=#" class="btn m-t-10 m-r-5 btn-outline-info">
                KEMBALI </a> -->
            </div>
        </div>
    </div>
</div>
</div>