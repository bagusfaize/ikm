<body>
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/BeritaFoto/update'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Detail Berita</h4> 
				<div class="row">
					<!--<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">IDX</label>-->
							<input type="hidden" class="form-control" id="idxfile" name="idxfile" value="<?php echo $idxfile;?>"/>
							<input type="hidden" class="form-control" id="filecolumn" name="filecolumn" value="<?php echo $filecolumn;?>"/>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" readonly/>
							<!--<input type="text" class="form-control" id="idxw" name="idxw" value="<?php //echo $idx;?>" readonly/>
						</div>
					</div> -->
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Judul</label>
							<input type="text" class="form-control" id="judul" name="judul" value="<?php echo $judul; ?>" />
						</div>
					</div> 		
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Berita</label>				
								<div class="adjoined-bottom" style="background: transparent !important;">
								  <div class="grid-container">
									<textarea name="editor">
									  <div id="editor">
										<?php echo $uraian; ?>
									  </div>
									</textarea>
								</div>  								
							</div>
						</div>
					</div> 	
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Lokasi</label>
							<input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>" />
						</div>
					</div> 		 		
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">File</label>
                				<div class="smallFile">
									<img src="<?php echo ASSET_PATH; ?><?php echo str_replace("../",'', $filecolumn); ?>" alt=""/>
									<input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
								</div>
						</div>
					</div> 	
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Save</button>
		  	<?php echo anchor('adminpage/BeritaFoto', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
