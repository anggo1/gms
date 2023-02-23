<style>
	.table.DataTable {
		font-family: Verdana, Geneva, Tahoma, sans-serif;
		font-size: 12px;
	}

	table.dataTable td {
		padding-bottom: 5px;
	}
</style>
<?php if (!empty($dataPart)) {
	foreach ($dataPart as $part) {
	}
} ?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-default">
					<!-- /.card-header -->
					<div class="modal-content">
						<div class="modal-header text-blue">

							<h5 style="display:block; text-align:center;"><span class="ion-soup-can-outline ion-lg text-blue"></span>&nbsp; Proses Berita Acara Serah Terima (BAST)</h5>
						</div>
						<div class="modal-body">
							<form id="formPo" name="formPo" method="POST">

								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tanggal</label>
									<div class="col-sm-4">
										<div class="input-group date" id="reservationdate" data-target-input="nearest">

											<input type="text" name="tgl_po" id="tgl_po" value="" class="form-control tgl_po datetimepicker" data-toggle="datetimepicker" data-target=".tgl_po" data-format="yyy-mm-dd" required>

											<div class="input-group-append" data-toggle="datetimepicker">
												<div class="input-group-text"><i class="fa fa-calendar"></i>
												</div>
											</div>
										</div>
									</div>
									<label class="col-sm-2 col-form-label">Kode Pesan</label>
									<div class="col-sm-4">
										<input type="text" name="kode_pesan" id="kode_pesan" class="form-control" placeholder="Kode Pemesanan">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">No Body</label>
									<div class="col-sm-4">
										<input type="text" name="top" id="top" value="" class="form-control" placeholder="Term of Payment" required>
									</div>
									<label class="col-sm-2 col-form-label">No Pol</label>
									<div class="col-sm-4">
										<input type="text" name="pengesah" id="pengesah" value="" class="form-control" placeholder="Pengesah PO Oleh.. ?" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">NIK Pengemudi</label>
									<div class="col-sm-4">
										<input type="text" name="top" id="top" value="" class="form-control" placeholder="Term of Payment" required>
									</div>
									<label class="col-sm-2 col-form-label">Nama Pengemudi</label>
									<div class="col-sm-4">
										<input type="text" name="pengesah" id="pengesah" value="" class="form-control" placeholder="Pengesah PO Oleh.. ?" required>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Keterangan</label>
									<div class="col-sm-4">
										<input type="text" name="keterangan" id="keterangan" value="" class="form-control" placeholder="Keterangan">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Kaca Depan</label>
									<div class="col-sm-4">
										<input type="text" name="top" id="top" value="" class="form-control" placeholder="Term of Payment" required>
									</div>
									<label class="col-sm-2 col-form-label">Kaca Belakang</label>
									<div class="col-sm-4">
										<input type="text" name="pengesah" id="pengesah" value="" class="form-control" placeholder="Pengesah PO Oleh.. ?" required>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Spion</label>
									<div class="col-sm-4">
										<input type="text" name="top" id="top" value="" class="form-control" placeholder="Term of Payment" required>
									</div>
									<label class="col-sm-2 col-form-label">Solar</label>
									<div class="col-sm-4">
										<input type="text" name="pengesah" id="pengesah" value="" class="form-control" placeholder="Pengesah PO Oleh.. ?" required>
									</div>
								</div>
								
						</div>
						<input type="hidden" name="id_po" id="id_po" class="form-control">
						<input type="hidden" name="hrg_awal" id="hrg_awal" class="form-control">
						<input type="hidden" name="total_diskon" id="total_diskon" class="form-control">
						<input type="hidden" name="total_harga" id="total_harga" class="form-control">
						<input type="hidden" name="user" id="user" value="<?php echo $this->session->userdata['full_name']; ?>" class="form-control">
						<div class="modal-footer center-content-between">
							<button class="btn btn-primary " type="submit"><span class="fa fa-save"></span> Simpan</button>
						</div>

						</form>
					</div>
				</div>
				<div id="modal-po"></div>
			</div>

			<div class="col-md-6" id="detailPart">
				<div class="card card-default">
					<div class="modal-content text-blue">
						<div class="modal-header text-blue">
							<h5 style="display:block; text-align:center;"><span class="ion-android-alert ion-lg text-blue"></span>&nbsp; Detail Berita Acara Serah Terima (BAST)</h5>
							<div class="text-right">
								<button type="button" class="btn btn-sm btn-outline-success cetak-po" id="cetak" data-id="" title="Add Data"><i class="fas fa-print"></i> Cetak</button>
							</div>
						</div>
						<div class="modal-body">
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
							<td><input type="checkbox" name="lb_kn" value="1"></td>
							<td ><input type="checkbox" name="lb_kr" value="1"></td>
							<td>Ban Stip/Serep</td>
							<td ><label for="ban_stip">
							  <input type="checkbox" name="ban_serep" value="1" >
							</label></td>
							<td>STNK</td>
							<td><input type="checkbox" name="stnk" value="1"></td>
						</tr>
						<tr>
							<td>Lampu Sign</td>
							<td><input type="checkbox" name="sign_kn" value="1"></td>
							<td ><input type="checkbox" name="sign_kr" value="1"></td>
							<td>Kunci Roda</td>
							<td ><input type="checkbox" name="kc_roda" value="1"></td>
							<td>KPS</td>
							<td><input type="checkbox" name="kps" value="1"></td>
						</tr>
						<tr>
							<td>Lampu Rem</td>
							<td><input type="checkbox" name="lmp_kn" value="1"></td>
							<td ><input type="checkbox" name="lmp_kr" value="1"></td>
							<td>Dongkrak</td>
							<td ><input type="checkbox" name="dongkrak" value="1"></td>
							<td>Buku Keur</td>
							<td><input type="checkbox" name="keur" value="1"></td>
						</tr>
						<tr>
							<td>Lampu Kota</td>
							<td><input type="checkbox" name="lmp_kota_kn" value="1"></td>
							<td ><input type="checkbox" name="lmp_kota_kr" value="1"></td>
							<td>Video</td>
							<td ><input type="checkbox" name="video" value="1"></td>
							<td>Buku JR</td>
							<td><input type="checkbox" name="buku_jr" value="1"></td>
						</tr>
						<tr>
							<td>Kaca Spion</td>
							<td ><input type="checkbox" name="spion_kr" value="1"></td>
							<td ><input type="checkbox" name="spion_kn" value="1"></td>
							<td>TV</td>
							<td ><input type="checkbox" name="tv" value="1"></td>
							<td>SIU</td>
							<td><input type="checkbox" name="siu" value="1"></td>
						</tr>
						<tr>
							<td height="22">&nbsp;</td>
							<td>&nbsp;</td>
							<td >&nbsp;</td>
							<td>Tape</td>
							<td ><input type="checkbox" name="tape" value="1"></td>
							<td>Kunci Kontak</td>
							<td><input type="checkbox" name="kc_kontak" value="1"></td>
									</tbody>
									<tfoot></tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			<div class="modal fade" id="modal_form" role="dialog">
				<div class="modal-dialog modal-xm">
					<div class="modal-content">
						<div class="modal-body form">
							<div class="card card-first card-outline">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table no-wrap table-hover nowrap" id="table-part">
											<thead>
												<tr>
													<th>#</th>
													<th>No Part</th>
													<th>Nama Part</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
											<tfoot></tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php show_my_confirm('hapusDetail', 'hapus-detail', 'Hapus Data PO Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>

</section><!-- /.modal-content -->
<script type="text/javascript">
	$('#tgl_po,#tgl_awal,#tgl_akhir').datetimepicker({
		format: 'DD-MM-YYYY',
		date: moment()
	});
	$(document).ready(function() {
		table = $('#table-part').dataTable({
			"responsive": false,
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": false,
			"info": false,
			"processing": true,
			"serverSide": true,
			"pageLength": 5, // Defaults number of rows to display in table
			"order": [],
			"ajax": {
				"url": "<?php echo site_url('PurchaseOrder/ajax_list') ?>",
				"type": "POST"
			},
			"columnDefs": [{
				"targets": [0],
				"orderable": false,
			}, ],
			"dom": '<"top"f>rt<"bottom"lp><"clear">',
			"fnDrawCallback": function() {
				$("input[type                                = 'search']").attr("id", "searchBox");
				$('#table-select').css('cssText', "margin-top: 0px !important;");
				$('#searchBox').css("width", "300px").focus();
				$('#table-select_filter').removeClass('dataTables_filter');
			}
		});
	});

	function PO() {
		document.getElementById("fndisc").hidden = false;
	}

	function nonPO() {
		document.getElementById("fndisc").hidden = true;
	}

	function selectPart(id_barang) {
		$.ajax({
			url: "<?php echo site_url('PurchaseOrder/cariKode') ?>/" + id_barang,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name = "id_barang"]').val(data.id_barang);
				$('[name = "no_part"]').val(data.no_part);
				$('[name = "nama_part"]').val(data.nama_part);
				$('[name = "stok_awal"]').val(data.stok);
				$('[name = "stok_a"]').val(data.stok_a);
				$('[name = "stok_p"]').val(data.stok_p);
				$('[name = "supplier"]').val(data.supplier);
				$('[name = "hrg_awal"]').val(data.hrg_awal);
				//document.getElementById('supplier').innerHTML   = data.supplier;
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});

		$('#modal_form').modal('hide');
	}

	var MyTable = $('#list-po').dataTable({
		"responsive": false,
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": false,
		"info": false
	});

	function next(dataPo) {
		document.getElementById('id_po').value = dataPo;
		var d = document.getElementById("cetak");
		d.setAttribute('data-id', dataPo);

		//document.getElementById("cetak").hidden = false;
		//document.getElementById("alamat").readonly = true;
	}

	function refresh() {
		MyTable = $('#list-po').dataTable();
	}

	function tampilDetail(dataPo) {
		//var out = jQuery.parseJSON(data);
		var id_po = document.getElementById('id_po').value = dataPo;
		$.ajax({
			type: 'GET',
			url: '<?php echo base_url('PurchaseOrder/tampilDetail'); ?>?id_po=' + id_po,
			data: 'id_po=' + id_po,
			success: function(hasil) {
				MyTable.fnDestroy();
				$('#data-po').html(hasil);
				refresh();
			}
		});
	}
	$('#formPo').submit(function(e) {
		document.getElementById("detailPart").hidden = false;
		var data = $(this).serialize();

		$.ajax({
				method: 'POST',
				url: '<?php echo base_url('PurchaseOrder/prosesPo'); ?>',
				data: data
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);

				if (out.status == 'form') {
					//toastr.error(out.msg);
					$('.msg').html(out.msg);
					refresh();
					effect_msg();
				} else {
					$('.msg').html(out.msg);
					$('.dataPo').html(out.dataPo);
					tampilDetail(out.dataPo)
					next(out.dataPo);
					document.getElementById("formPo"); //reset()	
					$('#tgl_po').attr('readonly', 'readonly');
					$('#kode_pesan').attr('readonly', 'readonly');
					$('#top').attr('readonly', 'readonly');
					$('#pengesah').attr('readonly', 'readonly');
					$('#no_part').val('');
					$('#nama_part').val('');
					$('#diskon').val('0');
					$('#supplier').val('');
					$('#jumlah').val('');
					$('#keterangan').val('');
					$('#hrg_awal').val('');
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

	function cetakPo(datakode) {}


	$(document).on("click", ".cetak-po", function() {
		var id = $(this).attr("data-id");
		//var id = document.getElementById('next_proses').value=datakode;
		$.ajax({
				method: "POST",
				url: "<?php echo base_url('PurchaseOrder/cetak'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				$('#modal-po').html(data);
				$('#cetak-po').modal('show');
			})
	})
	var data_id;
	$(document).on("click", ".delete-detail", function() {
		data_id = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-detail", function() {
		var id = data_id;

		$.ajax({
				method: "POST",
				url: "<?php echo base_url('PurchaseOrder/deleteDetail'); ?>",
				data: "id=" + id
			})
			.done(function(data) {
				var out = jQuery.parseJSON(data);
				if (out.status != 'form') {
					Swal.fire({
						position: 'top-end',
						icon: 'success',
						title: out.msg,
						showConfirmButton: false,
						timer: 1500
					})
					//$('.msg').html(out.msg);
					$('#hapusDetail').modal('hide');
					var id_po = document.formPo.id_po.value;
					//next(next_proses);
					tampilDetail(id_po);
				}
			})
	})

	function startHitung() {
		interval = setInterval("Hitung()", 10);
	}

	function Hitung() {

		var a = document.formPo.jumlah.value;
		var b = document.formPo.hrg_awal.value;
		document.formPo.total_harga.value = (a * b);
	}

	function stopHitung() {
		clearInterval(startHitung);
	}

	function startDiskon() {
		interval = setInterval("Diskon()", 10);
	}

	function Diskon() {

		var a = document.formPo.jumlah.value;
		var b = document.formPo.hrg_awal.value;
		var c = document.formPo.diskon.value;
		document.formPo.total_diskon.value = (a * b) * c / 100;
	}

	function stopDiskon() {
		clearInterval(startDiskon);
	}

	function startPpn() {
		interval = setInterval("Ppn()", 10);
	}
</script>