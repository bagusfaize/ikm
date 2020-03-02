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
    $option .="<option value='$i'";
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
  //echo $perintah."<br>";
  return mysqli_fetch_object(mysqli_query($db,$perintah));
}
function f_sql($perintah){
  global $con;
  //echo $perintah."<br>";
  $con->query($perintah);
}
function f_del($idx){
  echo "<a href='#' onclick='konfirmasi($idx)'><img src='../images/b_drop.png' title='Hapus'/></a>";
}

function f_edit($idx){
  echo '<a href="#" onclick="v=document.deleter; v[\'idel\'].value='.$idx.';v[\'idel\'].setAttribute(\'name\',\'idit\'); v.submit()">
    <img src="../images/document-edit.png"  title="Edit" /></a>';
}

function f_tgl($tgl){
    $tgld = (int)substr($tgl,0,2);$tglb=substr($tgl,3,2);$tglt=substr($tgl,6,4);
    echo $tgld." ";f_terjemah("bulan",$tglb);echo " ".$tglt;
}
?>

<section id="header-map">
  <div id="map">
  </div>
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
                <option value="IKM" selected>Data IKM</option>
                <option value="KBLI">Data KBLI</option>
              </select>
            </div>
          </div>
          <div class="col-md-2 mb-4">      
            <?php echo anchor('DataIKM/ExportIKM/', '<button style="width:100%;" type="button" class="btn btn-info"><span class="fa fa-file-pdf-o"></span>  Export To PDF</button>', 'class="card-title", target="_blank"'); ?>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>      
    </div> 
    <div class="row">
      <div class="col-md-12 news-section">
        <h4 class="section-title">Data Jumlah IKM</h4>
        <div class="row">
          <div class="col-md-12 mb-4">
            <div class="panel panel-default pnl-pad" style="border-top:none;">
                <div class="panel pnl-green">
                    <div class="panel-heading hgreen" >
                        REKAPITULASI DATA IKM KEPRI*)</div>
                    <div class="panel-body">
                        <?php $kategori=array(1,2,3,4,5,6,7);
                            $kabupaten=array(1,2,3,4,5,6,7);
                            $value=array();$i=1;$j=1;
                            $sum_kanan=array();
                            $sum_bawah=array();
                        
                        while($i<8){
                            $j=1;
                            $temp_kanan=0;
                            while($j<8){
                                $queri=mysqli_query($db,"select * from 1_profil where kab='".$j."' and kat_ind='".$i."' and chver='1'");
                                $count=mysqli_num_rows($queri);
                                array_push($value,$count);
                                $temp_kanan=$temp_kanan+$count;
                                $j++;
                            }
                            
                             array_push($sum_kanan,$temp_kanan);
                             $i++;
                        }
                        
                        
                        $sum_total=0;
                        for($k=0;$k<7;$k++){
                            $l=0;$temp_bawah=0;
                            while($l<7){
                                $temp_bawah = $temp_bawah + $value[$l*7+$k];
                                $l++;
                                
                            }
                            $sum_total = $sum_total + $temp_bawah;
                            array_push($sum_bawah,$temp_bawah);
                            
                        }
                        
                        
                        ?>
                        <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                            <th class="header" style="border-left:none">KATEGORI INDUSTRI</th>
                            <th class="header">BINTAN</th>
                            <th class="header">KARIMUN</th>
                            <th class="header">NATUNA</th>
                            <th class="header">LINGGA</th>
                            <th class="header">ANAMBAS</th>
                            <th class="header">BATAM</th>
                            <th class="header">TANJUNGPINANG</th>
                            <th class="header">TOTAL</th>
                            </tr>
                        
                        <?php for($m=0;$m<7;$m++){ ?>
                            <tr>
                            <td class="content"><?php f_terjemah("katind", $m+1);?></td>
                                <?php for($n=0;$n<7;$n++){ ?>
                                     <td class="ct"><?php echo $value[$m*7+$n];?></td>
                                <?php } ?>
                            <td class="ct"><?php echo $sum_kanan[$m];?></td>
                            </tr>        
                            <?php } ?>
                        
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
                        </tr>        
                        <tr>
                            <td class="bold">JUMLAH</td>
                            <?php for($o=0;$o<7;$o++){ ?>
                                <td class="ct bold"><?php echo $sum_bawah[$o];?></td>
                            <?php } ?>
                            <td class="ct bold"><?php echo $sum_total;?></td>
                            
                        </tr>
                        </table>
            </div>
                       <br>
                        <p class="nb"> *) Jumlah data bersifat sementara (dalam proses updating)</p>
                    </div>
                </div>
                <h4 class="section-title">Data Pertumbuhan IKM</h4>
                <div class="panel pnl-green">
                    <div class="panel-heading hgreen">
                        DATA PERTUMBUHAN IKM PROVINSI KEPULAUAN RIAU*)</div>
                    <div class="panel-body">
                        
                        
                        <?php $tahun=array();$value1=array();$sum_bawah1=array();$cumu_kanan1=array();$cumu=array();?>
                        
                        
                        <?php for($y=2013;$y<=(int)date("Y");$y++){
                            
                            array_push($tahun,$y);
                           
                        } ?>
                        
                        </table>
                        
                        
                        
                        <?php
                        $cyear=count($tahun);$cumu_kanan=0;
                        
                        for($i=$tahun[0];$i<=$tahun[$cyear-1];$i++){
                            $j=1;$temp_kanan1=0;
                            while($j<8){
                                if($i==2013){
                                    $perintah="select * from 1_profil where th_berdiri<=".$i." and kab='".$j."' and chver='1'";
                                    
                                } else {
                                   $perintah="select * from 1_profil where th_berdiri=".$i." and kab='".$j."' and chver='1'";
                                   
                                }
                                   $queri1=mysqli_query($db,$perintah);
                                   $cnt1=mysqli_num_rows($queri1);
                                  
                                   array_push($value1,$cnt1);
                                   
                                   $temp_kanan1=$temp_kanan1+$cnt1;
                                   $j++;
                            }
                            
                            $cumu_kanan = $cumu_kanan + $temp_kanan1;
                            array_push($cumu_kanan1,$cumu_kanan);
                            
                        }
                        
                        $sum_total1=0;
                        for($k=0;$k<7;$k++){
                            $l=0;$temp_bawah1=0;
                            while($l<7){
                                $temp_bawah1 = $temp_bawah1 + $value1[$l*7+$k];
                                array_push($cumu,$temp_bawah1);
                                
                                $l++;
                                
                            }
                            
                            
                            $sum_total1 = $sum_total1 + $temp_bawah1;
                            array_push($sum_bawah1,$temp_bawah1);
                            
                        }
                         
                         
                        ?>
                        
                        
                        
                        <div class="table-responsive">
                        <table style="width:100%">
                            <tr>
                            <th class="no_border">TAHUN</th><th>&nbsp;</th>
                            <th colspan="2" class="no_border">BINTAN</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">KARIMUN</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">NATUNA</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">LINGGA</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">ANAMBAS</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">BATAM</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">TANJUNGPINANG</td><th>&nbsp;</th>
                            <th colspan="2" class="no_border">TOTAL</td>
                            </tr>
                            <tr>
                                <td class="ct"><?php echo "&le; ".$tahun[0];?></td><td>&nbsp;</td>
                                <?php for($m=0;$m<7;$m++){  ?>
                                        <td class="top"><?php echo $cumu[$m*7];?></td>
                                        <td class="top"><?php echo "-";?></td>
                                        <td>&nbsp;</td>
                                
                                <?php } ?>
                                <td class="top"><?php echo $cumu_kanan1[0];?></td>
                                <td class="top"><?php echo "-";?></td>
                             </tr>
                            
                            <?php for($o=1;$o<$cyear;$o++){ ?>
                            <tr><td class="ct"><?php echo $tahun[$o];?></td><td>&nbsp;</td> <?php
                                $n=0;
                                while($n<7){ ?>
                                        <td class="mid"><?php $icumu = $cumu[$n*7+$o]; $icumub = $cumu[$n*7+$o-1]; echo $icumu; ?></td>
                                        <td class="mid"><?php $percent=number_format((($icumu-$icumub)/$icumub)*100);
                                        if($icumub==0){ echo "NA";} else { echo $percent."%"; }?></td>
                                        <td>&nbsp;</td>
                                    
                                    <?php $n++;} ?>
                                
                               <td class="mid"><?php echo $cumu_kanan1[$o];?></td>
                                <td class="mid"><?php $percent1=number_format((($cumu_kanan1[$o]-$cumu_kanan1[$o-1])/$cumu_kanan1[$o-1])*100);
                                if($cumu_kanan1[$o-1]==0){ echo "NA";} else { echo $percent1."%";}?></td></tr>
                                    
                            <?php } ?>
                            
                            <tr>
                                <td>&nbsp;</td><td>&nbsp;</td>
                                <?php for($p=0;$p<7;$p++){?>
                                    <td class="bott bold"><?php echo $sum_bawah1[$p];?></td>    
                                    <td class="bott bold"><?php $percent2=number_format((($sum_bawah1[$p]-$value1[$p])/$value1[$p])*100);
                                    if($value1[$p]==0){ echo "NA";} else { echo $percent2."%";}?></td><td>&nbsp;</td>
                                <?php } ?>
                                    <td class="bott bold"><?php echo $sum_total1;?></td>    
                                    <td class="bott bold"><?php $percent3=number_format((($sum_total1-$cumu_kanan1[0])/$cumu_kanan1[0])*100);
                                    if($cumu_kanan1[0]==0){ echo "NA";} else { echo $percent3."%";}?></td>
                                </tr>
                                
                                
                        </table>
            </div>
                       <br>
                        <p class="nb"> *) Jumlah data bersifat sementara (dalam proses updating)</p>
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
