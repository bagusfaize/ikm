<body>
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/EmployeeList/insert'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Add New Employee</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">User ID</label>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idxmax; ?>" readonly/><input type="text" class="form-control" id="UsrID" name="UsrID"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Jabatan</label>
							<input type="text" class="form-control" id="jabatan" name="jabatan"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama"/>
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">NIP</label>
							<input type="text" class="form-control" id="nip" name="nip"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat"/>
						</div>
					</div>  
					<!--<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Petugas Pendataan</label>
							<select class="form-control" id="sel1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>				
							</div>
					</div>-->
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tanggal Lahir</label>
							<div class="input-group date">
								<input type="text" name="tgl" class="form-control datepicker">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Telepon</label>
							<input type="text" class="form-control" id="telp" name="telp"/>
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Email</label>
							<input type="text" class="form-control" id="email" name="email"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Pekerjaan</label>
							<input type="text" class="form-control" id="pekerjaan" name="pekerjaan"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Instansi</label>
							<input type="text" class="form-control" id="instansi" name="instansi"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Foto</label>
                				<div class="smallFile">
							<input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
								</div>
						</div>
					</div> 	
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Insert</button>
		  	<?php echo anchor('adminpage/EmployeeList', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
