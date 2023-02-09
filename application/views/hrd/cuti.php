			    <section class="content">
			        <div class="container-fluid">
			            <div class="row">
			                <div class="col-md-6">
			                    <div class="card card-default">
			                        <!-- /.card-header -->
			                        <div class="modal-content">
			                            <div class="modal-header">

			                                <h5 style="display:block; text-align:center;"> Penambahan data Cuti Pegawai</h5>
			                            </div>
			                            <div class="modal-body">
			                                <form id="form-cutiPegawai" name="form-cutiPegawai" method="POST">
			                                    <div class="form-group row">
			                                        <label for="Nama Konsumen" class="col-sm-3 col-form-label">Nama
			                                            Pegawai</label>
			                                        <div class="col-sm-9">
			                                            <div class="input-group date" id="reservationdate"
			                                                data-target-input="nearest">
			                                                <input type="hidden" name="nip" id="nip" value=""
			                                                    class="form-control">
			                                                <input type="hidden" name="departement" id="departement" value=""
			                                                    class="form-control">
			                                                <input type="hidden" name="jabatan" id="jabatan" value=""
			                                                    class="form-control">
			                                                <input type="text" name="nama" id="nama" readonly
			                                                    class="form-control">
			                                                <span class="input-group-append">
			                                                    <button type="button" class="btn btn-info" data-toggle="modal"
			                                                        data-target="#modal_form"><i
			                                                            class="glyphicon glyphicon-plus-sign"><i
			                                                                class="fa fa-search"></i> Cari..</button></i>
			                                                </span>
			                                            </div>
			                                        </div>
			                                    </div>
			                                    <div class="form-group row">
			                                        <label class="col-sm-3 col-form-label">Tanggal</label>
			                                        <div class="col-sm-9">
			                                            <div class="input-group date" id="reservationdate"
			                                                data-target-input="nearest">

			                                                <input type="text" name="date1" id="date1" value=""
			                                                    class="form-control date1 datetimepicker"
			                                                    data-toggle="datetimepicker" data-target=".date1"
			                                                    data-format="yyy-mm-dd">

			                                                <div class="input-group-append" data-toggle="datetimepicker">
			                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
			                                                    </div>
			                                                </div>
			                                            </div>
			                                        </div>
			                                    </div>
			                                    <div class="form-group row">
			                                        <label class="col-sm-3 col-form-label">Jenis</label>
			                                        <div class="col-sm-9">
			                                            <select name="kode" required class="form-control col-sm-5">
			                                                <option value="">Kode Cuti...</option>
			                                                <?php
															if(!empty($dataKode)){																
															foreach ($dataKode as $kode) {
																}
															?>
			                                                <option value="<?php echo $kode->kode; ?>"><?php echo $kode->kode; ?>
			                                                    | <?php echo $kode->nama_cuti; ?></option>

			                                                <?php
															}
															?>
			                                            </select>
			                                        </div>
			                                    </div>
			                                    <div class="form-group row">
			                                        <label class="col-sm-3 col-form-label">Keterangan</label>
			                                        <div class="col-sm-9">
			                                            <input type="text" name="alasan" id="alasan" value=""
			                                                class="form-control" placeholder="Keterangan Cuti">
			                                        </div>
			                                    </div>
			                                    <div class="modal-footer justify-content-between">
			                                        <button class="btn btn-primary " type="submit"><span
			                                                class="fa fa-save"></span> Simpan</button>
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
			                                        <table class="table table-striped  table-bordered table-hover"
			                                            id="table-pegawai">
			                                            <thead>
			                                                <tr>
			                                                    <th>#</th>
			                                                    <th>NIP</th>
			                                                    <th>Nama</th>
			                                                    <th>Departement</th>
			                                                    <th>Jabatan</th>
			                                                </tr>
			                                            </thead>
			                                            <tbody>
			                                            </tbody>
			                                        </table>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div><!-- /.modal-content -->
			        </div><!-- /.modal-dialog -->
			        </div><!-- /.modal -->

			        <script type="text/javascript">
			        $('#date1,#datepicker1').datetimepicker({
			            format: 'DD-MM-YYYY',
			            date: moment()
			        });
			        $(document).ready(function() {
			            table = $('#table-pegawai').dataTable({
			                "responsive": true,
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
			                    "url": "<?php echo site_url('Cuti/ajax_list')?>",
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

			        function selectPegawai(nip, nama) {
			            document.getElementById('nip').value = nip;
			            document.getElementById('nama').value = nama;

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
			        </script>