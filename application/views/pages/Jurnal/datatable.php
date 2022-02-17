<div class="container-fluid">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jurnal</h6>
					
            </div>
            <div class="card-body">
              	<div class="table-responsive">
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                 <thead>
						<tr>
							<th width="2%">No</th>
							<th width="10%">DATE</th>
							<th width="2%">M</th>
							<th width="10%">PENDAPATAN</th>
							<th width="10%">PENGELUARAN</th>
							<th width="25%">KETERANGAN</th>
							<th width="25%">NOTE</th>

						</tr>
					 </thead>
						</tbody>
							<?php 
							$id = 1;
							foreach($data_jurnal as $dj){ 
							?>
							<tr>
								<td><?php echo $id++ ?></td>
								<td><?php echo $dj->pay_date ?></td>
								<td><?php echo $dj->mutasi ?></td>
								<td><?php echo $dj->pendapatan ?></td>
								<td><?php echo $dj->pengeluaran ?></td>
								<td><?php echo $dj->keterangan ?></td>
								<td><?php echo $dj->note ?> - CD : 
									<?php echo $dj->createDate ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
			   	</div>
			</div>
								
			
	


			
		</div>
</div>

