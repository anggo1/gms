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
    width: 500px;
    
  }
  .datatablex {
    border-collapse: collapse;
    font: bold;
}
.datatablex td {
    padding: 0px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:18px;
    font: bold;
}
.datatablex th {
    border: 2px solid #000;
    font: bold;
    font-weight: normal;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:14px;
}
  #printSection {
    position: absolute;
    left:0;
    top:0;
    width: 100%;
  }
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
    <div id="printThis">

      <!--<?php echo '<img src="'.base_url().'qr.png" width="320"  align="center" />' ?>-->
  <?php }} ?>
                                    <table width="100%" id="datatablex" class="datatablex">
                                        <tbody>
                                            <tr>
                                                <td width="10%" rowspan="8"><img src="<?= base_url('./assets/img_qr/'.$part->no_part.'.png') ?>" alt="QRcode-part" width="200px"></td>
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
                                    </div>
                    
        <div class="card-footer">
        <button type="button" id="btnPrint" class="btn btn-success" ><span class="fa fa-print"></span>&nbsp;&nbsp;  C E T A K </button>
      <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>
        </div>