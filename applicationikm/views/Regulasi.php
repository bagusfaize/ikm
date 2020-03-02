<body>

<section id="header-map">
  <div id="map">
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 news-section">
        <h4 class="section-title">Regulasi</h4>
        <div class="row" style="padding: 10px;">
          <?php foreach($RegulasiData as $row){ ?>
          <div class="col-md-12 m-2 card p-3">
            <h6><b><?php echo $row['judul'].' '.$row['nomer']; ?></b></h6> 
            <p style="font-size:14px;"><?php echo $row['tentang']; ?></p>
            <br/>
            <div class="col-md-3 nopadding"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRegulasi<?php echo $row['idx']; ?>">Detail</button></div>
          </div> 
        <?php } ?>
        </div>
      </div>      
    </div>
  </div>
</section>


<?php foreach($RegulasiData as $row){ ?>
<!-- Modal -->
<div class="modal fade" id="modalRegulasi<?php echo $row['idx']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['judul'].' '.$row['nomer']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width:100%;">
        <tr>
          <td colspan="4">Jenis Peraturan</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['artijenis']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Judul Peraturan</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['judul']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Nomer</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['nomer']; ?></td>
        </tr>
        </tr>
            <td colspan="4">Tentang</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['tentang']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Tahun</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['tahun']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Status</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['artistatus']; ?></td>
        </tr>      
        <tr>
            <td colspan="4">Download</td>
            <td>:</td>
            <td colspan="9"><?php echo anchor(ASSET_PATH.'/assets/'.$row['file'], $row['namaFile'], array('target' => '_blank')); ?></td>
        </tr>        
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<section class="partner">
  <div class="container">
    <a href="https://www.kemendag.go.id"><img
        src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Logo_of_the_Ministry_of_Trade_of_the_Republic_of_Indonesia.jpg/562px-Logo_of_the_Ministry_of_Trade_of_the_Republic_of_Indonesia.jpg"
        alt=""/></a>
    <a href="https://www.kemenperin.go.id"><img
        src="http://semnas.baristandsamarinda.kemenperin.go.id/public/journals/1/pageHeaderLogoImage_id_ID.png"
        alt=""/></a>
    <a href="https://www.kepri.bps.go.id"><img src="bps-logo.png" alt=""/></a>
  </div>
</section>

</body>
</html>
