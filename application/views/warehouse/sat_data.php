       <?php
  $no = 1;
  foreach ($dataSat as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->kode_satuan; ?></td>
    <td><?php echo $s->satuan; ?></td>

      <td class="text-center">
        <button class="btn btn-sm btn-outline-success update-dataSatuan" data-id="<?php echo $s->id_satuan; ?>"><i class="fa fa-edit"></i></button>
		  <button class="btn btn-sm btn-outline-danger delete-satuan" data-toggle="modal" data-target="#konfirmasiHapus" data-id="<?php echo $s->id_satuan; ?>"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 