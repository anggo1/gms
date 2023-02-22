       <?php
        $no = 1;
        foreach ($dataDetail as $s) {
        ?>
         <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->no_part; ?></td>
           <td><?php echo $s->nama_part; ?></td>
           <td><?php echo $s->jumlah; ?></td>

           <td class="text-center">
             <button class="btn btn-sm btn-outline-danger delete-detail ion-android-delete" data-toggle="modal" data-target="#hapusDetail" 
             data-stok="<?php echo $s->jumlah; ?>" data-status="<?php echo $s->status_part; ?>" data-id="<?php echo $s->id_detail; ?>" data-part="<?php echo $s->no_part; ?>"></button>
           </td>
         </tr>
       <?php
          $no++;
        }
        ?>