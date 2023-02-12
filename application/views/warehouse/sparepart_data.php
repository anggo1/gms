<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title"><i class="fa fa-list text-blue"></i> Data Spare Part</h3>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="add_sparepart()" title="Add Data"><i class="fas fa-plus"></i> Add</button>
                            <a href="<?php echo base_url('Sparepart/download'); ?>" type="button" class="btn btn-sm btn-outline-info" id="dwn_pegawai" title="Download"><i class="fas fa-download"></i> Download</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabel1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="bg-info">
                                    <th>No</th>
                                    <th>No Part</th>
                                    <th>Nama Part</th>
                                    <th>Stok</th>
                                    <th>Harga Awal</th>
                                    <th>Harga 1</th>
                                    <th>Lokasi</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Modal Hapus-->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="idhapus" id="idhapus">
                <p>Apakah anda yakin ingin menghapus pegawai <strong class="text-konfirmasi"> </strong> ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-xs" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger btn-xs" id="konfirmasi">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title ">View pegawai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="md_def">

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- /.modal -->


<script type="text/javascript">
    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $("#tabel1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "sEmptyTable": "Data pegawai Belum Ada"
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Sparepart/ajax_list') ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [-1], //last column
                "render": function(data, type, row) {


                    if (row[10] && row[11] == "Y") {
                        return "<a class=\"btn btn-xs btn-outline-info\" href=\"javascript:void(0)\" title=\"View\" onclick=\"vpegawai(" +
                            row[7] +
                            ")\"><i class=\"fas fa-eye\"></i></a> <a class=\"btn btn-xs btn-outline-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"edit_pegawai(" +
                            row[7] +
                            ")\"><i class=\"fas fa-edit\"></i></a><a class=\"btn btn-xs btn-outline-danger\" href=\"javascript:void(0)\" title=\"Delete\" nama=" +
                            row[0] + "  onclick=\"delpegawai(" + row[7] +
                            ")\"><i class=\"fas fa-trash\"></i></a>"
                    } else {
                        return "<a class=\"btn btn-xs btn-outline-info\" href=\"javascript:void(0)\" title=\"View\" onclick=\"vpegawai(" +
                            row[7] +
                            ")\"><i class=\"fas fa-eye\"></i></a> <a class=\"btn btn-xs btn-outline-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"edit_pegawai(" +
                            row[7] + ")\"><i class=\"fas fa-edit\"></i></a>";
                    }

                },
                "orderable": false, //set not orderable
            }, ],
        });

        //set input/textarea/select event when change value, remove class error and remove text help block 
        $("input").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
            $(this).removeClass('is-invalid');
        });
        $("textarea").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
            $(this).removeClass('is-invalid');
        });
        $("select").change(function() {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
            $(this).removeClass('is-invalid');
        });

    });

    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }

    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });


    //view
    // $(".v_pegawai").click(function(){
    function vpegawai(id) {
        $('.modal-title').text('View pegawai');
        $("#modal-default").modal();
        $.ajax({
            url: '<?php echo base_url('Pegawai/viewpegawai'); ?>',
            type: 'post',
            data: 'table=tbl_pegawai&id=' + id,
            success: function(respon) {

                $("#md_def").html(respon);
            }
        })


    }


    function delpegawai(id) {

        Swal.fire({
            title: 'Anda Yakin?',
            text: "Anda Akan Menghapus seluruh data pegawai tersebut!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo site_url('Pegawai/delete'); ?>",
                    type: "POST",
                    data: "nip=" + id,
                    cache: false,
                    dataType: 'json',
                    success: function(respone) {
                        if (respone.status == true) {
                            reload_table();
                            Swal.fire(
                                'Deleted!',
                                'File anda telah dihapus.',
                                'success'
                            );
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Delete Error!!.'
                            });
                        }
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    }



    function add_sparepart() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Penambahan Data Sparepart'); // Set Title to Bootstrap modal title
    }

    function edit_pegawai(nip) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('Pegawai/editpegawai') ?>/" + nip,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="nip"]').val(data.nip);
                $('[name="nama_depan"]').val(data.nama_depan);
                $('[name="nama_belakang"]').val(data.nama_belakang);
                $('[name="departement"]').val(data.departement);
                $('[name="jabatan"]').val(data.jabatan);
                $('[name="status_kerja"]').val(data.status_kerja);
                $('[name="tgl_masuk"]').val(data.tgl_masuk);
                $('[name="tempat_lahir"]').val(data.tempat_lahir);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="agama"]').val(data.agama);
                $('[name="status_nikah"]').val(data.status_nikah);
                $('[name="pendidikan"]').val(data.pendidikan);
                $('[name="alamat"]').val(data.alamat);
                $('[name="kodepos"]').val(data.kodepos);
                $('[name="no_hp"]').val(data.no_hp);
                $('[name="status_nikah"]').val(data.status_nikah);
                $('[name="jamsostek"]').val(data.jamsostek);
                $('[name="tinggi"]').val(data.tinggi);
                $('[name="berat"]').val(data.berat);
                $('[name="darah"]').val(data.darah);
                $('[name="s_kawin"]').val(data.s_kawin);
                $('[name="no_ktp"]').val(data.no_ktp);
                $('[name="npwp"]').val(data.npwp);
                $('[name="catatan1"]').val(data.catatan1);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit pegawai'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('pegawai/insert') ?>";
        } else {
            url = "<?php echo site_url('pegawai/update') ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                    Toast.fire({
                        icon: 'success',
                        title: 'Success!!.'
                    });
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]).addClass(
                            'invalid-feedback');
                    }
                }
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('Simpan'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }
    var loadFile = function(event) {
        var image = document.getElementById('v_image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    function batal() {
        $('#form')[0].reset();
        reload_table();
        var image = document.getElementById('v_image');
        image.src = "";
    }
</script>

</script>



<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="nip" />
                    <div class="row">
                        <div class="col-sm-12" data-spy="scroll" data-offset="0">
                            <div class="panel panel-default">
                                <section class="content">
                                    <div class="container-fluid">
                                        <?php if (!empty($dataPegawai)) {
                                            foreach ($dataPegawai as $dataPegawai) {
                                            }
                                        } ?>
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">No
                                                                Part</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Nama
                                                                Part</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">

                                                            <label class="col-sm-3 col-form-label">Harga</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Harga
                                                                1</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Harga
                                                                2</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Lokasi</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kategori</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Kelompok</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat" id="alamat" class="form-control">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button class="btn btn-danger" data-dismiss="modal" onclick="batal()" aria-hidden="true">Tutup</button>
                                            <button class="btn btn-primary" id="btnSave" onclick="save()"><span class="fa fa-save"></span>
                                                Simpan</button>
                                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->