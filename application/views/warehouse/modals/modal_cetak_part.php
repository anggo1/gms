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
    window.location.assign("<?php echo base_url(); ?>/Transaksi/Pengiriman");
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

    #A4 {
      background-color: #FFFFFF;
      left: 1px;
      right: 1px;
      height: 5.51in;
      /*Ukuran Panjang Kertas */
      width: 8.50in;
      /*Ukuran Lebar Kertas */
      margin: 1px solid #FFFFFF;

      font-family: Georgia, "Times New Roman", Times, serif;
    }
</style>
<?php 

$apl = $this->db->get("aplikasi")->row();
?>
<div id="printThis">
  <?php foreach ($dataPart as $k) {
  } ?>

  <table width="100%" border="0" cellpadding="5" cellspacing="0" class="datatable2">
    <thead>
      <tr>
        <th colspan="2">
        <!--<img src="<?php echo base_url();?>assets/foto/logo/<?php echo $apl->logo; ?>" alt="<?php echo $apl->title; ?>" class="brand-image" weight="10%"
           style="opacity:.8">-->
      
          <font size="10px"><?php echo  $apl->nama_owner; ?></font><br>
          <?php echo  $apl->alamat; ?>
        </th>
      </tr>
      <tr>
        <th colspan="2">SURAT JALAN</th>
      </tr>
    </thead>

  </table>
  <table width="60%" border="1" cellpadding="5" cellspacing="0" class="datatable2">
    <thead>
      <tr>
        <th width="150" height="71">
          <div align="left">Tujuan</div>
        </th>
        <th width="680">
          <div align="left"><?php echo $k->tujuan; ?></div>
        </th>
      </tr>
    </thead>

  </table>
  <table width="60%" border="0" cellpadding="5" cellspacing="0" class="datatable2">
    <thead>
      <tr>
        <th width="70">
          <div align="left">No Surat</div>
        </th>
        <th width="362">
          <div align="left"><?php echo $k->id_keluar; ?></div>
        </th>
      </tr>
      <tr>
        <th>
          <div align="left">Tgl PO</div>
        </th>
        <th>
          <div align="left"><?php echo $k->tgl_keluar ?></div>
        </th>
      </tr>
      <tr>
        <th height="32">
          <div align="left">Keterangan</div>
        </th>
        <th>
          <div align="left"><?php echo $k->keterangan ?></div>
        </th>
      </tr>
    </thead>

  </table>

  <table>

    <table width="100%" border="1" cellpadding="5" cellspacing="0" class="datatable2">
      <thead>
        <tr>
          <th width="6%">No</th>
          <th width="16%">No Barang</th>
          <th width="20%">Nama Barang</th>
          <th width="15%">JML</th>
          <th width="9%">Keterangan</th>
        </tr>
        <?php
        $no = 0;
        foreach ($detailPart as $d) : $no++;
        ?>
          <tr>
            <th><?php echo $no ?></th>
            <th><?php echo $d->no_part ?></th>
            <th><?php echo $d->nama_part ?></th>
            <th><?php echo $d->jumlah ?></th>
            <th><?php echo $d->ket_part ?></th>
          </tr>
        <?php $no + 1;
        endforeach ?>
      </thead>

    </table>
    <table>
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="datatable2">
        <thead>
          <tr>
            <th width="43%" style="text-align: center; align-content: center;">&nbsp;</th>
            <th width="57%">Hormat Kami</th>
          </tr>
          <tr>
            <th height="60" style="text-align: center; align-content: center;">
              <p>&nbsp;</p>
            </th>
            <th>
              <p><?php echo $k->user ?></p>
            </th>
          </tr>
        </thead>

      </table>

</div>
<div class="card-footer">
  <button type="button" id="btnPrint" class="btn btn-success"><span class="fa fa-print"></span>&nbsp;&nbsp; C E T A K </button>
  <button class="btn btn-danger" id="tutup" onClick="window.location.assign(" <?php echo base_url(); ?>/Transaksi/Pengiriman");" data-dismiss="modal"><span class="fa fa-close"></span>&nbsp;&nbsp; T U T U P</button>