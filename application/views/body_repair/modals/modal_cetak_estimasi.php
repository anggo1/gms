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
    position:absolute;
    left:0;
    top:0;
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
    font: bold;
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
<div id="printThis">
<div class="alert bg-white"><?php foreach ($dataPk as $k){}?>
<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; background-color:#000 border: 2px solid #000; border:double list-style-position: outside;	background-attachment: scroll;	background-repeat: repeat-x; font-family: arial; font-size: 13px;" >
  <thead>
                    <tr>
                      <th colspan="4"><div align="left">
                        <table width="100%">
                          <tbody>
                            <tr>
                              <td colspan="5">ESTIMASI PERBAIKAN </td>
                            </tr>
                            <tr>
                              <td colspan="5">&nbsp;</td>
                            </tr>
                            <tr>
                              <td>ID Laporan</td>
                              <td><?php echo $k->id_lapor ?></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="15%">Tgl Masuk</td>
                              <td width="49%"><?php echo $k->tgl_masuk ?></td>
                              <td width="15%">Penerima</td>
                              <td width="21%"><?php echo $k->user ?></td>
                            </tr>
                            <tr>
                              <td>Pelapor</td>
                              <td><?php echo $k->nip_sp.'  '.$k->nama_sp ?></td>
                              <td>Jenis Perbaikan</td>
                              <td><?php echo $k->kategori ?></td>
                            </tr>
                            <tr>
                              <td>No Body</td>
                              <td><?php echo $k->no_body ?></td>
                              <td>Keterangan Laporan</td>
                              <td><?php echo $k->ket_lapor ?></td>
                            </tr>
                            <tr>
                              <td>No Pol</td>
                              <td><?php echo $k->no_pol ?></td>
                              <td>Status Body</td>
                              <td><?php if($k->status=='Y'){echo 'AKTIF';}else {echo 'PASIF';}?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </tr>
   </thead>
                <tbody>
               
			
                </tbody>
</table>
 <table>DETAIL BARANG</table>
                    <div class="table-responsive">
<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000000" class="datatable"  id="table-1" >
   <thead>
     <tr>
       <th>No</th>
       <th>KODE PK</th>
       <th>KETERANGAN PK</th>
       <th>NO PART</th>
       <th>NAMA PART</th>
       <th>JUMLAH</th>
       <th>HARGA</th>
       <th>TOTAL</th>
       <th>KETERANGAN</th>
       </tr>
     <?php
       $no=0;
       $harganye=0;
       $grand_total=0;
       foreach ($detailPk as $d){ 
	     $no++;
       $harganye += $k->hrg_part;
		   $grand_total += $d->hrg_part * $d->jml_part;
						?>
      <tr>
          <th><?php echo $no ?></th>
       <th><?php echo $d->jns_pk ?></th>
       <th><?php echo $d->ket_pk ?></th>
       <th><?php echo $d->no_part ?></th>
       <th><?php echo $d->nama_part ?></th>
       <th><?php echo $d->jml_part ?></th>
       <th><?php echo number_format($d->hrg_part) ?></th>
       <th><?php echo number_format($d->hrg_part * $d->jml_part); ?></th>
       <th width="49"><?php echo $d->ket_part ?></th>
       </tr>
     <?php  } ?>
     <tr>

       <th colspan="7"> <div align="center"> TOTAL</div></th>
       <th colspan="2"><font size=+2><?php echo number_format($grand_total) ?></font></th>
       </tr>
   </thead>
   <tbody>
</table></div>
<table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#000000" style="border-collapse: collapse; background-color:#000 border: 2px solid #000; border:double list-style-position: outside;	background-attachment: scroll;	background-repeat: repeat-x; font-family: arial; font-size: 13px;" >
  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th><?php echo date('D M Y')?></th>
                    </tr>
                    <tr>
                      <th width="164">Mengetahui,</th>
                      <th width="193">&nbsp;</th>
                      <th width="102">&nbsp;</th>
                      <th width="141">Estimator</th>
                    </tr>
                    <tr>
                      <th height="60"><p>&nbsp;</p>
                      <p><?php echo $k->acc ?></p></th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th><p>&nbsp;</p>                        <?php echo $d->user ?></th>
                    </tr>
      </thead>
                <tbody>
</table>
             
</div>
</div>
        <div class="card-footer">
        <button type="button" id="btnPrint" class="btn btn-success" ><span class="fa fa-print"></span>&nbsp;&nbsp;  C E T A K </button>
      <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>