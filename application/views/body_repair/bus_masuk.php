<style>
    .table.DataTable {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11px;
    }

    table.dataTable td {
        padding-bottom: 5px;
    }

    .Blink-warning {
        animation: blinker 5s cubic-bezier(.5, 0, 1, 1) infinite alternate;
    }

    @keyframes blinker {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    .Blink-danger {
        animation: blinker 0.1s cubic-bezier(.5, 0, 1, 1) infinite alternate;
    }

    @keyframes blinker {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    .tombol-success {
        background-color: green;
        border: none;
        color: white;
        padding: 2px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        float: right;
    }

    .tombol-success {
        border-radius: 50%;
    }

    .tombol-warning {
        background-color: #ffc107;
        border: none;
        color: white;
        padding: 2px 5px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 10px;
        margin: 4px 2px;
        float: right;
    }

    .tombol-warning {
        border-radius: 50%;
    }
</style>
<div class="card-body card-outline">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs " id="custom-content-above-tab" role="tablist">
                <li class="nav-item">
                    <a
                        class="nav-link active"
                        id="tab-daftar-tab"
                        data-toggle="pill"
                        href="#tab-daftar"
                        role="tab">
                        <i class="fa fa-bus"></i>
                        Laporan Bus Masuk</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        hidden="hidden"
                        id="tab-proses-tab"
                        data-toggle="pill"
                        href="#tab-proses"
                        role="tab">
                        <i class="fas fa-luggage-cart"></i>
                        Estimasi Perbaikan</a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link"
                        hidden="hidden"
                        id="tab-pk-tab"
                        data-toggle="pill"
                        href="#tab-pk"
                        role="tab">
                        <i class="fas fa-retweet"></i>
                        Proses Pekerjaan</a>
                </li>

            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">

                <div
                    class="tab-pane fade show active"
                    id="tab-daftar"
                    role="tabpanel"
                    aria-labelledby="tab-daftar-tab">

                        <div class="card-body">
                    <form id="form-tambah-laporan" method="POST">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal &amp; Jam</label>
                                <div class="col-sm-2">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input
                                            type="text"
                                            name="tgl_masuk"
                                            id="tgl_masuk"
                                            class="form-control tgl_masuk datetimepicker"
                                            data-toggle="datetimepicker"
                                            data-target=".tgl_masuk"
                                            data-format="yyy-mm-dd"
                                            required="required">
                                        <div class="input-group-append" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-2">
                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                        <input
                                            type="text"
                                            name="jam_masuk"
                                            id="jam_masuk"
                                            class="form-control jam datetimepicker-input"
                                            data-toggle="datetimepicker"
                                            data-target=".jam"
                                            data-format="hh:mm"/>
                                        <div class="input-group-append" data-target="#jam" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="far fa-clock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No Body</label>
                                <div class="col-sm-1">
                                <input
                                            type="text"
                                            name="no_body"
                                            id="no_body"
                                            readonly="readonly"
                                            class="form-control"
                                                data-toggle="modal"
                                                data-target="#modal_body"
                                        placeholder="Nomor Body" required>
                                </div>
                                <label class="col-sm-1 col-form-label">No Pol</label>
                                <div class="col-sm-2">
                                    <input
                                        type="text"
                                        name="no_pol"
                                        id="no_pol"
                                        class="form-control"
                                        style="text-transform: uppercase;"
                                        placeholder="Nomor Polisi ?">
                                </div>
                                <label class="col-sm-2 col-form-label">NIP Pengemudi</label>
                                <div class="col-sm-1">
                                    <input type="text" name="nip_sp" id="nip_sp" class="form-control" placeholder="NIP">
                                </div>
                                <label class="col-sm-1 col-form-label">Nama</label>
                                <div class="col-sm-2">
                                    <input
                                        type="text"
                                        name="nama_sp"
                                        id="nama_sp"
                                        class="form-control"
                                        placeholder="Nama Pengemudi ?">
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
                                    <input
                                        type="text"
                                        name="keterangan"
                                        id="keterangan"
                                        value=""
                                        class="form-control"
                                        placeholder="Keterangan">
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
                            <input type="hidden" name="user" id="user" value="<?php echo $this->session->userdata['full_name']; ?>" class="form-control">
                            <input type="hidden" name="id_bast" id="id_bast" value="" class="form-control">
                            <div class="modal-footer center-content-between">
                                <button class="btn btn-primary" type="submit">
                                    <span class="fa fa-save"></span>
                                    Simpan</button>
                            </div>
                        </form>
                        <?php show_my_confirm('hapusLaporan', 'hapus-laporan', 'Hapus Data Laporan Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="tabel-masuk" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="bg-indigo">
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
                                        <tbody></tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                            <div id="modal-estimasi"></div>
                        </div>
                    </div>
                </div>
                <div
                    class="tab-pane show"
                    id="tab-proses"
                    role="tabpanel"
                    aria-labelledby="tab-proses-tab">

                    <div class="card-body">
                        <form id="formEstimasi" name="formEstimasi" method="POST">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">

                                        <input
                                            type="text"
                                            name="tgl_estimasi"
                                            id="tgl_estimasi"
                                            value=""
                                            class="form-control tgl_estimasi datetimepicker"
                                            data-toggle="datetimepicker"
                                            data-target=".tgl_estimasi"
                                            data-format="yyy-mm-dd"
                                            required="required">

                                        <div class="input-group-append" data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <label class="col-sm-2 col-form-label">No Body</label>
                                <div class="col-sm-4">
                                    <input
                                        type="text"
                                        name="body_pk"
                                        id="body_pk"
                                        class="form-control"
                                        readonly="readonly"
                                        required="required"
                                        placeholder="No Body Tidak Boleh Kosong">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ACC</label>
                                <div class="col-sm-4">
                                    <input type="text" name="acc" id="acc" class="form-control" placeholder="Persetujuan">
                                </div>
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-2">
                                    <select name="jns_pk" id="jns_pk" class="form-control">
                                        <option value="">Jenis PK...
                                        </option>
                                        <?php
											if (!empty($dataPk)) {
												foreach ($dataPk as $pk) {   ?>
                                        <option value="<?php echo $pk->kode; ?>">
                                            <?php echo $pk->kode.' => '.$pk->keterangan; ?>
                                        </option>
                                        <?php
												}
											}
											?>
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label">Jam Kerja</label>
                                <div class="col-sm-1">
                                    <input
                                        type="text"
                                        name="jam_kerja"
                                        id="jam_kerja"
                                        class="form-control"
                                        placeholder="Total Jam">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="No Part" class="col-sm-2 col-form-label">No Part</label>
                                <div class="col-sm-4">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input
                                            type="text"
                                            name="no_part"
                                            id="no_part"
                                            readonly="readonly"
                                            class="form-control"
                                                data-toggle="modal"
                                                data-target="#modal_form">
                                        <span class="input-group-append">
                                            <button
                                                type="button"
                                                class="btn btn-info"
                                                data-toggle="modal"
                                                data-target="#modal_form">
                                                <i class="glyphicon glyphicon-plus-sign">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </i>
                                        </span>
                                    </div>
                                </div>
                                <label for="Nama Part" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-4">
                                    <input
                                        type="text"
                                        name="nama_part"
                                        id="nama_part"
                                        readonly="readonly"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jumlah Barang</label>
                                <div class="col-sm-4">
                                    <input
                                        type="text"
                                        name="jml_part"
                                        id="jml_part"
                                        value=""
                                        class="form-control"
                                        placeholder="Jumlah Barang">
                                </div>
                                <label class="col-sm-2 col-form-label">Ket Barang</label>
                                <div class="col-sm-4">
                                    <input
                                        type="text"
                                        name="ket_part"
                                        id="ket_part"
                                        value=""
                                        class="form-control"
                                        placeholder="Keterangan Barang">
                                </div>
                            </div>
                            <input
                                type="hidden"
                                name="id_lapor"
                                id="id_lapor"
                                class="form-control"
                                readonly="readonly">
                            <input type="hidden" name="hrg_awal" id="hrg_awal" class="form-control">
                            <input type="hidden" name="user" id="user" value="<?php echo $this->session->userdata['full_name']; ?>"
                                class="form-control">
                            <div class="modal-footer center-content-between">
                                <button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Simpan</button>
                        </form>
                            </div>
						<button class="btn btn-warning cetak-estimasi2" id="cetakEstimasi" hidden="" title="Cetak Estimasi"><i class="fa fa-print"></i> Cetak Estimasi
								</button>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table
                                        id="list-estimasi"
                                        class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr class="bg-indigo">
                                                <th>No</th>
                                                <th>No Body</th>
                                                <th>Jenis PK</th>
                                                <th>No Part</th>
                                                <th>nama Barang</th>
                                                <th>Keterangan</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody id="data-estimasi"></tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            <div id="modal-estimasi2"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="tab-pane show"
                    id="tab-pk"
                    role="tabpanel"
                    aria-labelledby="tab-pk-tab">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">

                                <div id="data-proses-pk"></div>

								<div id="modal-pk"></div>
                            </div>
                            <div class="col-md-6">

                                <div id="data-pk-mulai"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_body" role="dialog">
    <div class="modal-dialog modal-xm">
        <div class="modal-content">
            <div class="modal-body form">
                <div class="card card-first card-outline">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table no-wrap table-hover nowrap" id="table-body">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Body</th>
                                        <th>No pol</th>
                                        <th>Tgl BAST</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                    $no = 1;
                                    foreach ($dataBody as $b) {
                                    ?>
                                    <tr>
                                        <td><button type='button' class='btn btn-sm btn-outline-success' onClick="selectBody('<?php echo $b->id_bast; ?>','<?php echo $b->no_body; ?>','<?php echo $b->no_pol; ?>','<?php echo $b->nip_sp; ?>','<?php echo $b->nama_sp; ?>')"><i class='fa fa-check'></i></button></td>
                                        <td><?php echo $b->no_body; ?></td>
                                        <td><?php echo $b->no_pol; ?></td>
                                        <td><?php echo tglIndoPendek($b->tgl_bast); ?></td>

                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
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
                                <tbody></tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php show_my_confirm('hapusEstimasi', 'hapus-estimasi', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
<script type="text/javascript">
    $('#tgl_masuk,#tgl_estimasi,#tgl_pk').datetimepicker({format: 'DD-MM-YYYY', date: moment()});
    //Timepicker
    $('#jam_masuk').datetimepicker(
        {format: 'HH:mm', pickDate: false, pickSeconds: false, pick12HourFormat: false}
    )
    $(document).ready(function () {
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
            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false
                }
            ],
            "dom": '<"top"f>rt<"bottom"lp><"clear">',
            "fnDrawCallback": function () {
                $("input[type                                = 'search']").attr(
                    "id",
                    "searchBox"
                );
                $('#table-select').css('cssText', "margin-top: 0px !important;");
                $('#searchBox')
                    .css("width", "300px")
                    .focus();
                $('#table-select_filter').removeClass('dataTables_filter');
            }
        });
    });
    function selectBody(id_bast,no_body,no_pol,nip_sp,nama_sp) {

                //$('[name = "no_body"]').val(data.no_body);
				document.getElementById('id_bast').value=id_bast;
				document.getElementById('no_body').value=no_body;
				document.getElementById('no_pol').value=no_pol;
				document.getElementById('nip_sp').value=nip_sp;
				document.getElementById('nama_sp').value=nama_sp;
        $('#modal_body').modal('hide');
    }
    function selectPart(id_barang) {
        $.ajax({
            url: "<?php echo site_url('BusMasuk/cariKode') ?>/" + id_barang,
            type: "GET",
            dataType: "JSON",
            success: function (data) {

                $('[name = "id_barang"]').val(data.id_barang);
                $('[name = "no_part"]').val(data.no_part);
                $('[name = "nama_part"]').val(data.nama_part);
                $('[name = "hrg_awal"]').val(data.hrg_awal);
                //document.getElementById('supplier').innerHTML   = data.supplier;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

        $('#modal_form').modal('hide');
    }

    $(document).ready(function () {

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
                    "targets": [0],
                    "orderable": false
                }
            ]
        });

    });
    $('#form-tambah-laporan').submit(function (e) {
        var data = $(this).serialize();

        $
            .ajax({
                method: 'POST',
                url: '<?php echo base_url('BusMasuk/prosesLaporan'); ?>',
                data: data
            })
            .done(function (data) {
                var out = jQuery.parseJSON(data);

                if (out.status == 'form') {
                    $('.form-msg').html(out.msg);
                    effect_msg_form();
                } else {
                    document
                        .getElementById("form-tambah-laporan")
                        .reset();
                    $('.msg').html(out.msg);
                    table.ajax.reload();
                    Swal.fire(
                        {position: 'center', icon: 'success', title: out.msg, showConfirmButton: false, timer: 1500}
                    )
                }
            })

        e.preventDefault();
    });
    var tableEstimasi = $('#list-estimasi').DataTable({
        "responsive": false,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "pageLength": 5
    });

    function tampilEstimasi() {
        var id_lapor = document.formEstimasi.id_lapor.value;
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('BusMasuk/tampilEstimasi'); ?>?id_lapor=' + id_lapor,
            data: 'id_lapor=' + id_lapor,
            success: function (hasil) {
                tableEstimasi.destroy();
                $('#data-estimasi').html(hasil);
            }
        });
    }

    $('#formEstimasi').submit(function (e) {
        var data = $(this).serialize();

        $
            .ajax({
                method: 'POST',
                url: '<?php echo base_url('BusMasuk/prosesEstimasi'); ?>',
                data: data
            })
            .done(function (data) {
                var out = jQuery.parseJSON(data);

                if (out.status == 'form') {
                    $('.form-msg').html(out.msg);
                    effect_msg_form();
                } else {
                    document.getElementById("cetakEstimasi").hidden = false;
                    document.getElementById("formEstimasi");
                    $('#no_part').val('');
                    $('#nama_part').val('');
                    $('#ket_part').val('');
                    $('#jml_part').val('');
                    $("#acc").attr('readonly', 'readonly');
                    $('.msg').html(out.msg);
                    table.ajax.reload();
                    tampilEstimasi();
                    Swal.fire(
                        {position: 'center', icon: 'success', title: out.msg, showConfirmButton: false, timer: 1500}
                    )
                }
            })

        e.preventDefault();
    });
    $(document).on("click", ".delete-laporan", function () {
        id_lapor = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-laporan", function () {
        var id = id_lapor;

        $
            .ajax({
                method: "POST",
                url: "<?php echo base_url('BusMasuk/deleteLaporan'); ?>",
                data: "id=" + id
            })
            .done(function (data) {
                var out = jQuery.parseJSON(data);
                table
                    .ajax
                    .reload();
                $('.msg').html(out.msg);
                $('#hapusLaporan').modal('hide');
                if (out.status != 'form') {
                    Swal.fire(
                        {position: 'center', icon: 'error', title: out.msg, showConfirmButton: false, timer: 1200}
                    )
                }
            })
    })
    $(document).on("click", ".delete-estimasi", function () {
        id_detail = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-estimasi", function () {
        var id = id_detail;

        $
            .ajax({
                method: "POST",
                url: "<?php echo base_url('BusMasuk/deleteEstimasi'); ?>",
                data: "id=" + id
            })
            .done(function (data) {
                var out = jQuery.parseJSON(data);
                tampilEstimasi();
                $('.msg').html(out.msg);
                $('#hapusEstimasi').modal('hide');
                if (out.status != 'form') {
                    Swal.fire(
                        {position: 'center', icon: 'error', title: out.msg, showConfirmButton: false, timer: 1200}
                    )
                }
            })
    })
    $(document).on("click", ".estimasi", function () {
        var id_lapor = $(this).attr("id_lapor");
        var no_body = $(this).attr("no_body");

        $("a[href='#tab-proses-tab']").tab('show');
        $("a[href='#tab-proses']").tab('show');
        document.getElementById("tab-proses-tab").hidden = false;
        document.getElementById('body_pk').value = no_body;
        document.getElementById('id_lapor').value = id_lapor;
        //$("#pekerjaan").attr('disabled', 'disabled');
    })

    function refresh() {
        MyTable = $('#list-pk,#list-pk-mulai').dataTable();
    }
    var MyTable = $('#list-pk,#list-pk-mulai,#table-body').dataTable({
        "responsive": false,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "pageLength": 5
    });
    $(document).on("click", ".proses-pk", function () {
        var id = $(this).attr("data-id");

        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('BusMasuk/tampilPk'); ?>?id' + id,
            data: 'id=' + id,
            success: function (hasil) {
                $('#id_lapor').val(id);
                MyTable.fnDestroy();
                $('#data-proses-pk').html(hasil);
                document.getElementById("tab-pk-tab").hidden = false;
                $("a[href='#tab-pk']").tab('show');
                //refresh();
            }
        });
    })

    $(document).on("click", ".cetak-estimasi", function () {
        var id = $(this).attr("data-id");
		
        //var id = document.getElementById('next_proses').value=datakode;
        $.ajax({
                method: "POST",
                url: "<?php echo base_url('BusMasuk/cetakEstimasi'); ?>",
                data: "id="+id
            })
            .done(function (data) {
                $('#modal-estimasi').html(data);
                $('#cetak-estimasi').modal('show');
            })
    })
	$(document).on("click", ".cetak-estimasi2", function () {
		var id = document.getElementById('id_lapor').value;
           $ .ajax({
                method: "POST",
                url: "<?php echo base_url('BusMasuk/cetakEstimasi2'); ?>",
                data: "id="+id
            })
            .done(function (data) {
                $('#modal-estimasi2').html(data);
                $('#cetak-estimasi2').modal('show');
            })
    })
    $(document).on("click", ".update-pk", function () {
        var id = $(this).attr("data-id");
        var kode = $(this).attr("kode");

        $
            .ajax({
                method: "POST",
                url: "<?php echo base_url('BusMasuk/cariPKproses'); ?>",
                data: "id=" + id + "&kode=" + kode
            })
            .done(function (data) {
                $('#modal-pk').html(data);
                $('#proses-pk').modal('show');
            })
    })
    $(document).on('submit', '#form-update-pk', function (e) {
        var data = $(this).serialize();

        $
            .ajax({
                method: 'POST',
                url: '<?php echo base_url('Settingbr/prosesUpk'); ?>',
                data: data
            })
            .done(function (data) {
                var out = jQuery.parseJSON(data);

                showPk();
                if (out.status == 'form') {
                    $('.form-msg').html(out.msg);
                    effect_msg_form();
                } else {
                    document.getElementById("form-update-pk").reset();
                    $('#update-pk').modal('hide');
                    $('.msg').html(out.msg);
                    Swal.fire({position: 'top-end', icon: 'success', title: out.msg, showConfirmButton: false, timer: 1500})
                }
            })

        e.preventDefault();
    });
    //** proses PK */
	function tampilPkawal(datakode) {
        var id = document.getElementById('id_lapor').value = datakode;
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('BusMasuk/tampilPk'); ?>?id=' + id,
            data: 'id=' + id,
            success: function (hasil) {
                $('#id_lapor').val(id);
                MyTable.fnDestroy();
                $('#data-proses-pk').html(hasil);
            }
        });
    }

    function tampilPk(datakode) {
        var id_lapor = document.getElementById('id_lapor').value = datakode;
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('BusMasuk/tampilPkMulai'); ?>?id_lapor=' + id_lapor,
            data: 'id_lapor=' + id_lapor,
            success: function (hasil) {
                MyTable.fnDestroy();
                $('#data-pk-mulai').html(hasil);
            }
        });
    }
    $(document).on("click", ".cetak-pk", function () {
		var id = document.getElementById('id_lapor').value;
           $ .ajax({
                method: "POST",
                url: "<?php echo base_url('BusMasuk/cetakPk'); ?>",
                data: "id="+id
            })
            .done(function (data) {
                $('#modal-pk').html(data);
                $('#cetak-pk').modal('show');
            })
    })
</script>