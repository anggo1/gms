       <?php
  $no = 1;
  foreach ($dataKat as $s) {
    ?>
    <tr>
    
    <td><?php echo $no; ?></td>
    <td><?php echo $s->kategori; ?></td>

      <td class="text-center">
        <button class="btn btn-sm btn-outline-success update-dataKategori" data-id="<?php echo $s->id_kategori; ?>"><i class="fa fa-edit"></i></button>
		  <button class="btn btn-sm btn-outline-danger delete-kategori" data-toggle="modal" data-target="#konfirmasiHapus" data-id="<?php echo $s->id_kategori; ?>"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
    <?php
	 $no++;
  }
?> 