<body>

<section id="header-map">
  <div id="map">
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8 news-section">
        <h4 class="section-title">Tugas Pokok dan Fungsi</h4>
        <div class="row">
          <div class="col-md-6 mb-4 tpdf"><?php echo $TPDF; ?></div>
          <div class="col-md-12 mt-4">
            <h4 class="section-title">foto dan video</h4>
            <div class="media-slider">
              <?php foreach($FotoNVideo as $key =>$row){ ?>
                <?php if($key==0){$ac = "active"; }else{$ac = "";}  if($row['file'] != ""){ ?>
                      <img src="<?php echo ASSET_PATH; ?>/assets/<?php echo $row['file']; ?>" alt=""/>
                <?php }else if($row['video'] != ""){ ?>
                    <div class="video-container">
                    <iframe width="640" height="390" type="text/html"
                      class="video"
                      src="<?php echo str_replace("watch?v=", "embed/", $row['video']); ?>"
                      frameborder="0"
                      allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen
                    ></iframe>
                    </div>
                <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 table-ikm">
        <div class="sidebar-title twitter-section">
          <h4 class="section-title">twitter</h4>
          <a class="twitter-timeline"
            href="https://twitter.com/IKM_Kepriprov?ref_src=twsrc%5Etfw"
            data-tweet-limit="2"
          >Tweets by IKM_Kepriprov</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="partner">
  <div class="container">
    <?php foreach($SponsorshipLink as $row){ ?>
    <a href="<?php echo $row['alamat']; ?>"><img src="<?php echo ASSET_PATH; ?>/assets/<?php echo $row['file']; ?>" alt=""/></a>
    <?php } ?>
  </div>
</section>
</body>
</html>