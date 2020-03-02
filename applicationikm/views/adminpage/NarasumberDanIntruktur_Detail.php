<body>
    <section id="header-map">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title"> Pembinaan Peserta</h4>
                    <?php echo form_open_multipart('adminpage/DP_Narasumber_Intruktur/update'); ?>
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
									<select class="form-control" id="cboStatusNarasumber" name="cboStatusNarasumber">
									<?php $sel=""; foreach($cboStatusNarasumber as $row){ if($st_peserta == $row['kode']){ $sel = "selected"; }else{$sel="";}?>
									<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
									<?php } ?>
								
									</select>				
								</div>
							</div>
						
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">alamat</label>
                                    
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat_rumah;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">No Tlp/HP</label>
                                    
                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp_rumah;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Intansi</label>
                                    
                                    <input type="text" class="form-control" id="Intansi" name="Intansi" value="<?php echo $instansi;?>" />
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
                        <?php echo anchor('adminpage/DP_Narasumber_Intruktur', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>

    </html>
	
	