<<<<<<< HEAD
<div class="row">
    <div class="col-12 ">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-graduate text-blue"></i> &nbsp; Satuan
                                        Barang</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-satuan" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Satuan</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-satuan">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Satuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-satuan">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="modal-satuan"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-shield text-blue"></i> &nbsp; Kategori
                                        Barang</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-kategori" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Kategori</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-kategori">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kategori</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-kategori">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="modal-kategori"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-tie text-blue"></i> &nbsp; Tipe Mesin
                                    </h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-mesin" title="Add Data"><i class="fas fa-plus"></i> Add
                                            Mesin</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-type">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Mesin</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-mesin">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="modal-jabatan"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-tie text-blue"></i> &nbsp; Supplier</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-supplier" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Supplier</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-supplier">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Supplier</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-supplier">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="modal-supplier"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //show_my_confirm('kirimHapus', 'hapus-kirim', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); 
?>
<?php //show_my_confirm('konfirmasiHapus', 'hapus-data', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); 
?>
<script type="text/javascript">
window.onload = function() {
    showSat();
    //showKat();
    //showType();
    //showSup();
}

function refresh() {
    MyTable = $('#list-satuan,#list-kategori,#list-mesin,#list-supplier').dataTable();
}

function effect_msg_form() {
    // $('.form-msg').hide();
    $('.form-msg').show(500);
    setTimeout(function() {
        $('.form-msg').fadeOut(500);
    }, 1000);
}

function effect_msg() {
    // $('.msg').hide();
    $('.msg').show(500);
    setTimeout(function() {
        $('.msg').fadeOut(500);
    }, 1000);
}

var MyTable1 = $('#list-kategori').dataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5,
});
var MyTable2 = $('#list-type').DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5
});
var MyTable2 = $('#list-supplier').dataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "PageLength": 5
});

var tableSatuan = $('#list-satuan').DataTable({
    "responsive": false,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5
});
var MyTable = $("#list-pendidikan,#list-departement,#list-jabatan").DataTable({
    "responsive": false,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5

});

//ajax Jabatan
function showSat() {
    $.get('<?php echo base_url('Settingwh/showSat'); ?>', function(data) {
        tableSatuan.destroy();
        $('#data-satuan').html(data);
        refresh();
    });
}

function showKat() {
    $.get('<?php echo base_url('Settingwh/showKat'); ?>', function(data) {
        MyTable.fnDestroy();
        $('#data-kategori').html(data);
        refresh();
    });
}

function showType() {
    $.get('<?php echo base_url('Settingwh/showType'); ?>', function(data) {
        MyTable1.fnDestroy();
        $('#data-type').html(data);
        refresh();
    });
}

function showSup() {
    $.get('<?php echo base_url('Settingwh/showSup'); ?>', function(data) {
        MyTable2.fnDestroy();
        $('#data-supplier').html(data);
        refresh();
    });
}

$('#form-tambah-satuan').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesTsatuan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showSat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-satuan").reset();
                $('#tambah-satuan').modal('hide');
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

$(document).on("click", ".update-dataSatuan", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('Settingwh/updateSatuan'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-satuan').html(data);
            $('#update-satuan').modal('show');
        })
})
$(document).on('submit', '#form-update-satuan', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesUsatuan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showSat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-satuan").reset();
                $('#update-satuan').modal('hide');
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

$('#tambah-satuan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-satuan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

//*** end Satuan **//

$('#form-tambah-kategori').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesTkategori'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showKat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-kategori").reset();
                $('#tambah-kategori').modal('hide');
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

$(document).on("click", ".update-dataKategori", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('Settingwh/updateKategori'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-kategori').html(data);
            $('#update-kategori').modal('show');
        })
})
$(document).on('submit', '#form-update-kategori', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesUkategori'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showKat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-kategori").reset();
                $('#update-kategori').modal('hide');
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

$('#tambah-kategori').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-kategori').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

//*** end KAtegori **//
$('#form-tambah-supplier').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesTdepartement'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showSat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-departement").reset();
                $('#tambah-departement').modal('hide');
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

$(document).on("click", ".update-dataDepartement", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/updateDepartement'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-departement').html(data);
            $('#update-departement').modal('show');
        })
})
$(document).on('submit', '#form-update-departement', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesUdepartement'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showDep();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-departement").reset();
                $('#update-departement').modal('hide');
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

$('#tambah-jabatan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-jabatan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})





function req_nama_sp1(get_kode, get_area, flag) {
    clearTimeout(timer);
    nic_sp = get_kode;
    area = get_area;
    if (flag == "start") {
        timer = setTimeout("req_nama_sp1(nic_sp,area,'delay')", 200);
    } else if (flag == "delay") {
        if (get_kode == document.getElementById("nic_sp1").value) {
            var url = "<?php echo base_url('laplaka/carisp'); ?>?rand=" + Math.random();
            var post = "nic_sp=" + nic_sp + "&act=req_nama_sp1";
            ajax(url, post, area);
        } else {
            timer = setTimeout("req_nama_sp1(nic_sp,area,'delay')", 200);
        }
    }
}
</script>
=======
<div class="row">
    <div class="col-12 ">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-graduate text-blue"></i> &nbsp; Satuan
                                        Barang</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-satuan" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Satuan</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-satuan">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode</th>
                                                        <th>Satuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-satuan">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="modal-satuan"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-shield text-blue"></i> &nbsp; Kategori
                                        Barang</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-kategori" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Kategori</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-kategori">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kategori</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-kategori">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="modal-kategori"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-tie text-blue"></i> &nbsp; Tipe Mesin
                                    </h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-mesin" title="Add Data"><i class="fas fa-plus"></i> Add
                                            Mesin</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-type">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Mesin</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-mesin">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="modal-jabatan"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-tie text-blue"></i> &nbsp; Supplier</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-supplier" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Supplier</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-supplier">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Supplier</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-supplier">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="modal-supplier"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php //show_my_confirm('kirimHapus', 'hapus-kirim', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); 
?>
<?php //show_my_confirm('konfirmasiHapus', 'hapus-data', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); 
?>
<script type="text/javascript">
window.onload = function() {
    showSat();
    //showKat();
    //showType();
    //showSup();
}

function refresh() {
    MyTable = $('#list-satuan,#list-kategori,#list-mesin,#list-supplier').dataTable();
}

function effect_msg_form() {
    // $('.form-msg').hide();
    $('.form-msg').show(500);
    setTimeout(function() {
        $('.form-msg').fadeOut(500);
    }, 1000);
}

function effect_msg() {
    // $('.msg').hide();
    $('.msg').show(500);
    setTimeout(function() {
        $('.msg').fadeOut(500);
    }, 1000);
}

var MyTable1 = $('#list-kategori').dataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5,
});
var MyTable2 = $('#list-type').DataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5
});
var MyTable2 = $('#list-supplier').dataTable({
    "responsive": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "PageLength": 5
});

