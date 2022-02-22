<div class="container-fluid">
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Last Payment</h6>
					<a href="#" class="btn btn-primary btn-icon-split" style="float: right;" data-toggle="modal" data-target="#Finput" hidden="">
		                <span class="icon text-white-50">
		                  <i class="fas fa-flag"></i>
		                </span>
		                <span class="text">Add +</span>
		              </a>
            </div>		 
			 <div class="card-body">
              	<div class="table-responsive">		
				    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                 <thead>
						<tr>
						<th width="2%">No</th>
							<th width="20%">NAME</th>
							<th width="10%">ADDRESS</th>
							<th width="30%">PAY DATE</th>
							<th width="20%">PAY MONTH YEAR</th>
							<th width="10%">NOMINAL</th>
							<th width="20%">KET.</th>
							<th width="7%" hidden=>ACTION</th>
						</tr>
						
					 </thead>
					 <tbody>
							<?php 
							$id = 1;
							foreach($iuran as $in){ 
								$iduser_login = $this->session->userdata('warga_id');
								if ($iduser_login == $in->id_warga) {
							?>
							<tr>
								<td><?php echo $id++ ?></td>
								<td><?php echo $in->name ?></td>
								<td><?php echo $in->address_domisili ?></td>
								<td><?php echo $in->pay_date ?></td>
								<td><?php echo  date('Y F', strtotime($in->pay_month_year)) ?></td>
								<td><?php echo number_format($in->nominal ,0,',','.')?></td>
								<td><?php echo $in->keterangan ?></td>
								
								<td></td>
							</tr>
							<?php } }?>
						</tbody>
					</table>
			   	</div>
			</div>
</div>
</div>