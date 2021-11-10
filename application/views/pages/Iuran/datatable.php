<div class="container-fluid">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Latest Data Iuran</h6>
              <?php if ( (in_array($this->session->userdata('level'), array(1))) ) { ?>
					<a href="#" class="btn btn-primary btn-icon-split" style="float: right;" data-toggle="modal" data-target="#Finput">
		                <span class="icon text-white-50">
		                  <i class="fas fa-flag"></i>
		                </span>
		                <span class="text">Add +</span>
		              </a> <?php } ?>
            </div>
            <div class="card-body">
              	<div class="table-responsive">
	                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                 <thead>
										<tr>
											<th width="2%">NO</th>
											<th width="3%">ST</th>
											<th width="20%">NAME</th>
											<th width="10%">ADDRESS</th>
											<th width="20%">PAY DATE</th>
											<th width="20%">PAY MONTH YEAR</th>
											<th width="10%">NOMINAL</th>
											<th width="20%">KET.</th>
											<th width="20%">ACTION</th>
										</tr>
									 </thead>
									 	<tbody>
									 	    	<?php 
											$id = 1;
											foreach($iuran as $i){ 
											?>
											<tr>
												<td><?php echo $id++ ?></td>
												<td>
													<!-- fungsi status -->
									                  <?php if(date('Y-m', strtotime($i->pay_month_year))>date('Y-m')){ ?> 
																			<a class="btn btn-success btn-circle btn-sm">
																				<span class="icon text-white-50">
														  						<i class="fa fa-arrow-up"></i>
									                    	</span>
									                    </<a>
																		<?php } elseif  (date('Y-m', strtotime($i->pay_month_year))==date('Y-m')){ ?>
																			<a class="btn btn-warning btn-circle btn-sm">
																				<span class="icon text-white-50">
														  						<i class="fa fa-check"></i>
									                    	</span>
									                    </<a>
																		<?php } else { ?>
																			<a class="btn btn-danger btn-circle btn-sm">
																					<span class="icon text-white-50">
														  						<i class="fa fa-arrow-down"></i>
									                    	</span>
																			</<a>
																		<?php } ?>

												</td>
												<td><?php echo $i->name ?></td>
												<td><?php echo $i->address_domisili ?></td>
												<td><?php echo $i->pay_date ?></td>
												<td><B><?php echo  date('Y-m', strtotime($i->pay_month_year)) ?></B> </td>
												<td><?php echo number_format($i->nominal ,0,',','.')?></td>
												<td><?php echo $i->keterangan ?></td>
												
												<td class="row justify-content-center">	
																		
																		
									                  <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#Fedit<?php echo $i->id ?>" hidden>
									                    <span class="icon text-white-50">
														  					<i class="fa fa-edit"></i>
									                    </span>
									                  </a>

									                   <a href="<?php echo base_url(). 'index.php/iuran/delete/'.$i->id ; ?>" class="btn btn-danger btn-circle btn-sm" hidden >
									                    <span class="icon text-white-50">
									                      <i class="fas fa-trash"></i>
									                    </span>					                    
									                  </a>
									                  
									                  <a href="<?php echo base_url(). 'index.php/iuran/show/'.$i->id ; ?>" class="btn btn-danger btn-circle btn-sm"  >
									                  	
									                    <span class="icon text-white-50">
									                      <i class="fas fa-edit"></i>
									                    </span>					                    
									                  </a>




												</td>
											</tr>
							<?php } ?>
							
							
						</tbody>
					</table>
			    </div>
			 </div>
	</div>
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">RealTime Data Input</h6>
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
							foreach($iuran_now as $in){ 
							?>
							<tr>
								<td><?php echo $id++ ?></td>
								<td><?php echo $in->name ?></td>
								<td><?php echo $in->address_domisili ?></td>
								<td><?php echo $in->pay_date ?></td>
								<td><?php echo  date('Y-m', strtotime($in->pay_month_year)) ?></td>
								<td><?php echo number_format($in->nominal ,0,',','.')?></td>
								<td><?php echo $in->keterangan ?></td>
								
								<td></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
			   	</div>
			</div>
								
			
			<div class="modal fade" id="Finput" role="dialog">
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header ">	
						<h4 class="modal-title">INPUT DATA IURAN WARGA</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					<form action="<?php echo base_url().'index.php/iuran/p_input'; ?>" method="post">

						<table width="100%">
							
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NAMA:</label>	
										<select class="form-control" id="id_warga"  name="id_warga" >							
											<option value="" >PILIH</option>
										<?php 
											
											foreach($warga as $w){ 
											?>
											<option value="<?php echo $w->id ?>"> <?php echo $w->address_domisili ?> : <?php echo $w->name ?> </option>
										<?php } ?>
									</select>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY DATE: </label>
										<input class="form-control" id="inputdefault" type="date" name="pay_date" required value="<?php echo date('Y-m-d')?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY MONTH YEAR: </label>
										<!-- <input class="form-control" id="inputdefault" type="date" name="pay_month_year" required > -->
										<select class="form-control" required="" name="pay_month_year">
											<option value="<?php echo date('Y-m-01') ?>"><?php echo date('Y-m') ?></option>
											<?php foreach($month as $m){ ?>
											<option value="<?php echo $m->pay_month_year ?>"><?php echo $m->pay_month_year ?></option>
										<?php } ?>

										</select>
									</div>
							</tr>
								</td>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOMINAL: </label>
										<input class="form-control" id="inputdefault" type="text"  name="nominal" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">KETERANGAN: </label>
										<input class="form-control" id="inputdefault" type="text"  name="keterangan">
									</div>
								</td>
							</tr>
						
						</table>

					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-info" value="Input">
						<button type="submit" class="btn btn-info" data-dismiss="modal">Close</button>
					</div>
					</form>	
				</div>
				</div>
			</div>


			
		</div>
</div>


			<?php $id = 1; 	foreach($iuran as $i){ 
			?>
			<div class="modal fade" id="Fedit<?php echo $i->id ?>" role="dialog">
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">	
						<h4 class="modal-title">Edit Data Iuran Warga</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					
					<form action="<?php echo base_url(). 'index.php/iuran/update'; ?>" method="post">
		
							
							<tr>
								<td>
									<div class="form-group">
										<input type="hidden" name="id" value="<?php echo $i->id ?>">
										<label for="inputdefault">NAMA:</label>	
										<select class="form-control" id="id_warga"  name="id_warga" >							
											<option value="" >PILIH</option>
										<?php 
											
											foreach($warga as $w){ 
											?>
											<option value="<?php echo $w->id ?>"> <?php echo $w->address_domisili ?> : <?php echo $w->name ?> </option>
										<?php } ?>
									</select>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY DATE: </label>
										<input class="form-control" id="inputdefault" type="date" name="pay_date" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY MONTH YEAR: </label>
										<input class="form-control" id="inputdefault" type="date" name="pay_month_year" required >
									</div>
							</tr>
								</td>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOMINAL: </label>
										<input class="form-control" id="inputdefault" type="text"  name="nominal" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">KETERANGAN: </label>
										<input class="form-control" id="inputdefault" type="text"  name="keterangan">
									</div>
								</td>
							</tr>
						
						</table>		
						<div class="modal-footer">
							<input type="submit" class="btn btn-info" value="Edit">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
						</div>
					</form>	
					</div>
				</div>
				</div>
			</div>
			<?php } ?>

