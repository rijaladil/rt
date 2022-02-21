
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
				    <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
	                 <thead>
						<tr>
						<th width="2%">No</th>
							<th width="20%">NAME</th>
							<th width="10%">ADDRESS</th>
							<th width="30%">PAY DATE</th>
							<th width="20%">PAY MONTH YEAR</th>
							<th width="10%">NOMINAL</th>
							<th width="20%">KET.</th>
							<th width="7%">ACTION</th>
						</tr>
						
					 </thead>
					 <tbody>
							<?php 
							$total = 0;
							$id = 1;
							foreach($iuran_now as $in){ 
							?>
							<tr>
								<td><?php echo $id++ ?></td>
								<td><?php echo $in->name ?></td>
								<td><?php echo $in->address_domisili ?></td>
								<td><?php echo $in->pay_date ?></td>
								<td><?php echo  date('Y-m', strtotime($in->pay_month_year)) ?></td>
								<td><?php if($in->id_coa == 2) {?>
									<a class="btn btn-success btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text text-white"><?php echo number_format($in->nominal ,0,',','.')?></span>
                                    </a>  <?php }else {?>
											<?php echo number_format($in->nominal ,0,',','.')?>
										<?php } ?>
								</td>
								<td><?php echo $in->keterangan ?></td>
								<td class="row justify-content-center">																	
								<?php if ( (in_array($this->session->userdata('level'), array(1))) ) { ?>									
						          <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#Fedit<?php echo $in->id ;?>" >
						            <span class="icon text-white-50">
									  					<i class="fa fa-edit"></i>
						            </span>
						          </a>
						          &#160;
						           <a href="<?php echo base_url(). 'index.php/iuran/delete/'.$in->id ; ?>" class="btn btn-danger btn-circle btn-sm"  >
						            <span class="icon text-white-50">
						              <i class="fas fa-trash"></i>
						            </span>					                    
						          </a>	
						          <?php } ?>					

									</td>
							</tr>
							<?php $total = $total + $in->nominal; ?>
							<?php } ?>
						</tbody>
						<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>TOTAL</th>
							<th><?php  echo  number_format($total ,0,',','.');?></th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
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
										<select class="form-control"  id="id_warga"  name="id_warga" style="width:100%" required>
										<option value="">PILIH</option>							
										<?php foreach($warga as $w){ ?>
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
										<input class="form-control" id="pay_date" type="text" name="pay_date" required value="<?php echo date('Y-m-d')?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY MONTH YEAR: </label>
										<input class="form-control" id="pay_month_year" type="text" name="pay_month_year" required  value="<?php echo date('Y-m-01')?>">
									</div>
							</tr>
								</td>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOMINAL: </label>
										<input class="form-control" id="inputdefault" type="text"  name="nominal" required value="75000">
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

			<?php $id = 1; 	foreach($iuran_now as $i){ 
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
										<select class="form-control"  name="id_warga" style="width: 100%;" >	
											<option value="<?php echo $i->id_warga ?>"> <?php echo $i->address_domisili ?> : <?php echo $i->name ?> </option>	
										</select>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY DATE: </label>
										<input class="form-control" id="pay_date2" type="text" name="pay_date" required value="<?php echo $i->pay_date;?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">PAY MONTH YEAR: </label>
										<input class="form-control" id="pay_month_year2" type="text" name="pay_month_year" required  value="<?php echo $i->pay_month_year;?>">
									</div>
							</tr>
								</td>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOMINAL: </label>
										<input class="form-control" id="inputdefault" type="text"  name="nominal" required value="<?php echo $i->nominal;?>">
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
							<tr>
								<td>
									<div class="form-group">
										<div class="form-check form-check-inline">
										  <input class="form-check-input" type="checkbox" id="id_coa" name="id_coa" value="2" <?php if($i->id_coa==2){?>checked<?php }?>>
										  <label class="form-check-label" for="inlineCheckbox1">TRANSFER BANK</label>
										</div>
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



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

<script>
$("#id_warga").select2();

$("#pay_date").datepicker( {
    format: "yyyy-mm-dd",
});


$("#pay_month_year").datepicker( {
    format: "yyyy-mm-dd",
    startView: "months", 
    minViewMode: "months"
});

$("#pay_date2").datepicker( {
    format: "yyyy-mm-dd",
});


$("#pay_month_year2").datepicker( {
    format: "yyyy-mm-dd",
    startView: "months", 
    minViewMode: "months"
});




	</script>