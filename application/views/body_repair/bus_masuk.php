<style>
    .table.DataTable {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11px;
    }

    table.dataTable td {
        padding-bottom: 5px;
    }
    .Blink-warning { animation: blinker 5s cubic-bezier(.5, 0, 1, 1) infinite alternate; }
@keyframes blinker { from { opacity: 1; } to { opacity: 0; } }
.Blink-danger { animation: blinker 0.1s cubic-bezier(.5, 0, 1, 1) infinite alternate; }
@keyframes blinker { from { opacity: 1; } to { opacity: 0; } }


.tombol-success {
  background-color: green;
  border: none;
  color: white;
  padding: 2px 5px 2px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
        float: right;
}


.tombol-success {border-radius: 50%;}

.tombol-warning {
  background-color: #ffc107;
  border: none;
  color: white;
  padding: 2px 5px 2px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
        float: right;
}

.tombol-warning {border-radius: 50%;}
</style>
<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-bus"></i>  Laporan Bus Masuk</h3>
              </div>

                            <form id="form-tambah-laporan" method="POST">
                                <div class="card-body">
                                
                                <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal &amp; Jam</label>
                                        <div class="col-sm-2">
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" name="tgl_masuk" id="tgl_masuk" class="form-control tgl_masuk datetimepicker" data-toggle="datetimepicker" data-target=".tgl_masuk" data-format="yyy-mm-dd" required>
                                                <div class="input-group-append" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-sm-2">
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input type="text" name="jam_masuk" id="jam_masuk" class="form-control jam datetimepicker-input" data-toggle="datetimepicker" data-target=".jam" data-format="hh:mm"/>
                                        <div class="input-group-append" data-target="#jam" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No Body</label>
									<div class="col-sm-1">
										<input type="text" name="no_body" value="" onkeyup="this.value = this.value.toUpperCase();" class="form-control input-besar" placeholder="Nomor Body" required>
									</div>
									<label class="col-sm-1 col-form-label">No Pol</label>
									<div class="col-sm-2">
										<input type="text" name="no_pol" class="form-control" style="text-transform: uppercase;" placeholder="Nomor Polisi ?">
									</div>
									<label class="col-sm-2 col-form-label">NIP Pengemudi</label>
									<div class="col-sm-1">
										<input type="text" name="nip_sp" class="form-control" placeholder="NIP">
									</div>
									<label class="col-sm-1 col-form-label">Nama</label>
									<div class="col-sm-2">
										<input type="text" name="nama_sp" class="form-control" placeholder="Nama Pengemudi ?">
									</div>
								</div>
                                    <div class="form-group row">
									<label class="col-sm-2 col-form-label">Keterangan Lapor</label>
									<div class="col-sm-4">
                                    <select name="ket_lapor" class="form-control">
											<option value="">Pilih...
											</option>
											<?php
											if (!empty($dataLap)) {
												foreach ($dataLap as $l) {   ?>
													<option value="<?php echo $l->id; ?>">
														<?php echo $l->kode.' | '.$l->keterangan; ?>
													</option>
											<?php
												}
											}
											?>
										</select>
                                    </div>
                                    <label class="col-sm-2 col-form-label">Jenis Perbaikan</label>
									<div class="col-sm-4">
                                    <select name="kategori" class="form-control">
											<option value="">Pilih...
											</option>
											<?php
											if (!empty($dataKat)) {
												foreach ($dataKat as $j) {   ?>
													<option value="<?php echo $l->id; ?>">
														<?php echo $j->kategori; ?>
													</option>
											<?php
												}
											}
											?>
										</select>
                                    </div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-sm-4">
										<input type="text" name="keterangan" id="keterangan" value="" class="form-control" placeholder="Keterangan">
									</div>
									
									<label class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-4">
										<select name="status_body" class="form-control">
											<option value="">Pilih Status ...</option>
											<option value="AKTIF">AKTIF</option>
											<option value="PASIF">PASIF</option>
										</select>
									</div>
								</div>
						</div>
						<input type="hidden" name="user" id="user" value="<?php echo $this->session->userdata['full_name']; ?>" class="form-control">
						<div class="modal-footer center-content-between">
							<button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
						</div>
						</div>
                            </form>
                        </div>
                        <?php show_my_confirm('hapusLaporan', 'hapus-laporan', 'Hapus Data Laporan Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
 
              <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info">
                        <div class="card-body">
                            <div class="table-responsive">
						<table id="tabel-masuk" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Body</th>
                                            <th>No Pol</th>
                                            <th>Pelapor</th>
                                            <th>K.Lapor</th>
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
                       <script type="text/javascript">
	$('#tgl_masuk').datetimepicker({
		format: 'DD-MM-YYYY',
		date: moment()
	});
      //Timepicker
      $('#jam_masuk').datetimepicker({
        format: 'HH:mm',
        pickDate: false,
        pickSeconds: false,
        pick12HourFormat: false
    })

	$(document).ready(function() {

//datatables
table = $("#tabel-masuk").DataTable({
    "responsive": true,
    "autoWidth": false,
    "language": {
        "sEmptyTable": "Data Laporan Belum Ada"
    },
    "processing": true, //Feature control the processing indicator.
    "serverSide": true,
    "language": {
        processing: '<i class="fa fa-spinner fa-spin fa-3x"></i>'
    },
    "order": [],

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": "<?php echo site_url('BusMasuk/ajax_list') ?>",
        "type": "POST"
    },
    "columnDefs": [
{
    "targets": [ 0 ],
    "orderable": false,
},
],

});

});
$('#form-tambah-laporan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('BusMasuk/prosesLaporan'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					document.getElementById("form-tambah-laporan").reset();
					$('.msg').html(out.msg);
                    table.ajax.reload();
                    Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: out.msg,
                            showConfirmButton: false,
                            timer: 1500
					})
				}
			})

		e.preventDefault();
	});

