<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-bus"></i>  Laporan Bus Masuk</h3>
              </div>

                            <form id="form-tambah-pengiriman" method="POST">
                                <div class="card-body">
                                    <div class="form-group row">
                                      <input type="hidden" name="no_pk" value="<?php // echo $kode_transaksi ?>"/>
                                        <label class="col-sm-1 col-form-label">No Body</label>
                                        <div class="col-sm-1">
                                            <input type="text" name="no_body" id="no_body" class="form-control"
                                                onBlur="isi_otomatis1()" onkeyup="fn(this)" onFocus="isi_otomatis1()"
                                                onChange="fn(this)" onKeyPress="isi_otomatis1()" required="required">
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" name="asal" id="asal" class="form-control"
                                                    readonly="readonly">
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#cari-asal">
                                                        <i class="glyphicon glyphicon-plus-sign">
                                                            <i class="fa fa-search"></i>
                                                            Cari..</button>
                                                    </i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Tanggal &amp; Jam</label>
                                        <div class="col-sm-2">
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">

                                                <input type="text" name="tgl_buat" id="datepicker" value=""
                                                    class="form-control datepicker datetimepicker"
                                                    data-toggle="datetimepicker" data-target=".datepicker"
                                                    data-format="yyy-mm-dd">

                                                <div class="input-group-append" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" name="jam" id="jam" class="form-control" placeholder="Jam">
                                        </div>
										<div class="col-sm-1">
                                            <input type="text" name="menit" id="menit" class="form-control" placeholder="Menit">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">K. Lapor</label>
                                        <div class="col-sm-4">
                                            <div class="icheck-info d-inline">
                                                <input type="radio" name="kategori_pk" value="BM" checked="checked"
                                                    id="radioSuccess1">
                                                <label for="radioSuccess1">
                                                    BM
                                                </label>
                                            </div>
                                            <div class="icheck-info d-inline">
                                                <input type="radio" name="kategori_pk" value="LAKA" id="radioSuccess2">
                                                <label for="radioSuccess2">
                                                    Laka
                                                </label>
                                            </div>
											
                                            <div class="icheck-info d-inline">
                                                <input type="radio" name="kategori_pk" value="NON LAKA" id="radioSuccess3">
                                                <label for="radioSuccess3">
                                                    Non laka
                                                </label>
                                            </div>
											
                                            <div class="icheck-info d-inline">
                                                <input type="radio" name="kategori_pk" value="UB" id="radioSuccess4">
                                                <label for="radioSuccess4">
                                                    UB
                                                </label>
                                            </div>
											
                                            <div class="icheck-info d-inline">
                                                <input type="radio" name="kategori_pk" value="PB" id="radioSuccess5">
                                                <label for="radioSuccess5">
                                                    PB
                                                </label>
                                            </div>
											
                                            <div class="icheck-info d-inline">
                                                <input type="radio" name="kategori_pk" value="LAINNYA" id="radioSuccess6">
                                                <label for="radioSuccess6">
                                                    Lainnya
                                                </label>
                                            </div>
                                        </div>
                                    
							<label class="col-sm-2 col-form-label">Nama Pengemudi</label>
												<div class="col-sm-1">
												  <input type="text" name="nic_sp" id="nic_sp" class="form-control"
													onBlur="isi_otomatis1()"
													onkeyup="isi_otomatis1()" onFocus="isi_otomatis1()" onChange="fn(this)" onKeyPress="isi_otomatis1()" placeholder="NIK">
												</div>
													<div class="col-sm-3">
													<input type="text" name="nama_sp" id="nama_sp" class="form-control" placeholder="Nama Pengemudi">
													</div>
									</div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Non Laka</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="No Laka">
                                        </div>
                                        <label class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-4">
                                            <select name="keterangan" id="keterangan" class="form-control  select2" style="width: 100%;" required>
                                            <option value="" selected>Pilih status ...</option>
                                            <option value="Perbaikan Ringan">Ringan</option>
                                            <option value="Perbaikan Sedang">Sedang</option>
                                            <option value="Perbaikan Berat">Berat</option>
                                        </select>
                                        </div>
                                    </div>         
                                    <div id="riwayat"></div>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Status</label>
                                        <div class="col-sm-4">
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" id="service" name="service" value="Y">
                                                <label for="minimum"> Service ?
                                                </label>
                                              </div>
                                            </div>
                                        <label class="col-sm-1 col-form-label">Pelapor</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="pelapor" id="pelapor"
                                                class="form-control" required="required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="form-control btn bg-gradient-primary">
                                            <i class="fa fa-check-circle"></i>
                                            Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
              <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped  table-bordered table-hover nowrap responsive">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Body</th>
                                            <th>NIK PNG</th>
                                            <th>Nama PNG</th>
                                            <th>Kategori</th>
                                            <th>Tgl Masuk</th>
                                            <th>Jam Masuk</th>
                                            <th>Keterangan</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-pengiriman"></tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                            <div class="card-footer">
                                <button class="btn bg-gradient-success cetak-datattb" id="cetak" data-id="" hidden="">
                                    <i class="fa fa-print"></i>
                                    Cetak</button>
                            </div>
                        </div>
                    </div>
                        </div>
                        </div>
