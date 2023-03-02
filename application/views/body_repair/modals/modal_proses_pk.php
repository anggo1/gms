<div class="col-12 col-md-12 col-lg-12">
  <div class="modal-header">

    <?php
    if (!empty($dataPk)) {
      foreach ($dataPk as $dataPk) {
      }
    }
    ?>
    <p></span>
    <h4 style="display:block; text-align:center;">Proses Pekerjaan <?php if (!empty($dataPk->keterangan)) {
                                                        echo $dataPk->keterangan;
                                                      } ?></h4>
    </p>
  </div>
  <div class="modal-body">
    <form id="form-tambah-pk"method="POST">
      <div class="form-group">
        <input type="hidden" name="id">
      </div>
      <div class="form-group row">
								<label class="col-sm-4 col-form-label">Tanggal Mulai</label>
								<div class="col-sm-8">
									<div class="input-group date" id="reservationdate" data-target-input="nearest">
										<input type="text" name="tgl_pk" id="tgl_pk"
											class="form-control tgl_masuk datetimepicker" data-toggle="datetimepicker"
											data-target=".tgl_masuk" data-format="yyy-mm-dd" required>
										<div class="input-group-append" data-toggle="datetimepicker">
											<div class="input-group-text">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
									</div>

								</div>
							</div>
              <div class="form-group row">
								<label class="col-sm-4 col-form-label">Kepala Borong</label>
								<div class="col-sm-8">
									<div class="input-group date" id="reservationdate" data-target-input="nearest">
										<input type="text" name="kp_borong" id="kp_borong"
											class="form-control" required>
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
<script type="text/javascript">
					$('#tgl_pk').datetimepicker({
						format: 'DD-MM-YYYY',
						date: moment()
					});</script>