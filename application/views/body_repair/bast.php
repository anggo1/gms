<style>
	.table.DataTable {
		font-family: Verdana, Geneva, Tahoma, sans-serif;
		font-size: 12px;
	}

	table.dataTable td {
		padding-bottom: 5px;
	}
	input[type="checkbox"] {
  /* Add if not using autoprefixer */
  -webkit-appearance: none;
  /* Remove most all native input styles */
  appearance: none;
  /* For iOS < 15 */
  background-color: var(--form-background);
  /* Not removed via appearance */
  margin: 0;

  font: inherit;
  color: currentColor;
  width: 1.15em;
  height: 1.15em;
  border: 0.15em solid currentColor;
  border-radius: 0.15em;
  transform: translateY(-0.075em);

  display: grid;
  place-content: center;
  outline: max(2px, 0.15em) solid green;
  outline-offset: max(2px, 0.15em);
  
  
}

input[type="checkbox"]::before {
  content: "";
  width: 0.65em;
  height: 0.65em;
  clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
  transform: scale(0);
  transform-origin: bottom left;
  transition: 120ms transform ease-in-out;
  box-shadow: inset 1em 1em var(--form-control-color);
  /* Windows High Contrast Mode */
  background-color: green;
  
  
}

input[type="checkbox"]:checked::before {
  transform: scale(1);
}

input[type="checkbox"]:focus {
  outline: max(2px, 0.15em) solid currentColor;
  outline-offset: max(2px, 0.15em);
  
}
input-besar, textarea{
    text-transform: uppercase;
}
</style>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-default">
			<div class="card-header">
                <h3 class="card-title text-blue"><span class="ion-soup-can-outline ion-lg text-blue"></span>&nbsp; Proses Berita Acara Serah Terima (BAST)</h3>
              </div>
						<div class="modal-body">
							<form id="formBast" name="formBast" method="POST">

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal</label>
									<div class="col-sm-4">
										<div class="input-group date" id="reservationdate" data-target-input="nearest">

											<input type="text" name="tgl_bast" id="tgl_bast" class="form-control tgl_po datetimepicker" data-toggle="datetimepicker" data-target=".tgl_po" data-format="yyy-mm-dd" required>

											<div class="input-group-append" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i>
												</div>
											</div>
										</div>
									</div>									
									<label class="col-sm-2 col-form-label">Surat Jalan</label>
									<div class="col-sm-4">
										<input type="text" name="no_sj" class="form-control" placeholder="Nomor Surat Jalan ?">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No Body</label>
									<div class="col-sm-4">
										<input type="text" name="no_body" value="" onkeyup="this.value = this.value.toUpperCase();" class="form-control input-besar" placeholder="Nomor Body" required>
									</div>
									<label class="col-sm-2 col-form-label">No Pol</label>
									<div class="col-sm-4">
										<input type="text" name="no_pol" class="form-control" style="text-transform: uppercase;" placeholder="Nomor Polisi ?">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">NIK Pengemudi</label>
									<div class="col-sm-4">
										<input type="text" name="nip_sp" class="form-control" placeholder="NIP Pengemudi">
									</div>
									<label class="col-sm-2 col-form-label">Nama Pengemudi</label>
									<div class="col-sm-4">
										<input type="text" name="nama_sp" class="form-control" placeholder="Nama Pengemudi ?">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-sm-4">
										<input type="text" name="keterangan" id="keterangan" value="" class="form-control" placeholder="Keterangan">
									</div>
									
									<label class="col-sm-2 col-form-label">Status</label>
									<div class="col-sm-4">
										<select name="status_bus" class="form-control">
											<option value="">Pilih Status ...</option>
											<option value="AKTIF">AKTIF</option>
											<option value="PASIF">PASIF</option>
										</select>
									</div>
								</div>
						<input type="hidden" name="user" id="user" value="<?php echo $this->session->userdata['full_name']; ?>" class="form-control">
						<div class="modal-footer center-content-between">
							<button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
						</div>
						</div>
						</div>
            <!-- /.card -->

            <!-- general form elements -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
				
			  <div class="table-responsive">
			  <table class="table table-striped  table-bordered table-hover nowrap" id="list-po">
									<thead>
								<tr>
									<th>No</th>
									<th>Body</th>
									<th>NoPol</th>
									<th>Pengemudi</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
								</thead>
									<tbody id="data-bast"></tbody>
									<tfoot></tfoot>
						</table>
					</div>
					</div>
              <!-- /.card-body -->
				<div id="modal-bast"></div>
            </div>

          </div>
			
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card">
            <div class="card-header">
                <h3 class="card-title text-blue"><span class="ion-android-alert ion-lg"></span>&nbsp; Detail Berita Acara Serah Terima (BAST)</h3>
              </div>
						<div class="modal-body">
						<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kaca Depan</label>
									<div class="col-sm-4">
										<input type="text" name="kaca_depan" class="form-control" placeholder="Kondisi Kaca Depan">
									</div>
									<label class="col-sm-2 col-form-label">Kaca Belakang</label>
									<div class="col-sm-4">
										<input type="text" name="kaca_belakang" class="form-control" placeholder="Kondisi Kaca Belakang">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Spion</label>
									<div class="col-sm-4">
										<input type="text" name="spion" class="form-control" placeholder="Kondisi Spion">
									</div>
									<label class="col-sm-2 col-form-label">Solar</label>
									<div class="col-sm-4">
										<input type="text" name="solar" id="solar" value="" class="form-control" placeholder="Solar">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Seat</label>
									<div class="col-sm-4">
										<input type="text" name="seat" class="form-control" placeholder="Jumlah Seat">
									</div>
									<label class="col-sm-2 col-form-label">AC</label>
									<div class="col-sm-4">
										<input type="text" name="ac" id="ac" value="" class="form-control" placeholder="Air Conditioner">
									</div>
								</div>
								<table class="table table-striped table-hover nowrap" id="list-po">
									<thead>
										<tr>
										<th><strong>Nama Part</strong></th>
                                        <th><strong>KN</strong></th>
                                        <th><strong>KR</strong></th>
                                        <th><strong>Nama Part</strong></th>
                                        <th><strong>KET</strong></th>
                                        <th><strong>Nama Part</strong></th>
                                        <th><strong>KET</strong></th>
										</tr>
									</thead>
									<tbody id="data-po">
									<td>Lampu Besar</td>
							<td><input type="checkbox" name="lb_kn" id="lb_kn" value="1" checked></td>
							<td ><input type="checkbox" name="lb_kr" value="1" checked></td>
							<td>Ban Stip/Serep</td>
							<td ><label for="ban_stip">
							  <input type="checkbox" name="ban_serep" value="1" checked>
							</label></td>
							<td>STNK</td>
							<td><input type="checkbox" name="stnk" value="1"checked></td>
						</tr>
						<tr>
							<td>Lampu Sign</td>
							<td><input type="checkbox" name="sign_kn" value="1"checked></td>
							<td ><input type="checkbox" name="sign_kr" value="1"checked></td>
							<td>Kunci Roda</td>
							<td ><input type="checkbox" name="kc_roda" value="1"checked></td>
							<td>KPS</td>
							<td><input type="checkbox" name="kps" value="1"checked></td>
						</tr>
						<tr>
							<td>Lampu Rem</td>
							<td><input type="checkbox" name="lmp_rem_kn" value="1" checked></td>
							<td ><input type="checkbox" name="lmp_rem_kr" value="1" checked></td>
							<td>Dongkrak</td>
							<td ><input type="checkbox" name="dongkrak" value="1" checked></td>
							<td>Buku Keur</td>
							<td><input type="checkbox" name="keur" value="1" checked></td>
						</tr>
						<tr>
							<td>Lampu Kota</td>
							<td><input type="checkbox" name="lmp_kota_kn" value="1" checked></td>
							<td ><input type="checkbox" name="lmp_kota_kr" value="1" checked></td>
							<td>Video</td>
							<td ><input type="checkbox" name="video" value="1" checked></td>
							<td>Buku JR</td>
							<td><input type="checkbox" name="buku_jr" value="1" checked></td>
						</tr>
						<tr>
							<td>Kaca Spion</td>
							<td ><input type="checkbox" name="spion_kr" value="1" checked></td>
							<td ><input type="checkbox" name="spion_kn" value="1" checked></td>
							<td>TV</td>
							<td ><input type="checkbox" name="tv" value="1" checked></td>
							<td>SIU</td>
							<td><input type="checkbox" name="siu" value="1" checked></td>
						</tr>
						<tr>
							<td height="22">&nbsp;</td>
							<td>&nbsp;</td>
							<td >&nbsp;</td>
							<td>Tape</td>
							<td ><input type="checkbox" name="tape" value="1" checked></td>
							<td>Kunci Kontak</td>
							<td><input type="checkbox" name="kc_kontak" value="1" checked></td>
									</tbody>
									<tfoot></tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
							</form>
							
