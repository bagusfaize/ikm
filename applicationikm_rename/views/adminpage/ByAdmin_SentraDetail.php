<body onload="setUpAlamat()">
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/ByAdmin_Sentra/update'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Detail Sentra</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">IDX</label>
							<input type="hidden" class="form-control" id="defKec" name="defKec" value="<?php echo $sentrakec;?>"/>
							<input type="hidden" class="form-control" id="defDes" name="defDes" value="<?php echo $sentrades;?>"/>
							<input type="hidden" class="form-control" id="idxfile" name="idxfile" value="<?php echo $idxfile;?>"/>
							<input type="hidden" class="form-control" id="filecolumn" name="filecolumn" value="<?php echo $filecolumn;?>"/>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" readonly/>
							<input type="text" class="form-control" id="idxw" name="idxw" value="<?php echo $idx;?>" readonly/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" />
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Kategori Industri</label>
							<select class="form-control" id="cbokat_ind" name="cbokat_ind">								
								<?php $sel=""; foreach($cboKatind as $row){ if($row['kode'] == $kat_ind){ $sel ="selected"; }else{ $sel =""; } ?>
									<option value="<?php echo $row['kode']; ?>" <?php echo $sel; ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Komoditi / Produk</label>
							<input type="text" class="form-control" id="komoditi" name="komoditi" value="<?php echo $komoditi; ?>" />
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Contact Person</label>
							<input type="text" class="form-control" id="cp" name="cp" value="<?php echo $cp; ?>" />
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Telp/HP/Fax</label>
							<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp; ?>" />
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Kota / Kabupaten</label>
							<select class="form-control" id="cboKab" name="cboKab" onchange="update(this.value)">
								<?php $sel=""; foreach($cboKab as $row){ if($row['kdkab'] == $sentrakab){ $sel ="selected"; }else{ $sel =""; } ?>
								<option value="<?php echo $row['kdkab']; ?>" <?php echo $sel; ?> ><?php echo $row['kab']; ?></option>
								<?php } ?>
							</select>				
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Kecamatan</label>
							<select class="form-control" id="cboKec" name="cboKec" onchange="updateKel(this.value)">
								<option>Pilih Kecamatan</option>
							</select>				
							</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Desa / Kelurahan</label>
							<select class="form-control" id="cboKel" name="cboKel">
								<option>Pilih Kelurahan</option>
							</select>				
							</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Alamat</label>
							<input type="text" class="form-control" id="jl" name="jl" value="<?php echo $jl; ?>" />
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Jumlah Unit Usaha</label>
							<input type="text" class="form-control" id="jml" name="jml" value="<?php echo $jml; ?>" />
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Status</label>
							<select class="form-control" id="cbostatus_sentra" name="cbostatus_sentra">
								<?php foreach($cboStatusSentra as $row){?>
								<option value="<?php echo $row['kode']; ?>"><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Dasar Penetapan Sentra</label>
							<input type="text" class="form-control" id="dasar" name="dasar" value="<?php echo $dasar; ?>" />
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Kondisi Saat Ini</label>
							<textarea name="kondisi">
			                  <div id="kondisi"><?php echo $kondisi; ?>
			                  </div>
			                </textarea>
              			</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Kebutuhan Saat Ini</label>
							<textarea name="kebutuhan">
			                  <div id="kebutuhan"><?php echo $kebutuhan; ?>
			                  </div>
			                </textarea>
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Keterangan</label>
							<textarea name="keterangan"><?php echo $keterangan; ?>
			                  <div id="keterangan">
			                  </div>
			                </textarea>
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
		  	<?php echo anchor('adminpage/ByAdmin_Sentra', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
		</div>
        <?php echo form_close(); ?>
	</div>
</section>
</html>

<script type="text/javascript">
	function setUpAlamat(){
      strKab = document.getElementById("cboKab").value; 
      strKec = document.getElementById("defKec").value; 
      strKel = document.getElementById("defDes").value; 
      update(strKab, strKec);
      updateKel(strKec, strKel);
	}
   function update(str, defKec)
   {
      var xmlhttp;

      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      } 

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("cboKec").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET", "<?php echo base_url(); ?>adminpage/GlobalCont/Kabupaten/"+str+"/"+defKec, true);
      xmlhttp.send();
  }
   function updateKel(str, strKel)
   {
      var xmlhttp;

      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      } 

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("cboKel").innerHTML = xmlhttp.responseText;
        }
      }
      strKab = document.getElementById("cboKab").value;  
      xmlhttp.open("GET", "<?php echo base_url(); ?>adminpage/GlobalCont/Kecamatan/"+str+"/"+strKel, true);
      xmlhttp.send();
	} 
</script>
<script type="text/javascript">
  CKEDITOR.replace( 'kebutuhan' );
  CKEDITOR.add       
  CKEDITOR.replace( 'kondisi' );
  CKEDITOR.add     
  CKEDITOR.replace( 'keterangan' );
  CKEDITOR.add            
</script>