<body>
    <section id="header-map">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title"> Pengembangan SDM Dan Promosi</h4>
                    <?php echo form_open_multipart('adminpage/DP_Bantuan_Sertifikasi/update'); ?>
					
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
                                    <label for="usr">Bentuk Sertifikasi</label>  
                                    <input type="text" class="form-control" id="bentuk" name="bentuk" value="<?php echo $bentuk;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Penyelenggara</label>  
                                    <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" value="<?php echo $penyelenggara;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Nama Kegiatan</label>  
                                    <input type="text" class="form-control" id="namaKegiatan" name="namaKegiatan" value="<?php echo $namaKegiatan;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Jumlah Penerima</label>  
                                    <input type="text" class="form-control" id="jumlahPenerima" name="jumlahPenerima" value="<?php echo $jumlahPenerima;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Tanggal Penyerahan</label>  
                                    <input type="text" class="form-control" id="tanggalPenyerahan" name="tanggalPenyerahan" value="<?php echo $tanggalPenyerahan;?>" />
                                </div>
                            </div>
							
							<div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Sertifikat</label>  
                                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi;?>" />
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
                                    <label for="usr">Detail</label>  
                                    <input type="text" class="form-control" id="Dtl" name="Dtl" value="<?php echo $Dtl;?>" />
                                </div>
                            </div>
													
					
                        </div>

                        <button type="submit" class="btn btn-secondary">Update</button>
                        <?php echo anchor('adminpage/DP_Bantuan_Sertifikasi', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>

    </html>
	
	