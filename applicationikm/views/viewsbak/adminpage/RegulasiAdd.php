<body>
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/Regulasi/insert'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Regulasi Detail</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">IDX</label>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" readonly/>
							<input type="text" class="form-control" id="idxw" name="idxw" value="<?php echo $idx;?>" readonly/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Judul</label>
							<input type="text" class="form-control" id="judul" name="judul"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nomer</label>
							<input type="text" class="form-control" id="nomer" name="nomer"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tentang</label>
							<input type="text" class="form-control" id="tentang" name="tentang"/>
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tahun</label>
							<input type="text" class="form-control" id="tahun" name="tahun"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Jenis</label>
							<select class="form-control" id="sel1" name="kodeJenis">								
								<?php foreach($kdjenis as $row){ ?>
									<?php $slt=""; if($kodeJenis == $row['kode']){ $slt = "selected"; }?>
									<option value="<?php echo $row['kode']; ?>" <?php echo $slt; ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
							</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">File</label>
                				<div class="smallFile">
									<input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
								</div>
						</div>
					</div> 	
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Save</button>
		  	<?php echo anchor('adminpage/Regulasi', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
