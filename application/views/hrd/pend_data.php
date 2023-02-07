       <?php
  $no = 1;
  foreach ($dataPen as $s) {
    ?>
       <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->pendidikan; ?></td>

           <td class="text-center">
               <button class="btn btn-sm btn-outline-success update-dataPendidikan"
                   data-id="<?php echo $s->id_pendidikan; ?>"><i class="fa fa-edit"></i></button>
               <button class="btn btn-sm btn-outline-danger btn-sm delete-pendidikan" data-toggle="modal"
                   data-target="#hapusPendidikan" data-id="<?php echo $s->id_pendidikan; ?>"><i
                       class="fa fa-trash"></i></button>
           </td>
       </tr>
       <?php
	 $no++;
  }
?>