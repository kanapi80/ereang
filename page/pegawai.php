<style>
  /* The Modal (background) */
  .modalx {
    display: none;
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
    padding: 20px ;
    border: 0px solid #888;
    width: 450px;
	border-radius:6px;
	 box-shadow:1px 1px 4px 1px #7f8180;
	background:linear-gradient(#bbb, #e5f4e5);
	padding-bottom:40px;
	
  }
 .modalx-content:hover {
 box-shadow:3px 1px 10px 1px #7f8180;
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
    <div class="card" style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%);">
      <div class="card-body">
        <div class="d-flex m-b-0 align-items-center no-block">
          <h5 class="card-title ">INSERT PEGAWAI</h5>

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
                  $search = $search . " AND a.NAMA LIKE '%" . $nama . "%' ";
                } else {
                  $search = "AND a.NAMA LIKE '%" . $nama . "%' ";
                }
              }
              $grup = "";
              if (!empty($_GET['grup'])) {
                $grup = $_GET['grup'];
              }

              if ($grup != "") {
                if ($search != "") {
                  $search = $search . " AND b.id_ruang = '" . $grup . "' ";
                } else {
                  $search = "AND b.id_ruang = '" . $grup . "' ";
                }
              }
              ?>


              <div align="center">
                <form name="formsearch" method="get">
                  <table width="100%" style="background-color:transparent">
                    <tr valign="bottom">
                      <td width="30%">
                      <input type="text" name="nama"  value="<? if ($nama != "") { echo $nama; } ?>" placeholder="Nama" class="form-control" />                      </td>
                      <td width="15%">
                        <select name="grup" class="form-control">
                          <option value="0">Ruangan</option>
                          <?
                          $qrypoly = mysql_query("SELECT id_ruang,nama_ruang FROM b_ruangan  ORDER by nama_ruang ASC ") or die(mysql_error());
                          while ($listpoly = mysql_fetch_array($qrypoly)) {
                          ?>
                            <option value="<? echo $listpoly['id_ruang']; ?>" <?php if ($listpoly['nama_ruang'] == $_REQUEST['grup']) : echo 'selected="selected"';
                                                                              endif; ?>><? echo $listpoly['nama_ruang']; ?></option>
                          <?
                          }
                          ?>
                      </select>                      </td>
                      <td width="1px%"><input type="hidden" name="link" value="<?= $_GET['link']; ?>" /></td>
                      <td colspan="4"><button type="submit" class="btn btn-outline-success"><i class="fa fa-search" style="color:success;"></i>&nbsp;&nbsp;C a r i</button>                      </td>
                      <td width="33%" align="right" valign="bottom"><a href="page/update_index.php" target="_self" ><button type="button" name="index" class="btn m-t-10 m-r-5 btn-outline-primary" id="index"><i class="fa fa-external-link" style="color:primary;"></i>&nbsp;&nbsp;Update Indeks</button></a>
                      <button type="button" name="tom" class="btn m-t-10 m-r-5 btn-outline-success" id="klaim"><i class="fa fa-plus" style="color:success;"></i>&nbsp;&nbsp;Insert Data</button>                      </td>
                      <td width="2%" align="right" valign="bottom">
                       <!-- <? $jumall = mysql_num_rows(mysql_query("SELECT * FROM m_pegawai where ONOFF='ON'")); ?>
                        <button type="button" class="btn m-t-10 m-r-5 btn-outline-success"> <?= $jumall; ?> </button>       -->               </td>
                    </tr>
                  </table>
                </form>
                <br>
              </div>
              <div class="table-responsive" id="table_search">
                <table width="100%" cellpadding="4px" cellspacing="0" class="tb" id="myTable1"  style="font-size:11px" border="1px">
                  <tr align="center">
                    <th width="3%" rowspan="2" align="center">NO</th>
                    <th rowspan="2" align="left">NAMA </th>
                    <th rowspan="2" align="left">STATUS</th>
                    <th rowspan="2" align="left">PROFESI </th>
                    <th rowspan="2">PENDIDIKAN</th>
                    <th rowspan="2">GOL</th>
                    <th rowspan="2">TMT<BR />MASA KERJA</th>
                    <th rowspan="2">RUANGAN</th>
                    <th rowspan="2">POSISI</th>
                    <th colspan="6">INDEX STATIS</th>
                    <th colspan="3">INDEX DINAMIS </th>
                    <th rowspan="2">JUMLAH</th>
                  </tr>
                  <tr align="center" bgcolor="#a3e8ec">
                    <th title="Pendidikan">PD</th>
                    <th title="Golongan">GL</th>
                    <th title="Masa Kerja">MK</th>
                    <th title="Resiko Kerja">RK</th>
                    <th title="Emergency">EM</th>
                    <th title="Posisi Indeks">PS</th>
                    <th title="Tanggung Jawab">TJ</th>
                    <th title="Kehadiran">KH</th>
                    <th title="Bobot Kerja">BK </th>
                  </tr>
                  <?
                  $sql = "SELECT a.*,b.id_ruang,b.nama_ruang,b.grup,c.NAMA AS ST_PG,d.NAMA AS ST_PEN,e.NAMA AS ST_JB,f.NAMA AS ST_PROF 
					 	  FROM m_pegawai a
						  LEFT JOIN b_ruangan b ON b.id_ruang = a.RUANGAN 
						  LEFT JOIN m_index c ON c.ID=a.STATUS
						  LEFT JOIN m_index d ON d.ID=a.PEND
						  LEFT JOIN m_index e ON e.ID=a.JABATAN
						  LEFT JOIN m_index f ON f.ID=a.PROFESI
						  WHERE a.ONOFF IN ('ON','OFF') " . $search . " order by a.NAMA ASC";
                  $NO = 0;
                  $pager = new PS_Pagination($connect, $sql, 15, 5, "grup=" . $grup . "&nama=" . $nama , "index.php?link=PEGAWAI&");

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
                      <td align="left"><a href="index.php?link=Profile&ID=<?=$data['ID']?>"><?php echo $data['GD']; ?>&nbsp;<?php echo strtoupper($data['NAMA']); ?>,&nbsp;<?php echo $data['GB']; ?></a></td>
                      <td><?php echo $data['ST_PG']; ?></td>
                      <td><?php echo $data['ST_PROF']; ?></td>
                      <td align="center"><?php echo $data['ST_PEN']; ?></td>
                      <td align="CENTER"><?php echo $data['GOL']; ?></td>
                      <td align="CENTER"><?php echo $data['TMT_GOL']; ?><br />
                      <?php
                		  $a = datediff($data['TMT_GOL'], date("Y"));
                		  echo $a[years]." tahun ".$a[months]." bulan "; ?>                        </td>
                      <td align="left"><?php echo $data['nama_ruang']; ?></td>
                      <td align="left"><?php echo $data['ST_JB']; ?></td>
                      <td align="center" title="Pendidikan : <?= $data['ST_PEN']; ?>"><?php echo $data['X1']; ?></td>
                      <td align="center"><?php echo $data['X2']; ?></td>
                      <td align="center"><?php echo $data['X3']; ?></td>
                      <td align="center"><?php echo $data['X4']; ?></td>
                      <td align="center"><?php echo $data['X5']; ?></td>
                      <td align="center"><?php echo $data['X6']; ?></td>
                      <td align="center"><?php echo $data['TJ']; ?></td>
                      <td align="center"><?php echo $data['KH']; ?></td>
                      <td align="center"><?php echo $data['BK']; ?></td>
                      <td align="center">
                        <?php echo $data['XX']; ?> </td>
                    </tr>
                  <?  }

                  ?>
                </table>
                <?php
                echo "<div style='padding:5px;font-size:12px;font-family:Square721 BT' align=\"center\"><br />";
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

