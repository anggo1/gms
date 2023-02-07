       <?php
  $no = 1;
  foreach ($dataDev as $s) {
    ?>
       <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->pin; ?></td>
           <td><?php echo $s->nama_mesin; ?></td>

           <td class="text-center">
               <button class="btn btn-sm btn-outline-success update-dataMesin" data-id="<?php echo $s->id; ?>"><i
                       class="fa fa-edit"></i></button>
               <button class="btn btn-sm btn-outline-danger delete-mesin" data-toggle="modal" data-target="#hapusMesin"
                   data-id="<?php echo $s->id; ?>"><i class="fa fa-trash"></i></button>
           </td>
       </tr>
       <?php
	 $no++;
  }
?>