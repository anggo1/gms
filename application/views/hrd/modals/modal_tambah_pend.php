
      <div class="modal-header">        
      <h4 style="display:block; text-align:center;"><?php if (!empty($dataJabatan->id_jabatan)) {
                            echo 'Edit  Jabatan';
                        } else { echo 'Penambahan Data jabatan/Jabatan';}
                        ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body form">
        <form <?php if (empty($dataPendidikan->id_pendidikan)) {echo 'id="form-tambah-pendidikan"';} else { echo 'id="form-update-pendidikan"';}?> method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="hidden" name="id_pendidikan" value="<?php if (!empty($dataPendidikan->id_pendidikan)) { echo $dataPendidikan->id_pendidikan; } ?>">
      <input type="text" class="form-control" placeholder="Nama pendidikan" value="<?php
                        if (!empty($dataPendidikan->pendidikan)) {
                            echo $dataPendidikan->pendidikan;
                        }
                        ?>" name="pendidikan" aria-describedby="sizing-addon2">
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>