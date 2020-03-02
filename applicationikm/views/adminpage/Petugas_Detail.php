<body onload="setUpAlamat()">
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/DP_Petugas/update'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Detail Petugas</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">User ID</label>
							<input type="hidden" class="form-control" id="filecolumn" name="filecolumn" value="<?php echo $File;?>"/>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $Idx;?>"/>
							<input type="hidden" class="form-control" id="defKab" name="defKab" value="<?php echo $Kab;?>"/>
							<input type="hidden" class="form-control" id="defKec" name="defKec" value="<?php echo $Kec;?>"/>
							<input type="hidden" class="form-control" id="defDes" name="defDes" value="<?php echo $Des;?>"/>
							<input type="hidden" class="form-control" id="foto" name="foto" value="<?php echo $Foto;?>"/>
							<input type="text" class="form-control" id="UsrID" name="UsrID" value="<?php echo $EmployeeDetailID;?>" readonly/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Petugas Pendataan</label>
							<select class="form-control" id="cboPetugasPendataan" name="cboPetugasPendataan">
								<?php $sel=""; foreach($cboPetugasPendataan as $row){ if($Wilayah == $row['kode']){ $sel = "selected"; }else{$sel="";}?>
								<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
							</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $Nama;?>"/>
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tempat Lahir</label>
							<input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $tempat;?>"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Tanggal Lahir</label>
							<div class="input-group date">
								<input type="text" name="tgl" class="form-control datepicker" value="<?php echo $Tgl;?>">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Jenis Kelamin</label>
							<select class="form-control" id="jk" name="cboJk">
								<?php $sel = ""; $sel2 = ""; if($Jk == 1){ $sel ="selected";}else{ $sel2 ="selected"; } ?>
								<option value="1" <?php echo $sel; echo $sel; ?> >Laki - Laki</option>
								<option value="2" <?php echo $sel; echo $sel2; ?> >Perempuan</option>
							</select>				
							</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Telepon</label>
							<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $Telp; ?>"/>
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?php echo $Email; ?>"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Pekerjaan</label>
							<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $Pekerjaan; ?>"/>
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Instansi</label>
							<input type="text" class="form-control" id="instansi" name="instansi" value="<?php echo $Instansi; ?>"/>
						</div>
					</div>  
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Kota / Kabupaten</label>
							<select class="form-control" id="cboKab" name="cboKab" onchange="update(this.value)">
								<?php $sel=""; foreach($cboKab as $row){ if($Kab == $row['kdkab']){ $sel="selected"; }else{$sel="";}?>
								<option value="<?php echo $row['kdkab']; ?>" <?php echo $sel; ?>><?php echo $row['kab']; ?></option>
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
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $Alamat;?>"/>
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Foto</label>
                				<div class="smallFile">
									<img src="<?php echo ASSET_PATH; ?><?php echo str_replace("../",'', $File); ?>" alt=""/>
							<input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
								</div>
						</div>
					</div> 	
		  	</div>	
		  	<button type="submit" class="btn btn-secondary">Update</button>
		  	<?php echo anchor('adminpage/DP_Petugas', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
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
