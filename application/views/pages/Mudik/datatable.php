
<div class="container-fluid">
       <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DAFTAR WARGA MUDIK <br> BLOK G RT 03/05 PERUMAHAN AMARAPURA</h6>

					<a href="#" class="btn btn-primary btn-icon-split" style="float: right;" data-toggle="modal" data-target="#Finput">
		                <span class="icon text-white-50">
		                  <i class="fas fa-flag"></i>
		                </span>
		                <span class="text">Add +</span>
		              </a> 
            </div>
            <div class="card-body">
              	<div class="table-responsive">
              		<?php if ( (in_array($this->session->userdata('level'), array(1,2))) ) { ?>  
	                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
	                 <thead>
										<tr>
											<th width="2%">NO</th>
											<th>NAME</th>
											<th>ADDRESS</th>
											<th>CONTACT</th>
											<th>PERGI</th>
											<th>KEMBALI</th>
											<th>TUJUAN</th>
											
											<th>ADA PENJAGA</th>
											<th>NAMA PENJAGA</th>
											<th>KONTAK PENJAGA </th>
											<th>NIK PENJAGA</th>

											<th width="10%">NOTE</th>
										</tr>
									 </thead>
									 	<tbody>
									 	    	<?php 
											$id = 1;
											foreach($mudik as $m){ 
											?>
											<tr>
												<td><?php echo $id++ ?></td>
												<td><?php echo $m->name?></td>
												<td><?php echo $m->address_domisili?></td>
												<td><?php echo $m->contact?></td>
												<td><?php echo $m->start?></td>
												<td><?php echo $m->finish?></td>
												<td><?php echo $m->tujuan?></td>
												
												<td><?php echo $m->penjaga?></td>
												<td><?php echo $m->penjaga_name?></td>
												<td><?php echo $m->penjaga_contact	?></td>
												<td><?php echo $m->penjaga_nik?></td>

												<td width="15%"><?php echo $m->keterangan?></td>
											</tr>
							<?php } ?>
							
							
						</tbody>
					</table>
					<?php } ?>

					<?php if ( (in_array($this->session->userdata('level'), array(3,''))) ) { ?>  
	                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
	                 <thead>
										<tr>
											<th width="2%">NO</th>
											<th>NAME</th>
											<th>ADDRESS</th>
											<th>CONTACT</th>
											<th>PERGI</th>
											<th>KEMBALI</th>
											<th>TUJUAN</th>
											
											<th>ADA PENJAGA</th>
											<th>NAMA PENJAGA</th>
											<th>KONTAK PENJAGA </th>
											<th>NIK PENJAGA</th>

											<th width="10%">NOTE</th>
										</tr>
									 </thead>
									 	<tbody>
									 	    	<?php 
											$id = 1;
											foreach($mudik as $m){ 
											?>
											<tr>
												<td><?php echo $id++ ?></td>
												<td><?php echo substr_replace($m->name, '***', +3); echo substr($m->name,-1); ?></td>
												<td><?php echo substr_replace($m->address_domisili, '***', 3)  ?></td>
												<td><?php echo substr_replace($m->contact , '***', 5) ?></td>
												<td><?php echo $m->start?></td>
												<td><?php echo $m->finish?></td>
												<td><?php echo $m->tujuan?></td>
												
												<td><?php echo substr_replace($m->penjaga, '***', 0)?></td>
												<td><?php echo substr_replace($m->penjaga_name, '***', 3)?></td>
												<td><?php echo substr_replace($m->penjaga_contact, '***', 3)	?></td>
												<td><?php echo substr_replace($m->penjaga_nik, '***', 3)?></td>

												<td width="15%"><?php echo substr_replace($m->keterangan, '***', 3)?></td>
											</tr>
							<?php } ?>
							
							
						</tbody>
					</table>
					<?php } ?>
			    </div>
			 </div>
	</div>


	<div class="modal fade" id="Finput" role="dialog">
		<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header ">	
				<h4 class="modal-title">DATA WARGA MUDIK</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo base_url().'index.php/mudik/p_input'; ?>" method="post">

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
								<label for="inputdefault">CONTACT: </label>
								<input class="form-control" id="contact" type="text" name="contact" required >
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">PERGI : </label>
								<input class="form-control" id="start" type="date" name="start" required  value="<?php echo date('Y-m-d')?>">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">KEMBALI : </label>
								<input class="form-control" id="finish" type="date" name="finish" required  value="<?php echo date('Y-m-d')?>">
							</div>
						</td>
					</tr>
						
					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">TUJUAN: </label>
								<input class="form-control" id="tujuan" type="text"  name="tujuan" required >
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">ADA PENJAGA: </label>
								<select class="form-control" aria-label="Default select example" required name="penjaga">
								  <option value="">PILIH</option>
								  <option value="YA">YA</option>
								  <option value="TIDAK">TIDAK</option>
								</select>
							</div>
						</td>
					</tr>
					
					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">NAMA PENJAGA: </label>
								<input class="form-control" id="penjaga_name" type="text"  name="penjaga_name"  >
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">KONTAK PENJAGA: </label>
								<input class="form-control" id="penjaga_contact" type="text"  name="penjaga_contact"  >
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">NIK PENJAGA: </label>
								<input class="form-control" id="penjaga_nik" type="text"  name="penjaga_nik"  >
							</div>
						</td>
					</tr>

					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">NOTE: </label>
								<textarea class="form-control" id="keterangan" type="text" name="keterangan" ></textarea>
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

			



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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



$(document).ready(function() {
    $('#dataTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


swal("Terima Kasih!", "Data Anda Sudah Masuk!", "success");
	</script>