       <?php
        $no = 1;
        foreach ($dataPk as $s) {
        ?>
         <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->id_lapor; ?></td>
           <td><?php echo $s->jns_pk; ?></td>

           <td class="text-center">
           <button class="btn btn-xs btn-outline-success update-pk" title="Proses PK" kode="<?php echo $s->jns_pk; ?>" data-id="<?php echo $s->id_lapor; ?>"><i class="fa fa-user-clock"> Proses</i>
                    </button>
                  </td>
         </tr>
       <?php
          $no++;
        }
        ?>