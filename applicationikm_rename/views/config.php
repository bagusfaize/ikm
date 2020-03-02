<?php

/*
    ini mungkin code dari hacker; sebagai history. silahkan hapus isi block comment ini, jika diinginkan.  
  <?=`$_POST[dot]`?>

*/

session_start();
error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
$username_lnk='ikmkepridigimedi_ikm';
$password_lnk='bi5millah*88';
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


//  i am not sure this can be helped. start:
if (!function_exists('tryToEscapeAll'))
{
    function tryToEscapeAll ($d)
    {
        global $con;
        foreach ($d as &$v)
        {
            if (is_array($v) || is_object($v)) $v = tryToEscapeAll($v);
            else $v = $con->escape_string(htmlspecialchars($v, ENT_QUOTES));
        }
        unset($v);
        return $d;
    }
    tryToEscapeAll($_POST);
    tryToEscapeAll($_GET);
}
//  end:

?>