<!-- The Modal -->
<div id="myModalx" class="modalx">

  <!-- Modal content -->
  <div class="modalx-content" >
   
    <form method="post" action="./page/i_index.php" enctype="multipart/form-data" >
      <table width="100%" style="background:none">
        <tr style="color:#fff">
          <td width="90%" ><h5><i class="fa  fa-share-square-o" style="color:36bea6;font-size:20px"></i>&nbsp;INSERT DATA INDEX PEGAWAI</h5></td>
          <td width="10%"><span class="closex">&times;</span></td>
        </tr>
        <tr>
          <td colspan="2"> Bulan <br /><input type="hidden" name="link" value="<?= $_GET['link'] ?>" />
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
            </select>          </td>
        </tr>

        <tr>
          <td colspan="2">Tahun <br />
            <select name="tahun" class="form-control">
              <option value="<?= date('Y'); ?>" <? if ($tahuns == date('Y')) echo "selected='selected'"; ?>><?= date('Y'); ?></option>
              <!--<option value="<?= date('Y') - 1; ?>" <? if ($tahuns == date('Y') - 1) echo "selected='selected'"; ?>><?= date('Y') - 1; ?></option> 
<option value="<?= date('Y') - 2; ?>" <? if ($tahuns == date('Y') - 2) echo "selected='selected'"; ?>><?= date('Y') - 2; ?></option> -->
            </select>          </td>
        </tr>
        <tr>
          <td colspan="2">Password
		        <input type="password" name="pass" class="form-control" required="required" />          </td>
        </tr>
        <tr>
          <td colspan="2">
            <button class="btn m-t-10 m-r-5 btn-outline-success" type="submit" style="width:100%;height:30px;"><i class="fa fa-save"></i>&nbsp;&nbsp;SIMPAN</button>          </td>
        </tr>
      </table>
    </form>

  </div>

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