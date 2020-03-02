<body>
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/Berita/insert'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Add Berita</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Judul</label>
							<input type="text" class="form-control" id="judul" name="judul"/>
						</div>
					</div> 		
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Berita</label>				
								<div class="adjoined-bottom" style="background: transparent !important;">
								  <div class="grid-container">
									<textarea name="editor">
									  <div id="editor">
									  </div>
									</textarea>
								</div>  								
							</div>
						</div>
					</div> 	
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Lokasi</label>
							<input type="text" class="form-control" id="lokasi" name="lokasi"/>
						</div>
					</div> 		
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Penulis</label>
							<input type="text" class="form-control" id="penulis" name="penulis"/>
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
		  	<?php echo anchor('adminpage/Berita', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
