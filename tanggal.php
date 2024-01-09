<?php
function tanggal_indo($tanggal, $cetak_hari = false)
{
$hari = array ( 1 =>	'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu' );
$bulan = array ( 1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$split	= explode('-',$tanggal);
$tgl_indo	=$split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

if($cetak_hari){
$num = date('N', strtotime($tanggal));
return $hari[$num] . ', '.$tgl_indo;
}
return $tgl_indo;
}


function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
?>