</section>
<?php show_my_confirm('hapusDetail', 'hapus-detail', 'Hapus Data PO Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>

</section><!-- /.modal-content -->
<script type="text/javascript">
	$('#tgl_bast,#tgl_awal,#tgl_akhir').datetimepicker({
		format: 'DD-MM-YYYY',
		date: moment()
	});
	window.onload = function() {
        tampilDetail();
    }

	var checkbox = document.getElementsByName("lb_kn");
            if(checkbox.checked){
				
				document.getElementById("lb_kn").value = 0;
                $('#nama').attr('value', '0');
				 $(this).attr('checked', true).val(0);
			}

	function refresh() {
		MyTable = $('#list-po').dataTable();
	}
	
	var tableBast = $('#list-bast').DataTable({
           "responsive": false,
           "paging": true,
           "lengthChange": false,
           "searching": false,
           "ordering": false,
           "info": false,
           "autoWidth": true,
           "pageLength": 5
         });

	$('#formBast').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('Bast/prosesBast'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				if (out.status == 'form') {
					$('.form-msg').html(out.msg);
					effect_msg_form();
				} else {
					tampilDetail();
					document.getElementById("formBast").reset();
					$('.msg').html(out.msg);
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: out.msg,
						showConfirmButton: false,
						timer: 1500
					})
				}
			})

		e.preventDefault();
	});
	function tampilDetail() {
        $.get('<?php echo base_url('Bast/tampilDetail'); ?>', function(data) {
            tableBast.destroy();
            $('#data-bast').html(data);
            refresh();
        });
    }

	$(document).on("click", ".cetak-bast", function() {
		var id = $(this).attr("data-id");
		//var id = document.getElementById('next_proses').value=datakode;
		$.ajax({
				method: "POST",
				url: "<?php echo base_url('Bast/cetak'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#modal-bast').html(data);
				$('#cetak-bast').modal('show');
			})
	})
</script>