var tableSatuan = $('#list-satuan').DataTable({
    "responsive": false,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5
});
var MyTable = $("#list-pendidikan,#list-departement,#list-jabatan").DataTable({
    "responsive": false,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": false,
    "autoWidth": true,
    "pageLength": 5

});

//ajax Jabatan
function showSat() {
    $.get('<?php echo base_url('Settingwh/showSat'); ?>', function(data) {
        tableSatuan.destroy();
        $('#data-satuan').html(data);
        refresh();
    });
}

function showKat() {
    $.get('<?php echo base_url('Settingwh/showKat'); ?>', function(data) {
        MyTable.fnDestroy();
        $('#data-kategori').html(data);
        refresh();
    });
}

function showType() {
    $.get('<?php echo base_url('Settingwh/showType'); ?>', function(data) {
        MyTable1.fnDestroy();
        $('#data-type').html(data);
        refresh();
    });
}

function showSup() {
    $.get('<?php echo base_url('Settingwh/showSup'); ?>', function(data) {
        MyTable2.fnDestroy();
        $('#data-supplier').html(data);
        refresh();
    });
}

$('#form-tambah-satuan').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesTsatuan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showSat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-satuan").reset();
                $('#tambah-satuan').modal('hide');
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

$(document).on("click", ".update-dataSatuan", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('Settingwh/updateSatuan'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-satuan').html(data);
            $('#update-satuan').modal('show');
        })
})
$(document).on('submit', '#form-update-satuan', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesUsatuan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showSat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-satuan").reset();
                $('#update-satuan').modal('hide');
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

$('#tambah-satuan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-satuan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

//*** end Satuan **//

$('#form-tambah-kategori').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesTkategori'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showKat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-kategori").reset();
                $('#tambah-kategori').modal('hide');
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

$(document).on("click", ".update-dataKategori", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('Settingwh/updateKategori'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-kategori').html(data);
            $('#update-kategori').modal('show');
        })
})
$(document).on('submit', '#form-update-kategori', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesUkategori'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showKat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-kategori").reset();
                $('#update-kategori').modal('hide');
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

$('#tambah-kategori').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-kategori').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

//*** end KAtegori **//
$('#form-tambah-supplier').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Settingwh/prosesTdepartement'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showSat();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-departement").reset();
                $('#tambah-departement').modal('hide');
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

$(document).on("click", ".update-dataDepartement", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/updateDepartement'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-departement').html(data);
            $('#update-departement').modal('show');
        })
})
$(document).on('submit', '#form-update-departement', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesUdepartement'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showDep();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-departement").reset();
                $('#update-departement').modal('hide');
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

$('#tambah-jabatan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-jabatan').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})





function req_nama_sp1(get_kode, get_area, flag) {
    clearTimeout(timer);
    nic_sp = get_kode;
    area = get_area;
    if (flag == "start") {
        timer = setTimeout("req_nama_sp1(nic_sp,area,'delay')", 200);
    } else if (flag == "delay") {
        if (get_kode == document.getElementById("nic_sp1").value) {
            var url = "<?php echo base_url('laplaka/carisp'); ?>?rand=" + Math.random();
            var post = "nic_sp=" + nic_sp + "&act=req_nama_sp1";
            ajax(url, post, area);
        } else {
            timer = setTimeout("req_nama_sp1(nic_sp,area,'delay')", 200);
        }
    }
}
</script>
>>>>>>> 486b26dccb02d1fa317ac4a7c97c2c9b076d23cf
