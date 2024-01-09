  
  <!-- Row -->
  <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-xlg-3 col-md-5">
                        <div class="card" style="background: radial-gradient(circle, #1fe4f5 10%, #3fbafe  90%);">
                            <div class="card-body" >
	<?php
  $myquery = "SELECT a.*, 
 case when a.JK='L' then 'Laki-laki' when  a.JK='P' then 'Perempuan' else '' end as JKS,
 b.NAMA as STATUSX ,b.KET as STATUSZ ,c.nama_ruang as RUANGANX,d.NAMA AS GOLX,d.KET as PANGKAT,e.NAMA AS PROFESIX,f.NAMA AS AGAMAX,g.NAMA AS KAWINX,h.NAMA AS UNITX,i.KODE as posisi,i.NAMA AS JABATANX,j.NAMA AS PENDX,k.NAMA AS JURUSANX,l.NAMA AS KAMPUSX
 FROM m_pegawai a   
 LEFT JOIN m_index b ON a.STATUS=b.ID 
 LEFT JOIN b_ruangan c ON a.RUANGAN=c.id_ruang 
 LEFT JOIN m_index d ON a.GOL=d.ID 
 LEFT JOIN m_index e ON a.PROFESI=e.ID 
 LEFT JOIN m_index f ON a.AGAMA=f.ID 
 LEFT JOIN m_index g ON a.KAWIN=g.ID 
 LEFT JOIN m_index h ON a.UNIT=h.ID 
 LEFT JOIN m_index i ON a.JABATAN=i.ID 
 LEFT JOIN m_index j ON a.PEND=j.ID 
 LEFT JOIN m_index k ON a.JURUSAN=k.ID 
 LEFT JOIN m_index l ON a.KAMPUS=l.ID 
WHERE a.ID='".$_GET["ID"]."'";
  		$get = mysql_query ($myquery)or die(mysql_error());
		$data = mysql_fetch_assoc($get);  
  
?>      
	
	
	 
                                   <center class="m-t-30"> <? if(!empty($data['FOTO'])){ ?>
								   <img  src="kepegawaian/foto/<?=$data['FOTO']?>"  class="img-circle" width="190" height="190"  />
								   <? } else { ?><img  src="kepegawaian/pp.jpg" class="img-circle" width="190" height="190"  /><? } ?>
								
                                    <h4 class="card-title m-t-10"><b><?=$data['GD'];?> <?=strtoupper($data['NAMA']);?><? if(!empty($data['GB'])){ echo ", "; echo $data['GB']; } ?></b></h4>
                                    <h6 class="card-subtitle"><a style="color:dimgray">
                                      <?=$data['JABATANX'];?>
</a></h6>
						  </div>
									<div class="card-body bg-light">
                <div class="row text-left m-b-20">
                    <div class="col-lg-12 col-md-4 m-t-20">
                        <h2 class="m-b-0 font-light"><? echo $pegawai['pns']; ?> </h2><span class="text-muted"> </center>
						<div class="table-responsive" style="padding-left:10px;padding-right:10px" >
							<span style="font-size:18px;color:#3fbafe;text-align:left" ><b><i class="fa fa-user-md"></i>&nbsp;&nbsp;PEKERJAAN</b></span>
	 
                                    <table class="table" style="font-size:11px" >
	 <tr>
	<td >Status Kepegawaian</td>
	<td><?=$data['STATUSX'];?> (<?=$data['STATUSZ'];?>)</td>
	</tr>
      <tr>
	<td  >Tgl. SK Pengangkatan</td>
	<td><?php  
