<body>
  <?php 
session_start();
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
$username_lnk='root';
$password_lnk='';
$database_lnk='ikmkepridigimedi_ikm';
$dbservertype='mysql';
$hostname_lnk ='localhost';
$upload_dir = "../uploads/";
// connect MYSQLI database dengan user root
$db = mysqli_connect($hostname_lnk, $username_lnk, $password_lnk);
  if (!$db) {
        die('Could not connect: ' . mysqli_error($db));
  }
$res = mysqli_select_db($db, $database_lnk); // gunakan database riau2
$con = new mysqli($hostname_lnk,$username_lnk,$password_lnk,$database_lnk);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
function f_terjemah($jenis,$isi){
  global $db;
  if ($jenis=='alamat'){
    $a=mysqli_query($db,"select * from kd_desa where kddes='$isi' group by kddes");
    $b = mysqli_fetch_object($a);
    $addr = $b->des .", ";
    $a=mysqli_query($db,"select * from kd_desa where kdkec='$b->kdkec' group by kdkec");
    $b = mysqli_fetch_object($a);
    $addr .= $b->kec .", ";
    $a=mysqli_query($db,"select * from kd_desa where kdkab='$b->kdkab' group by kdkab");
    $b = mysqli_fetch_object($a);
    $addr .= $b->kab;
    echo $addr;
    return;
  }
  if ($jenis=='kab'){
    $a=mysqli_query($db,"select * from kd_desa where kdkab='$isi' group by kdkab");
    //$b = mysqli_fetch_object($a);
    $b=mysqli_fetch_array($a,MYSQLI_NUM);
    echo $b[0];
    return;
  }
  if ($jenis=='katind'){
    //echo $isi;
    //echo "select * from kd_romi where jenis='katind' and kode='".$isi."'";
    //$xx = "select * from kd_romi where jenis= 'katind' and kode = '1' group by arti";   
    //$a=mysqli_query($db,"select * from kd_romi where jenis= 'katind' and kode = '".$isi."' group by arti");
    //$b = mysqli_fetch_object($a);
    //echo $b->arti;
    if($isi == 1){
      echo 'Industri Pangan';
    }
    if($isi == 2){
      echo 'Industri Sandang';
    }
    if($isi == 3){
      echo 'Industri Barang dari Kayu dan Furnitur';
    }
    if($isi == 4){
      echo 'Industri Aneka Kerajinan';
    }
    if($isi == 5){
      echo 'Industri Logam, Mesin, Elektronika dan Alat Angkut';
    }
    if($isi == 6){
      echo 'Industri Kimia dan Bahan Bangunan';
    }
    if($isi == 7){
      echo 'Aneka Industri';
    }
    return;
  }
  if ($jenis=='kec'){
    $a=mysqli_query($db,"select * from kd_desa where kdkec='$isi' group by kdkec");
    $b = mysqli_fetch_object($a);
    echo $b->kec;
    return;
  }
  if ($jenis=='des'){
    $a=mysqli_query($db,"select * from kd_desa where kddes='$isi' group by kddes");
    $b = mysqli_fetch_object($a);
    echo $b->des;
    return;
  }
  if ($jenis=='perush'){
    $a=mysqli_query($db,"select * from 1_profil where idx='$isi'");
    $b = mysqli_fetch_object($a);
    echo $b->nm_prsh;
    return;
  }
  $a=mysqli_query($db,"select * from kd_romi where jenis='$jenis' and kode='$isi'");
  $b = mysqli_fetch_object($a);
  echo $b->arti;
}
function f_petugas($jenis,$isi){
    global $db;

    if($jenis=='nama'){
        $a = mysqli_query($db,"select * from dt_petugas where uid='$isi'");
        $b = mysqli_fetch_object($a);
        echo $b->nama;
        return;
    }
}
function f_trjemah($jenis,$isi){
  global $db;
  if ($jenis=='alamat'){
    $a=mysqli_query($db,"select * from kd_desa where kddes='$isi' group by kddes");
    $b = mysqli_fetch_object($a);
    $addr = $b->des .", ";
    $a=mysqli_query($db,"select * from kd_desa where kdkec='$b->kdkec' group by kdkec");
    $b = mysqli_fetch_object($a);
    $addr .= $b->kec .", ";
    $a=mysqli_query($db,"select * from kd_desa where kdkab='$b->kdkab' group by kdkab");
    $b = mysqli_fetch_object($a);
    $addr .= $b->kab;
    echo $addr;
    return;
  }
  if ($jenis=='kab'){
    $a=mysqli_query($db,"select * from kd_desa where kdkab='$isi' group by kdkab");
    $b = mysqli_fetch_object($a);
    return $b->kab;
  }
  if ($jenis=='kec'){
    $a=mysqli_query($db,"select * from kd_desa where kdkec='$isi' group by kdkec");
    $b = mysqli_fetch_object($a);
    return $b->kec;
  }
  if ($jenis=='des'){
    $a=mysqli_query($db,"select * from kd_desa where kddes='$isi' group by kddes");
    $b = mysqli_fetch_object($a);
    return $b->des;
  }
  if ($jenis=='perush'){
    $a=mysqli_query($db,"select * from 1_profil where idx='$isi'");
    $b = mysqli_fetch_object($a);
    echo $b->nm_prsh;
    return;

  }

  if($jenis=='kategori'){
      $a=mysqli_query($db,"select * from dt_produk where kategori='$isi'");
      $b = mysqli_fetch_object($a);
      return $b->kategori;
  }

  if($jenis=='kat_kbli'){
        $a=mysqli_query($db,"select * from kd_kbli where kategori='$isi' group by pokid,pok");
      $b = mysqli_fetch_object($a);
      return $b->pok;

  }

  $a=mysqli_query($db,"select * from kd_romi where jenis='$jenis' and kode='$isi'");
  $b = mysqli_fetch_object($a);
  return $b->arti;
}
function f_tahun($nilai){
  for($i = 1970; $i < date("Y")+1; $i++){
    $option .="
  
  <option value='$i'";
  if ($nilai == $i){$option .= " selected ";}
  $option .= ">$i</option>";
  }
  echo $option;
}
function f_count($perintah){
    global $db;
    return mysqli_num_rows(mysqli_query($db,$perintah));

}
function f_baris($perintah){
  global $db;
  //echo $perintah."
  echo "
  <br>";
  return mysqli_fetch_object(mysqli_query($db,$perintah));
}
function f_sql($perintah){
  global $con;
  //echo $perintah."
  echo "
    <br>";
  $con->query($perintah);
}
function f_del($idx){
  echo "
      
      <a href='#' onclick='konfirmasi($idx)'>
        <img src='../images/b_drop.png' title='Hapus'/>
      </a>";
}

