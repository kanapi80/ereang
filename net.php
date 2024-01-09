<?php
#session_start();
switch ($link) {
    default			:
        if (!file_exists ("page/dasboard.php"))
            die ("page/dasboard.php File Empty!");
        include 'page/dasboard.php';
        break;
    //grafik dashboard
case 'PEGAWAI'            :
        if (!file_exists ("page/pegawai.php"))
            die ("page/pegawai.php File Empty!");
        include 'page/pegawai.php';
        break;
        case 'PPTK'            :
            if (!file_exists ("page/pptk.php"))
                die ("page/pptk.php File Empty!");
            include 'page/pptk.php';
            break;
			//KEUANGAN
		case 'PENDAPATAN'            :
        if (!file_exists ("page/Pendapatan.php"))
            die ("page/Pendapatan.php File Empty!");
        include 'page/Pendapatan.php';
        break;
        case 'BELANJA'            :
            if (!file_exists ("page/belanja.php"))
                die ("page/belanja.php File Empty!");
            include 'page/belanja.php';
        break;
        	//PPTK
		case 'Profile'            :
            if (!file_exists ("page/Profile.php"))
                die ("page/Profile.php File Empty!");
            include 'page/Profile.php';
            break;
            case 'RealisasiAnggaran'            :
                if (!file_exists ("page/DetailDasboard.php"))
                    die ("page/DetailDasboard.php File Empty!");
                include 'page/DetailDasboard.php';
                break;
                case 'GrafikRBA'            :
                    if (!file_exists ("view2.php"))
                        die ("view2.php File Empty!");
                    include 'view2.php';
                    break;
					                case 'FormEditBelanja'            :
                    if (!file_exists ("page/FormEditBelanja.php"))
                        die ("page/FormEditBelanja.php File Empty!");
                    include 'page/FormEditBelanja.php';
                    break;
					//DIREKTUR
					  case 'MAIN':
					  if (!file_exists("view/gr_awal.php"))
            die("view/gr_awal.php File Empty!");
        include 'view/gr_awal.php';
        break;
	case 'RBA':
        if (!file_exists("view/gr2.php"))
            die("view/gr2.php File Empty!");
        include 'view/gr2.php';
        break;
    case 'DETAIL':
        if (!file_exists("view/gr3.php"))
            die("view/gr3.php File Empty!");
        include 'view/gr3.php';
        break;
    case 'TOP':
        if (!file_exists("view/gr4.php"))
            die("view/gr4.php File Empty!");
        include 'view/gr4.php';
        break;
    case 'DetailRecord':
        if (!file_exists("view/gr5.php"))
            die("view/gr5.php File Empty!");
        include 'view/gr5.php';
        break;
        case 'REALISASI':
            if (!file_exists("view/gr1.php"))
                die("view/gr1.php File Empty!");
            include 'view/gr1.php';
            break;
}
