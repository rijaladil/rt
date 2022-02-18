<div class="container-fluid">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pengeluaran</h6>
					<a href="#" class="btn btn-primary btn-icon-split" style="float: right;" data-toggle="modal" data-target="#Finput">
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
							<th width="5%">ID COA</th>
							<th width="10%">DATE</th>
							<th width="30%">INFORMATION</th>
							<th width="10%">NOMINAL</th>
							<th width="30%">NOTE</th>
							<th width="7%">ACTION</th>
						</tr>
					 </thead>
						</tbody>
							<?php 
							$id = 1;
							foreach($pengeluaran as $p){ 
							?>
							<tr>
								<td><?php echo $id++ ?></td>
								<td><?php echo $p->no_rek ?></td>
								<td><?php echo $p->date ?></td>
								<td><?php echo $p->information ?></td>
								<td><?php echo number_format($p->nominal ,0,',','.')?></td>
								<td><?php echo $p->note ?></td>
								
								<td class="row justify-content-center">										
					                  <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#Fedit<?php echo $p->id ?>">
					                    <span class="icon text-white-50">
										  <i class="fa fa-edit"></i>
					                    </span>
					                  </a>

					                   <a href="<?php echo base_url(). 'index.php/client/delete/'.$p->id ; ?>" class="btn btn-danger btn-circle btn-sm" hidden>
					                    <span class="icon text-white-50">
					                      <i class="fas fa-trash"></i>
					                    </span>					                    
					                  </a>
								</td>
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
						<h4 class="modal-title">INPUT PEMASUKAN</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					<form action="<?php echo base_url().'index.php/pengeluaran/p_input'; ?>" method="post">

						<table width="100%">
							
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">COA:</label>								
										<select class="form-control"  id="id_coa"  name="id_coa" style="width:100%" required>
										<option value="">PILIH</option>							
										<?php foreach($coa as $c){ ?>
											<option value="<?php echo $c->id ?>"> <?php echo $c->no_rek ?> - <?php echo $c->name ?></option>
										<?php } ?>
										</select>		
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">DATE:</label>
										<input class="form-control" id="inputdefault" type="date" name="date" required value="<?php echo date('Y-m-d')?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">INFORMATION:</label>
										<textarea class="form-control" id="inputdefault" type="text" name="information" required></textarea>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOMINAL:</label>
										<input class="form-control" id="inputdefault" type="text" name="nominal" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOTE:</label>
										<textarea class="form-control" id="inputdefault" type="text" name="note"></textarea>
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


			<?php $id = 1; 	foreach($pengeluaran as $p){ 
			?>
			<div class="modal fade" id="Fedit<?php echo $p->id ?>" role="dialog">
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">	
						<h4 class="modal-title">EDIT PEMASUKAN</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					
					<form action="<?php echo base_url(). 'index.php/pengeluaran/update'; ?>" method="post">
						<table width="100%">
							<tr>
								<td>
									<div class="form-group">
									
									<label for="inputdefault">COA:</label>			
									<input type="hidden" name="id" value="<?php echo $p->id ?>">					
									<select class="form-control"  id="id_coa"  name="id_coa" style="width:100%" required>
										<?php foreach($coa as $c){ 
											if($p->id_coa==$c->id ){?>
										<option value="<?php echo $p->id_coa ?>"> <?php echo $c->no_rek ?> - <?php echo $c->name ?></option>	
										<?php } }?>						
										<?php foreach($coa as $c){ ?>
											<option value="<?php echo $c->id ?>"> <?php echo $c->no_rek ?> - <?php echo $c->name ?></option>
										<?php } ?>
										</select>	
									</div>
								</td>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">DATE:</label>
										<input class="form-control" id="inputdefault" type="date" name="date" required value="<?php echo $p->date ?>" >
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">INFORMATION:</label>
										<textarea class="form-control" id="inputdefault" type="text" name="information" required><?php echo $p->information ?></textarea>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOMINAL:</label>
										<input class="form-control" id="inputdefault" type="text" name="nominal" required value="<?php echo $p->nominal ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NOTE:</label>
										<textarea class="form-control" id="inputdefault" type="text" name="note" ><?php echo $p->note ?></textarea>
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
			
		</div>
</div>

