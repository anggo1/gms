    <?php
    if (!empty($dataPart)) {
      foreach ($dataPart as $part) {
        $qr['data'] = $part->no_part;
        $qr['level'] = 'H';
        $qr['size'] = 450;
        $qr['savename'] = FCPATH.'qr.png';
        $this->ciqrcode->generate($qr);

        $qrCode = new Endroid\QrCode\QrCode($row->kode); // mengambil data kode siswa sebagai data  QR code
                            $qrCode->writeFile('./QRcode/' . $part->no_part . '.png'); // direktori untuk menyimpan gambar QR code
                            ?>
                            <!-- tampilkan gambar QR code -->
                            

      }
    }
    ?>
<div class="modal-body form">
    <?php echo '<img src="'.base_url($qrnye ).'qr.png" width="320"  align="center" />' ?>
    <!--<img src="<?= base_url('./QRcode/' . $part->no_part . '.png') ?>" alt="QRcode-siswa" width="100px">-->
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