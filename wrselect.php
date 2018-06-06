<?php
$servername = "127.0.0.1"; //伺服器名稱
$username = "root"; //使用者名稱(用root即可)
$password = ""; //密碼(如果沒有更改，則用空字串即可)
$dbname = "webpage"; //資料庫名稱
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}
date_default_timezone_set("Asia/Taipei");
mysqli_set_charset($conn,"utf8");
// mysql_query("SET NAME utf8");
$date=getdate();

 $year =  $date["year"]; //年
 $month =  $date["mon"]; //月
 $day =  $date["mday"];  //日
 $hours =  $date["hours"];  //時
 $minutes =  $date["minutes"];  //分
 $seconds =  $date["seconds"];  //秒
 $microseconds = microtime(true);   //微秒
 $date=$year."-".$month."-".$day."\n".$hours.":".$minutes.":".$seconds.":".$microseconds;


ini_set('memory_limit', '1024M');

require_once "C:/xampp/htdocs/jieba-php/src/vendor/multi-array/MultiArray.php";
require_once "C:/xampp/htdocs/jieba-php/src/vendor/multi-array/Factory/MultiArrayFactory.php";
require "C:/xampp/htdocs/jieba-php/src/class/Jieba.php";
require_once "C:/xampp/htdocs/jieba-php/src/class/Finalseg.php";
require_once "C:/xampp/htdocs/jieba-php/src/class/JiebaAnalyse.php";
require_once "C:/xampp/htdocs/jieba-php/src/class/Posseg.php";
  include 'Snoopy.class.php';
    use Fukuball\Jieba\Jieba;
  use Fukuball\Jieba\Finalseg;
  use Fukuball\Jieba\JiebaAnalyse;
  use Fukuball\Jieba\Posseg;
	Jieba::init();
  Finalseg::init();
  JiebaAnalyse::init();
  Posseg::init();
  
  $web1=$_POST['website1'];
  $web2=$_POST['website2'];
  $web3=$_POST['website3'];
//1
$snoopy=new Snoopy;
$snoopy->fetchtext($web1);
  $top_k =15;
  //top_k 為返回幾個 TF/IDF 權重最大的關鍵詞，默認值為 20
    JiebaAnalyse::setStopWords('C:/xampp/htdocs/stopword.txt');//停用詞檔案
    $tags = JiebaAnalyse::extractTags($snoopy->results, $top_k);  
    foreach($tags as $key => $value){
      $new_data_array1[urlencode($key)] = urlencode($value);
     }   
     // 利用json_encode將資料轉成JSON格式
     $data_json_url1 = json_encode($new_data_array1);
     // 利用urldecode將資料轉回中文
     $datajson1 = urldecode($data_json_url1);
     if($new_data_array1==null){
    echo "There's no competable words.";
     }else{
        echo $datajson1;
  }
 //2 
 $snoopy1=new Snoopy;
 $snoopy1->fetchtext($web2);
   $top_k =15;
   //top_k 為返回幾個 TF/IDF 權重最大的關鍵詞，默認值為 20
     JiebaAnalyse::setStopWords('C:/xampp/htdocs/stopword.txt');//停用詞檔案
     $tags1 = JiebaAnalyse::extractTags($snoopy1->results, $top_k);  
     foreach($tags1 as $key1 => $value1){
       $new_data_array2[urlencode($key1)] = urlencode($value1);
      }   
      // 利用json_encode將資料轉成JSON格式
      $data_json_url2 = json_encode($new_data_array2);
      // 利用urldecode將資料轉回中文
      $datajson2 = urldecode($data_json_url2);
      if($new_data_array2==null){
     echo "There's no competable words.";
      }else{
         echo $datajson2;
   }
//3
$snoopy2=new Snoopy;
$snoopy2->fetchtext($web3);
  $top_k =15;
  //top_k 為返回幾個 TF/IDF 權重最大的關鍵詞，默認值為 20
    JiebaAnalyse::setStopWords('C:/xampp/htdocs/stopword.txt');//停用詞檔案
    $tags2 = JiebaAnalyse::extractTags($snoopy2->results, $top_k);  
    foreach($tags2 as $key2 => $value2){
      $new_data_array3[urlencode($key2)] = urlencode($value2);
     }   
     // 利用json_encode將資料轉成JSON格式
     $data_json_url3 = json_encode($new_data_array3);
     // 利用urldecode將資料轉回中文
     $datajson3 = urldecode($data_json_url3);
     if($new_data_array3==null){
    echo "There's no competable words.";
     }else{
        echo $datajson3;
  }
//大的
$array1=array_merge($tags,$tags1,$tags2);
foreach($array1 as $key3 => $value3){
    $new_data_array4[urlencode($key3)] = urlencode($value3);
   }   
   // 利用json_encode將資料轉成JSON格式
   $data_json_url4 = json_encode($new_data_array4);
   // 利用urldecode將資料轉回中文
   $datajson4 = urldecode($data_json_url4);
   if($new_data_array4==null){
  echo "There's no competable words.";
   }else{
      echo $datajson4;
}


$sql="INSERT INTO userselecturl(id,set_id,website,date,json)VALUES('1','1','$web1','','$datajson1')ON DUPLICATE KEY UPDATE set_id='1',website='$web1',date='',json='$datajson1'";
$sql1="INSERT INTO userselecturl(id,set_id,website,date,json)VALUES('2','1','$web2','','$datajson2')ON DUPLICATE KEY UPDATE set_id='1',website='$web2',date='',json='$datajson2'";
$sql2="INSERT INTO userselecturl(id,set_id,website,date,json)VALUES('3','1','$web3','','$datajson3')ON DUPLICATE KEY UPDATE set_id='1',website='$web3',date='',json='$datajson3'";
$sql3="INSERT INTO userselecturlset(set_id,date,json)VALUES('1','','$datajson4')ON DUPLICATE KEY UPDATE date='',json='$datajson4'";


mysqli_query($conn,$sql);
mysqli_query($conn,$sql1);
mysqli_query($conn,$sql2);
if(mysqli_query($conn,$sql3)){
  
}else{echo"Error:".$sql."<br>".$conn->error;
}
mysqli_close($conn);
header("Refresh: 2; url=cloud2.php");
  ?>