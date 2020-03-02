<body>
    <section id="header-map">      
    </section>

    <section>
      <div class="container">
        <?php echo form_open_multipart('adminpage/Profile/insertStrukturOrg'); ?>
        <div class="row">
          <div class="col-lg-12 news-section">
            <h4 class="section-title">Struktur Organisasi</h4>
            <div class="col-md-12 mb-12 nopadding">
              <div class="form-group">
                <div class="mediumFile">
                  <input type="hidden" class="form-control" id="filecolumn" name="filecolumn" value="<?php echo $image;?>"/>
                  <input type="hidden" class="form-control" id="idx" name="idx" value="<?php echo $idx;?>"/>
                  <img src="<?php echo ASSET_PATH; ?><?php echo str_replace("../",'', $image); ?>" alt=""/><br/><br/>
                  <input type="file" class="form-control <?php echo form_error('image') ? 'is-invalid':'' ?>" name="fileimage" />
                </div>
              </div>
            </div>  
            <button type="submit" class="btn btn-secondary">Save</button>
        <?php echo anchor('adminpage/Profile/StrukturOrg', '<button type="button" class="btn btn-secondary">Cancel</button>') ?>
			   </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </section>
</html>
