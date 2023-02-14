<style>
    .table.DataTable {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 12px;
    }

    table.dataTable td {
        padding-bottom: 5px;
    }
</style>
				<section class="content">
			    	<div class="container-fluid">
			    		<div class="row">
			    			<div class="col-md-5">
			    				<div class="card card-default">
			    					<!-- /.card-header -->
			    					<div class="modal-content">
			    						<div class="modal-header">

			    							<h5 style="display:block; text-align:center;"> Penambahan Stok Barang</h5>
			    						</div>
			    						<div class="modal-body">
			    							<form id="form-partMasuk" name="form-partMasuk" method="POST">
												
											<div class="form-group row">
			    									<label class="col-sm-3 col-form-label">Tanggal</label>
			    									<div class="col-sm-9">
			    										<div class="input-group date" id="reservationdate" data-target-input="nearest">

			    											<input type="text" name="date1" id="date1" value="" class="form-control date1 datetimepicker" data-toggle="datetimepicker" data-target=".date1" data-format="yyy-mm-dd">

			    											<div class="input-group-append" data-toggle="datetimepicker">
			    												<div class="input-group-text"><i class="fa fa-calendar"></i>
			    												</div>
			    											</div>
			    										</div>
			    									</div>
			    								</div>
			    								<div class="form-group row">
			    									<label for="Nama Konsumen" class="col-sm-3 col-form-label">No Part</label>
			    									<div class="col-sm-9">
			    										<div class="input-group date" id="reservationdate" data-target-input="nearest">
			    											<input type="hidden" name="id_barang" id="id_barang" class="form-control">
			    											<input type="text" name="no_part" id="no_part" readonly class="form-control"> 
			    											<span class="input-group-append">
			    												<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_form"><i class="glyphicon glyphicon-plus-sign"><i class="fa fa-search"></i> Cari..</button></i>
			    											</span>
			    										</div>
			    									</div>
			    								</div>
			    								<div class="form-group row">
			    									<label class="col-sm-3 col-form-label">Status PO</label>
			    									<div class="col-sm-9">
													<select name="status_po" class="form-control">
                                                        <option value="">Pilih Status ...</option>
                                                        <option value="Y">PO</option>
                                                        <option value="N">Non PO</option>
                                                    </select>
			    									</div>
			    								</div>
			    								<div class="form-group row">
			    									<label class="col-sm-3 col-form-label">No PO</label>
			    									<div class="col-sm-9">
			    										<input type="text" name="no_po" id="no_po" value="" class="form-control" placeholder="No PO">
			    									</div>
			    								</div>
												<div class="form-group row">
			    									<label class="col-sm-3 col-form-label">Jumlah</label>
			    									<div class="col-sm-9">
			    										<input type="text" name="jumlah" id="jumlah" value="" class="form-control" placeholder="Jumlah Barang">
			    									</div>
			    								</div>
												<div class="form-group row">
			    									<label class="col-sm-3 col-form-label">Status Barang</label>
			    									<div class="col-sm-9">
													<select name="status_part" class="form-control">
                                                        <option value="">Pilih Status ...</option>
                                                        <option value="AKTIF">AKTIF</option>
                                                        <option value="PASIF">PASIF</option>
                                                    </select>
			    									</div>
			    								</div>
			    								<div class="modal-footer justify-content-between">
			    									<button class="btn btn-primary " type="submit"><span class="fa fa-save"></span> Simpan</button>
			    								</div>

			    							</form>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    			<div class="modal fade" id="modal_form" role="dialog">
			    				<div class="modal-dialog modal-xm">
			    					<div class="modal-content">

			    						<div class="modal-header">
			    							<h3 class="modal-title">Person Form</h3>
			    							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			    								<span aria-hidden="true">&times;</span>
			    							</button>

			    						</div>
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
			    		<?php show_my_confirm('hapusCuti', 'hapus-cuti', 'Hapus Data Cuti Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>

			    </section><!-- /.modal-content -->
			    <script type="text/javascript">
			    	$('#date1,#tgl_awal,#tgl_akhir').datetimepicker({
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
			    				"url": "<?php echo site_url('Part_masuk/ajax_list') ?>",
			    				"type": "POST"
			    			},
			    			"columnDefs": [{
			    				"targets": [0],
			    				"orderable": false,
			    			}, ],
			    			"dom": '<"top"f>rt<"bottom"lp><"clear">',
			    			"fnDrawCallback": function() {
			    				$("input[type='search']").attr("id", "searchBox");
			    				$('#table-select').css('cssText', "margin-top: 0px !important;");
			    				$('#searchBox').css("width", "300px").focus();
			    				$('#table-select_filter').removeClass('dataTables_filter');
			    			}
			    		});
			    	});

			    	function selectPart(id_barang, no_part) {
			    		document.getElementById('id_barang').value = id_barang;
			    		document.getElementById('no_part').value = no_part;
			    		//document.getElementById('nama_part').value = nama_part;

			    		$('#modal_form').modal('hide');
			    	}
					
			    	$('#form-cutiPegawai').submit(function(e) {
			    		var data = $(this).serialize();

			    		$.ajax({
			    				method: 'POST',
			    				url: '<?php echo base_url('Cuti/prosesCutiPegawai'); ?>',
			    				data: data
			    			})
			    			.done(function(data) {
			    				var out = jQuery.parseJSON(data);

			    				if (out.status == 'form') {
			    					$('.form-msg').html(out.msg);
			    					effect_msg_form();
			    				} else {
			    					document.getElementById("form-cutiPegawai").reset();
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

			    	function listCuti() {
			    		var date1 = document.getElementById("tgl_awal").value;
			    		var date2 = document.getElementById("tgl_akhir").value;
			    		$.ajax({
			    			type: 'GET',
			    			url: '<?php echo base_url('Cuti/list_cuti'); ?>?date1' + date1,
			    			data: 'date1=' + date1 + '&date2=' + date2,
			    			success: function(hasil) {
			    				MyTable.fnDestroy();
			    				$('#data-cuti').html(hasil);
			    				refresh();
			    			}
			    		});
			    	}

			    	function refresh() {
			    		MyTable = $('#list-cuti').dataTable();
			    	}
			    	var MyTable = $('#list-cuti').dataTable({
			    		"responsive": true,
			    		"paging": true,
			    		"lengthChange": false,
			    		"searching": false,
			    		"ordering": true,
			    		"info": false,
			    		"autoWidth": true,
			    		"pageLength": 5
			    	});
			    	$(document).on("click", ".delete-cuti", function() {
			    		id_sat = $(this).attr("data-id");
			    	})
			    	$(document).on("click", ".hapus-cuti", function() {
			    		var id = id_sat;

			    		$.ajax({
			    				method: "POST",
			    				url: "<?php echo base_url('Cuti/deleteCuti'); ?>",
			    				data: "id=" + id
			    			})

			    			.done(function(data) {
			    				var out = jQuery.parseJSON(data);
			    				listCuti();
			    				if (out.status != 'form') {
			    					Swal.fire({
			    						position: 'top-end',
			    						icon: 'error',
			    						title: out.msg,
			    						showConfirmButton: false,
			    						timer: 1500
			    					})
			    					//$('.msg').html(out.msg);
			    					$('#hapusCuti').modal('hide');
			    				}
			    			})
			    	})
			    </script>