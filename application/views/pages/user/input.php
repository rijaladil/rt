<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Master User</h6></div>
			<hr>
			<form action="<?php echo base_url(). 'index.php/user/p_input'; ?>" method="post">
				<table width="100%">
					<tr>
						<td>
							<div class="form-group">
							  <label for="inputdefault">Name:</label>
							  <input type="text" class="form-control" id="usr" name="name" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label for="inputdefault">Email:</label>
								<input class="form-control" rows="5" id="inputdefault" type="email"name="email" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group ">
								<label for="inputdefault">Contact:</label>
								<input class="form-control" id="inputdefault" type="text" name="contact">
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group ">
								<label for="inputdefault">Warga:</label>
								<select class="form-control"  id="warga_id"  name="warga_id" style="width:100%" required>
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
							<div class="form-group ">
								<label for="inputdefault">User Level:</label>
								<select class="form-control" name="user_level">
									<option value="1">Administrator</option>
									<option value="2">Pengurus</option>
									<option value="3">Warga</option>
								</select>								
							</div>
						</td>
					</tr>


					
					
					<tr>
						<td><input type="submit" class="btn btn-info" value="Input"></td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
</div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>