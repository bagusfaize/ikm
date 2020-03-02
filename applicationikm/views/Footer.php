
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h3>Profil</h3>
            <?php echo anchor('TPDF', 'Tugas Pokok dan Fungsi') ?>
            <?php echo anchor('Pegawai', 'Pegawai') ?>
            <?php echo anchor('StrukturOrganisasi', 'Struktur Organisasi') ?>
          </div>
          <div class="col-md-3">
            <h3>Regulasi</h3>
            <?php foreach($RegulasiData as $row){ ?>
            <button type="button" class="btn footerModal nopadding" data-toggle="modal" data-target="#modalFooterRegulasi<?php echo $row['idx']; ?>"><?php echo $row['judul'].' '.$row['nomer']; ?></button>
          <?php } ?>
          </div>
          <div class="col-md-3">
            <h3>Pembinaan</h3>
            <?php foreach($PembinaanData as $row){ ?>
            <button type="button" class="btn footerModal nopadding" data-toggle="modal" data-target="#modalFooterPembinaan<?php echo $row['idx']; ?>"><?php echo $row['nama']; ?></button>
          <?php } ?>
          </div>
          <div class="col-md-3">
            <h3>Pengunjung</h3>
            <div class="mb-2">
              <span class="circle-red"></span> User Online: 20
            </div>
            <div><span class="circle-green"></span> Total Akses: 29.636</div>
          </div>
        </div>
      </div>
    <div class="copyright">
        <p class="mb-2">
            Dinas Perindustrian dan Perdagangan Provinsi Kepulauan Riau
        </p>
        <p>Copyright © 2017 Bidang Industri Kecil dan Menengah</p>
    </div>
    </footer>
    
  
<?php foreach($RegulasiData as $row){ ?>
<!-- Modal -->
<div class="modal fade" id="modalFooterRegulasi<?php echo $row['idx']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $row['judul'].' '.$row['nomer']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
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


  <!--Modal Pembinaan-->
<?php foreach($PembinaanData as $row){ ?>
<!-- Modal -->
<div class="modal fade" id="modalFooterPembinaan<?php echo $row['idx']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  

	<!--Bootstrap Script-->
	<script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/slick.min.js"></script>
  <!--<script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/jquery3-3-1.min.js"></script>-->
  <script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/bootstrap.min.js"></script>
    <script
      async
      src="https://platform.twitter.com/widgets.js"
      charset="utf-8"
    ></script>

    <script>
      $(document).ready(function() {
        $("#map").slick({
          dots: true,
          autoplay: true,
          autoplaySpeed: 5000
        });
        $(".slider-table").slick({
          dots: true,
          arrows: false,
          autoplay: true
        });
        $(".media-slider").slick({
          dots: true,
          autoplay: true
        });
      });
    </script>