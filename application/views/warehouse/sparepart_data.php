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
                            <a href="<?php echo base_url('Sparepart/download'); ?>" type="button" class="btn btn-sm btn-outline-info" id="dwn_sparepart" title="Download"><i class="fas fa-download"></i> Download</a>
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
                <p>Apakah anda yakin ingin menghapus Sparepart <strong class="text-konfirmasi"> </strong> ?</p>
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
                <h4 class="modal-title ">Detail Sparepart</h4>
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
                "sEmptyTable": "Data Sparepart Belum Ada"
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x"></i>'
            }, //Feature control DataTables' server-side processing mode.
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
                        return "<a class=\"btn btn-xs btn-outline-info\" href=\"javascript:void(0)\" title=\"View\" onclick=\"vsparepart("+row[12]+")\"><i class=\"fas fa-eye\"></i></a> <a class=\"btn btn-xs btn-outline-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"edit_sparepart(" +
                            row[12]+")\"><i class=\"fas fa-edit\"></i></a> <a class=\"btn btn-xs btn-outline-danger\" href=\"javascript:void(0)\" title=\"Delete\" nama="+row[12]+"  onclick=\"delsparepart("+row[12]+")\"><i class=\"fas fa-trash\"></i></a>"
                        } else {
                        return "<a class=\"btn btn-xs btn-outline-info\" href=\"javascript:void(0)\" title=\"View\" onclick=\"vsparepart(" +
                            row[7] +
                            ")\"><i class=\"fas fa-eye\"></i></a> <a class=\"btn btn-xs btn-outline-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"edit_sparepart(" +
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
    //$(".v_sparepart").click(function(){
    function vsparepart(id) {
        $('.modal-title').text('View part');
        $("#modal-default").modal();
        $.ajax({
            url: '<?php echo base_url('Sparepart/viewpart'); ?>',
            type: 'post',
            data: 'table=tbl_wh_sparepart&id=' + id,
            success: function(respon) {

                $("#md_def").html(respon);
            }
        })


    }


    function delsparepart(id) {

        Swal.fire({
            title: 'Anda Yakin?',
            text: "Anda Akan Menghapus data tersebut!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?php echo site_url('Sparepart/delete'); ?>",
                    type: "POST",
                    data: "id_barang=" + id,
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

    function edit_sparepart(id_barang) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('Sparepart/editsparepart') ?>/" + id_barang,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id_barang"]').val(data.id_barang);
                $('[name="no_part"]').val(data.no_part);
                $('[name="nama_part"]').val(data.nama_part);
                $('[name="hrg_awal"]').val(data.hrg_awal);
                $('[name="hrg_1"]').val(data.hrg_1);
                $('[name="hrg_2"]').val(data.hrg_2);
                $('[name="satuan"]').val(data.satuan);
                $('[name="kelompok"]').val(data.kelompok);
                $('[name="type"]').val(data.type);
                $('[name="lokasi"]').val(data.lokasi);
                $('[name="kategori"]').val(data.kategori);
                $('[name="ket"]').val(data.ket);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Sparepart'); // Set title to Bootstrap modal title

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
            url = "<?php echo site_url('Sparepart/insert') ?>";
        } else {
            url = "<?php echo site_url('Sparepart/update') ?>";
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

    function batal() {
        $('#form')[0].reset();
        reload_table();
    }
</script>


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title">Person Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_barang" />
                    <div class="row">
                        <div class="col-sm-12" data-spy="scroll" data-offset="0">
                            <div class="panel panel-default">
                                <section class="content">
                                    <div class="container-fluid">                                       
                                        <div class="row">
                                            <div class="col-12 ">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">No
                                                                Part</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="no_part" id="no_part" class="form-control">
                                                            </div>
                                                            <label class="col-sm-2 col-form-label">Nama
                                                                Part</label>
                                                            <div class="col-sm-4">
                                                                <input type="text" name="nama_part" id="nama_part" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Satuan</label>
                                                            <div class="col-sm-4">
                                                                <select name="satuan" class="form-control">
                                                                    <option value="">Pilih Satuan
                                                                    </option>
                                                                    <?php
                                                                    if (empty($dataSatuan->satuan)) {
                                                                        foreach ($dataSatuan as $sat) {
                                                                    ?>
                                                                            <option <?php echo $sat == $sat->id_satuan ? 'selected="selected"' : '' ?> value="<?php echo $sat->id_satuan ?>">
                                                                                <?php echo $sat->satuan  ?><?php } ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            foreach ($dataSatuan as $st) {          ?>
                                                                                <option value="<?php echo $st->id_satuan; ?>" <?php if ($st->id_satuan == $dataPart->satuan) {
                                                                                                                                    echo "selected='selected'";
                                                                                                                                } ?>>
                                                                                    <?php echo $st->satuan; ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>

                                                            <label class="col-sm-2 col-form-label">Type</label>
                                                            <div class="col-sm-4">
                                                                <select name="type" class="form-control">
                                                                    <option value="">Pilih Type
                                                                    </option>
                                                                    <?php
                                                                    if (empty($dataType->type)) {
                                                                        foreach ($dataType as $ty) {
                                                                    ?>
                                                                            <option <?php echo $ty == $ty->id_type ? 'selected="selected"' : '' ?> value="<?php echo $ty->id_type ?>">
                                                                                <?php echo $ty->type_mesin  ?><?php } ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            foreach ($dataType as $tp) {          ?>
                                                                                <option value="<?php echo $tp->id_type; ?>" <?php if ($tp->id_type == $dataPart->type_mesin) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                                    <?php echo $tp->type_mesin; ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                                    <div class="col-sm-4">
                                                        <select name="kategori" class="form-control">
                                                            <option value="">Pilih kategori.
                                                            </option>
                                                            <?php
                                                            if (empty($dataKategori->kategori)) {
                                                                foreach ($dataKategori as $kt) {
                                                            ?>
                                                                    <option <?php echo $kt == $kt->id_kategori ? 'selected="selected"' : '' ?> value="<?php echo $kt->id_kategori ?>">
                                                                        <?php echo $kt->kategori  ?><?php } ?>
                                                                    </option>
                                                                    <?php
                                                                } else {
                                                                    foreach ($dataKategori as $kat) {          ?>
                                                                        <option value="<?php echo $kat->id_kategori; ?>" <?php if ($kat->id_kategori == $dataPart->kategori) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                            <?php echo $kat->kategori; ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-2 col-form-label">Kelompok</label>
                                                    <div class="col-sm-4">
                                                        <select name="kelompok" class="form-control">
                                                            <option value="">Pengelompokan.....
                                                            </option>
                                                            <?php
                                                            if (empty($dataKelompok->kelompok)) {
                                                                foreach ($dataKelompok as $kp) {
                                                            ?>
                                                                    <option <?php echo $kp == $kp->id_kelompok ? 'selected="selected"' : '' ?> value="<?php echo $kp->id_kelompok ?>">
                                                                        <?php echo $kp->kelompok  ?><?php } ?>
                                                                    </option>
                                                                    <?php
                                                                } else {
                                                                    foreach ($dataKelompok as $kel) {          ?>
                                                                        <option value="<?php echo $kel->id_kelompok; ?>" <?php if ($kel->id_kelompok == $dataPart->kelompok) {
                                                                                                                                echo "selected='selected'";
                                                                                                                            } ?>>
                                                                            <?php echo $kel->kelompok; ?>
                                                                        </option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="hrg_awal" id="hrg_awal" class="form-control">
                                            </div>
                                            <label class="col-sm-2 col-form-label">Harga
                                                1</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="hrg_1" id="hrg_1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Harga
                                                2</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="hrg_2" id="hrg_2" class="form-control">
                                            </div>
                                            <label class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="lokasi" id="lokasi" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="ket" id="ket" class="form-control">
                                            </div>
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
<!-- End Bootstrap modal -->