
<div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title"><i class="fa fa-list text-blue"></i> Data Spare Part </h3>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#tambah-pk" title="Add Data"><i class="fas fa-plus"></i> Tambah Data</button>

                        </div>
                    </div>
<div class="modal-body form">
    <div class="card card-first card-outline">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table no-wrap table-hover nowrap" id="list-pk">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Laporan</th>
                            <th>Jenis PK</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th colspan="2">Pemborong</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        $no = 1;
        foreach ($dataPk as $s) {
        ?>
                        <tr>

                            <td><?php echo $no; ?></td>
                            <td><?php echo $s->id_lapor; ?></td>
                            <td><?php echo $s->jns_pk; ?></td>
                            <td><?php echo $s->ket_pk; ?></td>
                            <td><?php if($s->status=='Y') {echo 'Aktif';}if($s->status=='P') {echo 'Pending';}if($s->status=='S') {echo 'Selesai';} ?></td>
                            <td><?php echo $s->pt_pemborong.'|'.$s->pj_borong; ?></td>

                            <td class="text-center">
                                <?php if($s->status=='N'){ ?>
                                <button
                                    class="btn btn-xs btn-outline-success update-pk"
                                    title="Proses PK"
                                    kode="<?php echo $s->jns_pk; ?>"
                                    data-id="<?php echo $s->id_lapor; ?>">
                                    <i class="fa fa-user-clock">
                                        Proses</i>
                                    <?php } if($s->status=='Y') { echo "";}?>
                                </button>
                            </td>
                        </tr>
                        <?php
          $no++;
        }
        ?>
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>