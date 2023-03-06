<?php
$no = 1;
foreach ($dataPk as $s) {
?> <tr>

        <td><?php echo $no; ?></td>
        <td><?php echo $s->id_pk; ?></td>
        <td><?php echo $s->no_body; ?></td>
        <td><?php echo $s->jns_pk; ?></td>
        <td><?php echo $s->ket_pk; ?></td>
        <td><?php echo $s->tgl_mulai; ?></td>
        <td><?php echo $s->pt_pemborong; ?></td>

        <td class="text-center">
        <button class="btn btn-sm btn-outline-success cetak-pk" id="cetakPk" title="Cetak PK" data-id="<?php echo $s->id_pk; ?>"><i class="fa fa-print"></i> Cetak</button>
        <?php if($s->status=='Y'){ ?>
        <button class="btn btn-sm btn-outline-warning pause-pk" data-id="<?php echo $s->id_pk; ?>"><i class="fa fa-pause"></i> Pause</button> 
        <?php } 
        if($s->status=='P'){ ?>
        <button class="btn btn-sm btn-outline-primary start-pk-aktif" data-toggle="modal" data-target="#startPk" data-pk="<?php echo $s->id_pk; ?>"><i class="fa fa-play"></i> Start</button> 
        <?php } ?>
        <button class="btn btn-sm btn-outline-danger selesai-pk-aktif" data-toggle="modal" data-target="#selesaiPk" data-pk="<?php echo $s->id_pk; ?>"><i class="fa fa-check-double"></i>Tutup</button>    
    </td>
    </tr>
<?php
    $no++;
}
?>
<script type="text/javascript">
    var tableLaporan = $('#list-laporan').DataTable({
        "responsive": false,
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": true,
        "pageLength": 5
    });
</script>