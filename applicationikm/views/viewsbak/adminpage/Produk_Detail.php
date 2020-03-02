<body>
    <section id="header-map">
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="section-title">Detail Petugas</h4>
                    <?php echo form_open('adminpage/DP_Produk/update'); ?>
                        <div class="row">
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Nama Produk</label>
                                    <input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>" />
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-12">
                                <div class="form-group">
                                    <label for="usr">Kategori</label>
                                    <select class="form-control" id="CboKategori" name="CboKategori">
                                        <?php $sel=""; foreach ($kategoriProduk as $key => $value){ if($kategori == $key){ $sel="selected";} else{ $sel=""; }?>
                                            <option value="<?php echo $key; ?>" <?php echo $sel; ?>>
                                                <?php echo $value; ?>
                                            </option>
                                            <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Update</button>
                        <?php echo anchor('adminpage/DP_Produk', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
                        <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>

    </html>