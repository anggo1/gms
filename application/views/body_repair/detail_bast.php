       <?php
        $no = 1;
        foreach ($dataDetail as $s) {
        ?>
         <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->no_body; ?></td>
           <td><?php echo $s->no_pol; ?></td>
           <td><?php echo $s->nama_sp; ?></td>
           <td><?php echo $s->Keterangan; ?></td>

           <td class="text-center">
             <button class="btn btn-sm btn-outline-danger delete-detail ion-android-delete" data-toggle="modal" data-target="#hapusDetail" data-id="<?php echo $s->id_bast; ?>"></button>
           </td>
         </tr>
       <?php
          $no++;
        }
        ?>