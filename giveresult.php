
<?php
	
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
	


$website = $_POST['website']; 
	
$snoopy=new Snoopy;
$snoopy->fetchtext($website);
$seg_list = Posseg::cut($snoopy->results);//詞性判斷
$b=array();
$noun=$_POST["noun"];
for($a=0;$a<count($seg_list);$a++){
	if($seg_list[$a]['tag']==$noun){
array_push($b,$seg_list[$a]['word']);
			}
	
}
$c=implode("",$b);
$tdf=$_POST["tf"];
$top_k = $tdf;
//top_k 為返回幾個 TF/IDF 權重最大的關鍵詞，默認值為 20
//JiebaAnalyse::setStopWords('wfreerfref');//停用詞檔案
$tags = JiebaAnalyse::extractTags($c, $top_k);
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
 
   header("Content-type: application/json");
	header("Content-Disposition: attachment; filename=count.json"); 	


?>




