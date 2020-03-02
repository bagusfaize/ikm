  <body>

    <section id="header-map">
      <div id="map">
        <div>
          <img src="<?php echo ASSET_PATH; ?>frontend/images/map.png" alt="" />
          <h3>IKM Kepulauan Riau</h3>
        </div>
        <div>
          <img src="<?php echo ASSET_PATH; ?>frontend/images/map.png" alt="" />
          <h3>IKM Pangan</h3>
        </div>
        <div>
          <img src="<?php echo ASSET_PATH; ?>frontend/images/map.png" alt="" />
          <h3>IKM Sandang</h3>
        </div>
        <div>
          <img src="<?php echo ASSET_PATH; ?>frontend/images/map.png" alt="" />
          <h3>IKM Barang dan Furnitur</h3>
        </div>
        <div>
          <img src="<?php echo ASSET_PATH; ?>frontend/images/map.png" alt="" />
          <h3>IKM Aneka Kerajinan</h3>
        </div>
        <div>
          <img src="<?php echo ASSET_PATH; ?>frontend/images/map.png" alt="" />
          <h3>IKM Logam,Mesin,Elektronik,dan Alat Angkut</h3>
        </div>
      </div>
      <div class="map-legend">
        <span class="legend blue">Industri Pangan</span>
        <span class="legend green">Industri Sandang</span>
        <span class="legend yellow"
          >Industri Barang dari Kayu dan Furnitur</span
        >
        <span class="legend red">Aneka Kerajinan</span>
        <span class="legend pink"
          >Industri Logam, Mesin, Elektronika dan Alat Angkut</span
        >
        <span class="legend orange">Industri Kimia dan Bahan Bangunan</span>
        <span class="legend black">Aneka Industri</span>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 news-section">
            <h4 class="section-title">berita terbaru</h4>
            <div class="row"><?php
              foreach ($NewsData as $row)
              { ?>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <img
                    src="https://ikm-disperindag.kepriprov.go.id/uploads/20190815-092424.jpeg"
                    alt=""
                  />
                  <div class="p-3">
                    <a href="#" class="card-title"
                      ><?php echo anchor('Berita/DetailBerita/'.$row['idx'], $row['judul'], 'class="card-title"'); ?></a
                    >
                    <div>
                      <i class="fa fa-user-circle-o"></i
                      ><span class="mr-3 ml-1"><b>IKM@News</b></span>
                      <i class="fa fa-calendar"></i
                      ><span class="mr-3 ml-1"
                        ><?php echo $row['hari']; ?>, <?php echo $row['tanggal']; ?> <?php 
                          $monthNum  = $row['bulan'];
                          $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                          $monthName = $dateObj->format('F'); // March
                          echo $monthName; ?>
                        <?php echo $row['tahun']; ?> <?php echo $row['jam']; ?></span
                      >
                    </div>
                    <p><?php 
                            $uraian = strip_tags($row['uraian']);
                            if (strlen($uraian) > 100) {

                                // truncate string
                                $stringCut = substr($uraian, 0, 100);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... <a href="/this/story">Read More</a>';
                            }
                            echo $uraian; ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php } ?><div class="col-md-12 mb-4">
                    <?php echo anchor('LandingPage/LoadMore/'.$nextLoad, '<button style="width:100%;" type="button" class="btn btn-info">Load More</button>', 'class="card-title"'); ?>
            </div>
              <div class="col-md-12 mt-4">
                <h4 class="section-title">foto dan video</h4>
                <div class="media-slider">
                  <img
                    src="https://ikm-disperindag.kepriprov.go.id/uploads/20190718-214230.jpg"
                    alt=""
                  />
                  <img
                    src="https://ikm-disperindag.kepriprov.go.id/uploads/20190316-053152.jpg"
                    alt=""
                  />
                  <div class="video-container">
                    <iframe
                      class="video"
                      src="https://www.youtube.com/embed/p2KY7bnYJRs"
                      frameborder="0"
                      allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen
                    ></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 table-ikm">
            <div>
              <h4 class="section-title">data ikm berdasarkan wilayah</h4>
              <div class="header-title">provinsi kepulauan riau</div>
              <div class="slider-table">
                <div>
                  <table width="100%" style="border-top: none">
                    <tbody>
                      <tr>
                        <td>Kabupaten Bintan</td>
                        <td>350</td>
                      </tr>
                      <tr>
                        <td>Kabupaten Karimun</td>
                        <td>300</td>
                      </tr>
                      <tr>
                        <td>Kabupaten Natuna</td>
                        <td>300</td>
                      </tr>
                      <tr>
                        <td>Kabupaten Lingga</td>
                        <td>250</td>
                      </tr>
                      <tr>
                        <td>Kabupaten Kep.Anambas</td>
                        <td>150</td>
                      </tr>
                      <tr>
                        <td>Kota Batam</td>
                        <td>650</td>
                      </tr>
                      <tr>
                        <td>Kota Tanjungpinang</td>
                        <td>220</td>
                      </tr>
                      <tr class="table-total">
                        <td><b>JUMLAH</b></td>
                        <td><b>1850</b></td>
                      </tr>
                      <tr style="font-size: 10px">
                        <td colspan="2">
                          *) Jumlah data masih bersifat sementara (dalam proses
                          updating)
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- <div class="bg-table"></div> -->
                </div>
                <div>
                  <table width="100%" style="border-top: none">
                    <tbody>
                      <tr>
                        <td>Industri Pangan</td>
                        <td>500</td>
                      </tr>
                      <tr>
                        <td>Industri Sandang</td>
                        <td>50</td>
                      </tr>
                      <tr>
                        <td>Industri Barang dari Kayu dan Furnitur</td>
                        <td>60</td>
                      </tr>
                      <tr>
                        <td>Industri Aneka Kerajinan</td>
                        <td>250</td>
                      </tr>
                      <tr>
                        <td>
                          Industri Logam, Mesin, Elektronika dan Alat Angkut
                        </td>
                        <td>200</td>
                      </tr>
                      <tr>
                        <td>Industri Kimia dan Bahan Bangunan</td>
                        <td>100</td>
                      </tr>
                      <tr>
                        <td>Aneka Industri</td>
                        <td>220</td>
                      </tr>
                      <tr class="table-total">
                        <td><b>JUMLAH</b></td>
                        <td><b>1850</b></td>
                      </tr>
                      <tr style="font-size: 10px">
                        <td colspan="2">
                          *) Jumlah data masih bersifat sementara (dalam proses
                          updating)
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- <div class="bg-table"></div> -->
                </div>
              </div>
            </div>
            <div class="sidebar-title twitter-section">
              <h4 class="section-title">twitter</h4>
              <a
                class="twitter-timeline"
                href="https://twitter.com/IKM_Kepriprov?ref_src=twsrc%5Etfw"
                data-tweet-limit="2"
                >Tweets by IKM_Kepriprov</a
              >
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

  </body>
</html>
