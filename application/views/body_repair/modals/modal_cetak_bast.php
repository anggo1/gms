
<script>
  document.getElementById("btnPrint").onclick = function() {
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
    window.location.assign("<?php echo base_url(); ?>/Bast");
  }
</script>
<style>
  @media print {


    @media screen {
      #printSection {
        display: none;
      }
    }

    @page {
      margin: 0;
    }

    @media print {
      body * {
        visibility: hidden;
      }

      #printSection,
      #printSection * {
        visibility: visible;
      }

      #printSection {
        position: absolute;
        left: 0;
        top: 0;
      }
    }


    p,
    td,
    th {
      font: 2 Verdana, Arial, Helvetica, sans-serif;

    }

    .datatable {
      border: 2px solid #000;
      border-collapse: collapse;
    }

    .datatable td {
      padding: 0px;
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 14px;
    }

    .datatable th {
      border: 2px solid #000;
      font: normal;
      font-weight: normal;
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 14px;
    }
/*
    p,
    td,
    th {
      font: Verdana, Arial, Helvetica, sans-serif;

    }

    .datatable1 {
      border-collapse: collapse;
    }

    .datatable1 th,
    td {
      border: 2px dashed #000;
      padding-top: 2px;
      padding-left: 5px;
      padding-right: 5px;
      padding-bottom: 5px font-family:Verdana, Arial, Helvetica, sans-serif;
      font-size: 10px;
      font-weight: normal;
      text-align: justify;
    }
*/
</style>
<div class="modal-content">
						<div class="modal-header text-blue">
						<button type="button" id="btnPrint" class="btn btn-success"><span class="fa fa-print"></span>&nbsp;&nbsp; C E T A K </button>
  <button class="btn btn-danger" id="tutup" onClick="window.location.assign(" <?php echo base_url(); ?>/Bast");" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>
						</div><div class="modal-body">

	<?php 
        date_default_timezone_set('Asia/Jakarta');
		foreach($dataBast as $b){}
?>

<div id="printThis">
	<table border="0" cellpadding="0" cellspacing="0" width="100%" class="dataTable">
		<tr>
			<td height="45" align="center" style="text-transform:uppercase;font-size:18px">BERITA ACARA SERAH TERIMA</td>
	  </tr>
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
						<td  width="65">Saya</td>
						<td  width="148"><?php echo $b->nama_sp ?></td>
						<td width="57">No Pol</td>
						<td width="60"><?php echo $b->no_pol?></td>
					</tr>
					<tr>
					  <td>Nia</td>
					  <td><?php echo $b->nip_sp?></td>
					  <td>&nbsp;</td>
					  <td>&nbsp;</td>
				  </tr>
					<tr>
						<td width="65">A.n</td>
						<td width="148"></td>
						<td width="57">No Body</td>
						<td width="60"><?php echo $b->no_body?></td>
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
					  <td class="kelengkapan"><?php if ($b->lb_kr == "1"){ echo "OK";} else {echo "NO";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if ($b->lb_kn=='1'){ echo "OK";} else {echo "NO";}?></td>
						<td class="kelengkapan">Ban Stip/Serep</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if ($b->ban_serep=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
						<td class="kelengkapan">STNK</td>
						<td class="kelengkapan"><div align="center">
						  <?php if ($b->stnk=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Sign</td>
					  <td class="kelengkapan"><?php if ($b->sign_kr=='1'){ echo "OK";} else {echo "NO";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if ($b->sign_kn=='1'){ echo "OK";} else {echo "NO";}?></td>
						<td class="kelengkapan">Kunci Roda</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if ($b->kc_roda=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
						<td class="kelengkapan">KPS</td>
						<td class="kelengkapan"><div align="center">
						  <?php if ($b->kps=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Rem</td>
					  <td class="kelengkapan"><?php if ($b->lmp_rem_kr=='1'){ echo "OK";} else { echo "NO";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if ($b->lmp_rem_kn=='1'){ echo "OK";} else {echo "NO";}?></td>
						<td class="kelengkapan">Dongkrak</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if ($b->dongkrak=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
						<td class="kelengkapan">Buku Keur</td>
						<td class="kelengkapan"><div align="center">
						  <?php if ($b->keur=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Lampu Kota</td>
					  <td class="kelengkapan"><?php if ($b->lmp_kota_kr=='1'){ echo "OK";} else {echo "NO";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;"><?php if ($b->lmp_kota_kn=='1'){ echo "OK";} else {echo "NO";}?></td>
						<td class="kelengkapan">Video</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if ($b->video=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
						<td class="kelengkapan">Buku JR</td>
						<td class="kelengkapan"><div align="center">
						  <?php if ($b->buku_jr=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
					</tr>
					<tr>
					  <td class="kelengkapan">Kaca Spion</td>
					  <td class="kelengkapan" ><?php if ($b->spion_kr=='1'){ echo "OK";} else {echo "NO";}?></td>
					  <td class="kelengkapan" style="border-right:1px dashed #000;" ><?php if ($b->spion_kn=='1'){ echo "OK";} else {echo "NO";}?></td>
						<td class="kelengkapan">TV</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if ($b->tv=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
						<td class="kelengkapan">SIU</td>
						<td class="kelengkapan"><div align="center">
						  <?php if ($b->siu=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
					</tr>
					<tr>
						<td >&nbsp;</td>
						<td>&nbsp;</td>
						<td style="border-right:1px dashed #000;">&nbsp;</td>
						<td class="kelengkapan">Tape</td>
						<td class="kelengkapan" style="border-right:1px dashed #000;" ><div align="center">
						  <?php if ($b->tape=='1'){ echo "OK";} else {echo "NO";}?>
					    </div></td>
						<td class="kelengkapan">Kunci Kontak</td>
						<td class="kelengkapan"><div align="center">
						  <?php if ($b->kc_kontak=='1'){ echo "OK";} else {echo "NO";}?>
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
					</tr>
					<tr>
						<td width="">Kaca Depan</td>
						<td width=""></td>
						<td width=""></td>
					</tr>
					<tr>
						<td width="">Gorden</td>
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
						<td height="129" align="left"><div  style="width:80px;border-top:1px solid #000"><?php echo $b->user ?></div></td>
					  <td align="center"><div  style="width:80px;border-top:1px solid #000">&nbsp;</div></td>
						<td align="center"><div  style="width:80px;border-top:1px solid #000">&nbsp;</div></td>
					</tr>
				</table>	
			</td>
		</tr>	
	</table>
</div>