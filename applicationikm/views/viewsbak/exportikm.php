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
<?php ob_start();?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style/custom1.css">
<link href="style/sb-admin-2.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="style/jquery.js"></script>
<script src="style/bootstrap.min.js"></script>
<style>
    
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; 
      min-height: 200px;
    }
    
   
    
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
    
    .btn-jdlr {
        padding: 10px 10px 10px 10px;
        display: inline;
        background-color: #d9534f;
        font-weight: bold;
        border-radius: 4px;
        color: #fff;
        margin:20px 20px 30px 0px;
       
   }

.biru  {
    background-color: #aadaff;
}     
   
.itm {
    color:black;
    font-weight:bold;
}

.pnl-pad {
    padding : 20px;
    border:1px solid black;
    color:black;
}


.pnl-green {
    border : 2px solid #d9534f;
    margin:10px;
    
}

th.header {
    background-color : #6695ea;
    color:black;
    font-weight:bold;
    border:6px solid white;
    font-size:12px;
}

th.no_border {
    background-color : #6695ea;
    color:black;
    font-weight:bold;
    font-size:12px;
    border:1px solid #6695ea;
}

td.content {
    font-size:12px;
    
}
td.ct {
    font-size:12px;
    text-align:center;
}

.bold {
    font-size:12px;
    font-weight:bold;
}

td.garis {
    border-top:1px solid black;
    
}

.nb {
 font-size : 12px;
 font-style:italic;
    
}

td.top {
    border-top:1px solid #6695ea;
    border-left:1px solid #6695ea;
    border-right:1px solid #6695ea;
    font-size:12px;
    text-align:center;
}

td.mid {
    border-right:1px solid #6695ea;
    border-left:1px solid #6695ea;
    text-align:center;
    font-size:12px;
}

td.bott{
    border-bottom:2px ;
    border-color:#6695ea;
    border-right:2px;
    border-left:2px;
    border-top-style:double;
    text-align:center;
    font-size:12px;
}
</style>
</head>
<body>

GET DATA COY..
</body>
<?php $html=ob_get_clean();?>
<?php require_once("html2pdf/html2pdf.class.php");
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
       //$html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('helvetica');
       $html2pdf->writeHTML($html);
       $html2pdf->Output('export.pdf');
 }
 catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
  }
?>