<div class="col-12 col-md-12 col-lg-12">
  <div class="modal-header">

    <?php
    if (!empty($dataPart)) {
      foreach ($dataPart as $part) {
      }
    }
    ?>
<p></span>
    <h4 style="display:block; text-align:center;"><?php if (!empty($part->id_barang)) {
                                                    echo 'Edit Data Barang';
                                                  } else {
                                                    echo 'Penambahan Data Barang';
                                                  }
                                                  ?></h4>
    </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body form">
            <form <?php if (empty($part->id_barang)) { echo 'id="form-tambah-sparepart"'; } else { echo 'id="form-update-sparepart"';} ?> method="POST">
                    <div class="row">
                        <div class="col-sm-12" data-spy="scroll" data-offset="0">
                            <div class="panel panel-default">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                        <input type="hidden" name="id_barang" value="<?php if (!empty($part->id_barang)) {
                                                          echo $part->id_barang;
                                                        } ?>">
                                                            <label class="col-sm-2 col-form-label">No
                                                                Part</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="no_part" id="no_part" value="<?php if (!empty($part->no_part)) {
                                                          echo $part->no_part;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Nama
                                                                Part</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="nama_part" id="nama_part" value="<?php if (!empty($part->nama_part)) {
                                                          echo $part->nama_part;
                                                        } ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Satuan</label>
                                                            <div class="col-sm-4">
                                                                <select name="satuan" class="form-control">
                                                                    <option value="">Pilih Satuan
                                                                    </option>
                                                                    <?php
                                                                    if (empty($part->satuan)) {
                                                                        foreach ($dataSatuan as $sat) {
                                                                    ?>
                                                                            <option <?php echo $sat == $sat->id_satuan ? 'selected="selected"' : '' ?> value="<?php echo $sat->id_satuan ?>">
                                                                                <?php echo $sat->satuan  ?><?php } ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            foreach ($dataSatuan as $st) {          ?>
                                                                                <option value="<?php echo $st->id_satuan; ?>" <?php if ($st->id_satuan == $part->satuan) {
                                                                                                                                    echo "selected='selected'";
                                                                                                                                } ?>>
                                                                                    <?php echo $st->satuan; ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>

                                                            <label class="col-sm-2 col-form-label">Type</label>
                                                            <div class="col-sm-4">
                                                                <select name="type" class="form-control">
                                                                    <option value="">Pilih Type
                                                                    </option>
                                                                    <?php
                                                                    if (empty($part->type)) {
                                                                        foreach ($dataType as $ty) {
                                                                    ?>
                                                                            <option <?php echo $ty == $ty->id_type ? 'selected="selected"' : '' ?> value="<?php echo $ty->id_type ?>">
                                                                                <?php echo $ty->type_mesin  ?><?php } ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            foreach ($dataType as $tp) {          ?>
                                                                                <option value="<?php echo $tp->id_type; ?>" <?php if ($tp->id_type == $part->type) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                                    <?php echo $tp->type_mesin; ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                                    <div class="col-sm-4">
                                                        <select name="kategori" class="form-control">
                                                            <option value="">Pilih kategori.
                                                            </option>
                                                            <?php
                                                            if (empty($part->kategori)) {
                                                                foreach ($dataKategori as $kt) {
                                                            ?>
                                                                    <option <?php echo $kt == $kt->id_kategori ? 'selected="selected"' : '' ?> value="<?php echo $kt->id_kategori ?>">
                                                                        <?php echo $kt->kategori  ?><?php } ?>
                                                                    </option>
                                                                    <?php
                                                                } else {
                                                                    foreach ($dataKategori as $kat) {          ?>
                                                                        <option value="<?php echo $kat->id_kategori; ?>" <?php if ($kat->id_kategori == $part->kategori) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                            <?php echo $kat->kategori; ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Kelompok</label>
                                                    <div class="col-sm-4">
                                                        <select name="kelompok" class="form-control">
                                                            <option value="">Pengelompokan.....
                                                            </option>
                                                            <?php
                                                            if (empty($part->kelompok)) {
                                                                foreach ($dataKelompok as $kp) {
                                                            ?>
                                                                    <option <?php echo $kp == $kp->id_kelompok ? 'selected="selected"' : '' ?> value="<?php echo $kp->id_kelompok ?>">
                                                                        <?php echo $kp->kelompok  ?><?php } ?>
                                                                    </option>
                                                                    <?php
                                                                } else {
                                                                    foreach ($dataKelompok as $kel) {          ?>
                                                                        <option value="<?php echo $kel->id_kelompok; ?>" <?php if ($kel->id_kelompok == $part->kelompok) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                            <?php echo $kel->kelompok; ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="lokasi" id="lokasi" value="<?php if (!empty($part->lokasi)) {
                                                          echo $part->lokasi;
                                                        } ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="ket" id="ket" value="<?php if (!empty($part->ket)) {
                                                          echo $part->ket;
                                                        } ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
      </div>
    </form>
  </div>
</div>