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
			    			<div class="col-md-7">
			    				<div class="card card-default">
			    					<!-- /.card-header -->
			    					<div class="modal-content">
			    						<div class="modal-header text-blue">

			    							<h5 style="display:block; text-align:center;"><span class="ion-soup-can-outline ion-lg text-blue"></span>&nbsp;  Purchase Order</h5>
			    						</div>
			    						<div class="modal-body">
			    							<form id="form-part-masuk" name="form-part-masuk" method="POST">
												
											<div class="form-group row">
			    									<label class="col-sm-2 col-form-label">Tanggal</label>
			    									<div class="col-sm-4">
			    										<div class="input-group date" id="reservationdate" data-target-input="nearest">

			    											<input type="text" name="date1" id="date1" value="" class="form-control date1 datetimepicker" data-toggle="datetimepicker" data-target=".date1" data-format="yyy-mm-dd" required>

			    											<div class="input-group-append" data-toggle="datetimepicker">
			    												<div class="input-group-text"><i class="fa fa-calendar"></i>
			    												</div>
			    											</div>
			    										</div>
			    									</div>
											<label class="col-sm-2 col-form-label">Kode Pemesanan</label>
												<div class="col-sm-4">
												<input type="text" name="kode_pesan" id="kode_pesan" class="form-control" placeholder="Kode Pemesanan">
											</div>
											</div>
											<div class="form-group row">
			    									<label class="col-sm-2 col-form-label">TOP</label>
			    									<div class="col-sm-4">
			    										<input type="text" name="top" id="top" value="" class="form-control" placeholder="Term of Payment" required>
			    									</div>
													<label class="col-sm-2 col-form-label">PPN</label>
			    									<div class="col-sm-4">
			    										<input type="text" name="ppn" id="ppn" value="0" class="form-control" placeholder="Pajak Pertambahan Nilai" required>
			    									</div>
			    								</div>
												<div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Supplier</label>
                                                    <div class="col-sm-4">
                                                        <select name="supplier" class="form-control">
                                                            <option value="">Supplier...
                                                            </option>
                                                            <?php
                                                            if (empty($part->supplier)) {
                                                                foreach ($dataSupplier as $sp) {
                                                            ?>
                                                                    <option <?php echo $sp == $sp->id_supplier ? 'selected="selected"' : '' ?> value="<?php echo $sp->id_supplier ?>">
                                                                        <?php echo $sp->nama_sup  ?><?php } ?>
                                                                    </option>
                                                                    <?php
                                                                } else {
                                                                    foreach ($dataSupplier as $sup) {          ?>
                                                                        <option value="<?php echo $sup->id_supplier; ?>" <?php if ($sup->id_supplier == $part->supplier) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                            <?php echo $sup->nama_sup; ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
													<label class="col-sm-2 col-form-label">Diskon</label>
			    									<div class="col-sm-4">
			    										<input type="text" name="diskon" id="diskon" value="0" class="form-control" placeholder="Jumlah Barang" required>
			    									</div>
											</div>
												<div class="form-group row">
			    									<label class="col-sm-2 col-form-label">Pengesah</label>
			    									<div class="col-sm-4">
			    										<input type="text" name="pengesah" id="pengesah" value="" class="form-control" placeholder="Jumlah Barang" required>
			    									</div>
													<label class="col-sm-2 col-form-label">Keterangan</label>
			    									<div class="col-sm-4">
			    										<input type="text" name="keterangan" id="keterangan" value="" class="form-control" placeholder="Keterangan" required>
			    									</div>
			    								</div>
												<div class="form-group row">
			    									<label for="Nama Konsumen" class="col-sm-2 col-form-label">No Part</label>
			    									<div class="col-sm-4">
			    										<div class="input-group date" id="reservationdate" data-target-input="nearest">
			    											<input type="text" name="no_part" id="no_part" readonly class="form-control"> 
			    											<span class="input-group-append">
			    												<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal_form"><i class="glyphicon glyphicon-plus-sign"><i class="fa fa-search"></i></button></i>
			    											</span>
			    										</div>
			    									</div>
			    									<label for="Nama Konsumen" class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-4">
			    											<input type="text" name="nama_part" id="nama_part" readonly class="form-control">
			    										</div>
			    									</div>
													<div class="form-group row">
			    									<label class="col-sm-2 col-form-label">Jumlah</label>
			    									<div class="col-sm-4">
			    										<input type="text" name="jumlah" id="jumlah" value="" class="form-control" placeholder="Jumlah Barang" required>
			    									</div>
			    								</div>
			    								</div>
												<input type="hidden" name="id_barang" id="id_barang" class="form-control">
			    								<input type="hidden" name="stok_awal" id="stok_awal" class="form-control">
			    								<input type="hidden" name="stok_a" id="stok_a" class="form-control">
			    								<input type="hidden" name="stok_p" id="stok_p" class="form-control">
			    								<input type="hidden" name="user" id="user" value="<?php echo $this->session->userdata['full_name']; ?>" class="form-control">
			    								<div class="modal-footer center-content-between">
			    									<button class="btn btn-primary " type="submit"><span class="fa fa-save"></span> Simpan</button>
			    								</div>

			    							</form>
			    						</div>
			    					</div>
			    				</div>

							<div class="col-md-5" id="detailPart" hidden="">
            <div class="card card-default">
             <div class="modal-content text-blue">
			    <div class="modal-header text-blue">
					 		
                     <h5 style="display:block; text-align:center;"><span class="ion-android-alert ion-lg text-blue"></span>&nbsp;	 Detail Barang</h5>
			    </div> 
			        <div class="modal-body">
					<table class="table no-wrap table-hover nowrap">
			    											<thead>
			    												<tr>
			    													<th>No</th>
			    													<th>No Part</th>
			    													<th>Nama Part</th>
			    													<th>jumlah</th>
			    													<th>Aksi</th>
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
			    		<?php show_my_confirm('hapusCuti', 'hapus-cuti', 'Hapus Data Cuti Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>

			    </section><!-- /.modal-content -->
			    <script type                                     = "text/javascript">
			    	$('#date1,#tgl_awal,#tgl_akhir').datetimepicker({
			    		format                                         : 'DD-MM-YYYY',
			    		date                                           : moment()
			    	});
			    	$(document).ready(function() {
			    		table                                          = $('#table-part').dataTable({
			    			"responsive"                                  : false,
			    			"paging"                                      : true,
			    			"lengthChange"                                : false,
			    			"searching"                                   : true,
			    			"ordering"                                    : false,
			    			"info"                                        : false,
			    			"processing"                                  : true,
			    			"serverSide"                                  : true,
			    			"pageLength"                                  : 5, // Defaults number of rows to display in table
			    			"order"                                       : [],
			    			"ajax"                                        : {
			    				"url"                                        : "<?php echo site_url('Part_masuk/ajax_list') ?>",
			    				"type"                                       : "POST"
			    			},
			    			"columnDefs"                                  : [{
			    				"targets"                                    : [0],
			    				"orderable"                                  : false,
			    			}, ],
			    			"dom"                                         : '<"top"f>rt<"bottom"lp><"clear">',
			    			"fnDrawCallback"                              : function() {
			    				$("input[type                                = 'search']").attr("id", "searchBox");
			    				$('#table-select').css('cssText', "margin-top: 0px !important;");
			    				$('#searchBox').css("width", "300px").focus();
			    				$('#table-select_filter').removeClass('dataTables_filter');
			    			}
			    		});
			    	});

					function PO(){
						document.getElementById("fndisc").hidden = false;
						}
						function nonPO(){
						document.getElementById("fndisc").hidden = true;
						}
			    	function selectPart(id_barang) {
						document.getElementById("detailPart").hidden  = false;
						$.ajax({
						url     : "<?php echo site_url('Part_masuk/cariKode') ?>/" + id_barang,
						type    : "GET",
						dataType: "JSON",
						success   : function(data) {

							$('[name = "id_barang"]').val(data.id_barang);
							$('[name = "no_part"]').val(data.no_part);
							$('[name = "nama_part"]').val(data.nama_part);
							$('[name = "stok_awal"]').val(data.stok);
							$('[name = "stok_a"]').val(data.stok_a);
							$('[name = "stok_p"]').val(data.stok_p);
							document.getElementById('no_parttd').innerHTML   = data.no_part.bold();
							document.getElementById('nama_parttd').innerHTML = data.nama_part.bold();
							document.getElementById('satuantd').innerHTML    = data.satuan.bold();
							document.getElementById('kelompoktd').innerHTML  = data.kelompok.bold();
							document.getElementById('typetd').innerHTML      = data.type_mesin.bold();
							document.getElementById('kategoritd').innerHTML  = data.kategori.bold();
							document.getElementById('suppliertd').innerHTML  = data.nama_sup.bold();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							alert('Error get data from ajax');
						}
    						});

			    		$('#modal_form').modal('hide');
			    	}
					
					function riwayat(id_barang){
					var obj = document.getElementById("detail_barang");
					var url = '<?php echo base_url('Part_masuk/cariKode');?>?id_barang = '+id_barang;
						
					//var url='search/cari_pelanggan/proses.php?key='+key;
					
					xmlhttp.open("GET", url);
					
					xmlhttp.onreadystatechange = function() {
						if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
							obj.innerHTML = xmlhttp.responseText;
						} else {
							obj.innerHTML = "<div align ='center'><img src='<?php echo base_url ('assets/img/waiting.gif')?>' alt='Loading' /></div>";
						}
					}
					xmlhttp.send(null);
				}
					
			    	$('#form-part-masuk').submit(function(e) {
			    		var data = $(this).serialize();

			    		$.ajax({
			    				method: 'POST',
			    				url: '<?php echo base_url('Part_masuk/prosesPartmasuk'); ?>',
			    				data: data
			    			})
			    			.done(function(data) {
			    				var out = jQuery.parseJSON(data);

			    				if (out.status == 'form') {
			    					$('.form-msg').html(out.msg);
			    					effect_msg_form();
			    				} else {
			    					document.getElementById("form-part-masuk").reset();
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


			    </script>