$tglstatus=tanggal_indo($data['TGL_STATUS']); 
  if (($data['TGL_STATUS'])==0000-00-00){
echo "";
} 
else{
echo  $tglstatus ;
}
 ?></td>
	</tr>
      <tr>
	<td  >NIP / NIPT</td>
	<td><?=$data['NO_INDUK'];?></td>
	</tr>
      <tr>
	<td  >Gol / Ruang</td>
	<td><?=$data['GOLX'];?> / <?=$data['PANGKAT'];?></td>
	</tr>
      <tr>
	<td  >Bidang Profesi</td>
	<td><?=$data['PROFESIX'];?></td>
	</tr>
      <tr>
	<td  >Jabatan / Pekerjaan</td>
	<td><?=$data['posisi'];?> / <?=$data['JABATANX'];?></td>
	</tr>
      <tr>
	<td  >Ruangan / Unit / Bidang</td>
	<td><?=$data['RUANGANX'];?> / <?=$data['UNITX'];?></td>
	</tr>
	</table>   
						</div>    
					</span>
                    </div>
				</div>
								
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-5 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
								
							<div class="table-responsive" style="padding-left:20px;padding-right:10px" >
							<span style="font-size:18px;color:#3fbafe;text-align:left" ><b><i class="fa fa-vcard"></i>&nbsp;&nbsp;BIODATA</b></span>
	 
                                    <table class="table" style="font-size:11px" >
      <tr>
	<td width="40%" >Nama Lengkap </td>
	<td ><b ><?=$data['GD'];?> <?=strtoupper($data['NAMA']);?><? if(!empty($data['GB'])){ echo ", "; echo $data['GB']; } ?></b></td>
	</tr>
	 <tr>
	<td>Jenis Kelamin </td>
	<td><?=$data['JKS'];?></td>
	</tr> 
	 <tr>
	<td>Tempat, Tanggal Lahir </td>
	<td><?php 
$tgllahir=$data['TGL_LAHIR']; 
$tgl_lahir=date('Y-m-d', strtotime($data['TGL_LAHIR'])); 
$lahir=tanggal_indo($tgl_lahir); 

$biday=new DateTime($tgllahir); 
$today=new DateTime(); 
$diff=$today->diff($biday); 
if (!empty($data['TMP_LAHIR'])){
echo "$data[TMP_LAHIR], ";
}
if (($data['TGL_LAHIR'])==0000-00-00){
echo "";
} 
else{
echo "$lahir (". $diff->y." Tahun)";
}
 ?></td>
	</tr> 
	 <tr>
	<td>Alamat</td>
	<td><?=$data['ALAMAT'];?></td>
	</tr>  
	 <tr>
	<td>Desa / Kelurahan</td>
	<td><?=$data['DESA'];?></td>
	</tr>   
	 <tr>
	<td>Kecamatan - Kabupaten</td>
	<td><?=$data['KEC'];?> - <?=$data['KAB'];?></td>
	</tr>  
	 <tr>
	<td>Status Perkawinan</td>
	<td><?=$data['KAWINX'];?></td>
	</tr>   
	 <tr>
	<td>Golongan Darah</td>
	<td><?=$data['GOLD'];?></td>
	</tr>  
	 <tr>
	<td>Agama</td>
	<td><?=$data['AGAMAX'];?></td>
	</tr>  
	 <tr>
	<td>No. KTP</td>
	<td><?=$data['KTP'];?></td>
	</tr>  
	 <tr>
	<td>No. Telp/HP</td>
	<td><?=$data['TELP'];?></td>
	</tr>  
	 <tr>
	<td>Alamat Email</td>
	<td ><?=$data['EMAIL'];?></td>
	</tr> 
	</table> 
							</div>            
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
					 <!-- Column -->
					 <div class="col-lg-4 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
							<div class="table-responsive" style="padding-left:20px;padding-right:10px" >
							<span style="font-size:18px;color:#3fbafe;text-align:left" ><b><i class="fa fa-graduation-cap"></i>&nbsp;&nbsp;PENDIDIKAN</b></span>
	 
                                    <table class="table" style="font-size:11px" >
	 <tr>
	<td width="40%"> Pendidikan Terakhir </td>
	<td><?=$data['PENDX'];?></td>
	</tr>
	 <tr>
	<td>Jurusan</td>
	<td><?=$data['JURUSANX'];?></td>
	</tr>
      <tr>
	<td >Sekolah / Perguruan Tinggi </td>
	<td><?=$data['KAMPUSX'];?></td>
	</tr>
      <tr>
	<td  >No. Ijazah </td>
	<td><?=$data['NO_IJAZAH'];?></td>
	</tr>
      <tr>
	<td >No. Siswa / Mahasiswa </td>
	<td><?=$data['NO_MHS'];?></td>
	</tr>
      <tr>
	<td >Tanggal Kelulusan </td>
	<td><?php  
