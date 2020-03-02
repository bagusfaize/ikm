<body onload="setUpAlamat()">
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/DP_Bantuan_Sertifikasi/insert'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Sertifikasi </h4> 
				<div class="row">
				<!--<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">ID</label>
							
						</div>
					</div>  -->
					
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $Idx;?>"/>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tahun Anggaran</label>
							<input type="text" class="form-control" id="th_anggaran" name="th_anggaran"/>
						</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Pemerintah</label>
							<select class="form-control" id="cboPemerintah" name="cboPemerintah">
								<?php $sel=""; foreach($cboPemerintah as $row){?>
								<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
							</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Bentuk Sertifikasi</label>
							<input type="text" class="form-control" id="Bentuk_Sertifikasi" name="Bentuk_Sertifikasi"/>
						</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Penyelenggara</label>
							<input type="text" class="form-control" id="Penyelenggara" name="Penyelenggara"/>
						</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nama Kegiatan</label>
							<input type="text" class="form-control" id="Nama_Kegiatan" name="Nama_Kegiatan"/>
						</div>
					</div>
					
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Jumlah Penerima</label>
							<input type="text" class="form-control" id="jml_Penerima" name="jml_Penerima"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tanggal Penyerahan</label>
							<input type="text" id="tgl_Penyerahan" name="tgl_Penyerahan" class="form-control datepicker" />
						</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Sertifikat</label>
							<input type="text" class="form-control" id="Sertifikat" name="Sertifikat"/>
						</div>
					</div>
					
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Sumber Dana</label>
							<select class="form-control" id="cboSumberDana" name="cboSumberDana">
								<?php $sel=""; foreach($cboSumberDana as $row){?>
								<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
							</div>
					</div>
					
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Detail</label>
							<input type="text" class="form-control" id="Detail" name="Detail"/>
						</div>
					</div>
					
					
					
					
					
					
					
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Update</button>
		  	<?php echo anchor('adminpage/DP_Bantuan_Sertifikasi', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>
