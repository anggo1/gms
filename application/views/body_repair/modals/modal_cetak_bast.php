<script>
        document.getElementById("btnPrint").onclick = function () {
    printElement(document.getElementById("printThis"));
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
    </script>
     <style>
@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position: absolute;
    left:0;
    top:0;
    width: 100%;
  }
}


p, td, th {
    font:2 Verdana, Arial, Helvetica, sans-serif;
	
}
.datatable {
    border-collapse: collapse;
    font: bold;
}
.datatable td {
    padding: 0px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:14px;
	font: normal;
    border: 0.5px solid #000;
}
.datatable th {
    border: 2px solid #000;
    font: bold;
    font-weight: normal;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:14px;
}
#A4 {background-color:#FFFFFF;
left:1px;
right:1px;
height:5.51in ; /*Ukuran Panjang Kertas */
width: 8.50in; /*Ukuran Lebar Kertas */
margin:1px solid #FFFFFF;
 
font-family:Georgia, "Times New Roman", Times, serif;
}
    </style>
<div class="modal-content">
						<div class="modal-header text-blue">
						<button type="button" id="btnPrint" class="btn btn-success"><span class="fa fa-print"></span>&nbsp;&nbsp; C E T A K </button>
  <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>
						</div><div class="modal-body">

	<?php 
        date_default_timezone_set('Asia/Jakarta');
		foreach($dataBast as $b){}
?>

<div id="printThis">
	
<div class="modal-header">

