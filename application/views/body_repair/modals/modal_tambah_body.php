<div class="col-12">
<div class="modal-header">

    <?php
    if (!empty($dataBody)) {
    foreach ($dataBody as $body) {
    }
    }
    ?>
<p></span>
    <h4 style="display:block; text-align:center;"><?php if (!empty($body->no_body)) {
                                                    echo 'Edit Data Bus';
                                                } else {
                                                    echo 'Penambahan Data Bus / Body';
                                                }
                                                ?></h4>
    </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body form">
                    <form <?php if (empty($body->no_body)) { echo 'id="form-tambah-body"'; } else { echo 'id="form-update-body"';} ?> method="POST">
                                                        <div class="form-group row">
                                                            <label class="col-sm-1 col-form-label">No Body</label>
                                                            <div class="col-sm-3">
                                                    <input type="text" name="no_body" id="no_body" onblur="cariBodyl()" style="text-transform: uppercase;" value="<?php if (!empty($body->no_body)) {
                                                          echo $body->no_body;
                                                        } ?>" <?php if (!empty($body->no_body)) {
                                                            echo 'readonly=readonly';
                                                          } ?> class="form-control" required>
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">No Polisi</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="no_pol" id="no_pol" style="text-transform: uppercase;" value="<?php if (!empty($body->no_pol)) {
                                                          echo $body->no_pol;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Type</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="type" id="type" value="<?php if (!empty($body->type)) {
                                                          echo $body->type;
                                                        } ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            
                                                            <label class="col-sm-1 col-form-label">Merk</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="merk" id="merk" value="<?php if (!empty($body->merk)) {
                                                          echo $body->merk;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Th Rangka</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="thn_rangka" id="thn_rangka" value="<?php if (!empty($body->thn_rangka)) {
                                                          echo $body->thn_rangka;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Th Body</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="thn_pembuatan" id="thn_pembuatan" value="<?php if (!empty($body->thn_pembuatan)) {
                                                          echo $body->thn_pembuatan;
                                                        } ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">No Rangka</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="no_rangka" id="no_rangka" value="<?php if (!empty($body->no_rangka)) {
                                                          echo $body->no_rangka;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">No Mesin</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="no_mesin" id="no_mesin" value="<?php if (!empty($body->no_mesin)) {
                                                          echo $body->no_mesin;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Karoseri</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="karoseri" id="karoseri" value="<?php if (!empty($body->karoseri)) {
                                                          echo $body->karoseri;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-1 col-form-label">Warna</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="warna" id="warna" value="<?php if (!empty($body->warna)) {
                                                          echo $body->warna;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Kelas</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="kelas" id="kelas" value="<?php if (!empty($body->kelas)) {
                                                          echo $body->kelas;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Strip/Ciri</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="strip" id="strip" value="<?php if (!empty($body->strip)) {
                                                          echo $body->strip;
                                                        } ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                        <label class="col-sm-1 col-form-label">Pool</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="pool" id="pool" value="<?php if (!empty($body->pool)) {
                                                          echo $body->pool;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Kondisi</label>
                                                            <div class="col-sm-3">
                                                                <select name="kondisi" class="form-control">
                                                                <option value="">Kondisi..</option>
                                                        <option value="BARU" <?php
                                                                                if (!empty($body->kondisi)) {
                                                                                    echo $body->kondisi == 'BARU' ? 'selected' : '';
                                                                                }
                                                                                ?>>BARU</option>
                                                        <option value="PERBAIKAN" <?php
                                                                                if (!empty($body->kondisi)) {
                                                                                    echo $body->kondisi == 'PERBAIKAN' ? 'selected' : '';
                                                                                }
                                                                                ?>>PERBAIKAN</option>
                                                                </select>
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Status</label>
                                                            <div class="col-sm-3">
                                                                <select name="status" class="form-control">
                                                                <option value="">Status..</option>
                                                        <option value="AKTIF" <?php
                                                                                if (!empty($body->status)) {
                                                                                    echo $body->status == 'AKTIF' ? 'selected' : '';
                                                                                }
                                                                                ?>>AKTIF</option>
                                                        <option value="PASIF" <?php
                                                                                if (!empty($body->status)) {
                                                                                    echo $body->status == 'PASIF' ? 'selected' : '';
                                                                                }
                                                                                ?>>PASIF</option>
                                                                </select>
                                                            </div>
                                                            </div>
                                                            <div class="form-group row">
                                                            <label class="col-sm-1 col-form-label">Rute Asli</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="rute_asli" id="rute_asli" value="<?php if (!empty($body->rute_asli)) {
                                                          echo $body->rute_asli;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Rute Aktif</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="rute_aktif" id="rute_aktif" value="<?php if (!empty($body->rute_aktif)) {
                                                          echo $body->rute_aktif;
                                                        } ?>" class="form-control">
                                                            </div>
                                                            <label class="col-sm-1 col-form-label">Keterangan</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="keterangan" id="keterangan" value="<?php if (!empty($body->keterangan)) {
                                                          echo $body->keterangan;
                                                        } ?>" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                     </div>
                </form>
            </div>