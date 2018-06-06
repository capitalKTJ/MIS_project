<?php


ini_set('memory_limit', '1024M');

require_once "C:/xampp/htdocs/jieba-php/src/vendor/multi-array/MultiArray.php/MultiArray.php";
  require_once "C:/xampp/htdocs/jieba-php/src/vendor/multi-array/Factory/MultiArrayFactory.php";
  require "C:/xampp/htdocs/jieba-php/src/class/Jieba.php";
  require_once "C:/xampp/htdocs/jieba-php/src/class/Finalseg.php";
  require_once "C:/xampp/htdocs/jieba-php/src/class/JiebaAnalyse.php";
  require_once "C:/xampp/htdocs/jieba-php/src/class/Posseg.php";
    use Fukuball\Jieba\Jieba;
  use Fukuball\Jieba\Finalseg;
  use Fukuball\Jieba\JiebaAnalyse;
  use Fukuball\Jieba\Posseg;
	Jieba::init();
  Finalseg::init();
  JiebaAnalyse::init();
  Posseg::init();
  

  $seg_list ='C:/xampp/htdocs/stopword.txt';
  $top_k =150;
  //top_k 為返回幾個 TF/IDF 權重最大的關鍵詞，默認值為 20
  JiebaAnalyse::setStopWords('');//停用詞檔案
  $tags = JiebaAnalyse::extractTags($seg_list, $top_k);
  
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
   
  
  

    ?>