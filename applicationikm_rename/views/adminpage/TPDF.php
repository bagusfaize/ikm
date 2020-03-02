<body>
    <section id="header-map">      
    </section>

    <section>
      <div class="container">
        <?php echo form_open('adminpage/Profile/insertTPDF'); ?>
        <div class="row">
          <div class="col-lg-12 news-section mb-2">
            <h4 class="section-title">Tugas Pokok dan Fungsi</h4>	  
            <div class="adjoined-bottom" style="background: transparent !important;">
              <div class="grid-container">
                <textarea name="editor">
                  <div id="editor">
                    <?php echo $tupoksi; ?>
                  </div>
                </textarea>
              </div>
            </div>  
            
           </div>
           <div class="col-lg-2 news-section">
            <button style="width:100%;" type="submit" class="btn btn-info">Save</button>
          </div>
           <div class="col-lg-2 news-section">
            <?php echo anchor('adminpage/Profile/TPDF', '<button style="width:100%;" type="button" class="btn btn-info">Cancel</button>', 'class="card-title"'); ?>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    </section>
</html>
