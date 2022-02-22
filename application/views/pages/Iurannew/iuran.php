
<div class="container-fluid">
 
	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Iuran Masuk Bulan <?php echo date('F');?></h6>
					<a href="#" class="btn btn-primary btn-icon-split" style="float: right;" data-toggle="modal" data-target="#Finput" hidden="">
		                <span class="icon text-white-50">
		                  <i class="fas fa-flag"></i>
		                </span>
		                <span class="text">Add +</span>
		              </a>
            </div>		 
			 <div class="card-body">
              	<div class="table-responsive">		
				    <table class="display nowrap" id="dataTable2" width="100%" cellspacing="0">
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
								<td><?php echo substr_replace($in->name, '***', +3); echo substr($in->name,-1); ?></td>
								<td><?php echo substr_replace($in->address_domisili, '***', 3)  ?></td>
								<td><?php echo $in->pay_date ?></td>
								<td><?php echo  date('Y F', strtotime($in->pay_month_year)) ?></td>
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
								<td><?php echo $in->keterangan ?> | <?php echo $in->createDate ?></td>
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
					




<div class="container-fluid">
 
	<div class="card shadow mb-4">
            <div class="card-header py-3">
            	<p>TERIMA KASIH ATAS PARTISIPASI ANDA UNTUK MEMBAYAR IURAN WARGA TEPAT WAKTU 
        		<br> JIKA ADA PERTANYAAN BISA HUBUNGI RIJAL (08578-1289-232) 
        		<b><br>No REK Mandiri: 1220004327568 A/N : Irsyad Dehari 
        		<br> No REK BCA  8010215090 : A/N : Ahmad Rijal Adil</b>
        		</p>
            </div>
    </div>
</div>			

</div>






  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">

</div>

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
	</script>