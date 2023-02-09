<<<<<<< HEAD
       <?php
  $no = 1;
  foreach ($dataSat as $s) {
    ?>
       <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->kode_satuan; ?></td>
           <td><?php echo $s->satuan; ?></td>

           <td class="text-center">
               <button class="btn btn-sm btn-outline-success update-dataSatuan"
                   data-id="<?php echo $s->id_satuan; ?>"><i class="fa fa-edit"></i></button>
               <button class="btn btn-sm btn-outline-danger delete-satuan" data-toggle="modal"
                   data-target="#konfirmasiHapus" data-id="<?php echo $s->id_satuan; ?>"><i
                       class="fa fa-trash"></i></button>
           </td>
       </tr>
       <?php
	 $no++;
  }
?>
       <script type="text/javascript">
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
       </script>
=======
        <?php
        $no = 1;
        foreach ($dataSat as $s) {
        ?>
       <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->kode_satuan; ?></td>
           <td><?php echo $s->satuan; ?></td>

           <td class="text-center">
               <button class="btn btn-sm btn-outline-success update-dataSatuan"
                   data-id="<?php echo $s->id_satuan; ?>"><i class="fa fa-edit"></i></button>
               <button class="btn btn-sm btn-outline-danger delete-satuan" data-toggle="modal"
                   data-target="#konfirmasiHapus" data-id="<?php echo $s->id_satuan; ?>"><i
                       class="fa fa-trash"></i></button>
           </td>
       </tr>
       <?php
          $no++;
        }
        ?>
       <script type="text/javascript">
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
       </script>
>>>>>>> 486b26dccb02d1fa317ac4a7c97c2c9b076d23cf
