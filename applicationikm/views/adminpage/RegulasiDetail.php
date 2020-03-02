<body>
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/Regulasi/update'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Regulasi Detail</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">IDX</label>
							<input type="text" class="form-control" id="idxw" name="idxw" value="<?php echo $idx;?>" readonly/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Judul</label>
							<input type="hidden" class="form-control" id="file" name="file" value="<?php echo $file;?>"/>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>"/>
							<input type="hidden" class="form-control" id="foto" name="foto" value="<?php echo $foto;?>"/>
							<input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul;?>"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nomer</label>
							<input type="text" class="form-control" id="nomer" name="nomer" value="<?php echo $nomer;?>"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tentang</label>
							<input type="text" class="form-control" id="tentang" name="tentang" value="<?php echo $tentang;?>"/>
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tahun</label>
							<input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $tahun;?>"/>
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
                					<?php if($file != ""){ ?>
									<button type="button" class="btn btn-primary">
										<a href="<?php echo ASSET_PATH; ?><?php echo str_replace("../",'', $file); ?>" style="color:#ffffff;" target="_blank">Attachment</a>
									</button><br/><br/>
								<?php } ?>
									<input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
								</div>
						</div>
					</div> 	
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Update</button>
		  	<?php echo anchor('adminpage/Regulasi', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
