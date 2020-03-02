<body>

<section id="header-map">
  <div id="map">
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 news-section">
        <h4 class="section-title">Data Sentra</h4>  
        <?php echo form_open('DataSentra/search'); ?>
        <div class="row">
          <div class="col-md-3">
            <select name="kt_industri" class="form-control mb-4" onchange="update(this.value)">
              <option value="0">Pilih Kategori Industri</option>
              <?php foreach($CboKategoriIndustri as $row){ ?>
                <option value="<?php echo $row['kode']; ?>"><?php echo $row['arti']; ?></option>
              <?php } ?>
            </select>
          </div> 
          <div class="col-md-3">
            <select name="kt_kab" id="kt_kab" class="form-control mb-4">
              <option value="0">Pilih Kota / Kabupaten</option>
            </select>
          </div> 
          <div class="col-md-2">
            <button style="width:100%;" type="submit" class="btn btn-info">Search</button>
          </div> 
        </div>
        <?php echo form_close(); ?>
      </div>      
    </div>
    <div class="row">
      <div class="col-md-12 news-section">
        <h4 class="section-title">Detail Sentra</h4>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="table-responsive" >
            <table class="table">
              <thead class="thead-dark">
                <tr align="center">
                  <th>No</th>
                  <th>Nama Sentra</th>
                  <th>Kabupaten / Kota</th>
                  <th>Kecamatan</th>
                  <th>Desa / Kelurahan</th>
                  <th>Alamat</th>
                  <th>Kontak Person</th>
                  <th>Kategori Industri</th>
                  <th>Komoditi / Produk</th>
                  <th>Jumlah /unit Usaha</th>
                  <th>Status</th>
                  <th>Detail</th>
                </tr>
                <?php foreach($dataSentra as $row){ 
                    if($row['status_sentra'] == 1){ $status_sentra = "Formal"; }
                    if($row['status_sentra'] == 2){ $status_sentra = "Non Formal"; }
                  ?>
                <tr>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['nama']; ?></td>
                  <td><?php echo $row['kab']; ?></td>
                  <td><?php echo $row['kec']; ?></td>
                  <td><?php echo $row['des']; ?></td>
                  <td><?php echo $row['jl']; ?></td>
                  <td><?php echo $row['telp']; ?></td>
                  <td><?php echo $row['arti']; ?></td>
                  <td><?php echo $row['komoditi']; ?></td>
                  <td><?php echo $row['jml']; ?></td>
                  <td><?php echo $status_sentra; ?></td>
                  <td><button type="button" data-toggle="modal" data-target="#modalDataSentra<?php echo $row['idx']; ?>" class="btn btn-info"><span class="fa fa-eye"></span></button></td>
                </tr>
              <?php } ?>
              </thead>
            </table>
          </div>
          </div> 
        </div>
      </div>      
    </div>
  </div>
</section>
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

<!-- Modal -->
<?php foreach($dataSentra as $row){ ?>
<div class="modal fade" id="modalDataSentra<?php echo $row['idx']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['nama']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table style="width:100%;">
        <tr>
          <td colspan="4">Nama</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['nama']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Contact Person</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['cp']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Telepon</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['telp']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Email</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Kondisi</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['kondisi']; ?></td>
        </tr>
        <tr>
          <td colspan="4">Kebutuhan</td>
          <td>:</td>
          <td colspan="9"><?php echo $row['kebutuhan']; ?></td>
        </tr>
        </tr>
            <td colspan="4">Keterangan</td>
            <td>:</td>
            <td colspan="9"><?php echo $row['keterangan']; ?></td>
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
</body>
</html>
<script type="text/javascript">
   function update(str)
   {
      var xmlhttp;

      if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      }
      else
      {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      } 

      xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
          document.getElementById("kt_kab").innerHTML = xmlhttp.responseText;
        }
      }

      xmlhttp.open("GET", "<?php echo base_url(); ?>DataSentra/filterIndustri/"+str, true);
      xmlhttp.send();
  }
</script>