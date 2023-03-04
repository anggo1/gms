						<div class="modal-body form">
							<div class="card card-first card-outline">
							<div class="card-body">
<div class="table-responsive">
										<table class="table no-wrap table-hover nowrap" id="list-pk-mulai">
											<thead>
												<tr>
													<th>#</th>
													<th>No Part</th>
													<th>Nama Part</th>
												</tr>
											</thead>
											<tbody>
       <?php
        $no = 1;
        foreach ($dataMulai as $s) {
        ?>
         <tr>

           <td><?php echo $no; ?></td>
           <td><?php echo $s->id_lapor; ?></td>
           <td><?php echo $s->jns_pk; ?></td>

         </tr>
       <?php
          $no++;
        }
        ?> </tbody>
<tfoot></tfoot>
										</table>
									</div>
                  </div>
						</div>
						</div>