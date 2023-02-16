<script>
    document.getElementById("btnPrint").onclick = function () {		
    document.getElementById("printSection").hidden = false;
    printElement(document.getElementById("printSection"));
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
    window.print(); //window.location.assign("<?php echo base_url();?>/Pengiriman");
			$('#cetak-label').modal('hide');
}
    </script>

<style>

@media screen {
    #cetak {
        display:none;
    }
	
}
	
@media print {
	
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
    position: relative;
    left:0;
    top:0;
  }
  @page {
    width: auto;
    height: auto;
    margin: 0;
    padding: 0;
    } 
    
}	
.gantihal{
		page-break-after: always;
	}

.table.DataTable {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 12px;
    }

    table.dataTable td {
        padding-bottom: 5px;
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
<?php
    if (!empty($dataPart)) {
      foreach ($dataPart as $part) {

    
   
    ?>
    

      <!--<?php echo '<img src="'.base_url().'qr.png" width="320"  align="center" />' ?>-->
  <?php }} ?>
                                    <table width="100%" id="datatablex" class="datatablex">
                                        <tbody>
                                            <tr>
                                                <td width="10%" rowspan="8"><img src="<?= base_url('./assets/img_qr/'.$part->no_part.'.png') ?>" alt="QRcode-part" width="300px"></td>
                                                <td width="10%">&nbsp;</td>
                                                <td width="80%" style="font-size: large;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: large;">&nbsp;</td>
                                                <td style="font-size: large;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: large;">&nbsp;</td>
                                                <td style="font-size: large;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: large;">Kode</td>
                                                <td style="font-size: large;">:
                                                <?php if (!empty($part->no_part)) {
                                                          echo $part->no_part; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: large;">Nama</td>
                                              <td style="font-size: large;">:
                                              <?php if (!empty($part->nama_part)) {
                                                          echo $part->nama_part; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: large;">Satuan</td>
                                              <td style="font-size: large;">:
                                              <?php if (!empty($part->satuan)) {
                                                          echo $part->satuan; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: large;">Type</td>
                                              <td style="font-size: large;">:
                                              <?php if (!empty($part->type_mesin)) {
                                                          echo $part->type_mesin; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: large;">&nbsp;</td>
                                              <td style="font-size: large;">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                    
        <div class="card-footer">
        <button type="button" id="btnPrint" class="btn btn-success" ><span class="fa fa-print"></span>&nbsp;&nbsp;  C E T A K </button>
      <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>
      
<div id="printSection" hidden="hidden"> 
<div class="gantihal">		
<?php
    if (!empty($dataPart)) {
      foreach ($dataPart as $part) {

    
   
    ?>
    
      <!--<?php echo '<img src="'.base_url().'qr.png" width="320"  align="center" />' ?>-->
  <?php }} ?>
                                    <table width="100%" id="datatablex" class="datatablex">
                                        <tbody>
                                            <tr>
                                                <td width="10%" rowspan="8"><img src="<?= base_url('./assets/img_qr/'.$part->no_part.'.png') ?>" alt="QRcode-part" width="300px"></td>
                                                <td width="10%" style="font-size: large;">&nbsp;</td>
                                                <td width="80%" style="font-size: large;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 30px;">&nbsp;</td>
                                                <td style="font-size: large;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: large;">&nbsp;</td>
                                                <td style="font-size: large;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 35px;">Kode</td>
                                                <td style="font-size: 35px;">:
                                                <?php if (!empty($part->no_part)) {
                                                          echo $part->no_part; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: 30px;;">Nama</td>
                                              <td style="font-size: 30px;;">:
                                              <?php if (!empty($part->nama_part)) {
                                                          echo $part->nama_part; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: 30px;;">Satuan</td>
                                              <td style="font-size: 30px;;">:
                                              <?php if (!empty($part->satuan)) {
                                                          echo $part->satuan; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: 30px;;">Type</td>
                                              <td style="font-size: 30px;;">:
                                              <?php if (!empty($part->type_mesin)) {
                                                          echo $part->type_mesin; } ?></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size: 30px;;">&nbsp;</td>
                                              <td style="font-size: 30px;;">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>