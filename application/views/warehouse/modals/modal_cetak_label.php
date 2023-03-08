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
    width: 400px;
    height: auto;
    
  }
  .datatablex {
    position: absolute;
    font: bold;
    width: 800px;
}
.datatablex td {
    padding: 0px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:35px;
    font: bold;
    width:800px;
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

      <!--<?php echo '<img src="'.base_url().'qr.png" width="250"  align="center" />' ?>-->
  <?php }} ?>
                                    <table width="100%" class="datatablex" id="datatablex">
                                        <tbody>
                                            <tr>
                                                <td width="20%" rowspan="8"><img src="<?= base_url('./assets/img_qr/'.$part->no_part.'.png') ?>" alt="QRcode-part" width="150px"></td>
                                                <td width="82%">Kode :</td>
                                            </tr>
                                            <tr>
                                                <td><?php if (!empty($part->no_part)) {
                                                          echo $part->no_part; } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                            </tr>
                                            <tr>
                                                <td><?php if (!empty($part->nama_part)) {
                                                          echo $part->nama_part; } ?></td>
                                            </tr>
                                            <tr>
                                              <td>Satuan</td>
                                            </tr>
                                            <tr>
                                              <td><?php if (!empty($part->satuan)) {
                                                          echo $part->satuan; } ?></td>
                                            </tr>
                                            <tr>
                                              <td>Type</td>
                                            </tr>
                                            <tr>
                                              <td><?php if (!empty($part->type_mesin)) {
                                                          echo $part->type_mesin; } ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                    
        <div class="card-footer">
        <button type="button" id="btnPrint" class="btn btn-success" ><span class="fa fa-print"></span>&nbsp;&nbsp;  C E T A K </button>
      <button class="btn btn-danger" id="tutup" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>
        </div>