function f_edit($idx){
  echo '
      
      <a href="#" onclick="v=document.deleter; v[\'idel\'].value='.$idx.';v[\'idel\'].setAttribute(\'name\',\'idit\'); v.submit()">
        <img src="../images/document-edit.png"  title="Edit" />
      </a>';
}

function f_tgl($tgl){
    $tgld = (int)substr($tgl,0,2);$tglb=substr($tgl,3,2);$tglt=substr($tgl,6,4);
    echo $tgld." ";f_terjemah("bulan",$tglb);echo " ".$tglt;
}
?>
      <section id="header-map">
        <div id="map"></div>
      </section>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-12 news-section">
              <h4 class="section-title">Database</h4>
              <?php echo form_open('DataIKM/search'); ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="form-control" name="CboJenisData" onchange='this.form.submit()'>
                      <option value=" ">Pilih Data</option>
                      <option value="IKM">Data IKM</option>
                      <option value="KBLI" selected>Data KBLI</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2 mb-4">
                  <?php echo anchor('DataIKM/ExportIKM/', '
                  
                  <button style="width:100%;" type="button" class="btn btn-info">
                    <span class="fa fa-file-pdf-o"></span>  Export To PDF

                  
                  </button>', 'class="card-title", target="_blank"'); ?>
                </div>
              </div>
              <?php //echo form_close(); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 news-section">
              <h4 class="section-title">Data KBLI</h4>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <div class="panel panel-default pnl-pad" style="border-top:none;">
                    <div class="panel pnl-green">
                      <div class="panel-body">
                        <div class="panel panel-default pnl-pad table-responsive" style="border-top:none;">
                          <?php //echo form_open('DataIKM/search'); ?>
                          <center>
                            <select name="sel_kbli" id="sel_kbli" class="form-control mb-4" onchange='this.form.submit()'>
                              <?php  
                    echo "<option value=''>Pilih Kategori</option>";
                    $queri2=mysqli_query($db,"select * from 1_profil where golpok!='' and kategori!='' and chver='1' group by golpok");                    
                    while($row2=mysqli_fetch_object($queri2))
                    {
                      if($filterKBLI == $row2->golpok)
                      {
                        echo "<option value='".$row2->golpok."' selected>".$row2->kategori."</option>";
                      }
                      {
                        echo "<option value='".$row2->golpok."'>".$row2->kategori."</option>";
                      }
                    }    
                    ?>
                            </select>
                          </center>
                          <?php echo form_close(); ?>
                        <?php 
                if($filterKBLI ==""){                    
                    $kate= "where golpok!='' and chver='1'";                    
                } else {    
                  $kate = "where golpok='".$filterKBLI."' and chver='1'";
                }
                //$kate= "where golpok!='' and chver='1'";
                ?>
                        <div class="panel pnl-green">
                          <div class="panel-body">
                            <table style="width:100%">
                              <tr>
                                <th class="header" style="border-left:none">KODE</th>
                                <th class="header">URAIAN</th>
                                <th class="header">BINTAN</th>
                                <th class="header">KARIMUN</th>
                                <th class="header">NATUNA</th>
                                <th class="header">LINGGA</th>
                                <th class="header">ANAMBAS</th>
                                <th class="header">BATAM</th>
                                <th class="header">TANJUNGPINANG</th>
                                <th class="header" style="background:yellow">TOTAL</th>
                              </tr>
                              <?php $queri3=mysqli_query($db,"select * from 1_profil ".$kate." and chver='1' group by golpok");
                                while($row3=mysqli_fetch_object($queri3)){
                                    echo "
                              
                              <tr>
                                <td class='ct'>".$row3->golpok."</td>
                                <td class='content'>".$row3->kategori."</td>";
                                    $j=1;
                                    $sum_kn=0;
                                while($j
                                
                                <8){
                                    $queri4=mysqli_query($db,"select * from 1_profil where golpok='".$row3->golpok."' and kab='".$j."' and chver='1'");
                                    $count4=mysqli_num_rows($queri4);

                                    echo "
                                  
                                  <td class='ct'>".$count4."</td>";
                                    $sum_kn=$sum_kn+$count4;
                                    $j++;
                            }                            
                            echo "
                                  
                                  <td class='ct'>".$sum_kn."</td>
                                </tr>";                            
                        } ?>
                                <tr>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                  <td class="garis"></td>
                                </tr>
                                <tr>
                                  <td class="bold">JUMLAH</td>
                                  <td></td>
                                  <?php 
                        $k=1;$sum_tot=0;
                            while($k
                                  
                                  <8){
                                $queri5=mysqli_query($db,"select * from 1_profil ".$kate." and kab='".$k."'");
                                $nbawah=mysqli_num_rows($queri5);
                                $sum_tot=$sum_tot+$nbawah;
                                echo "
                                    
                                    <td class='ct bold'>".$nbawah."</td>";
                                $k++;
                            }
                        ?>
                                    <td class="ct bold">
                                      <? echo $sum_tot;?>
                                    </td>
                                  </tr>
                                </table>
                                <br>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="partner">
            <div class="container">
              <a href="https://www.kemendag.go.id">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/03/Logo_of_the_Ministry_of_Trade_of_the_Republic_of_Indonesia.jpg/562px-Logo_of_the_Ministry_of_Trade_of_the_Republic_of_Indonesia.jpg" alt="" />
              </a>
              <a href="https://www.kemenperin.go.id">
                <img src="http://semnas.baristandsamarinda.kemenperin.go.id/public/journals/1/pageHeaderLogoImage_id_ID.png" alt="" />
              </a>
              <a href="https://www.kepri.bps.go.id">
                <img src="bps-logo.png" alt="" />
              </a>
            </div>
          </section>
        </body>
      </html>