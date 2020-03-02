<body>
    <section id="header-map">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title">Tambah Kota / Negara</h4>
                    <?php echo form_open('adminpage/DP_Kota/update'); ?>
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Nama Kota/Negara</label>
                                    <input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" />
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Tujuan/Asal</label>
                                    <select class="form-control" id="CboKategori" name="CboKategori">
                                        <?php $sel=""; foreach ($kategoriProduk as $key => $value){ if($tujuan == $key){ $sel="selected";} else{ $sel=""; }?>
                                            <option value="<?php echo $key; ?>" <?php echo $sel; ?>>
                                                <?php echo $value; ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Update</button>
                        <?php echo anchor('adminpage/DP_Kota', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>

    </html>