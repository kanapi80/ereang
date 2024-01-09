<? session_start();
if (!isset($_SESSION['SES_REG'])) {
  header("location:logins.php");
}
// ADMIN
if ($_SESSION['ROLES'] == "30") { ?>
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li> <a class="waves-effect waves-dark" href="index.php?link=#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
        <li> <a class="waves-effect waves-dark" href="index.php?link=PPTK&tahun=<?php echo $tahun;?>" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">PPTK</span></a></li>
        <li> <a class="waves-effect waves-dark" href="index.php?link=PENDAPATAN" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Pendapatan</span></a></li>
        <li> <a class="waves-effect waves-dark" href="index.php?link=BELANJA&thn=<?php echo $tahun;?>" aria-expanded="false"><i class="fa  fa-bar-chart-o"></i><span class="hide-menu">Belanja</span></a></li>
        <!-- <li> <a class="waves-effect waves-dark" href="index.php?link=#" aria-expanded="false"><i class="fa fa-credit-card"></i><span class="hide-menu">Pembiayaan</span></a></li> -->
        <div class="text-center m-t-30">
        </div>
      </ul>
    </nav>
  </div>
<? } ?>
<!--PPTK-->
<? if ($_SESSION['ROLES'] == "92") { ?>
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
        <li> <a class="waves-effect waves-dark" href="index.php?link=Profile" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Profile </span></a></li>
        <li> <a class="waves-effect waves-dark" href="index.php?link=BELANJA&thn=<?php echo $tahun;?>" aria-expanded="false"><i class="fa  fa-bar-chart-o"></i><span class="hide-menu">Belanja</span></a></li>
        <div class="text-center m-t-30">
        </div>
      </ul>
    </nav>
  </div>
<? } ?>
<!--DIREKTUR-->
<? if ($_SESSION['ROLES'] == "93") { ?>
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
         <li> <a class="waves-effect waves-dark" href="view.php?link=#" aria-expanded="false">
            <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
        <li> <a class="waves-effect waves-dark" href="view.php?link=RBA" aria-expanded="false">
            <i class="fa fa-user"></i><span class="hide-menu">RBA</span></a></li>
        <li> <a class="waves-effect waves-dark" href="view.php?link=REALISASI" aria-expanded="false">
            <i class="fa fa-book"></i><span class="hide-menu">REALISASI</span></a></li>
        <li> <a class="waves-effect waves-dark" href="view.php?link=DETAIL" aria-expanded="false">
            <i class="fa  fa-bar-chart-o"></i><span class="hide-menu">DETAIL</span></a></li>
        <li> <a class="waves-effect waves-dark" href="view.php?link=TOP" aria-expanded="false">
            <i class="fa fa-credit-card"></i><span class="hide-menu">T O P</span></a></li>
        <div class="text-center m-t-30">
        </div>
      </ul>
    </nav>
  </div>
<? } ?>