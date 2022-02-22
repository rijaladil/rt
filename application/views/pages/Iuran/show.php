
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<?php  foreach($warga as $w){ 
				if($w->id == $id) {?>
			<div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">ID : <?php echo $id; ?>  - PIUTANG RT 003 KE  <?php  ;echo $w->name;?> : <?php echo $w->address_domisili;?>    </h6></div>
			<?php } } ?>
			<hr>
			 <div class="card-body">
              	<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="2%">NO</th>
							<th>PAY MONTH YEAR</th>
							<th>AMONTH</th>
						</tr>
					</thead>
					
					<tbody>
					<?php $total = 0; $i=1; foreach($show as $sw){ ?>
						<tr>
							<td><b><?php echo $i++; ?></b>.</td>
							<td><?php echo  date('Y F', strtotime($sw->pay_month_year)) ?></td>
							<td><?php echo number_format($sw->amonth ,0,',','.'); ?>										
							</td>
						</tr>
						<?php $total = $total + $sw->amonth; ?>
					</tbody>
					
					<?php } ?>
					<tfoot>
						<tr>
							<th></th>
							<th>TOTAL</th>
							<th><?php  echo  number_format($total ,0,',','.');?></th>
						</tr>
					</tfoot>
					
				
				</table>
				</div>
			</div>
<!-- showl all data  -->
 			<div class="card-body">
              	<div class="table-responsive"> LAST PAY
				<table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="2%">NO</th>
							<th>PAY DATE</th>
							<th>PAY MONTH YEAR</th>
							<th>AMONTH</th>
						</tr>
					</thead>
					
					<tbody>
					<?php $totalx = 0; $x=1; foreach($show_last_pay as $swlp){ ?>
						<tr>
							<td><b><?php echo $x++; ?></b>.</td>
							<td><?php echo $swlp->pay_date ?></td>
							<td><?php echo  date('Y F', strtotime($swlp->pay_month_year)) ?></td>
							<td><?php echo number_format($swlp->nominal ,0,',','.'); ?>										
							</td>
						</tr>
						<?php $totalx = $totalx + $swlp->nominal; ?>
					</tbody>
					
					<?php } ?>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th>TOTAL</th>
							<th><?php  echo  number_format($totalx ,0,',','.');?></th>
						</tr>
					</tfoot>
					
				
				</table>
				</div>
			</div>


			
			
		</div>
	</div>
</div>