    <?php
    if (!empty($dataPart)) {
      foreach ($dataPart as $part) {

    
   
    ?>
<div class="modal-body form">
      <!--<?php echo '<img src="'.base_url().'qr.png" width="320"  align="center" />' ?>-->
  <img src="<?= base_url('./assets/img_qr/'.$part->no_part.'.png') ?>" alt="QRcode-part" width="250px">
  <?php }} ?>
    <div class="row">
        <div class="col-sm-12" data-spy="scroll" data-offset="0">
            <div class="panel panel-default">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 ">
                                <div class="form-group row">
                                    <table class="table dt-responsive nowrap">
                                        <tbody>
                                            <tr>
                                                <td>Kode Barang</td>
                                                <td><?php if (!empty($part->no_part)) {
                                                          echo $part->no_part; } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Barang</td>
                                                <td><?php if (!empty($part->nama_part)) {
                                                          echo $part->nama_part; } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Satuan</td>
                                                <td><?php if (!empty($part->satuan)) {
                                                          echo $part->satuan; } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelompok</td>
                                                <td><?php if (!empty($part->kelompok)) {
                                                          echo $part->kelompok; } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Type</td>
                                                <td><?php if (!empty($part->type_mesin)) {
                                                          echo $part->type_mesin; } ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kelompok</td>
                                                <td><?php if (!empty($part->no_part)) {
                                                          echo $part->no_part; } ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i>
                        Save changes</button>
                </div>
            </div>
        </div>
        </div>