
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-light">
						<h3 class="card-title"><i class="fa fa-list text-blue"></i>  Data Bus</h3>
						<div class="text-right">
							<button type="button" class="btn btn-sm btn-outline-primary" onclick="add_bus()" title="Add Data"><i class="fas fa-plus"></i> Add</button>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="tbl_barang" class="table table-bordered table-striped table-hover">
							<thead>
								<tr class="bg-info">
									<th>No Body</th>
									<th>Type</th>
									<th>Thn Rangka</th>
									<th>Thn Buat</th>
									<th>Karoseri</th>
									<th>Warna</th>
									<th>Kelas</th>
									<th>Strip</th>
									<th>Keterangan</th>
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


<script type="text/javascript">
var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table =$("#tbl_barang").DataTable({
    	"responsive": true,
    	"autoWidth": false,
    	"language": {
    		"sEmptyTable": "Data Barang Belum Ada"
    	},
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
        	"url": "<?php echo site_url('ListBus/ajax_list')?>",
        	"type": "POST"
        },
         //Set column definition initialisation properties.
         "columnDefs": [
         { 
            "targets": [ 0 ], //last column

            "orderable": false, //set not orderable
        },

        ],
    });

 //set input/textarea/select event when change value, remove class error and remove text help block 
 $("input").change(function(){
 	$(this).parent().parent().removeClass('has-error');
 	$(this).next().empty();
 	$(this).removeClass('is-invalid');
 });
 $("textarea").change(function(){
 	$(this).parent().parent().removeClass('has-error');
 	$(this).next().empty();
 	$(this).removeClass('is-invalid');
 });
 $("select").change(function(){
 	$(this).parent().parent().removeClass('has-error');
 	$(this).next().empty();
 	$(this).removeClass('is-invalid');
 });

});

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

const Toast = Swal.mixin({
	toast: true,
	position: 'top-end',
	showConfirmButton: false,
	timer: 3000
});


//delete
function delbus(no_body){

    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {

        $.ajax({
        url:"<?php echo site_url('ListBus/delete');?>",
        type:"POST",
        data:"no_body="+no_body,
        cache:false,
         dataType: 'json',
        success:function(respone){
        if (respone.status == true) {
            reload_table();
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        );
        }else{
          Toast.fire({
                  icon: 'error',
                  title: 'Delete Error!!.'
                });
        }
        }
    });
})
}



function add_bus()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal({backdrop: 'static', keyboard: false}); // show bootstrap modal
    $('.modal-title').text('Add Bus'); // Set Title to Bootstrap modal title
}

function edit_bus(no_body){
	save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
    	url : "<?php echo site_url('ListBus/edit_bus')?>/" + no_body,
    	type: "GET",
    	dataType: "JSON",
    	success: function(data)
    	{

    		$('[name="no_body"]').val(data.no_body);
    		$('[name="type"]').val(data.type);
    		$('[name="thn_rangka"]').val(data.thn_rangka);
    		$('[name="thn_pembuatan"]').val(data.thn_pembuatan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Bus'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        	alert('Error get data from ajax');
        }
    });
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    if(save_method == 'add') {
        url = "<?php echo site_url('ListBus/insert')?>";
    } else {
        url = "<?php echo site_url('ListBus/update')?>";
    }
   
    // ajax adding data to database
    $.ajax({
    	url : url,
    	type: "POST",
    	data: $('#form').serialize(),
    	dataType: "JSON",
    	success: function(data)
    	{

            if(data.status) //if success close modal and reload ajax table
            {
            	$('#modal_form').modal('hide');
            	reload_table();
            	Toast.fire({
            		icon: 'success',
            		title: 'Success!!.'
            	});
            }
            else
            {
            	for (var i = 0; i < data.inputerror.length; i++) 
            	{
            		$('[name="'+data.inputerror[i]+'"]').addClass('is-invalid');
            		$('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]).addClass('invalid-feedback');
            	}
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
        	alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

</script>



<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">

			<div class="modal-header">
				<h3 class="modal-title">Person Form</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>

			</div>
			<div class="modal-body form">
				<form action="#" id="form" class="form-horizontal" >
					<div class="card-body">
						
						<div class="form-group row ">
							<label for="no_body" class="col-sm-3 col-form-label">No Body</label>
							<div class="col-sm-9 kosong">
								<input type="text" class="form-control" name="no_body" id="no_body" placeholder="No Body" >
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row ">
							<label for="nama" class="col-sm-3 col-form-label">Type</label>
							<div class="col-sm-9 kosong">
								<input type="text" class="form-control" name="type" id="type" placeholder="Nama Barang" >
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row ">
							<label for="nama_owner" class="col-sm-3 col-form-label">Harga</label>
							<div class="col-sm-9 kosong">
								<input type="text" class="form-control"  name="harga" id="harga" placeholder="Harga" >
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row ">
							<label for="alamat" class="col-sm-3 col-form-label">Satuan</label>
							<div class="col-sm-9 kosong">
								<input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" >
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group row ">
							<label for="alamat" class="col-sm-3 col-form-label">Stok</label>
							<div class="col-sm-9 kosong">
								<input type="text" class="form-control" name="Stok" id="Stok" placeholder="Satuan" >
								<span class="help-block"></span>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->