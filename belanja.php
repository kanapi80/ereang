<style>
    /* The Modal (background) */
    .modalx {
        display: block;
        /* Hidden by default */
        /*  display: none; /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.2);
        /* Black w/ opacity */
    }

    /* Modal Content */
    .modalx-content {
        /*background-color: #fefefe;*/
        margin: auto;
        padding: 20px;
        border: 0px solid #888;
        width: 85%;
        border-radius: 6px;
        box-shadow: 1px 1px 4px 1px #7f8180;
        background: linear-gradient(#025244, #e5f4e5);
        padding-bottom: 40px;

    }

    .modalx-content:hover {
        box-shadow: 3px 1px 10px 1px #7f8180;
    }

    /* The Close Button */
    .closex {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .closex:hover,
    .closex:focus {
        color: red;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card" style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  60%);">
            <div class="card-body">
                <div class="d-flex m-b-0 align-items-center no-block">
                    <h5 class="card-title ">DAFTAR BELANJA </h5>

                </div>
            </div>
            <div class="card-body bg-light">
                <div class="row text-center m-b-20">
                    <div class="col-lg-12 col-md-4 m-t-20">
                        <h7 class="m-b-0 font-light">
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
                                    $search = $search . " AND NamaPptk LIKE '%" . $nama . "%' ";
                                } else {
                                    $search = "AND NamaPptk LIKE '%" . $nama . "%' ";
                                }
                            }
                            $belanja = "";
                            if (!empty($_GET['belanja'])) {
                                $belanja = $_GET['belanja'];
                            }

                            if ($belanja != "") {
                                if ($search != "") {
                                    $search = $search . " AND NamaBelanja LIKE '%" . $belanja . "%' ";
                                } else {
                                    $search = "AND NamaBelanja LIKE '%" . $belanja . "%' ";
                                }
                            }
                            $thn = "";
                            if (!empty($_GET['thn'])) {
                                $thn = $_GET['thn'];
                            }

                            if ($thn != "") {
                                if ($search != "") {
                                    $search = $search . " AND TahunAnggaran  ='" . $thn . "' ";
                                } else {
                                    $search = " AND TahunAnggaran  ='" . $thn . "'";
                                }
                            }

                            ?>

                            <div style="padding-bottom:10px;">
                                <form name="formsearch" method="get">
                                    <table width="100%" style="background-color:transparent">
                                        <tr>
                                            <td width="30%">
                                                <input type="text" name="nama" value="<? if ($nama != "") {
                                                                                            echo $nama;
                                                                                        } ?>" placeholder="Nama PPTK..." class="form-control" />
                                            </td>

                                            <td style="color:#FFFFFF;font-weight:bold;" width="30%">
                                                <input type="text" name="belanja" value="<? if ($belanja != "") {
                                                                                                echo $belanja;
                                                                                            } ?>" placeholder="Nama Belanja ..." class="form-control" style="width:100%" />
                                            </td>
                                            <td width="30%">
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
                                            <td align="left" width="30%"><button type="submit" class="btn btn-success"><i class="fa fa-search"></i>&nbsp;&nbsp;C a r i</button>
                                                <input type="hidden" name="link" value="<?= $_GET['link']; ?>" />
                                            </td>

                                            <td width="380" align="right" valign="bottom">
                                                <!-- <a href="./index.php?link=<?= $_GET['link']; ?>&verif=1"  >  
                                                <button type="button" name="tom" class="btn m-t-10 m-r-5 btn-outline-success" ><i class="fa fa-plus" style="color:success;"></i>&nbsp;&nbsp;Pendapatan</button></a> 
                                                      -->

                                            </td>
                                        </tr>
                                    </table>

                                </form>
                            </div>
                            <div class="table-responsive">
                                <table width="100%" cellpadding="4px" cellspacing="0" class="tb" id="myTable1" style="font-size:11px" border="1px">

                                    <tr align="center">
                                        <th width="4%" rowspan="2" align="center">NO</th>
                                        <!-- <th width="15%" rowspan="2" align="left">NAMA GRUP REKENING </th> -->
                                        <!-- <th width="7%" rowspan="2" align="center">KODE BELANJA </th>-->
                                        <th width="22%" rowspan="2">NAMA BELANJA </th>
                                        <th colspan="3">ANGGARAN</th>
                                        <th width="5%" rowspan="2">TAHUN</th>
                                        <th width="18%" rowspan="2">PPTK</th>
                                        <!--  <th>KET</th>-->
                                        <th width="10%" rowspan="2">AKSI</th>
                                        <!--   <th>AKSI</th>-->
                                    </tr>
                                    <tr align="center">
                                        <th width="10%">PAGU </th>
                                        <th width="5%">REALISASI</th>
                                        <th width="5%">SISA</th>
                                    </tr>
                                    <?

                                    if ($_SESSION['ROLES'] == "30") {
                                        $sql = "SELECT * from t_belanja where Status='ON' and PaguAnggaran!='0'  " . $search . "   order by KdBelanja ASC";
                                    } else {
                                        $sql = "SELECT * from t_belanja where Status='ON' and KdPptk='" . $_SESSION['KDUNIT'] . "'  and PaguAnggaran!='0' " . $search . "   order by KdBelanja ASC";
                                    }
                                    $NO = 0;
                                    $pager = new PS_Pagination($connect, $sql, 25, 5, "nama=" . $nama . "&thn=" . $thn . "&norm=" . $norm, "index.php?link=BELANJA&");
                                    //The paginate() function returns a mysql result set
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
                                                                echo ($hal * 25) + $NO; ?></td>
                                            <!-- <td align="left"><?php echo $data['NamaGrupKegiatan']; ?></td> -->
                                            <!--   <td align="center"><?php echo $data['KdBelanja']; ?></td>-->
                                            <td align="left"><?php echo $data['NamaBelanja']; ?></td>
                                            <td align="right"><? echo number_format($data['PaguAnggaran'], 2, ',', '.'); ?></td>
                                            <td align="right"><? echo number_format($data['RealisasiAnggaran'], 2, ',', '.'); ?></td>
                                            <td align="right"><?php $sisax = $data['PaguAnggaran'] - $data['RealisasiAnggaran'];
                                                                echo number_format($sisax, 2, ',', '.'); ?></td>
                                            <td align="center"><?php echo $data['TahunAnggaran']; ?></td>
                                            <td align="left"><?= $data['NamaPptk']; ?></td>
                                            <!--  <td ><?php echo $data['KET']; ?></td>-->
                                            <td align="center">
                                                <?php if ($_SESSION['KDUNIT'] == "1") { ?><a href="./index.php?link=<?= $_GET['link']; ?>&edit=1&id=<?= $data['Id']; ?>"> <button type="button" name="tom" class="btn btn-outline-primary sm-btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="color:success;"></i></button></a> <? } ?>
                                                <a href="./index.php?link=<?= $_GET['link']; ?>&verif=1&id=<?= $data['Id']; ?>"> <button type="button" name="tom" class="btn btn-outline-success sm-btn" data-toggle="tooltip" data-placement="top" title="Proses"><i class="fa fa-angle-double-right"></i></button></a>
                                            </td>
                                            <!-- <td align="center">
                                                    <? if ($data['STATUS'] == "ON") { ?><button class="btn btn-sm btn-outline-success" type="submit"><i class="fa fa-edit" ></i>&nbsp;&nbsp;Edit</button><? } ?> <? if ($data['STATUS'] == "OFF") { ?>
            <a href='./jasa/edit_input.php?link=<?= $_GET['link']; ?>&idx=<?= $data['IDXDAFTAR'] ?>&nosep=<?= $data['NOSEP'] ?>&bulan=<?= $_GET['bulan'] ?>&tahun=<?= $_GET['tahun'] ?>&nip=<?= $data['NIP_JKN']; ?>&name=<?= $_SESSION['NIP'] ?>' onClick="javascript:return confirm('Anda yakin ingin mengedit Input Hasil Klaim dengan No.SEP : <? echo $data['NOSEP']; ?>')" class="btn btn-outline-success"><i class="fa fa-edit" style="color:#20d708"></i>&nbsp;&nbsp;Edit</a><? } ?> </td>-->
                                        </tr>
                                    <?    }
                                    ?>
                                    <tr style="background:#36bea6;color:#fff;font-weight:bold">
                                        <?
                                        if ($_SESSION['ROLES'] == "30") {
                                            if ($_GET['tahun'] == $tahun) {
                                                $sql = "SELECT sum(PaguAnggaran) as JUMLAH,sum(RealisasiAnggaran) as JumReal from t_belanja where Status='ON'  and TahunAnggaran=" . $tahun . " GROUP BY TahunAnggaran";
                                            } else {
                                                $sql = "SELECT sum(PaguAnggaran) as JUMLAH,sum(RealisasiAnggaran) as JumReal from t_belanja where Status='ON'  " . $search . " GROUP BY TahunAnggaran";
                                            }
                                        } else {
                                            if ($_GET['tahun'] == $tahun) {
                                            $sql = "SELECT sum(PaguAnggaran) as JUMLAH,sum(RealisasiAnggaran) as JumReal from t_belanja where Status='ON' and KdPptk='" . $_SESSION['KDUNIT'] . "'  and TahunAnggaran=" . $tahun . " GROUP BY TahunAnggaran";
                                        } else {
                                            $sql = "SELECT sum(PaguAnggaran) as JUMLAH,sum(RealisasiAnggaran) as JumReal from t_belanja where Status='ON' and KdPptk='" . $_SESSION['KDUNIT'] . "' " . $search . " GROUP BY TahunAnggaran";
                                        }
                                    }
                                        $qry    = mysql_query($sql);
                                        $jum = mysql_fetch_array($qry); ?>
                                        <!-- <td align="center">&nbsp;</td> -->
                                        <td>&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                        <td align="right"><? echo number_format($jum['JUMLAH'], 2, ',', '.'); ?></td>
                                        <td align="right"><? echo number_format($jum['JumReal'], 2, ',', '.'); ?></td>
                                        <td align="center"><?php $sisaxx = $jum['JUMLAH'] - $jum['JumReal'];
                                                            echo number_format($sisaxx, 2, ',', '.'); ?></td>
                                        <td align="center"></td>
                                        <td align="center">&nbsp;</td>
                                        <td align="left">&nbsp;</td>

                                    </tr>

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
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-4 m-t-20">
        <a href="index.php?link=#" class="btn m-t-10 m-r-5 btn-outline-info">
            KEMBALI </a>
    </div>
