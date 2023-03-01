       <?php
        $no = 1;
        foreach ($dataEstimasi as $s) {
        ?>
         <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->no_body; ?></td>
           <td><?php echo $s->jns_pk; ?></td>
           <td><?php echo $s->no_part; ?></td>
           <td><?php echo $s->nama_part; ?></td>
           <td><?php echo $s->Keterangan; ?></td>

           <td class="text-center">
             <button class="btn btn-xs btn-outline-danger delete-estimasi" data-toggle="modal" data-target="#hapusEstimasi" data-id="<?php echo $s->id_detail; ?>"><i class="fas fa-trash"></i></button>
           </td>
         </tr>
       <?php
          $no++;
        }
        ?>