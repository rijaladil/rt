<div class="container-fluid">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Warga</h6>
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
							<th width="20%">ID</th>
							<th width="20%">NAMA</th>
							<th width="10%">JENIS KELAMIN</th>
							<th width="20%">ADDRESS</th>
							<th width="5%">STATUS RUMAH</th>
							<th width="5%">STATUS MENETAP</th>
							<th width="5%">RETRIBUSI</th>
							<th width="20%">CONTACT</th>
							<th width="7%">ACTION</th>
						</tr>
					 </thead>
						</tbody>
							<?php 
							$id = 1;
							foreach($warga as $w){ 
							?>
							<tr>
								<td><?php echo $id++ ?></td>
								<td>KK : <b><?php echo $w->no_kk ?></b><br>
								KTP: <b><?php echo $w->no_nip ?></b></td>
								<td><b><?php echo $w->name ?></b></td>
								<td><?php if ( $w->sex  === '1'): ?>
									        <p>Laki-Laki</p>
									<?php elseif ( $w->sex  === '2'): ?>
									        <p>Perempuan</p>
									<?php else: ?>
									        <p>-</p>
									<?php endif; ?>
									</td>
								<td>KTP : <b><?php echo $w->address_ktp ?></b> <br>
								DOMISILI :<b><?php echo $w->address_domisili ?></b></td>
								<td>
									<?php if ( $w->status_home  === '1'): ?>
									        <p>Pribadi</p>
									<?php elseif ( $w->status_home  === '2'): ?>
									        <p>Sewa</p>
									<?php else: ?>
									        <p>-</p>
									<?php endif; ?>
								<td>
									<?php if ( $w->status_move  === '0'): ?>
									        <p style="color: red; font-weight:bold;">Pindah</p>
									<?php elseif ( $w->status_move  === '1'): ?>
									        <p>Menetap</p>
									<?php else: ?>
									        <p>Wafat</p>

									<?php endif; ?></td>
								<td><?php if ( $w->status_retribusi  === '0'): ?>
									        <p style="color: red; font-weight:bold;">Tidak</p>
									<?php elseif ( $w->status_retribusi  === '1'): ?>
									        <p style="color: blue; font-weight:bold;">Ya</p>
									<?php else: ?>
									        <p>-</p>
									<?php endif; ?></td>
								<td><?php echo $w->contact ?></td>
								<td class="row justify-content-center">										
					                  <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#Fedit<?php echo $w->id ?>">
					                    <span class="icon text-white-50">
										  <i class="fa fa-edit"></i>
					                    </span>
					                  </a>

					                   <a href="<?php echo base_url(). 'index.php/client/delete/'.$w->id ; ?>" class="btn btn-danger btn-circle btn-sm" hidden>
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
						<h4 class="modal-title">INPUT DATA WARGA</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					<form action="<?php echo base_url().'index.php/warga/p_input'; ?>" method="post">

						<table width="100%">
							
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">ID:</label>								
										<input class="form-control" id="inputdefault" type="text" name="no_kk" placeholder="NO KK"><br>
										<input class="form-control" id="inputdefault" type="text" name="no_nip" placeholder="NO NIP">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NAME:</label>
										<input class="form-control" id="inputdefault" type="text" name="name" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">JENIS KELAMIN:</label>
										<select class="form-control" name="sex">
											<option >PILIH</option>
											<option value="1">LAKI-LAKI</option>
											<option value="2">PEREMPUAN</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">ADDRESS:</label>
										<input class="form-control" id="inputdefault" type="text" name="address_ktp" placeholder="ADDRESS KTP"><br>
										<input class="form-control" id="inputdefault" type="text" name="address_domisili" placeholder="ADDRESS DOMISILI" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">STATUS RUMAH:</label>
										<select class="form-control" name="status_home">
											<option >PILIH</option>
											<option value="1">PRIBADI</option>
											<option value="2">SEWA</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">STATUS MOVE:</label>
										<select class="form-control" name="status_move">
											<option>PILIH</option>
											<option value="0">PINDAH</option>
											<option value="1">MENETAP</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">STATUS RETRIBUSI:</label>
										<select class="form-control" name="status_retribusi">
											<option >PILIH</option>
											<option value="0">TIDAK</option>
											<option value="1">YA</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">CONTACT:</label>
										<input class="form-control" id="inputdefault" type="text" name="contact" placeholder="0812345678">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">START LIVING:</label>
										<input class="form-control" id="inputdefault" type="date" name="start_living">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">END LIVING:</label>
										<input class="form-control" id="inputdefault" type="date" name="end_living">
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


			<?php $id = 1; 	foreach($warga as $w){ 
			?>
			<div class="modal fade" id="Fedit<?php echo $w->id ?>" role="dialog">
				<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">	
						<h4 class="modal-title">Edit Data Warga</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
					
					<form action="<?php echo base_url(). 'index.php/warga/update'; ?>" method="post">
						<table width="100%">
							<tr>
								<td>
									<div class="form-group">
									<input type="hidden" name="id" value="<?php echo $w->id ?>">
									<label for="inputdefault">ID:</label>								
									<input class="form-control" id="inputdefault" type="text" name="no_kk" placeholder="NO KK" value="<?php echo $w->no_kk ?>"><br>
									<input class="form-control" id="inputdefault" type="text" name="no_nip" placeholder="NO NIP" value="<?php echo $w->no_nip ?>">
									</div>
								</td>
							</tr>
								<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">NAME:</label>
										<input class="form-control" id="inputdefault" type="text" name="name" required value="<?php echo $w->name ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">JENIS KELAMIN:</label>
										<select class="form-control" name="sex">
											<option  value="<?php echo $w->sex ?>">
												<?php if ($w->sex === '1') : ?> LAKI-LAKI
												<?php elseif ($w->sex === '2') : ?> PEREMPUAN
												<?php else : ?>
												<?php endif; ?>
											</option><hr>	
											<option value="1">LAKI-LAKI</option>
											<option value="2">PEREMPUAN</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">ADDRESS:</label>
										<input class="form-control" id="inputdefault" type="text" name="address_ktp" placeholder="ADDRESS KTP" value="<?php echo $w->address_ktp ?>"><br>
										<input class="form-control" id="inputdefault" type="text" name="address_domisili" placeholder="ADDRESS DOMISILI" required value="<?php echo $w->address_domisili ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">STATUS RUMAH:</label>
										<select class="form-control" name="status_home"  >
											<option value="<?php echo $w->status_home ?>">
												<?php if ($w->status_home === '1') : ?>PRIBADI
												<?php elseif ($w->status_home === '2') : ?> SEWA
												<?php else : ?>
												<?php endif; ?>
											</option><hr>	
											<option value="1">PRIBADI</option>
											<option value="2">SEWA</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">STATUS MOVE:</label>
										<select class="form-control" name="status_move"  >
											<option value="<?php echo $w->status_move ?>">
												<?php if ($w->status_move === '0') : ?>PINDAH
												<?php elseif ($w->status_move === '1') : ?> MENETAP
												<?php else : ?>
												<?php endif; ?>
											</option><hr>	
											<option value="0">PINDAH</option>
											<option value="1">MENETAP</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">STATUS RETRIBUSI:</label>
										<select class="form-control" name="status_retribusi"  >
											<option value="<?php echo $w->status_retribusi ?>">
												<?php if ($w->status_retribusi === '0') : ?>TIDAK
												<?php elseif ($w->status_retribusi === '1') : ?> YA
												<?php else : ?>
												<?php endif; ?>
											</option><hr>	
											<option value="0">TIDAK</option>
											<option value="1">YA</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">CONTACT:</label>
										<input class="form-control" id="inputdefault" type="text" name="contact" placeholder="0812345678" value="<?php echo $w->contact ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">START LIVING:</label>
										<input class="form-control" id="inputdefault" type="date" name="start_living" value="<?php echo $w->start_living ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
										<label for="inputdefault">END LIVING:</label>
										<input class="form-control" id="inputdefault" type="date" name="end_living" value="<?php echo $w->end_living ?>">
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