<p></span><h4 style="display:block; text-align:center;"> BERITA ACARA SERAH TERIMA <br><?php echo $b->id_bast ?></h4>
	</p></div>
   
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="datatable2">
		<tr>
			<td valign="top" >
			  <table width="100%" >
					<tr>
					  <td colspan="2" >Pada hari ini :</td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
					<tr>
						<td > Tanggal</td>
						<td ><?php echo tglIndoPanjang($b->tgl_bast)?></td>
						<td width="57">Jam</td>
						<td width="60"><?php echo date("H:i:s")?></td>
					</tr>
					<tr>
						<td  width="65">Nama</td>
						<td  width="148"><?php echo $b->nama_sp?></td>
						<td width="57">&nbsp;</td>
						<td width="60">&nbsp;</td>
					</tr>
					<tr>
					  <td>NIK</td>
					  <td><?php echo $b->nip_sp?></td>
					  <td>No Pol</td>
					  <td><?php echo $b->no_pol?></td>
				  </tr>
					<tr>
						<td width="65">Keterangan</td>
						<td width="148"><?php echo $b->keterangan?></td>
						<td width="57">No Body</td>
						<td width="60"><?php echo $b->no_body?></td>
					</tr>
					<tr>
						<td height="20" colspan="4">&nbsp;</td>					
					</tr>
				</table>	
                <p>MENERIMA KENDARAAN BUS DENGAN KEADAAN SEBAGAI BERIKUT :</p>
                <div></div>
	  <tr>
			<td valign="top" style="padding-bottom:40px">
				<table width="100%" class="datatable" id="datatable">
									<thead>
										<tr>
										  <th>No</th>
										<th>Perlengkapan</th>
                                        <th>Ket</th>
                                        <th>No</th>
                                        <th>Perlengkapan</th>
                                        <th>Ket</th>
                                        <th>No</th>
                                        <th>Perlengkapan</th>
                                        <th>Ket</th>
                                        <th>No</th>
                                        <th>Perlengkapan</th>
                                        <th>Ket</th>
                                        </tr>
									</thead>
									<tbody id="data-po">
									<tr>
									  <td>1.</td>
							<td>Kaca Depan</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>24.</td>
							<td>Lampu Signal depan RH</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>47.</td>
							<td>Unit AC</td>
							<td>&nbsp;</td>
							<td>70.</td>
							<td>Kunci Roda &amp; Stang</td>
							<td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							</tr>
						<tr>
						  <td>2.</td>
							<td>Kaca Kiri</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>25.</td>
							<td>Lampu Signal Samping</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>48.</td>
							<td>Kursi Kernet</td>
							<td>&nbsp;</td>
							<td>71.</td>
							<td>Dash Board</td>
							<td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							</tr>
						<tr>
						  <td>3.</td>
							<td>Kaca Kanan</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>26.</td>
							<td>Lampu Plat Nomor</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>49.</td>
							<td>Speedometer</td>
							<td>&nbsp;</td>
							<td>72.</td>
							<td>Sikring Kaca &amp; Batu</td>
							<td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							</tr>
						<tr>
						  <td>4.</td>
						  <td>Kaca Belakang</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>27.</td>
						  <td>Kursi Penumpang</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>50.</td>
						  <td>Tutup Seat</td>
						  <td>&nbsp;</td>
						  <td>73.</td>
						  <td>Radio Tape</td>
						  <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  </tr>
						<tr>
						  <td>5.</td>
						  <td>Spion Kanan</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>28.</td>
						  <td>Kursi Pengemudi</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>51.</td>
						  <td>Gundu Persneling</td>
						  <td>&nbsp;</td>
						  <td>74.</td>
						  <td>Video / CD</td>
						  <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  </tr>
						<tr>
						  <td>6.</td>
							<td>Spion Kiri</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>29.</td>
							<td>Sabuk Pengaman</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>52.</td>
							<td>Tabung Air Wiper</td>
							<td>&nbsp;</td>
							<td>75.</td>
							<td>Kaset Video /CD</td>
							<td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							</tr>
						<tr>
						  <td>7.</td>
							<td>Kaca Spion Dalam</td>
							<td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>30.</td>
							<td>Footrest</td>
							<td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							<td>53.</td>
							<td>Accu</td>
							<td>&nbsp;</td>
							<td>76.</td>
							<td>TV</td>
							<td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
							</tr>
						<tr>
						  <td>8.</td>
						  <td height="22">Body Depan</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>31.</td>
						  <td>Sarung Jok</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>54.</td>
						  <td>Solar,Tangki,Tutup tangki</td>
						  <td>&nbsp;</td>
						  <td>77.</td>
						  <td>Remote Control</td>
						  <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <tr>
						  <td>9.</td>
						  <td height="22">Bemper Depan</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>32.</td>
						  <td>Gorden</td>
						  <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <td>55.</td>
						  <td>Wheel Dop</td>
						  <td>&nbsp;</td>
						  <td>78.</td>
						  <td>Inverter</td>
						  <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						  <tr>
						    <td>10.</td>
						    <td height="22">Body Kiri</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>33.</td>
						    <td>Tempat Sampah</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>56.</td>
						    <td>Wiper</td>
						    <td>&nbsp;</td>
						    <td>79.</td>
						    <td>Equalizer</td>
						    <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <tr>
						    <td>11.</td>
						    <td height="22">Body Kanan</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>34.</td>
						    <td>Smoking Area</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>57.</td>
						    <td>Ban Step</td>
						    <td>&nbsp;</td>
						    <td>80.</td>
						    <td>Microphone</td>
						    <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <tr>
						    <td>12.</td>
						    <td height="22">Body Belakang</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>35.</td>
						    <td>Toilet + Kaca</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>58.</td>
						    <td>Engkol Ban</td>
						    <td>&nbsp;</td>
						    <td>81.</td>
						    <td>Speaker</td>
						    <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <tr>
						    <td>13.</td>
						    <td height="22">Bemper Belakang</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>36.</td>
						    <td>Plafon + Interior</td>
						    <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <td>59.</td>
						    <td>klakson</td>
						    <td>&nbsp;</td>
						    <td>82.</td>
						    <td>Power</td>
						    <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						    <tr>
						      <td>14.</td>
						      <td height="22">Pintu Depan LH</td>
						      <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <td>37.</td>
						      <td>Palu Pemecah Kaca</td>
						      <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <td>60.</td>
						      <td>Knalpot</td>
						      <td>&nbsp;</td>
						      <td>83.</td>
						      <td>Subwofer</td>
						      <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <tr>
						        <td>15.</td>
						        <td height="22">Pintu Depan RH</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>38.</td>
						        <td>Bagasi Atas</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>61.</td>
						        <td>Kompresor</td>
						        <td>&nbsp;</td>
						        <td>84.</td>
						        <td>Surat-surat</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <tr>
						          <td>16.</td>
						          <td height="22">Pintu Belakang LH</td>
						          <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						          <td>39.</td>
						          <td>Lampu Dalam</td>
						          <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						          <td>62.</td>
						          <td>Altenator</td>
						          <td>&nbsp;</td>
						          <td>85.</td>
						          <td>STNK</td>
						          <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						          <tr>
						      <td>17.</td>
						      <td height="22">Lampu Depan LH</td>
						      <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <td>40.</td>
						      <td>Kotak P3K</td>
						      <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <td>63.</td>
						      <td>Altenator AC</td>
						      <td>&nbsp;</td>
						      <td>86.</td>
						      <td>KPS</td>
						      <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <tr>
						      <td>18.</td>
						      <td height="22">Lampu Depan RH</td>
						      <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <td>41.</td>
						      <td>Segitiga Pengaman</td>
						      <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <td>64.</td>
						      <td>Control Panel</td>
						      <td>&nbsp;</td>
						      <td>87.</td>
						      <td>KIR</td>
						      <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						      <tr>
						        <td>19.</td>
						        <td height="22">Lampu Stop Belakang LH</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>42.</td>
						        <td>Pewangi Ruangan</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>65.</td>
						        <td>Kaper Gembok Kunci</td>
						        <td>&nbsp;</td>
						        <td>88.</td>
						        <td>Bintang Mercy</td>
						        <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <tr>
						        <td>20.</td>
						        <td height="22">Lampu Stop Belakang RH</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>43.</td>
						        <td>Pewangi Toilet</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>66.</td>
						        <td>Stik Oli</td>
						        <td>&nbsp;</td>
						        <td>89.</td>
						        <td>Plat Nomor</td>
						        <td ><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <tr>
						        <td>21.</td>
						        <td height="22">Lampu Signal Belakang LH</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>44.</td>
						        <td>Bangku Tambahan</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>67.</td>
						        <td>Tutup Oli</td>
						        <td>&nbsp;</td>
						        <td>&nbsp;</td>
						        <td>&nbsp;</td>
						        <td >&nbsp;</td>
						        <tr>
						        <td>22.</td>
						        <td height="22">Lampu Signal Belakang RH</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>45.</td>
						        <td>Pipa Pegangan</td>
						        <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						        <td>68.</td>
						        <td>Dinamo Wiper</td>
						        <td>&nbsp;</td>
						        <td>&nbsp;</td>
						        <td>&nbsp;</td>
						        <td >&nbsp;</td>
						        <tr>
						          <td>23.</td>
						          <td height="22">Lampu Signal Depan LH</td>
						          <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						          <td>46.</td>
						          <td>Tutup Radiator</td>
						          <td><?php if ($b->kaca_depan == "1"){ echo "OK";} else {echo "NO";}?></td>
						          <td>69.</td>
						          <td>Dongkrang &amp; Stang</td>
						          <td>&nbsp;</td>
						          <td>&nbsp;</td>
						          <td>&nbsp;</td>
						          <td >&nbsp;</td>
						          </tbody>
									<tfoot></tfoot>
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
						<td width="30%">Pembawa Kendaraan</td>
						<td width="30%" align="center">Mengetahui</td>
						<td align="center">Pembuat</td>
					</tr>
					<tr>
						<td height="91" align="left">
					    <p>&nbsp;</p>
					    <p>&nbsp;</p>
					    <p>&nbsp;</p>
                            <div  style="width:80px;border-top:1px solid #000"></div></td>
					  <td align="center">
					    <p>&nbsp;</p>
					    <p>&nbsp;</p>
					    <p>&nbsp;</p>
                          <div  style="width:80px;border-top:1px solid #000"></div></td>
						<td align="center"><p style="width:80px;; align-items: center;alignment-baseline: bottom;">&nbsp;</p>
						  <p style="width:80px;; align-items: center;alignment-baseline: bottom;">&nbsp;</p>
						  <p style="width:80px;; align-items: center;alignment-baseline: bottom;"><?php echo $b->user ?></p>
					    <p style="width:80px;border-top:1px solid #000; align-items: center;alignment-baseline: bottom;">&nbsp;</p></td>
					</tr>
			  </table>	
			</td>
		</tr>	
  </table>
</div>