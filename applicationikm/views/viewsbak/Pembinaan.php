<body>

<section id="header-map">
  <div id="map">
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 news-section">
        <?php echo form_open('pembinaan/search'); ?>
        <h4 class="section-title">Pembinaan</h4>
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Tahun</label>
              <select class="form-control" name="CboTahun">
                <option value=" "> </option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Bentuk Pembinaan</label>
              <select class="form-control" name="CboBentukPembinaan">
                <option value=" "></option>
                <?php foreach ($CboBentukPembinaan as $row) { ?>
                  <option value="<?php echo $row['kode']; ?>"><?php echo $row['arti']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Pemerintahan</label>
              <select class="form-control" id="exampleFormControlSelect1" name="CboPemerintahan">
                <option value=" "></option>
                <?php foreach ($CboPemerintahan as $row) { ?>
                  <option value="<?php echo $row['kode']; ?>"><?php echo $row['arti']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Search By Name</label>
               <input type="text" class="form-control" name="TxtName">
            </div>
          </div>
          <div class="col-md-1 nopadding">
            <div class="form-group">
              <label for="exampleFormControlSelect1"> &nbsp; &nbsp; &nbsp; &nbsp;</label>
              <button type="submit" class="btn btn-success">Success</button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 news-section">
        <div class="row" style="padding: 10px;">
          <?php foreach($PembinaanData as $row){ ?>
          <div class="col-md-12 mb-2 card" style="padding: 10px;">
            <h5><?php echo $row['nama']; ?></h5> 
            <div class="row" style="font-size: 15px;padding-bottom: 0px;">
              <div class="col-md-2 col-sm-4 col-xs-4">Penyelenggara </div><div class="col-md-9 col-sm-8 col-xs-8">: <?php echo $row['penyelenggara']; ?></div>
              <div class="col-md-2 col-sm-4 col-xs-4">Lokasi  </div><div class="col-md-9 col-sm-8 col-xs-8">: <?php echo $row['lokasi']; ?></div>
              <div class="col-md-2 col-sm-4 col-xs-4">Tahun </div><div class="col-md-9 col-sm-8 col-xs-8">: <?php echo $row['th_anggaran']; ?></div>
            </div><br/>
            <div class="col-md-3 nopadding"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalPembinaan<?php echo $row['idx']; ?>">Detail</button></div>
          </div> 
        <?php } ?>
        </div>
      </div>  
      <?php if($nextLoad != 0){ ?>
      <div class="col-md-12 mb-4">
        <?php echo anchor('Pembinaan/LoadMore/'.$nextLoad, '<button style="width:100%;" type="button" class="btn btn-info">Load More</button>', 'class="card-title"'); ?>
      </div>    
    <?php } ?>
    </div>
  </div>
</section>

<?php foreach($PembinaanData as $row){ ?>
<!-- Modal -->
<div class="modal fade" id="modalPembinaan<?php echo $row['idx']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nama']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
          <tr>
            <td colspan="4">Tahun Anggaran</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['th_anggaran']; ?></td>
          </tr>
          <tr>
            <td colspan="4">Pemerintahan</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['arti']; ?></td>
          </tr>
          <tr>
            <td colspan="4">Bentuk Pengembangan SDM dan Promosi</td>
            <td>:</td>
            <td colspan="9">Empty</td>
          </tr>
        </tr>
            <td colspan="4">Nama Pembinaan</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['nama']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Jumlah Binaan</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['jml_binaan']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Lokasi</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['lokasi']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Tanggal Mulai</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['tgl_mulai']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Tanggal Selesai</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['tgl_selesai']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Penyelenggara</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['penyelenggara']; ?></td>
        </tr>
        <tr>
            <td colspan="4">Materi</td>
            <td>:</td>
            <td colspan="9">Empty</td>
        </tr>
        <tr>
            <td colspan="4">Narasumber / Instruktur</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['namaNarasumber']; ?></td>
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
