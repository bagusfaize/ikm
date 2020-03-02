<body>
    <section id="header-map">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title">Detail Pembinaan Peserta</h4>
                    <?php echo form_open_multipart('adminpage/DP_Peserta_Binaan/update'); ?>
					<!--<?php echo "<pre>";print_r($row['kdkab']); echo "</pre>"; ?> -->
					 <!--<td><?php echo $cboKab["Kec"];?></td>-->
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Nama</label>
                                    <input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" />
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" />
									<input type="hidden" class="form-control" id="defKab" name="defKab" value="<?php echo $Kab;?>"/>
									<input type="hidden" class="form-control" id="defKec" name="defKec" value="<?php echo $Kec;?>"/>
									<input type="hidden" class="form-control" id="defDes" name="defDes" value="<?php echo $Des;?>"/>
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
								<div class="form-group">
									<label for="usr">Status</label>
									<select class="form-control" id="cboStatusPeserta" name="cboStatusPeserta">
									<?php $sel=""; foreach($cboStatusPeserta as $row){ if($st_peserta == $row['kode']){ $sel = "selected"; }else{$sel="";}?>
									<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
									<?php } ?>
								
									</select>				
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
                                    <label for="usr">Jalan</label>
                                    
                                    <input type="text" class="form-control" id="jl" name="jl" value="<?php echo $jl_p;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">No Tlp/HP</label>
                                    
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
								<div class="form-group">
									<label for="usr">Pembinaan Peserta</label>
									<select class="form-control" id="cboPembinaan" name="cboPembinaan">
									<?php $sel=""; foreach($cboPembinaan as $row){ if($idpembinaan == $row['idpembinaan']){ $sel = "selected"; }else{$sel="";}?>
									<option value="<?php echo $row['idpembinaan']; ?>"<?php echo $sel ?>><?php echo $row['nama_pembinaan']; ?></option>
									<?php } ?>
								
									</select>				
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
                        <?php echo anchor('adminpage/DP_Peserta_Binaan', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
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