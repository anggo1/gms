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
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title"><i class="fa fa-list text-blue"></i> Data Spare Part </h3>
                        <div class="text-right">
                        <?php foreach ($viewLevel as $l) {
                            if ($l->add_level=='Y'){
                            echo '<button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#tambah-sparepart" title="Add Data"><i class="fas fa-plus"></i> Tambah Data</button>';
                            }}
                            ?>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tabel-part" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Part</th>
                                    <th>Nama Part</th>
                                    <th>Stok</th>
                                    <th>Lokasi</th>
                                    <th>Satuan</th>
                                    <th>Type</th>
                                    <th>Kategori</th>
                                    <th>Kelompok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                <div id="tempat-modal"></div>
                <div id="modal-label"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
show_my_confirm('hapusPart', 'hapus-part', 'Hapus Data Ini?', 'Ya, Hapus Data Ini', 'Batal Hapus data');
?>

 


<script type="text/javascript">
    $(document).ready(function() {

        //datatables
        table = $("#tabel-part").DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "sEmptyTable": "Data Sparepart Belum Ada"
            },
            "processing": true, //Feature control the processing indicator.
            "serverSide": true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x"></i>'
            },
            "order": [],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('Sparepart/ajax_list') ?>",
                "type": "POST"
            },
            "columnDefs": [
        {
            "targets": [ 0 ],
            "orderable": false,
        },
        ],

    });

});
$('#form-tambah-sparepart').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sparepart/prosesTsparepart'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-sparepart").reset();
				$('#tambah-sparepart').modal('hide');
				$('.msg').html(out.msg);
			    table.ajax.reload();
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

$(document).on("click", ".update-sparepart", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sparepart/updateSparepart'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-sparepart').modal('show');
		})
	})
	$(document).on('submit', '#form-update-sparepart', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sparepart/prosesUsparepart'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			table.ajax.reload();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-sparepart").reset();
				$('#update-sparepart').modal('hide');
				$('.msg').html(out.msg);
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

	$('#tambah-sparepart').on('hidden.bs.modal', function () {
	$('.form-msg').html('');
	})

	$('#update-sparepart').on('hidden.bs.modal', function () {
	$('.form-msg').html('');
	})
    $(document).on("click", ".delete-part", function() {
        id_part = $(this).attr("data-id");
    })
    $(document).on("click", ".hapus-part", function() {
        var id = id_part;

        $.ajax({
                method: "POST",
                url: "<?php echo base_url('Sparepart/deleteSparepart'); ?>",
                data: "id=" + id
            })

            .done(function(data) {
                var out = jQuery.parseJSON(data);
			table.ajax.reload();
                $('.msg').html(out.msg);
                $('#hapusPart').modal('hide');
                if (out.status != 'form') {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: out.msg,
                        showConfirmButton: false,
                        timer: 1200
                    })
                }
            })
    })

    $(document).on("click", ".cetak-label", function() {
		var id = $(this).attr("data-id");
		var idc = $(this).attr("data-cetak");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sparepart/viewsparepart'); ?>",
			data: "id=" +id+"&idc=" +idc
		})
		.done(function(data) {
            table.ajax.reload();
			$('#tempat-modal').html(data);
			$('#cetak-label').modal('show');
		})
	})

</script>
