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
		echo 'dff';
		//echo "select * from kd_romi where jenis='katind' and kode='".$isi."'";
		$xx = "select * from kd_romi where jenis= 'katind' and kode = '1' group by arti";
		//echo $db;
		$a=mysqli_query($db, $xx);
		while($b=mysqli_fetch_object($a))
		{
			//echo 'j';
			echo $b->arti;
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