$(document).on("click", ".update-body", function() {
var id = $(this).attr("data-id");

$.ajax({
    method: "POST",
    url: "<?php echo base_url('Body/updateBody'); ?>",
    data: "id=" +id
})
.done(function(data) {
    $('#tempat-modal').html(data);
    $('#update-body').modal('show');
})
})
$(document).on('submit', '#form-update-body', function(e){
var data = $(this).serialize();

$.ajax({
    method: 'POST',
    url: '<?php echo base_url('Body/prosesUbody'); ?>',
    data: data
})
.done(function(data) {
    var out = jQuery.parseJSON(data);

    table.ajax.reload();
    if (out.status == 'form') {
        $('.form-msg').html(out.msg);
        effect_msg_form();
    } else {
        document.getElementById("form-update-body").reset();
        $('#update-body').modal('hide');
        $('.msg').html(out.msg);
        Swal.fire({
                position: 'center',
                icon: 'success',
                title: out.msg,
                showConfirmButton: false,
                timer: 1500
        })
    }
})

e.preventDefault();
});

$('#tambah-body').on('hidden.bs.modal', function () {
$('.form-msg').html('');
})

$('#update-body').on('hidden.bs.modal', function () {
$('.form-msg').html('');
})
$(document).on("click", ".delete-laporan", function() {
        id_lapor = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-laporan", function() {
        var id = id_lapor;

$.ajax({
        method: "POST",
        url: "<?php echo base_url('BusMasuk/deleteLaporan'); ?>",
        data: "id=" + id
    })

    .done(function(data) {
        var out = jQuery.parseJSON(data);
    table.ajax.reload();
        $('.msg').html(out.msg);
        $('#hapusLaporan').modal('hide');
        if (out.status != 'form') {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: out.msg,
                showConfirmButton: false,
                timer: 1200
            })
        }
    })
})
</script>