</div>
</div>
</div>
</div>

<? if (!empty($_GET['verif'])) { ?>
    <!-- The Modal -->
    <div id="myModalx" class="modalx">

        <!-- Modal content -->
        <div class="modalx-content">
            <?php
            include("../include/connect.php");

            /*	$q_pasien	= "select * from x_SettingKlaim where id !='N' order by id  desc limit 1";
  		$get = mysql_query ($q_pasien)or die(mysql_error());
		$userdata = mysql_fetch_assoc($get); 	*/

            $id = $_GET['id'];
            $jm    = "SELECT  * FROM t_belanja
		 where Id ='$id'";
            $get = mysql_query($jm) or die(mysql_error());
            $jms = mysql_fetch_assoc($get);
            ?>
            <table width="100%">
                <tr style="color:#fff">
                    <td width="90%" style="color:36bea6;font-size:20px">
                        <h5><i class="fa  fa-edit"></i>&nbsp;<b>REALISASI BELANJA</b></h5>

                    </td>
                    <td width="10%"><a href="index.php?link=BELANJA"><span class="closex">&times;</span></a></td>
                </tr>
            </table>
            <form name="simpan" id="simpan" method="post" action="./page/SimpanBelanja.php">
                <input name="id" type="hidden" value="<?= $_GET['id']; ?>" />
                <input name="nip" type="hidden" id="nip" value="<?= $_SESSION['NIP']; ?>" />
                <input name="jmbayar" type="hidden" id="jmbayar" value="<?php echo " " . date("h:i:sa"); ?>" />
                <input name="link" type="hidden" id="link" value="<?= $_GET['link']; ?>" />
                <input name="op" type="hidden" id="op" value="edit" />
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= $jms['KdBelanja']; ?></span>
                            </div>
                            <input type="text" class="form-control" value="<?= $jms['NamaBelanja']; ?>" disabled="disabled">

                        </div>
                    </div>



                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pagu</span>
                            </div>
                            <input type="text" class="form-control" value="<? echo number_format($jms['PaguAnggaran'], 2, ',', '.'); ?>" disabled="disabled">

                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group mb-2">
                            <select name="bulan" class="form-control">

                                <option value="01" <? if ($bulans == "01") echo "selected='selected'"; ?>>Januari</option>
                                <option value="02" <? if ($bulans == "02") echo "selected='selected'"; ?>>Februari</option>
                                <option value="03" <? if ($bulans == "03") echo "selected='selected'"; ?>>Maret</option>
                                <option value="04" <? if ($bulans == "04") echo "selected='selected'"; ?>>April</option>
                                <option value="05" <? if ($bulans == "05") echo "selected='selected'"; ?>>Mei</option>
                                <option value="06" <? if ($bulans == "06") echo "selected='selected'"; ?>>Juni</option>
                                <option value="07" <? if ($bulans == "07") echo "selected='selected'"; ?>>Juli</option>
                                <option value="08" <? if ($bulans == "08") echo "selected='selected'"; ?>>Agustus</option>
                                <option value="09" <? if ($bulans == "09") echo "selected='selected'"; ?>>September</option>
                                <option value="10" <? if ($bulans == "10") echo "selected='selected'"; ?>>Oktober</option>
                                <option value="11" <? if ($bulans == "11") echo "selected='selected'"; ?>>November</option>
                                <option value="12" <? if ($bulans == "12") echo "selected='selected'"; ?>>Desember</option>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text"><?= $jms['TahunAnggaran']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">PPTK</span>
                            </div>
                            <input type="text" name="pptk" class="form-control" value="<?= $jms['NamaPptk']; ?>" disabled>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sisa</span>
                            </div>
                            <input type="text" name="pptk" class="form-control" value="<?php $sisa = $jms['PaguAnggaran'] - $jms['RealisasiAnggaran'];
                                                                                        echo number_format($sisa, 2, ',', '.'); ?>" disabled>
                        </div>
                    </div>

                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" name="jumlah" id="jumlah" onkeypress="return hanyaAngka(event, false)" class="form-control" placeholder="Input Realisasi..." required>
                        </div>
                    </div>
                    <button class="btn m-t-120 m-r-10 btn-success" type="submit" style="width:100%;height:30px;"><i class="fa fa-save"></i>&nbsp;&nbsp;SIMPAN</button>
                    <br />
            </form>


            <div class="table-responsive" style="padding-top:20px">
                <table width="100%" cellpadding="4px" cellspacing="0" class="tb" id="myTable1" style="font-size:11px" border="1px">
                    <tr align="center">
                        <th width="3%" align="center">NO</th>
                        <th width="3%">BULAN</th>
                        <th width="3%">TAHUN</th>
                        <th width="8%">JUMLAH REALISASI </th>
                        <th width="3%">KODE BELANJA </th>
                        <th width="33%" align="left">NAMA BELANJA </th>
                        <!-- <th width="6%" align="center">KODE REKENING </th>
                        <th width="20%">NAMA URAIAN </th>
                          <th>KET</th>-->
                        <th width="6%">STATUS</th>
                        <!--   <th width="6%">AKSI</th>
       <th>AKSI</th>-->
                    </tr>
                    <?
                    $id = $_GET['id'];
                    $sql = "SELECT * from t_billbelanja where  IdBelanja ='$id' " . $search . " order by IdBelanja ASC ";
                    $NO = 0;
                    $pager = new PS_Pagination($connect, $sql, 155, 5, "tgl_kunjungan=" . $tgl_kunjungan . "&ruang=" . $ruang . "&nama=" . $nama . "&norm=" . $norm, "index.php?link=BELANJA&");
                    //The paginate() function returns a mysql result set
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
                                                echo ($hal * 155) + $NO; ?></td>
                            <td align="center"><?php echo $data['BlnRealisasi']; ?></td>
                            <td align="center"><?php echo $data['TahunAnggaran']; ?></td>
                            <td align="right"><?= number_format($data['RealisasiAnggaran'], 2, ',', '.'); ?></td>
                            <td align="center"><?php echo $data['KdBelanja']; ?></td>
                            <td><?php echo $data['NamaBelanja']; ?></td>
                            <!-- <td align="center"><?php echo $data['KodeRekening']; ?></td>
                            <td align="left"><?php echo $data['NamaUraian']; ?></td>
                             <td ><?php echo $data['KET']; ?></td>-->
                            <td align="center"> <a href='index.php?link=FormEditBelanja&id=<?= $data['IdBelanja'] ?>&idBel=<?= $data['Id'] ?>&verif=1' class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a><?php echo $data['Status']; ?>

                                <a href='./page/HapusRealisasi.php?link=<?= $_GET['link']; ?>&id=<?= $data['Id'] ?>&idBel=<?= $data['IdBelanja'] ?>' onClick="javascript:return confirm('Anda yakin ingin Menghapus Realisasi : <? echo $data['NamaBelanja'], '(', $data['RealisasiAnggaran'], ')'; ?>')" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a><?php echo $data['Status']; ?>
                            </td>

                        </tr> <? } ?>
                    <tr style="font-weight:bold;background:#36bea6;color:#FFFFFF">
                        <?
                        $mysql     = mysql_query('select sum(RealisasiAnggaran) AS Jumlah from t_billbelanja WHERE IdBelanja="' . $id . '"');
                        mysql_num_rows($mysql);
                        $jumlah = mysql_fetch_array($mysql); ?>
                        <td colspan="3" align="center">JUMLAH</td>
                        <td align="right"><?= number_format($jumlah['Jumlah'], 2, ',', '.'); ?></td>
                        <td align="center">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <!--<td align="left">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                         <td align="center">&nbsp;</td>-->
                    </tr>
                </table>
            </div>
            <script type="text/javascript">
                var klaim = document.getElementById('jumlah');
                klaim.addEventListener('keyup', function(e) {
                    // tambahkan 'Rp.' pada saat form di ketik
                    // gunakan fungsi formatklaim() untuk mengubah angka yang di ketik menjadi format angka
                    klaim.value = formatklaim(this.value);
                });
                /* Fungsi formatklaim */
                function formatklaim(angka, prefix) {
                    var number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        klaim = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                    // tambahkan titik jika yang di input sudah menjadi angka ribuan
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        klaim += separator + ribuan.join('.');
                    }
                    klaim = split[1] != undefined ? klaim + ',' + split[1] : klaim;
                    return prefix == undefined ? klaim : (klaim ? 'Rp.' + klaim : '');
                }
            </script>
            <script>
                // Get the modal
                var modalx = document.getElementById("myModalx");
                // Get the button that opens the modal
                var btn = document.getElementById("klaim");
                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("closex")[0];
                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                    modalx.style.display = "block";
                }
                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modalx.style.display = "none";
                }
                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modale) {
                        modalx.style.display = "none";
                    }
                }
            </script>
        <? } ?>

        <? if (!empty($_GET['edit'])) { ?>
            <!-- The Modal -->
            <div id="myModalx" class="modalx">

                <!-- Modal content -->
                <div class="modalx-content" style="background:white;border-top:solid 6px #0a9f92">
                    <?php
                    include("../include/connect.php");
                    $id = $_GET['id'];
                    $jm    = "SELECT  * FROM t_belanja
		 where Id ='$id'";
                    $get = mysql_query($jm) or die(mysql_error());
                    $jms = mysql_fetch_assoc($get);
                    ?>
                    <table width="100%">
                        <tr style="color:#fff">
                            <td width="90%" style="color:36bea6;font-size:20px">
                                <b>
                                    <h5 style="color:#000000;font-weight:bold"><i class="fa  fa-edit"></i>&nbsp;&nbsp;FORM EDIT REALISASI BELANJA</h5>
                                </b>

                            </td>
                            <td width="10%"><a href="index.php?link=BELANJA"><span class="closex">&times;</span></a></td>
                        </tr>
                    </table>
                    <form name="simpan" id="simpan" method="post" action="./page/UpdateRBA.php">
                        <input name="id" type="hidden" value="<?= $_GET['id']; ?>" />

                        <input name="link" type="hidden" id="link" value="<?= $_GET['link']; ?>" />
                        <input name="op" type="hidden" id="op" value="edit" />

                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Grup Rekening</label>
                            <input type="text" class="form-control form-sm" disabled value="<?= $jms['NamaGrupKegiatan']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Belanja</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" value="<?= $jms['NamaBelanja']; ?>" name="NamaBelanja">
                        </div>

                        <div class="form-group"><label for="exampleInputPassword1">Pagu Anggaran</label>
                            <div class="input-group">
                                <div class="input-group-prepend">

                                    <span class="input-group-text">Rp. </span>
                                </div>
                                <input name="pagu" type="hidden" class="form-control" value="<?= $jms['PaguAnggaran']; ?>" />
                                <input type="text" class="form-control" name="jumlah" id="jumlah" onkeypress="return hanyaAngka(event, false)" value="<?= $jms['PaguAnggaran']; ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">PPTK</span>
                                </div>

                                <select style="height:22px;font-size:12px" name="pptk" class="form-control">
                                    <option value="<?= $jms['KdPptk']; ?>"><?= $jms['NamaPptk']; ?></option>
                                    <?
                                    $qrypoly = mysql_query("SELECT KodePptk,NamaPptk FROM m_pptk  ORDER by NamaPptk ASC ") or die(mysql_error());
                                    while ($listpoly = mysql_fetch_array($qrypoly)) {
                                    ?>
                                        <option value="<? echo $listpoly['KodePptk']; ?>" <?php if ($listpoly['KodePptk'] == $_REQUEST['pptk']) : echo 'selected="selected"';
                                                                                            endif; ?>><? echo $listpoly['NamaPptk']; ?></option>
                                    <?
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                    </form>

                    <div class="table-responsive" style="padding-top:20px">
                        <table width="100%" cellpadding="4px" cellspacing="0" class="tb" id="myTable1" style="font-size:11px" border="1px">
                            <tr align="center">
                                <th width="2%" align="center">NO</th>
                                <th width="15%">URAIAN BELANJA </th>
                                <th width="3%">TAHUN</th>
                                <th width="6%">TANGGAL INPUT </th>
                                <th width="6%">PAGU SEBELUMNYA </th>
                                <th width="6%">PAGU UPDATE </th>
                                <th width="12%" align="left">PPTK</th>
                                <th width="6%">USER</th>
                                <!-- <th width="6%">STATUS</th>-->
                            </tr>
                            <?
                            $id = $_GET['id'];
                            $sql = "SELECT a.TglPerubahan, a.PaguUpdate,c.NamaBelanja,a.TahunAnggaran,a.PaguAnggaran,b.NamaPptk,a.User from t_riwayatpagu a
					left join m_pptk b ON b.KodePptk=a.KdPptk
					left join t_belanja c ON c.Id= a.Id where  a.Id ='$id' " . $search . " order by a.TglPerubahan ASC ";
                            $NO = 0;
                            $pager = new PS_Pagination($connect, $sql, 155, 5, "tgl_kunjungan=" . $tgl_kunjungan . "&ruang=" . $ruang . "&nama=" . $nama . "&norm=" . $norm, "index.php?link=BELANJA&");
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
                                                        echo ($hal * 155) + $NO; ?></td>
                                    <td align="left"><?php echo $data['NamaBelanja']; ?></td>
                                    <td align="center"><?php echo $data['TahunAnggaran']; ?></td>
                                    <td align="center"><?php echo $data['TglPerubahan']; ?></td>
                                    <td align="right"><?= number_format($data['PaguAnggaran'], 2, ',', '.'); ?></td>
                                    <td align="right"><?= number_format($data['PaguUpdate'], 2, ',', '.'); ?></td>
                                    <td><?php echo $data['NamaPptk']; ?></td>
                                    <td><?php echo $data['User']; ?></td>
                                    <!--   <td align="center">  <a href='index.php?link=FormEditBelanja&id=<?= $data['IdBelanja'] ?>&idBel=<?= $data['Id'] ?>&verif=1'  class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ubah"><i class="fa fa-edit"></i></a><?php echo $data['Status']; ?>
							
							 <a href='./page/HapusRealisasi.php?link=<?= $_GET['link']; ?>&id=<?= $data['Id'] ?>&idBel=<?= $data['IdBelanja'] ?>' onClick="javascript:return confirm('Anda yakin ingin Menghapus Realisasi : <? echo $data['NamaBelanja'], '(', $data['RealisasiAnggaran'], ')'; ?>')" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-remove"></i></a><?php echo $data['Status']; ?></td>-->
                                </tr> <? } ?>
                        </table>
                    </div>

                    <script type="text/javascript">
                        var klaim = document.getElementById('jumlah');
                        klaim.addEventListener('keyup', function(e) {
                            // tambahkan 'Rp.' pada saat form di ketik
                            // gunakan fungsi formatklaim() untuk mengubah angka yang di ketik menjadi format angka
                            klaim.value = formatklaim(this.value);
                        });
                        /* Fungsi formatklaim */
                        function formatklaim(angka, prefix) {
                            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                                split = number_string.split(','),
                                sisa = split[0].length % 3,
                                klaim = split[0].substr(0, sisa),
                                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if (ribuan) {
                                separator = sisa ? '.' : '';
                                klaim += separator + ribuan.join('.');
                            }
                            klaim = split[1] != undefined ? klaim + ',' + split[1] : klaim;
                            return prefix == undefined ? klaim : (klaim ? 'Rp.' + klaim : '');
                        }
                    </script>
                    <script>
                        // Get the modal
                        var modalx = document.getElementById("myModalx");
                        // Get the button that opens the modal
                        var btn = document.getElementById("klaim");
                        // Get the <span> element that closes the modal
                        var span = document.getElementsByClassName("closex")[0];
                        // When the user clicks the button, open the modal 
                        btn.onclick = function() {
                            modalx.style.display = "block";
                        }
                        // When the user clicks on <span> (x), close the modal
                        span.onclick = function() {
                            modalx.style.display = "none";
                        }
                        // When the user clicks anywhere outside of the modal, close it
                        window.onclick = function(event) {
                            if (event.target == modale) {
                                modalx.style.display = "none";
                            }
                        }
                    </script>
                <? } ?>
                </body>