<?php
$no = 1;
foreach ($dataPk as $s) {
?> <tr>

        <td><?php echo $no; ?></td>
        <td><?php echo $s->id_lapor; ?></td>
        <td><?php echo $s->no_body; ?></td>
        <td><?php echo tglIndoSedang($s->tgl_masuk); ?></td>
        <td><?php echo $s->jml_pk.' PK'; ?></td>
        <td <?php if (!empty($s->no_bay)){echo '';} else{echo 'style="background-color: red;animation: blinker 0.5s infinite alternate; "';} ?>>
        <?php if (!empty($s->no_bay)){echo $s->no_bay;} else{echo'No Bay';} ?></td>

        <td class="text-left">
        <?php if (empty($s->no_bay)){ ?>
            <button class="btn btn-xs btn-outline-info cetak-pk" id="cetakPk" title="Cetak PK" data-id="<?php echo $s->id_lapor; ?>"><i class="fa fa-print"></i> Input Bay</button>
        <?php } ?>
            <button class="btn btn-xs btn-outline-success cetak-pk" id="cetakPk" title="Cetak PK" data-id="<?php echo $s->id_lapor; ?>"><i class="fa fa-print"></i> Cetak</button>
        <?php if($s->status=='Y'){ ?>
        <button class="btn btn-xs btn-outline-warning pause-pk" data-id="<?php echo $s->id_lapor; ?>"><i class="fa fa-pause"></i> Pause</button> 
        <?php } 
        if($s->status=='P'){ ?>
        <button class="btn btn-xs btn-outline-primary start-pk-aktif" data-toggle="modal" data-target="#startPk" data-pk="<?php echo $s->id_lapor; ?>"><i class="fa fa-play"></i> Start</button> 
        <?php } ?>
        <button class="btn btn-xs btn-outline-danger selesai-pk-aktif" data-toggle="modal" data-target="#selesaiPk" data-pk="<?php echo $s->id_lapor; ?>"><i class="fa fa-check-double"></i>Tutup</button>    
    </td>
    </tr>
<?php
    $no++;
}
?>
