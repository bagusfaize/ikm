<body onload="setUpAlamat()">
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/DP_Narasumber_Intruktur/insert'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Narasumber/Instruktur</h4> 
				<div class="row">
				<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">User ID</label>
							<input type="text" class="form-control" id="idx" name="idx" value="<?php echo $Idx;?>"/>
							
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
						<label for="usr">Status</label>
							<select class="form-control" id="cboStatusNarasumber" name="cboStatusNarasumber">
								<?php $sel=""; foreach($cboStatusNarasumber as $row){?>
								<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
							</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">No Tlp/HP</label>
							<input type="text" class="form-control" id="telp" name="telp"/>
						</div>
					
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Intansi</label>
							<input type="text" class="form-control" id="Intansi" name="Intansi"/>
						</div>
					
					</div>
					
					<tr>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Foto</label>
                				<div class="smallFile">
							<input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
								</div>
						</div>
					</div> 	
					</tr>
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Update</button>
		  	<?php echo anchor('adminpage/DP_Narasumber_Intruktur', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
