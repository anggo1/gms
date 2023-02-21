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
<div id="printThis">
  <?php foreach ($dataPo as $k) {
  } ?>

  <table width="100%" border="0" cellpadding="5" cellspacing="0" class="datatable2">
    <thead>
      <tr>
        <th colspan="2">
          <p>PT.MPU</p>
          <p>ALAMAT</p>
          <p>&nbsp;</p>
        </th>
      </tr>
      <tr>
        <th colspan="2">PURCHASE ORDER</th>
      </tr>
    </thead>

  </table>
  <table width="100%" border="1" cellpadding="5" cellspacing="0" class="datatable2">
    <thead>
      <tr>
        <th width="70">
          <div align="left">Kepada</div>
        </th>
        <th width="362">
          <div align="left"><?php echo $k->nama_sup; ?></div>
        </th>
      </tr>
      <tr>
        <th>&nbsp;</th>
        <th>
          <div align="left"><?php echo $k->alamat ?></div>
        </th>
      </tr>
      <tr>
        <th height="32">&nbsp;</th>
        <th>
          <div align="left"><?php echo $k->no_tlp ?></div>
        </th>
      </tr>
    </thead>

  </table>
  <table width="100%" border="0" cellpadding="5" cellspacing="0" class="datatable2">
    <thead>
      <tr>
        <th width="70">
          <div align="left">No PO</div>
        </th>
        <th width="362">
          <div align="left"><?php echo $k->id_po; ?></div>
        </th>
        <th width="70">
          <div align="left">TOP</div>
        </th>
        <th width="325">
          <div align="left"><?php echo $k->top ?></div>
          <div align="left"></div>
        </th>
      </tr>
      <tr>
        <th>
          <div align="left">Tgl PO</div>
        </th>
        <th>
          <div align="left"><?php echo $k->tgl_po ?></div>
        </th>
        <th>
          <div align="left">Kode Pesan</div>
        </th>
        <th>
          <div align="left"><?php echo $k->kode_pesan ?></div>
          <div align="left"></div>
        </th>
      </tr>
      <tr>
        <th height="32">
          <div align="left">Keterangan</div>
        </th>
        <th>
          <div align="left"><?php echo $k->keterangan ?></div>
        </th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
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
          <th width="10%">Harga</th>
          <th width="12%">Diskon</th>
          <th width="12%">Sub Total</th>
          <th width="15%">JML</th>
          <th width="9%">Total</th>
        </tr>
        <?php
        $no = 0;
        $grand_total = 0;
        foreach ($detailPo as $d) : $no++;
          $grand_total += $d->total_harga;
          $ppn = $grand_total * $k->ppn / 100;
        ?>
          <tr>
            <th><?php echo $no ?></th>
            <th><?php echo $d->no_part ?></th>
            <th><?php echo $d->nama_part ?></th>
            <th align="right"><?php echo number_format($d->harga) ?></th>
            <th align="right"><?php echo $d->diskon ?></th>
            <th align="right"><?php echo number_format($d->total_harga + $d->total_diskon) ?></th>
            <th><?php echo number_format($d->jumlah) ?></th>
            <th><?php echo number_format($d->total_harga) ?></th>
          </tr>
        <?php $no + 1;
        endforeach ?>
        <tr>
          <th colspan="5" rowspan="3">&nbsp;</th>
          <th colspan="2" align="right">Sub Total</th>
          <th id="sub_total"><?php echo number_format($grand_total) ?></th>
        </tr>
        <tr>
          <th colspan="2" align="right">PPN <?php echo $k->ppn ?> %</th>
          <th id="t_ppn"><?php echo number_format($ppn) ?></th>
        </tr>
        <tr>

          <th colspan="2" align="right">Grand Total</th>
          <th id="grand_total">
            <font size="+1"><?php echo number_format($grand_total + $ppn) ?></font>
          </th>
        </tr>
      </thead>

    </table>
    <table>
      <table width="100%" border="0" cellpadding="5" cellspacing="0" class="datatable2">
        <thead>
          <tr>
            <th width="43%" style="text-align: center; align-content: center;">Disetujui Oleh</th>
            <th width="57%">Hormat Kami</th>
          </tr>
          <tr>
            <th height="60" style="text-align: center; align-content: center;">
              <p><?php echo $k->pengesah ?></p>
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