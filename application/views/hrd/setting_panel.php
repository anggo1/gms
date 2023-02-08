<div class="row">
    <div class="col-12 ">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-graduate text-blue"></i> &nbsp; Data
                                        Pendidikan</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-pendidikan" title="Add Data"><i
                                                class="fas fa-plus"></i> Add Pendidikan</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped  table-bordered table-hover dt-responsive nowrap"
                                                id="list-pendidikan">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Pendidikan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-pendidikan">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="modal-pendidikan"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-shield text-blue"></i> &nbsp; Data
                                        Departement</h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-departement" title="Add Data"><i
                                                class="fas fa-plus"></i> Add Departement</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered table-hover dt-responsive nowrap"
                                                id="list-departement">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Departement</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-departement">
                                                </tbody>
                                                <tfoot></tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="modal-departement"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-user-tie text-blue"></i> &nbsp; Data Jabatan
                                    </h3>
                                    <div class="text-right">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                            data-target="#tambah-jabatan" title="Add Data"><i class="fas fa-plus"></i>
                                            Add Jabatan</button>
                                    </div>
                                </div>
                                <div class="col-12 ">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped  table-bordered table-hover dt-responsive"
                                                id="list-jabatan">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Jabatan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-jabatan">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php show_my_confirm('hapusPendidikan', 'hapus-pendidikan', 'Hapus Data Pendidikan Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
<?php show_my_confirm('hapusJabatan', 'hapus-jabatan', 'Hapus Data Jabatan Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
<?php show_my_confirm('hapusDepartement', 'hapus-departement', 'Hapus Data Departement Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>
<script type="text/javascript">
window.onload = function() {
    // showPend();
    showDep();
    showJab();
}

function refresh() {
    MyTable = $('#list-pendidikan,#list-departement,#list-jabatan').dataTable();
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
MyTable = $("#list-pendidikan").DataTable({
    "responsive": true,
    "autoWidth": false,
    "pageLength": 5,
    "language": {
        "sEmptyTable": "Data pegawai Belum Ada"
    },
    "processing": true,
    "serverSide": true,
    "ajax": {
        "url": "<?php echo site_url('SettingHrd/ajax_pendidikan')?>",
        "type": "POST"
    },
});
var MyTable1 = $('#list-departement').dataTable({
    "pageLength": 5
});
var MyTable2 = $('#list-jabatan').dataTable({
    "pageLength": 5
});

//ajax Jabatan
function showPend() {
    $.get('<?php echo base_url('SettingHrd/showPend'); ?>', function(data) {
        MyTable.fnDestroy();
        $('#data-pendidikan').html(data);
        refresh();
    });
}

function showDep() {
    $.get('<?php echo base_url('SettingHrd/showDep'); ?>', function(data) {
        MyTable1.fnDestroy();
        $('#data-departement').html(data);
        refresh();
    });
}

function showJab() {
    $.get('<?php echo base_url('SettingHrd/showJab'); ?>', function(data) {
        MyTable2.fnDestroy();
        $('#data-jabatan').html(data);
        refresh();
    });
}
//
$('#form-tambah-jabatan').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesTjabatan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showJab();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-jabatan").reset();
                $('#tambah-jabatan').modal('hide');
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

$(document).on("click", ".update-dataJabatan", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/updateJabatan'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-jabatan').html(data);
            $('#update-jabatan').modal('show');
        })
})
$(document).on('submit', '#form-update-jabatan', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesUjabatan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showJab();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-jabatan").reset();
                $('#update-jabatan').modal('hide');
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
$(document).on("click", ".delete-jabatan", function() {
    id_sat = $(this).attr("data-id");
})
$(document).on("click", ".hapus-jabatan", function() {
    var id = id_sat;

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/deleteJabatan'); ?>",
            data: "id=" + id
        })

        .done(function(data) {
            var out = jQuery.parseJSON(data);
            showJab();
            if (out.status != 'form') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: out.msg,
                    showConfirmButton: false,
                    timer: 1500
                })
                //$('.msg').html(out.msg);
                $('#hapusJabatan').modal('hide');
            }
        })
})

//*** end Jabatan **//
$('#form-tambah-departement').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesTdepartement'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showDep();
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
$(document).on("click", ".delete-departement", function() {
    id_sat = $(this).attr("data-id");
})
$(document).on("click", ".hapus-departement", function() {
    var id = id_sat;

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/deleteDepartement'); ?>",
            data: "id=" + id
        })

        .done(function(data) {
            var out = jQuery.parseJSON(data);
            showDep();
            if (out.status != 'form') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: out.msg,
                    showConfirmButton: false,
                    timer: 1500
                })
                //$('.msg').html(out.msg);
                $('#hapusDepartement').modal('hide');
            }
        })
})
//*** end Departement **//
$('#form-tambah-pendidikan').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesTpendidikan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showPend();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-pendidikan").reset();
                $('#tambah-pendidikan').modal('hide');
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

$(document).on("click", ".update-dataPendidikan", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/updatePendidikan'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-pendidikan').html(data);
            $('#update-pendidikan').modal('show');
        })
})
$(document).on('submit', '#form-update-pendidikan', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('SettingHrd/prosesUpendidikan'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showPend();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-pendidikan").reset();
                $('#update-pendidikan').modal('hide');
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

$(document).on("click", ".delete-pendidikan", function() {
    id_sat = $(this).attr("data-id");
})
$(document).on("click", ".hapus-pendidikan", function() {
    var id = id_sat;

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('SettingHrd/deletePendidikan'); ?>",
            data: "id=" + id
        })

        .done(function(data) {
            var out = jQuery.parseJSON(data);
            showPend();
            if (out.status != 'form') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: out.msg,
                    showConfirmButton: false,
                    timer: 1500
                })
                //$('.msg').html(out.msg);
                $('#hapusPendidikan').modal('hide');
            }
        })
})



function req_nama_sp1(get_kode, get_area, flag) {
    clearTimeout(timer);
    nic_sp = get_kode;
    area = get_area;
    if (flag == "start") {
        timer = setTimeout("req_nama_sp1(nic_sp,area,'delay')", 200);
    } else if (flag == "delay") {
        if (get_kode == document.getElementById("nic_sp1").value) {
            var url = "<?php echo base_url('laplaka/carisp');?>?rand=" + Math.random();
            var post = "nic_sp=" + nic_sp + "&act=req_nama_sp1";
            ajax(url, post, area);
        } else {
            timer = setTimeout("req_nama_sp1(nic_sp,area,'delay')", 200);
        }
    }
}
</script>