$tglijazah=tanggal_indo($data['TGL_IJAZAH']); 
  if (($data['TGL_IJAZAH'])==0000-00-00){
echo "";
} 
else{
echo  $tglijazah ;
}
 ?></td>
	</tr>
	</table>
							</div>

							<div class="table-responsive" style="padding-left:20px;padding-right:10px" >
							<span style="font-size:18px;color:#3fbafe;text-align:left" ><b><i class="fa fa-vcard"></i>&nbsp;&nbsp;REGISTRASI & IZIN</b></span>
	 
                                    <table class="table" style="font-size:11px" >
	 <tr>
	<td width="40%">Nomor Registrasi</td>
	<td><?=$data['NO_STR'];?></td>
	</tr> 
      <tr>
	<td >Masa Berlaku No.Reg</td>
	<td><?php  
$tglstr=tanggal_indo($data['TGL_STR']); 
  if (($data['TGL_STR'])==0000-00-00){
echo "";
} 
else{
echo  $tglstr;

 echo " (";
#$tgltmt=$data['TGL_STR']; 
$skr=date('Y-m-d');
$biday=new DateTime($data['TGL_STR']); 
$today=new DateTime(); 
$diff=$today->diff($biday);  

$tgl_berlaku2 = date('Y-m-d', strtotime('-90 days', strtotime($data['TGL_STR']))); 
 
 if($data['TGL_STR']>$skr){ 
 
 if($tgl_berlaku2>$skr){
echo "". $diff->y." Tahun, ". $diff->m." Bulan, ". $diff->d." Hari";  
}else{
echo "<a style='color:#ff0000'> ". $diff->y." Tahun, ". $diff->m." Bulan, ". $diff->d." Hari</a>"; 
} 
}else{
echo "<a  style='color:#ff0000;'>Masa Berlaku Habis</a>"; 
}
echo ")";
}
?>


</td>
	</tr>
      <tr>
	<td >Nomor Izin Praktek </td>
	<td><?=$data['NO_SIPP'];?></td>
	</tr>
      <tr>
	<td >Masa Berlaku Izin Praktek</td>
	<td><?php  
$tglsipp=tanggal_indo($data['TGL_SIPP']); 
  if (($data['TGL_SIPP'])==0000-00-00){
echo "";
} 
else{
echo  $tglsipp ;
 echo " (";
#$tgltmt=$data['TGL_STR']; 
$skrx=date('Y-m-d');
$bidayx=new DateTime($data['TGL_SIPP']); 
$todayx=new DateTime(); 
$diffx=$todayx->diff($bidayx);  

$tgl_berlaku2x = date('Y-m-d', strtotime('-90 days', strtotime($data['TGL_SIPP']))); 
 
 if($data['TGL_SIPP']>$skrx){ 
 
 if($tgl_berlaku2x>$skrx){
echo "". $diffx->y." Tahun, ". $diffx->m." Bulan, ". $diffx->d." Hari";  
}else{
echo "<a style='color:#ff0000'> ". $diffx->y." Tahun, ". $diffx->m." Bulan, ". $diffx->d." Hari</a>"; 
} 
}else{
echo "<a  style='color:#ff0000;'>Masa Berlaku Habis</a>"; 
}
echo ")";
}
 ?></td>
	</tr>
	</table>
							</div>

                            </div>
                        </div>
                    </div>
                    <!-- Column -->
					
                </div>
				<div class="col-lg-12 col-md-4 m-t-20">
            <a href="javascript:history.back()" class="btn m-t-10 m-r-5 btn-outline-info">
                KEMBALI </a>
        </div>