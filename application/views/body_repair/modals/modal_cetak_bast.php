<?php
ob_start();
session_start();
include('dbcon/db_config.php');

$kelas = stripslashes($_GET["kelas"]);
$tgl = $_GET[tgl];
$tujuan = stripslashes($_GET[tujuan]);
$agen = stripslashes($_GET[agen]);
$id = stripslashes($_GET[id]);

$ttgl = explode("/",$tgl);
$temptgl = $ttgl[2] . "-" . $ttgl[1] . "-" . $ttgl[0];

$sql = mysql_query("select * from bus_keluar where id_berangkat = '$id'") or die(mysql_error());
  $jumlah = mysql_num_rows($sql); 
   if ($jumlah > 0) {
   while ($hasil =mysql_fetch_array($sql)) {
	   	$id=$hasil['id_berangkat'];
		$no_body=$hasil['no_body']; 
		$no_pol=$hasil['no_pol'];
		$tgl_berangkat=$hasil['tgl_berangkat']; 
		$nic_sp1=$hasil['nic_sp1']; $nic_sp2=$hasil['nic_sp2']; 
		$asal=$hasil['asal']; $tujuan=$hasil['tujuan']; 
		$kelas=$hasil['kelas']; $jatah=$hasil['jatah'];	
		$lb_kr=$hasil['lb_kr']; $lb_kn=$hasil['lb_kn'];	
		$sign_kr=$hasil['sign_kr']; $sign_kn=$hasil['sign_kn'];	
		$lmp_kr=$hasil['lmp_kr']; $lmp_kn=$hasil['lmp_kn'];	
		$lmp_kota_kr=$hasil['lmp_kota_kr'];	
		$lmp_kota_kn=$hasil['lmp_kota_kn'];
		$spion_kr=$hasil['spion_kr'];	
		$spion_kn=$hasil['spion_kn'];	
		$ban_serep=$hasil['ban_serep'];	
		$kc_roda=$hasil['kc_roda'];	
		$dongkrak=$hasil['dongkrak'];	
		$video=$hasil['video'];	
		$tv=$hasil['tv'];	
		$tape=$hasil['tape'];	
		$stnk=$hasil['stnk'];	
		$kps=$hasil['kps'];	
		$keur=$hasil['keur'];
		$buku_jr=$hasil['buku_jr'];	
		$siu=$hasil['siu'];	
		$kc_kontak=$hasil['kc_kontak'];
   
			$sql_sp1 = mysql_query("select * from sopir WHERE nic_sp = '$nic_sp1'");
			 $hasil_sp1 =mysql_fetch_array($sql_sp1); $nama_sp1 =$hasil_sp1['nama_sp'];
			 
			 $sql_sp2 = mysql_query("select * from sopir WHERE nic_sp = '$nic_sp2'");
			 $hasil_sp2 =mysql_fetch_array($sql_sp2); $nama_sp2 =$hasil_sp2['nama_sp'];
			 
			 $sql_kr = mysql_query("select * from kernet WHERE nic_kr = '$nic_kr'");
			 $hasil_kr =mysql_fetch_array($sql_kr); $nama_kr =$hasil_kr['nama_kr'];
   }
			?><?php
 function DateToIndo($date){
		$BulanIndo = array("01", "02", "03",
						   "04", "05", "06",
						   "07", "08", "09",
						   "10", "11", "12");
	
		$tahun = substr($date, 0, 4);  
        $bulan = substr($date, 5, 2);  
        $tgl   = substr($date, 8, 2);  
          
        $result = $tgl . "/" . $BulanIndo[(int)$bulan-1] . "/". $tahun;       
        return($result);  
	}
?>
<html>
<head>
<title>Halaman Administrasi</title>
<style>
body {
	font-size:14px;font-family:"times";margin:0;padding:0
	/*background:url(images/back_tiket_2.jpg) top left no-repeat;*/
}
td{
	font-size:15px;font-family:"times";
}

@media print
{
.ganti {page-break-after:always}
#prints{display:none;}
}
</style>
</head>
<body onload='window.print()'>
<input type="button" value="Print" id="prints" onclick="window.print();">
<body >

<?php
$query = "UPDATE bus_keluar SET 
			printBAST		='Yes'
			where id_berangkat='$id'";
         
           $sql = mysql_query ($query);		
?>
<div <?php echo $ganti?> style="border:0px solid #000;width:350;height:14cm;">
	<table border="0" style="" cellpadding="0" cellspacing="0" width="350">
	<tr>
			<td align="right">User : <?php echo $_SESSION[FirstName]?></td>
		</tr>
		<tr>
			<td align="center" style="text-transform:uppercase;font-size:18px">BERITA ACARA SERAH TERIMA</td>
		</tr>
		<tr>
			<td valign="top" >
				<table>
					<tr>
					  <td colspan="2" >Pada hari ini :</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
					<tr>
						<td > Tanggal</td>
						<td ><?php echo (DateToIndo($tgl_berangkat))?></td>
						<td width="57">Jam</td>
						<td width="60"><?php echo date("H:i:s")?></td>
					</tr>
					<tr>
						<td  width="65">Saya</td>
						<td  width="148"><?php echo $nama_sp1 ?></td>
						<td width="57">No Pol</td>
						<td width="60"><?php echo $no_pol?></td>
					</tr>
					<tr>
					  <td>Nia</td>
					  <td><?php echo $nic_sp1?></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
					<tr>
						<td width="65">A.n</td>
						<td width="148"><?php echo $tujuan?></td>
						<td width="57">No Body</td>
						<td width="60"><?php echo $no_body?></td>
					</tr>
					<tr>
						<td colspan="4">MENERIMA KENDARAAN BUS DENGAN KEADAAN SEBAGAI BERIKUT :</td>					
					</tr>
				</table>	
			</td>
		</tr>	
		
		<tr>
			<td valign="top" style="padding-bottom:40px">
				<table width="100%" border="0" cellspacing="0" style="border-top:1px dashed #000;border-bottom:1px dashed #000;">
					<tr>
						<td width="68" style="border-bottom:1px dashed #000;">Nama Part</td>
						<td width="22" style="border-bottom:1px dashed #000;">&nbsp;KR&nbsp;</td>
						<td width="24" style="border-right:1px dashed #000;border-bottom:1px dashed #000;">&nbsp;KN&nbsp;</td>
						<td width="85" style="border-bottom:1px dashed #000;">&nbsp;Nama Part</td>
						<td width="30" style="border-right:1px dashed #000;border-bottom:1px dashed #000;">&nbsp;KET&nbsp;</td>
						<td width="78" style="border-bottom:1px dashed #000;">&nbsp;Nama Part</td>
						<td width="29" style="border-bottom:1px dashed #000;">&nbsp;KET&nbsp;</td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Besar</td>
					  <td class="kelengkapan"><?php if (empty($lb_kr))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if (empty($lb_kn))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
						<td class="kelengkapan">Ban Stip/Serep</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if (empty($ban_serep))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
						<td class="kelengkapan">STNK</td>
						<td class="kelengkapan"><div align="center">
						  <?php if (empty($stnk))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Sign</td>
					  <td class="kelengkapan"><?php if (empty($sign_kr))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if (empty($sign_kn))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
						<td class="kelengkapan">Kunci Roda</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if (empty($kc_roda))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
						<td class="kelengkapan">KPS</td>
						<td class="kelengkapan"><div align="center">
						  <?php if (empty($kps))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Rem</td>
					  <td class="kelengkapan"><?php if (empty($lmp_kr))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if (empty($lmp_kn))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
						<td class="kelengkapan">Dongkrak</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if (empty($dongkrak))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
						<td class="kelengkapan">Buku Keur</td>
						<td class="kelengkapan"><div align="center">
						  <?php if (empty($keur))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Kota</td>
					  <td class="kelengkapan"><?php if (empty($lmp_kota_kr))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;"><?php if (empty($lmp_kota_kn))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
						<td class="kelengkapan">Video</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if (empty($video))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
						<td class="kelengkapan">Buku JR</td>
						<td class="kelengkapan"><div align="center">
						  <?php if (empty($buku_jr))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Kaca Spion</td>
					  <td class="kelengkapan" ><?php if (empty($spion_kr))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if (empty($spion_kn))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?></td>
						<td class="kelengkapan">TV</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if (empty($tv))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
						<td class="kelengkapan">SIU</td>
						<td class="kelengkapan"><div align="center">
						  <?php if (empty($siu))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'>";}?>
					    </div></td>
					</tr>
					<tr>
						<td >&nbsp;</td>
						<td>&nbsp;</td>
						<td style="border-right:1px dashed #000;">&nbsp;</td>
						<td class="kelengkapan">Tape</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if (empty($tape))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'";}?>
					    </div></td>
						<td class="kelengkapan">Kunci Kontak</td>
						<td class="kelengkapan"><div align="center">
						  <?php if (empty($kc_kontak))echo ""; else {echo "<img src='images/check.png' height='15' width='15' border='0'";}?>
					    </div></td>
					</tr>
				</table>
			</td>
		</tr>
	
		<tr>
			<td valign="top" style="padding:15px 0 50px 0;">
				<table>
					<tr>
						<td width="150"># Solar</td>
						<td width="150"></td>
						<td width="150"># Keterangan Lain</td>
						<td width=""></td>
					</tr>
					<tr>
						<td width="">Kaca Depan</td>
						<td width=""></td>
						<td width=""></td>
						<td width=""></td>
					</tr>
					<tr>
						<td width="">Gorden</td>
						<td width=""></td>
						<td width=""></td>
						<td width=""></td>
					</tr>
					
				</table>
			</td>
		</tr>
		<tr>
			<td align="center" style="border-top:1px dashed #000;">&nbsp;</td>
		</tr>
		<tr>
			<td valign="top" style="padding:15px 0 50px 0;">
				<table width="100%">
					<tr>
						<td width="30%">Yang menerima</td>
						<td width="30%" align="center">Saksi</td>
						<td align="center">Yang menyerahkan</td>
					</tr>
					<tr>
						<td align="left"><br><br><br><br><br><div  style="width:80px;border-top:1px solid #000">&nbsp;</div></td>
						<td align="center"><br><br><br><br><br><div  style="width:80px;border-top:1px solid #000">&nbsp;</div></td>
						<td align="center"><br><br><br><br><br><div  style="width:80px;border-top:1px solid #000">&nbsp;</div></td>
					</tr>
				</table>	
			</td>
		</tr>	
	</table>
</div>
<?php } ?>

</body>
</html>
