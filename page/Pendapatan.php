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
    background: linear-gradient(#bbb, #e5f4e5);
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
          <h5 class="card-title ">DAFTAR PENDAPATAN </h5>

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
                  $search = $search . " AND a.NamaUraian LIKE '%" . $nama . "%' ";
                } else {
                  $search = "AND a.NamaUraian LIKE '%" . $nama . "%' ";
                }
              }
              $thn = "";
              if (!empty($_GET['thn'])) {
                $thn = $_GET['thn'];
              }

              if ($thn != "") {
                if ($search != "") {
                  $search = $search . " AND a.TahunAnggaran = '" . $thn . "' ";
                } else {
                  $search = "AND a.TahunAnggaran = '" . $thn . "' ";
                }
              }
              ?>

              <div align="center">
                <form name="formsearch" method="get">
                  <table width="100%" style="background-color:transparent">
                    <tr>
                      <td width="30%">
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
                      <td colspan="4" style="color:#FFFFFF;font-weight:bold" width="30%">
                        <input type="hidden" name="link" value="<?= $_GET['link']; ?>" />
                        &nbsp;&nbsp;
                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-search"></i>&nbsp;&nbsp;C a r i</button>
                      </td>
                      <!-- <td width="380" align="right" valign="bottom">
                    <a href="./index.php?link=<?= $_GET['link']; ?>&verif=1"  >  <button type="button" name="tom" class="btn m-t-10 m-r-5 btn-outline-success" ><i class="fa fa-plus" style="color:success;"></i>&nbsp;&nbsp;Pendapatan</button></a>                      </td>
                          </td>  -->
                    </tr>
                  </table>
                  <br>
                </form>

                <div class="table-responsive" id="table_search">
                  <table width="100%" cellpadding="4px" cellspacing="0" class="tb" id="myTable1" style="font-size:11px" border="1px">
                    <tr align="center">
                      <th width="3%" rowspan="2" align="center">NO</th>
                      <!-- <th width="8%" rowspan="2">KODE GRUP REKENING </th> -->
                      <th width="13%" rowspan="2" align="left">NAMA GRUP REKENING </th>
                      <th width="6%" rowspan="2" align="center">KODE REKENING </th>
                      <th width="20%" rowspan="2">NAMA URAIAN </th>
                      <th colspan="3">BLUD</th>
                      <th width="7%" rowspan="2">APBD/ DAK</th>
                      <th width="6%" rowspan="2">JUMLAH</th>
                      <th width="6%" rowspan="2">TAHUN ANGGARAN </th>
                      <!--  <th>KET</th>-->
                      <!-- <th width="6%" rowspan="2">STATUS</th> -->
                      <th width="10%" rowspan="2">AKSI</th>
                      <!--   <th>AKSI</th>-->
                    </tr>
                    <tr align="center">
                      <th width="9%">Pagu Anggaran </th>
                      <th width="10%">Piutang Th Lalu </th>
                      <th width="12%">Jumlah Pendapatan </th>
                    </tr>
                    <?
                    $sql = "SELECT a.*,sum(b.JumlahPen) as Jum from t_pendapatan a
										left join t_billpendapatan b ON b.IdPendapatan=a.Id 
										where a.Status='ON'  " . $search . " GROUP BY a.Id order by a.KodeGrupRekening, a.KodeRekening ASC";
                    $NO = 0;
                    $pager = new PS_Pagination($connect, $sql, 15, 5, "tgl_kunjungan=" . $tgl_kunjungan . "&ruang=" . $ruang . "&nama=" . $nama . "&thn=" . $thn . "&norm=" . $norm, "index.php?link=PENDAPATAN&");
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
                                            echo ($hal * 15) + $NO; ?></td>
                        <!-- <td align="center"><?php echo $data['KodeGrupRekening']; ?></td> -->
                        <td><?php echo $data['NamaGrupRekening']; ?></td>
                        <td align="center"><?php echo $data['KodeRekening']; ?></td>
                        <td align="left"><?php echo $data['NamaUraian']; ?></td>
                        <td align="right"><? echo number_format($data['PaguAnggaran'], 2, ',', '.'); ?></td>
                        <td align="right">&nbsp;</td>
                        <td align="right"><? echo number_format($data['Jum'], 2, ',', '.'); ?></td>
                        <td align="right">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="center"><?php echo $data['TahunAnggaran']; ?></td>
                        <!--  <td ><?php echo $data['KET']; ?></td>-->
                        <!-- <td align="center"><?php echo $data['Status']; ?></td> -->
                        <td align="center">
                          <?php if ($_SESSION['KDUNIT'] == "1") { ?>
                            <a href="" data-toggle="modal" data-target="#myModal<?php echo $data['Id']; ?>"><button type="button" name="tom" class="btn btn-sm btn-outline-info" title="Edit Pagu" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-edit" style="color:success;"></i></button></a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal<?php echo $data['Id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="modalc">Edit Pagu Anggaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <?php $id = $data['Id'];
                                    $jm  = "SELECT  * FROM t_pendapatan  where Id ='$id'";
                                    $gets = mysql_query($jm) or die(mysql_error());
                                    $jmsx = mysql_fetch_assoc($gets);
                                    ?>
                                    <form name="simpan" id="simpan" method="post" action="./page/SimpanPendapatan.php">
                                      <input name="id" type="hidden" value="<?= $id; ?>" />
                                      <input name="nip" type="hidden" id="nip" value="<?= $_SESSION[NIP]; ?>" />
                                      <input name="jmbayar" type="hidden" id="jmbayar" value="<?php echo " " . date("h:i:sa"); ?>" />
                                      <input name="link" type="hidden" id="link" value="<?= $_GET['link']; ?>" />
                                      <input name="op" type="hidden" id="op" value="edit" />
                                      <div class="row">
                                        <div class="col">
                                          <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><?= $jmsx['TahunAnggaran']; ?></span>
                                            </div>
                                            <input type="text" class="form-control" value="<?= $jmsx['NamaUraian']; ?>" disabled="disabled">
                                          </div>
                                        </div>

                                      </div>
                                      <div class="row">
                                        <div class="col">
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" name="jumlah" class="form-control" value="<?= $jmsx['PaguAnggaran']; ?>">
                                          </div>
                                        </div>

                                      </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                </div>

              <? } ?>
              <a href="./index.php?link=<?= $_GET['link']; ?>&verif=1&id=<?= $data['Id']; ?>"> <button type="button" name="tom" class="btn btn-sm btn-outline-success" title="Tambah Pendapatan" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-plus" style="color:success;"></i></button></a>
              </td>
              <!-- <td align="center">
                                                    <? if ($data['STATUS'] == "ON") { ?><button class="btn btn-sm btn-outline-success" type="submit"><i class="fa fa-edit" ></i>&nbsp;&nbsp;Edit</button><? } ?> <? if ($data['STATUS'] == "OFF") { ?>
            <a href='./jasa/edit_input.php?link=<?= $_GET['link']; ?>&idx=<?= $data['IDXDAFTAR'] ?>&nosep=<?= $data['NOSEP'] ?>&bulan=<?= $_GET['bulan'] ?>&tahun=<?= $_GET['tahun'] ?>&nip=<?= $data['NIP_JKN']; ?>&name=<?= $_SESSION['NIP'] ?>' onClick="javascript:return confirm('Anda yakin ingin mengedit Input Hasil Klaim dengan No.SEP : <? echo $data['NOSEP']; ?>')" class="btn btn-outline-success"><i class="fa fa-edit" style="color:#20d708"></i>&nbsp;&nbsp;Edit</a><? } ?> </td>-->
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
      $jm  = "SELECT  * FROM t_pendapatan
		 where Id ='$id'";
      $get = mysql_query($jm) or die(mysql_error());
      $jms = mysql_fetch_assoc($get);
      ?>
      <table width="100%" style="background:none">
        <tr style="color:#fff">
          <td width="90%" style="color:36bea6;font-size:20px">
            <h5><i class="fa  fa-plus"></i>&nbsp;<b>PENDAPATAN</b></h5>

          </td>
          <td width="10%"><a href="index.php?link=PENDAPATAN"><span class="closex">&times;</span></a></td>
        </tr>
      </table>
      <form name="simpan" id="simpan" method="post" action="./page/SimpanPendapatan.php">
        <input name="id" type="hidden" value="<?= $_GET[id]; ?>" />
        <input name="nip" type="hidden" id="nip" value="<?= $_SESSION[NIP]; ?>" />
        <input name="jmbayar" type="hidden" id="jmbayar" value="<?php echo " " . date("h:i:sa"); ?>" />
        <input name="link" type="hidden" id="link" value="<?= $_GET['link']; ?>" />
        <input name="op" type="hidden" id="op" value="simpan" />
        <div class="row">
          <div class="col">
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                <span class="input-group-text"><?= $jms['KodeRekening']; ?></span>
              </div>
              <input type="text" class="form-control" value="<?= $jms['NamaUraian']; ?>" disabled="disabled">

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
                <span class="input-group-text">Rp.</span>
              </div>
              <input type="text" name="jumlah" class="form-control" placeholder="Input Pendapatan...">

            </div>
          </div>

          <div class="col">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Status</span>
              </div>
              <select name="status" class="form-control">
                <option value="<?= $jms['status']; ?>">
                  <?= $jms['status']; ?>
                </option>
                <option value="ON">ON</option>
                <option value="OFF">OFF</option>
                <option value="LOCK">LOCK</option>
              </select>

            </div>
          </div>
          <button class="btn m-t-20 m-r-10 btn-info" type="submit" style="width:100%;height:30px;"><i class="fa fa-save"></i>&nbsp;&nbsp;SIMPAN</button>
          <br />
      </form>


      <div class="table-responsive" style="padding-top:20px">
        <table width="100%" cellpadding="4px" cellspacing="0" class="tb" id="myTable1" style="font-size:11px" border="1px">
          <tr align="center">
            <th width="3%" align="center">NO</th>
            <th width="3%">BULAN</th>
            <th width="8%">TAHUN</th>
            <th width="8%">JUMLAH PENDAPATAN </th>
            <th width="8%">KODE GRUP REKENING </th>
            <th width="13%" align="left">NAMA GRUP REKENING </th>
            <th width="6%" align="center">KODE REKENING </th>
            <th width="20%">NAMA URAIAN </th>
            <!--  <th>KET</th>-->
            <th width="6%">STATUS</th>
            <th width="6%">AKSI</th>
            <!-- <th>AKSI</th> -->
          </tr>
          <?
          $id = $_GET['id'];
          $sql = "SELECT * from t_billpendapatan where  IdPendapatan ='$id'  " . $search . " order by Bulan ASC";
          $NO = 0;
          $pager = new PS_Pagination($connect, $sql, 15, 5, "tgl_kunjungan=" . $tgl_kunjungan . "&ruang=" . $ruang . "&nama=" . $nama . "&norm=" . $norm, "index.php?link=PENDAPATAN&");
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
                                  echo ($hal * 15) + $NO; ?></td>
              <td align="center"><?php echo $data['Bulan']; ?></td>
              <td align="center"><?php echo $data['TahunAnggaran']; ?></td>
              <td align="right"><?= number_format($data['JumlahPen'], 2, ',', '.'); ?></td>
              <td align="center"><?php echo $data['KodeGrupRekening']; ?></td>
              <td><?php echo $data['NamaGrupRekening']; ?></td>
              <td align="center"><?php echo $data['KodeRekening']; ?></td>
              <td align="left"><?php echo $data['NamaUraian']; ?></td>
              <!--  <td ><?php echo $data['KET']; ?></td>-->
              <td align="center"><?php echo $data['Status']; ?></td>
              <td align="center">
                <!-- <a href="./page/SimpanPendapatan.php?&link=<?= $_GET['link']; ?>&op=hapus&id=<?= $data['Id']; ?>" target="_blank"> -->
                <form name="simpan" id="simpan" method="post" action="./page/SimpanPendapatan.php">
                  <input name="id" type="hidden" value="<?= $_GET['id'] ?>" />
                  <input name="nip" type="hidden" id="nip" value="<?= $_SESSION[NIP]; ?>" />
                  <input name="idx" type="hidden" id="id" value="<?= $data['Id']; ?>" />
                  <input name="link" type="hidden" id="link" value="<?= $_GET['link']; ?>" />
                  <input name="op" type="hidden" id="op" value="hapus" />
                  <button type="submit" name="tom" class="btn btn-sm btn-outline-danger" title="Hapus Pendapatan" data-toggle="tooltip" data-placement="bottom" value="Hapus Tindakan" onClick="javascript:return confirm('Anda yakin ingin menghapus <?= $data['NamaUraian']; ?>  : <?= $data['JumlahPen']; ?>')"><i class="fa fa-trash"></i></button>
                </form>
                <!-- </a> -->
              </td>
            </tr> <? } ?>
          <tr style="font-weight:bold;background:#36bea6;color:#FFFFFF">
            <?
            $mysql   = mysql_query('select sum(JumlahPen) AS Jumlah from t_billpendapatan WHERE IdPendapatan="' . $id . '"');
            mysql_num_rows($mysql);
            $jumlah = mysql_fetch_array($mysql); ?>
            <td colspan="3" align="center">JUMLAH</td>
            <td align="right"><?= number_format($jumlah['Jumlah'], 2, ',', '.'); ?></td>
            <td align="center">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="left">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
        </table>
      </div>
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