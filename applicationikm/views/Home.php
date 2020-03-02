<?php include "config.php";
include "function.php";


// hitung akses
$akses = f_baris("select * from akses")->total_akses;
$akses = $akses + 1;
mysqli_query($db,"update akses SET total_akses='$akses'");


?>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>.:IKM DISPERINDAG PROPINSI KEPULAUAN RIAUc:.</title>
  <!--<base href="https://ikm-disperindag.kepriprov.go.id">-->
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="Description" content="IKM DISPERINDAG PROPINSI KEPULAUAN RIAU">
  <meta name="Keywords" content="IKM KEPRI,Kepri,Disperindag,Kepulauan Riau">

  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_PATH; ?>frontend/frontendSyle/custom1.css">
  <link href="<?php echo ASSET_PATH; ?>frontend/frontendSyle/sb-admin-2.css" rel="stylesheet">
  <!--<script type="text/javascript" src="../js/jquery3-3-1.min.js"></script>
  <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>-->
  <script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/jquery3-3-1LandingPage.min.js"></script>
  <script type="text/javascript" src="<?php echo ASSET_PATH; ?>frontend/frontendScript/bootstrapLandingPage.min.js"></script>
<LINK REL="icon" HREF="kepri.ico">
<style>

    .carousel-inner img {
      width: 100%;
      min-height: 200px;
    }



    @media (max-width: 600px) {
      .carousel-caption {
        display: none;
      }
    }
table.ctable.legend{
    font-size : 10px;
    padding : 5px 5px 5px 5px;
}

td.border{
    border : 1px solid black;
    background:white;
}
td.ct{
    text-align:center;

}
li.map.active,li.rekap.active {
    background : #5BB85D;
    width: 12px;
    height: 12px;
    border: 1px solid transparent !important;
    padding :.05em;
}

div.container.slider{
    text-align:center;}

.carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-prev, .carousel-control .icon-next {
    /* width: 30px; */
    /* height: 30px; */
    margin-top: -10px;
    font-size: 20px;
}
#mapol.carousel-indicators li,#rekapol.carousel-indicators li {

    border: 1px solid black;
}


