<body onload="setUpAlamat()">
<section id="header-map">      
</section>

<section>
	<div class="container">
		<div class="row">   
        <?php echo form_open_multipart('adminpage/PotensiBahanBaku/insert'); ?>
			<div class="col-lg-12">
			<h4 class="section-title">Add Potensi Bahan Baku</h4> 
				<div class="row">
					<div class="col-md-12 mb-12">
						<div class="form-group">
						<label for="usr">Kategori Industri</label>
							<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" readonly/>
							<select class="form-control" id="cbokatbah" name="cbokatbah">								
								<?php $sel=""; foreach($cboKatbah as $row){ ?>
									<option value="<?php echo $row['kode']; ?>" <?php echo $sel; ?>><?php echo $row['arti']; ?></option>
								<?php } ?>
							</select>				
						</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Nama Bahan</label>
							<input type="text" class="form-control" id="nama" name="nama" />
						</div>
					</div> 
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Kota / Kabupaten</label>
							<select class="form-control" id="cboKab" name="cboKab" onchange="update(this.value)">
								<?php $sel=""; foreach($cboKab as $row){ ?>
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
						<label for="usr"> Kelurahan</label>
							<select class="form-control" id="cboKel" name="cboKel">
								<option>Pilih Kelurahan</option>
							</select>				
							</div>
					</div>
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Jalan</label>
							<input type="text" class="form-control" id="jl" name="jl"/>
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Latitude</label>
							<input type="text" class="form-control" id="lat" name="lat"/>
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Longitude</label>
							<input type="text" class="form-control" id="lon" name="lon"/>
						</div>
					</div>   
					<div class="col-md-12 mb-12">
						<div class="form-group">
							<label for="usr">Luas Area</label>
							<input type="text" class="form-control" id="jml" name="luas"/>
						</div>
					</div>   
					<div class="col-md-8 mb-8">
						<div class="form-group">
							<label for="usr">Jumlah Komoditas</label>
							<input type="text" class="form-control" id="jml" name="jml"/>
						</div>
					</div>  					
					<div class="col-md-4 mb-4">
						<div class="form-group">
						<label for="usr">&nbsp;</label>
							<select class="form-control" id="satjml" name="satjml">								
								<?php $sel=""; foreach($cboKatind as $row){ ?>
									<option value="<?php echo $row['kode']; ?>" <?php echo $sel; ?>><?php echo $row['arti']; ?></option>
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
		  	<?php echo anchor('adminpage/PotensiBahanBaku', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
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