<?php
switch ($link) {
    default:
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
