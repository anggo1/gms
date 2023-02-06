       <?php
  $no = 1;
  foreach ($datatype as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->type_mesin; ?></td>

      <td class="text-center">
        <button class="btn btn-sm btn-outline-success update-dataType" data-id="<?php echo $s->id_type; ?>"><i class="glyphicon glyphicon-repeat"></i> Edit</button>
		  <button class="btn btn-sm btn-outline-danger delete-type" data-toggle="modal" data-target="#konfirmasiHapus" data-id="<?php echo $s->id_type; ?>"><i class="fa fa-delete"></i> Hapus</button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 