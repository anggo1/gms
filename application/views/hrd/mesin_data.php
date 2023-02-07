<div class="row">
    <div class="col-12 ">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card ">
                            <div class="modal-content">
                                <div class="card-header card-blue card-outline">
                                    <h3 class="card-title"><i class="fa fa-cog text-blue"></i> &nbsp; Data
                                        Mesin Absensi</h3>
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
                                                id="list-mesin">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>IP</th>
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
                                </div>
                                <div id="modal-mesin"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php show_my_confirm('hapusMesin', 'hapus-mesin', 'Hapus Data Mesin Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data'); ?>

<script type="text/javascript">
window.onload = function() {
    showDev();
}

function refresh() {
    MyTable = $('#list-mesin').dataTable();
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

var MyTable = $('#list-mesin').dataTable({
    "pageLength": 5
});

//ajax mesin
function showDev() {
    $.get('<?php echo base_url('Mesin_absen/showDev'); ?>', function(data) {
        MyTable.fnDestroy();
        $('#data-mesin').html(data);
        refresh();
    });
}


$('#form-tambah-mesin').submit(function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Mesin_absen/prosesTmesin'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showDev();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-tambah-mesin").reset();
                $('#tambah-mesin').modal('hide');
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

$(document).on("click", ".update-dataMesin", function() {
    var id = $(this).attr("data-id");

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('Mesin_absen/updateMesin'); ?>",
            data: "id=" + id
        })
        .done(function(data) {
            $('#modal-mesin').html(data);
            $('#update-mesin').modal('show');
        })
})
$(document).on('submit', '#form-update-mesin', function(e) {
    var data = $(this).serialize();

    $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Mesin_absen/prosesUmesin'); ?>',
            data: data
        })
        .done(function(data) {
            var out = jQuery.parseJSON(data);

            showDev();
            if (out.status == 'form') {
                $('.form-msg').html(out.msg);
                effect_msg_form();
            } else {
                document.getElementById("form-update-mesin").reset();
                $('#update-mesin').modal('hide');
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

$('#tambah-mesin').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})

$('#update-mesin').on('hidden.bs.modal', function() {
    $('.form-msg').html('');
})
$(document).on("click", ".delete-mesin", function() {
    id_sat = $(this).attr("data-id");
})
$(document).on("click", ".hapus-mesin", function() {
    var id = id_sat;

    $.ajax({
            method: "POST",
            url: "<?php echo base_url('Mesin_absen/deleteMesin'); ?>",
            data: "id=" + id
        })

        .done(function(data) {
            var out = jQuery.parseJSON(data);
            showDev();
            if (out.status != 'form') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: out.msg,
                    showConfirmButton: false,
                    timer: 1500
                })
                //$('.msg').html(out.msg);
                $('#hapusMesin').modal('hide');
            }
        })
})
</script>