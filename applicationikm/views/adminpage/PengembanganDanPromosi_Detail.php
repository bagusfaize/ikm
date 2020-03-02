<body>
    <section id="header-map">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title"> Pengembangan SDM Dan Promosi</h4>
                    <?php echo form_open_multipart('adminpage/DP_PengembanganDanPromosi/update'); ?>
					<!--<?php echo "<pre>";print_r($row['kdkab']); echo "</pre>"; ?> -->
					 <!--<td><?php echo $cboKab["Kec"];?></td>-->
                        <div class="row">
						
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Tahun Anggaran</label>
									<input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" />
                                    <input type="text" class="form-control" id="th_anggaran" name="th_anggaran" value="<?php echo $th_anggaran;?>" />
                                </div>
                            </div>
						
							<div class="col-md-12 mb-12">
								
									<div class="form-group">
									 <label for="usr">Pemerintah</label> 
									<select class="form-control" id="cboPemerintah" name="cboPemerintah">
									<?php $sel=""; foreach($cboPemerintah as $row){ if($st_peserta == $row['kode']){ $sel = "selected"; }else{$sel="";}?>
									<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
									<?php } ?>
								
									</select>					
								</div>
							</div>
		
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Nama Pembinaan</label>  
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Tanggal Mulai</label>  
                                    <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?php echo $tgl_mulai;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Tanggal Selesai</label>  
                                    <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?php echo $tgl_selesai;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Jumlah Peserta</label>  
                                    <input type="text" class="form-control" id="jml_binaan" name="jml_binaan" value="<?php echo $jml_binaan;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Lokasi</label>  
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $lokasi;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
								
									<div class="form-group">
									 <label for="usr">Sumber Dana</label> 
									<select class="form-control" id="cboSumberDana" name="cboSumberDana">
									<?php $sel=""; foreach($cboSumberDana as $row){ if($st_peserta == $row['kode']){ $sel = "selected"; }else{$sel="";}?>
									<option value="<?php echo $row['kode']; ?>"<?php echo $sel ?>><?php echo $row['arti']; ?></option>
									<?php } ?>
								
									</select>					
								</div>
							</div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">penyelenggara</label>  
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="<?php echo $penyelenggara;?>" />
                                </div>
                            </div>
													
					
                        </div>

                        <button type="submit" class="btn btn-secondary">Update</button>
                        <?php echo anchor('adminpage/DP_PengembanganDanPromosi', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>

    </html>
	
	