td.rekap {
    font-size:12px;
    padding-left : 10px;
    padding-top : 5px;
    width: 280px;
    text-align:left;

}
td.rekap-info{
    font-size:10px;
    padding-left : 10px;
    padding-top : 5px;
    width: 280px;
    text-align:left;

li.rekap,li.rekap.active {
    margin-bottom :-40px;

}

img.bimage{
    height : 200px;
    width : 200px;
    float : left;
}

div.panel.bcontent{
    margin-left : 220px;
    margin-bottom : 0;
    height:200px;
    text-align:left;
    max-width: 378px;
    padding:3px;
    overflow: hidden;
}

div.cntent{

     width:300px;
   display : block;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    -webkit-line-clamp:0;

}

img.image-align-right,img.image-align-left,p.image-align-center,p img {
    display : none;

}

td.berita {
    padding : 0px;
}

td.berita.tipe {
    color:red;
    font-size:12px;

}

td.berita.time {
    font-size:11px;
    padding-bottom:15px
}

td.berita.judul {
    font-weight:bold;
}

p {
    overflow : hidden;

}


</style>
</head>
<body> 
<div style="margin-top: 80px; width:100%; padding: 0px">

  <div class="col-lg-12" style="padding: 0px">

  <div class="panel panel-primary" style="border:none">
      <div class="panel-body" id="canvasmap" style="height:500px" >

      </div>


  </div>
  </div>
<div class="col-lg-12">
    <div id="map" style="height:30px" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
    <ol class="carousel-indicators" id="mapol">
      <li data-target="#map" data-slide-to="0" class="map active"></li>
      <?php for($i=1;$i<15;$i++){ ?>

        <li data-target="#map" data-slide-to="<?php echo $i?>" class="map"></li>
      <?php } ?>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>
        <div class="item">
            <div class="container slider" >
            </div>
        </div>



    </div>

            <a class="left carousel-control" href="#map" data-slide="prev" id="left">
              <span class="fa fa-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#map" data-slide="next" id="right">
              <span class="fa fa-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>

</div>

</div>

<?php include "map_ikm.php";?>
<script type="text/javascript">
var map;
var marker;
var markers_all=[];
var markers_pangan=[];
var markers_sandang=[];
var markers_ibk=[];
var markers_iak=[];
var markers_ilm=[];
var markers_ikb=[];
var markers_iai=[];
var markers_tpi=[];
var markers_batam=[];
var markers_bintan=[];
var markers_lingga=[];
var markers_karimun=[];
var markers_natuna=[];
var markers_anambas=[];
var infoWindow;


function initialize() {
    var centerkab = [{"lat":-0.33573023,"long":104.589906},{"lat":0.827946,"long":103.589256},{"lat":3.559421895,"long":108.6448506},{"lat":3.030544,"long":106.077721}];
    var zoomkab = [9,10,9,9];
    var mycenter = new google.maps.LatLng(0.955, 104.131343);
    var mapOptions = {
        center : mycenter ,
        mapTypeId: 'roadmap',
        zoom : 10,
        gestureHandling: 'greedy'
    };

    // Display a map on the page
    map = new google.maps.Map(document.getElementById("canvasmap"), mapOptions);
    map.setTilt(45);

    /*map.addListener('dragend',function(){
            var gcenter = map.getCenter();
            var gzoom = map.getZoom();

            alert(gcenter+" "+gzoom);

        });*/

 // initialization info window
    infoWindow = new google.maps.InfoWindow({
        pixelOffset: new google.maps.Size(10,35)
    });

    google.maps.event.addDomListener(window, 'load', initialize);

    //initialization all marker

    ikm_all();ikm_pangan();ikm_sandang();ikm_ibk();ikm_iak();ikm_ilm();ikm_ikb();ikm_iai();ikm_tpi();
    ikm_batam();ikm_bintan();ikm_lingga();ikm_karimun();ikm_natuna();ikm_anambas();
    showhideMarker(markers_all,map);


    //slide function
    $('#map').bind('slide.bs.carousel', function (e) {
        var slideIdx = $(e.relatedTarget).index();
        update_map(slideIdx);

    });

    function update_map(index){
        var markers = [markers_all,markers_pangan,markers_sandang,markers_ibk,markers_iak,markers_ilm,markers_ikb,markers_iai,markers_tpi,
        markers_batam,markers_bintan,markers_lingga,markers_karimun,markers_natuna,markers_anambas];
        infoWindow.close();

            if(index > 10){
                map.setCenter(new google.maps.LatLng(centerkab[index-11].lat,centerkab[index-11].long));
                map.setZoom(zoomkab[index-11]);
            } else {
                map.setCenter(mycenter);
                map.setZoom(10);
            }

            for (var i=0;i<15;i++){
                if(i==index){
                    showhideMarker(markers[i],map);

                }else{
                    showhideMarker(markers[i],null);
                }


            }

    }
}



</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOeHuAzdy0K8kaHyaoI8zRxIo6HAqp9Tk&callback=initialize"></script>
<!--
<div class="row">
  <div class="col-sm-12">
        <div class="pink">
            <div class="panel-body" style="margin:-10px">
                <table width="100%" class="ctable legend">
                <tr>
                <td class="ct"><img src="images/icon-orange-2.png" width="20"></td>
                <td class="border">IKM Pangan</td>
                <td class="ct"><img src="images/icon-ungu-2.png" width="20"></td>
                <td class="border">IKM Sandang</td>
                <td class="ct"><img src="images/icon-merah-2.png" width="20"></td>
                <td class="border">IKM Barang dari Kayu dan Furnitur</td>
                <td class="ct"><img src="images/icon-hijau-2.png" width="20"></td>
                <td class="border">IKM Aneka Kerajinan</td>
                <td class="ct"><img src="images/icon-kuning-2.png" width="20"></td>
                <td class="border">IKM Logam,Mesin, Elektronika dan Alat Angkut</td>
                <td class="ct"><img src="images/icon-cyan-2.png" width="20"></td>
                <td class="border">IKM Kimia dan Bahan Bangunan</td>
                <td class="ct"><img src="images/icon-coklat-2.png" width="20"></td>
                <td class="border">IKM Aneka Industri</td>
                </tr>
                </table>

          </div>
        </div>
    </div>
    </div>-->
</div>
<!--<hr>-->
</div>

</div></div></div>


<div class="container">
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
                  <img src="<?php echo ASSET_PATH; ?>/assets/<?php echo $row['file']; ?>" alt=""/>
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
                    <?php echo anchor('Home/LoadMore/'.$nextLoad, '<button style="width:100%;" type="button" class="btn btn-info">Load More</button>', 'class="card-title"'); ?>
            </div>
              <div class="col-md-12 mt-4">
                <h4 class="section-title">foto dan video</h4>
                    <div class="panel-body">
                        <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                              <!-- Indicators -->
                              <ol class="carousel-indicators" id="rekapol" style="bottom:-37px;">

                                <?php foreach($FotoNVideo as $key =>$row){ ?>
                                  <li data-target="#myCarousel3" data-slide-to="<?php echo $key; ?>" class="rekap active"></li>
                              <?php } ?>
                              </ol>
                        <div class="carousel-inner" style="height:350px;font-size:14px;margin-bottom:10px;">
                            <?php foreach($FotoNVideo as $key =>$row){ ?>
                              <?php if($key==0){$ac = "active"; }else{$ac = "";}  if($row['file'] != ""){ ?>
                                <div class="item <?php echo $ac; ?>">
                                    <img src="<?php echo ASSET_PATH; ?>/assets/<?php echo $row['file']; ?>" alt=""/>
                                </div>
                              <?php }else if($row['video'] != ""){ ?>
                                <div class="item video-container">
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
            <a class="left carousel-control" href="#myCarousel3" data-slide="prev" style="background:transparent;bottom:11px;">
              <span class="fa fa-chevron-left" style="color:#5BB85D;"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel3" data-slide="next" style="background:transparent;bottom:11px;">
              <span class="fa fa-chevron-right" style="color:#5BB85D;"></span>
              <span class="sr-only">Next</span>
            </a>
                   </div>
              </div>              
            </div>
          </div>
          <div class="col-md-4 table-ikm">
              <div class="panel panel-primary">
    <div class="panel-heading" style="font-weight:bold; color:white">REKAPITULASI DATA*</div>
    <div class="panel-body">
    <div id="myCarousel2" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
    <ol class="carousel-indicators" id="rekapol" style="bottom:-37px">
      <li data-target="#myCarousel2" data-slide-to="0" class="rekap active"></li>
      <li data-target="#myCarousel2" data-slide-to="1" class="rekap"></li>

    </ol>
        <div class="carousel-inner">
            <?php $npangan=f_count("select * from 1_profil where kat_ind='1' and chver='1'");
            $nsandang=f_count("select * from 1_profil where kat_ind='2' and chver='1'");
            $n_ibk=f_count("select * from 1_profil where kat_ind='3' and chver='1'");
            $n_iak=f_count("select * from 1_profil where kat_ind='4' and chver='1'");
            $n_ilm=f_count("select * from 1_profil where kat_ind='5' and chver='1'");
            $n_ikb=f_count("select * from 1_profil where kat_ind='6' and chver='1'");
            $n_iai=f_count("select * from 1_profil where kat_ind='7' and chver='1'");
            $n_tpi=f_count("select * from 1_profil where kab='7' and chver='1'");
            $n_batam=f_count("select * from 1_profil where kab='6' and chver='1'");
            $n_bintan=f_count("select * from 1_profil where kab='1' and chver='1'");
            $n_lingga=f_count("select * from 1_profil where kab='4' and chver='1'");
            $n_karimun=f_count("select * from 1_profil where kab='2' and chver='1'");
            $n_anambas=f_count("select * from 1_profil where kab='5' and chver='1'");
            $n_natuna=f_count("select * from 1_profil where kab='3' and chver='1'");

                ?>
                            <div class="item active" style="height:370px;font-size:14px;margin-bottom:10px;">
                    <div class="panel panel-info" style="border:transparent">
                    <div class="panel-heading">PROPINSI KEPULAUAN RIAU</div>

                <table class="ctable" style="margin-bottom:30px;width:100%;">
                  <tr>
                      <td class="rekap">Industri Pangan</td>
                      <td>:</td>
                      <td align="right"><? echo $npangan;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Industri Sandang</td>
                      <td>:</td>
                      <td align="right"><? echo $nsandang;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Industri Barang dari Kayu dan Furnitur</td>
                      <td>:</td>
                      <td align="right"><? echo $n_ibk;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Industri Aneka Kerajinan</td>
                      <td>:</td>
                      <td align="right"><? echo $n_iak;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Industri Logam,Mesin,Elektronika dan Alat Angkut</td>
                      <td>:</td>
                      <td align="right"><? echo $n_ilm;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Industri Kimia dan Bahan Bangunan</td>
                      <td>:</td>
                      <td align="right"><? echo $n_ikb;?></td>
                  </tr>
                  <tr>
                      <td class="rekap" style="border-bottom:1px solid black">Industri Aneka Industri</td>
                      <td style="border-bottom:1px solid black">:</td>
                      <td align="right" style="border-bottom:1px solid black"><? echo $n_iai;?></td>
                  </tr>
                  <tr>
                      <td class="rekap"><b>JUMLAH</b></td>
                      <td>:</td>
                      <td align="right"><b><? $sumriau1=$npangan+$nsandang+$n_ibk+$n_iak+$n_ilm+$n_ikb+$n_iai;echo $sumriau1;?></b></td>
                  </tr>
                  <tr>
                      <td colspan="3" class="rekap-info" >*) Jumlah data masih bersifat sementara(dalam proses updating)</td>
                  </tr>
                  </table>
              </div></div>

              <div class="item" style="height:370px;font-size:14px;margin-bottom:10px;">
                    <div class="panel panel-info" style="border:transparent">
                    <div class="panel-heading">PROPINSI KEPULAUAN RIAU</div>

                <table class="ctable" style="margin-bottom:30px;width:100%;">
                  <tr>
                      <td class="rekap">Kabupaten Bintan</td>
                      <td>:</td>
                      <td align="right"><? echo $n_bintan;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Kabupaten Karimun</td>
                      <td>:</td>
                      <td align="right"><? echo $n_karimun;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Kabupaten Natuna</td>
                      <td>:</td>
                      <td align="right"><? echo $n_natuna;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Kabupaten Lingga</td>
                      <td>:</td>
                      <td align="right"><? echo $n_lingga;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Kabupaten Kep. Anambas</td>
                      <td>:</td>
                      <td align="right"><? echo $n_anambas;?></td>
                  </tr>
                  <tr>
                      <td class="rekap">Kota Batam</td>
                      <td>:</td>
                      <td align="right"><? echo $n_batam;?></td>
                  </tr>
                  <tr>
                      <td class="rekap" style="border-bottom:1px solid black">Kota Tanjungpinang</td>
                      <td style="border-bottom:1px solid black">:</td>
                      <td align="right" style="border-bottom:1px solid black"><? echo $n_tpi;?></td>
                  </tr>
                  <tr>
                      <td class="rekap"><b>JUMLAH</b></td>
                      <td>:</td>
                      <td align="right"><b><? $sumriau2=$n_bintan+$n_karimun+$n_natuna+$n_lingga+$n_anambas+$n_batam+$n_tpi;echo $sumriau2;?></b></td>
                  </tr>
                  <tr>
                      <td colspan="3" class="rekap-info" >*) Jumlah data masih bersifat sementara(dalam proses updating)</td>
                  </tr>
                  </table>
              </div></div>
            </div>
            <a class="left carousel-control" href="#myCarousel2" data-slide="prev" style="background:transparent;bottom:-32px;">
              <span class="fa fa-chevron-left" style="color:#5BB85D;"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel2" data-slide="next" style="background:transparent;bottom:-32px">
              <span class="fa fa-chevron-right" style="color:#5BB85D;"></span>
              <span class="sr-only">Next</span>
            </a>
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
      <div class="container pt-5">
        <?php foreach($SponsorshipLink as $row){ ?>
        <a href="<?php echo $row['alamat']; ?>"><img src="<?php echo ASSET_PATH; ?>/assets/<?php echo $row['file']; ?>" alt=""/></a>
        <?php } ?>
      </div>
    </section>
</div>
</body>
</html>

<script type="text/javascript">
var i = 0;
var hchild=0;
var lines=[];

$(".panel.bcontent > *").each(function(){
    var hcntent;
    var line;

    if(i>=2){
        i=0;
        hchild=0;
        hchild += $(this).height();
    } else {
        hchild += $(this).height();

    }


    if(i==0){
          hcntent = 185 - $(this).height();
          var line = Math.ceil(hcntent/20);
          lines.push(line);

    }
    i++;
});

var j=0;
$(".cntent").each(function () {
  $(this).css({"-webkit-line-clamp":lines[j].toString()});
  j++;
})
</script>
