<?php
$servername = "127.0.0.1"; //伺服器名稱
$username = "root"; //使用者名稱(用root即可)
$password = ""; //密碼(如果沒有更改，則用空字串即可)
$dbname = "webpage"; //資料庫名稱
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}


mysqli_set_charset($conn,"utf8");
mysql_query("SET NAME utf8");


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

  $content='中國人壽保險股份有限公司所持有土地違反保險法令，核處罰鍰新臺幣180萬元整並請該公司檢討改善。
  2012-05-18
  一、裁罰時間:101年5月18日。
  二、受裁罰之對象：中國人壽保險股份有限公司。
  三、裁罰之法令依據：保險法第168條第4項第3款、第149條第1項規定。
  四、違反事實理由：該公司持有多筆土地已逾兩年未即時利用並有收益且未於本會要求之期限內開發土地或予以出售，核與保險法第146條之2第1項及本會98年3月31日金管保一字第09802504011號令之規定不符。
  五、裁罰結果：核處罰鍰新臺幣180萬元整，並請該公司檢討改善。
  六、其他說明事項：無
  貴公司竹東分公司業務人員未依規定招攬保險商品，辦理保單保全變更作業時，相關人員未落實執行公司訂定之保全事務處理手冊相關規定，及以未具備投資型保險商品招攬資格之業務員，招攬投資型保險商品等事項核有諸多內控缺失，依保險法第149條第1項規定予以糾正，並依同項第1款規定處貴公司竹東分公司自處分書送達之翌日起停止新保險契約招攬2個月，且由貴公司總稽核覆核確認其均已改善，報本會認可後，始得再行招攬新保險契約。
  2012-05-24
  本會受理保戶申訴貴公司竹東分公司業務人員楊○琴、陳○琇、彭○達、彭○榆、張○緹、張○澤等6人未依規定招攬保險商品，辦理保單保全變更作業時，相關人員亦未落實執行公司訂定之保全事務處理手冊相關規定，及以未具備投資型保險商品招攬資格之業務員，招攬投資型保險商品等事項核有下列諸多內控缺失。
  (一)依貴公司新契約投保、保單簽收回條、保全給付及保單借款之控管作業，92年10月27日以後應調閱簽名影像確實核對要、被保險人留存之簽名，惟貴公司未依上開規定確實核對影像，致生爭議。
  (二)保單要保人（張○○麗）辦理部分提領保單帳戶價值之保全變更作業程序，而申請書上要保人之簽名欄位卻簽彭○○妹之名（非要保人張○○麗），核未落實執行貴公司訂定之保全事務處理手冊「契約內容變更直接影響保戶權益，作業必須力求『絕對正確』，以避免申辦意思或手續瑕疵造成日後保戶與公司間之爭執。」之規定，顯未落實內部管理相關規範。
  (三)保單有由未具備投資型保險商品招攬資格之業務員陳○琇招攬，且要保書上業務員欄位亦確由陳○琇簽名，貴公司以未具備投資型保險商品招攬資格之業務員招攬投資型保險商品，實有未確實執行招攬制度，內部控管核有不當。
  (四)貴公司以雙經手人方式招攬投資型保險商品，除極易引發招攬糾紛外，且支付予未具證照之業務員報酬高於具備招攬資格之業務員，實不符常理，有規避行為時保險法第177條授權訂定保險業務員管理規則第4條及第11條之規定，業務員亦有上開規則第19條第1項第10款暨第17款違反第11條第2項之情形。
  (五)綜上，貴公司內控有所不當，有礙健全經營之虞，依保險法第149條第1項規定予以處分。
  四、法令依據：依保險法第149條第1項處分
  ';

$top_k = 50;
JiebaAnalyse::setStopWords('C:/xampp/htdocs/stopword.txt');
$tags = JiebaAnalyse::extractTags($content, $top_k);
//print_r($tags);//那150字的tfidf值（一維陣列）
$c_array=$tags;
foreach ( $c_array as $i=>$val ) {
  for($arr=0;$arr<count($tags);$arr++){
    $key = $arr;
    $c_array[$key] = $val;
    unset($c_array[$i]); //删掉原有的键值
  }
  }
  //print_r($c_array);
//$tf = implode(',',$tags);//tfidf變字串 

foreach($tags as $key => $value){
  $a1[]=$key;
   }
  $b1=implode('',$a1);
 
$seg_list= Posseg::cut($b1);
//print_r($seg_list);//輸出那150字的詞性（二維陣列）
$u=array();
for($a3=0;$a3<count($seg_list);$a3++){
array_push($u,$seg_list[$a3]['tag']);
}
//$d1=implode(',',$u);//詞性變字串
//print_r($u);
$b3=array();
for($a3=0;$a3<count($seg_list);$a3++){
  array_push($b3,$seg_list[$a3]['word']);
  }
  //$d2=implode(',',$b3);//單詞變字串
//print_r($b3);
$bac=5;
  $SQL="INSERT INTO batch_content(cb_id,batch_id,word,tfidf,sub)
  VALUES('','$bac','$b3[0]','$c_array[0]','$u[0]'),
  ('','$bac','$b3[1]','$c_array[1]','$u[1]'),
  ('','$bac','$b3[2]','$c_array[2]','$u[2]'),
  ('','$bac','$b3[3]','$c_array[3]','$u[3]'),
  ('','$bac','$b3[4]','$c_array[4]','$u[4]'),
  ('','$bac','$b3[5]','$c_array[5]','$u[5]'),
  ('','$bac','$b3[6]','$c_array[6]','$u[6]'),
  ('','$bac','$b3[7]','$c_array[7]','$u[7]'),
  ('','$bac','$b3[8]','$c_array[8]','$u[8]'),
  ('','$bac','$b3[9]','$c_array[9]','$u[9]'),
  ('','$bac','$b3[10]','$c_array[10]','$u[10]'),
  ('','$bac','$b3[11]','$c_array[11]','$u[11]'),
  ('','$bac','$b3[12]','$c_array[12]','$u[12]'),
  ('','$bac','$b3[13]','$c_array[13]','$u[13]'),
  ('','$bac','$b3[14]','$c_array[14]','$u[14]'),
  ('','$bac','$b3[15]','$c_array[15]','$u[15]'),
  ('','$bac','$b3[16]','$c_array[16]','$u[16]'),
  ('','$bac','$b3[17]','$c_array[17]','$u[17]'),
  ('','$bac','$b3[18]','$c_array[18]','$u[18]'),
  ('','$bac','$b3[19]','$c_array[19]','$u[19]'),
  ('','$bac','$b3[20]','$c_array[20]','$u[20]'),
  ('','$bac','$b3[21]','$c_array[21]','$u[21]'),
  ('','$bac','$b3[22]','$c_array[22]','$u[22]'),
  ('','$bac','$b3[23]','$c_array[23]','$u[23]'),
  ('','$bac','$b3[24]','$c_array[24]','$u[24]'),
  ('','$bac','$b3[25]','$c_array[25]','$u[25]'),
  ('','$bac','$b3[26]','$c_array[26]','$u[26]'),
  ('','$bac','$b3[27]','$c_array[27]','$u[27]'),
  ('','$bac','$b3[28]','$c_array[28]','$u[28]'),
  ('','$bac','$b3[29]','$c_array[29]','$u[29]'),
  ('','$bac','$b3[30]','$c_array[30]','$u[30]'),
  ('','$bac','$b3[31]','$c_array[31]','$u[31]'),
  ('','$bac','$b3[32]','$c_array[32]','$u[32]'),
  ('','$bac','$b3[33]','$c_array[33]','$u[33]'),
  ('','$bac','$b3[34]','$c_array[34]','$u[34]'),
  ('','$bac','$b3[35]','$c_array[35]','$u[35]'),
  ('','$bac','$b3[36]','$c_array[36]','$u[36]'),
  ('','$bac','$b3[37]','$c_array[37]','$u[37]'),
  ('','$bac','$b3[38]','$c_array[38]','$u[38]'),
  ('','$bac','$b3[39]','$c_array[39]','$u[39]'),
  ('','$bac','$b3[40]','$c_array[40]','$u[40]'),
  ('','$bac','$b3[41]','$c_array[41]','$u[41]'),
  ('','$bac','$b3[42]','$c_array[42]','$u[42]'),
  ('','$bac','$b3[43]','$c_array[43]','$u[43]'),
  ('','$bac','$b3[44]','$c_array[44]','$u[44]'),
  ('','$bac','$b3[45]','$c_array[45]','$u[45]'),
  ('','$bac','$b3[46]','$c_array[46]','$u[46]'),
  ('','$bac','$b3[47]','$c_array[47]','$u[47]'),
  ('','$bac','$b3[48]','$c_array[48]','$u[48]'),
  ('','$bac','$b3[49]','$c_array[49]','$u[49]')";
  
  


if(mysqli_query($conn,$SQL)){
  
}else{echo"Error:".$SQL."<br>".$conn->error;
}
mysqli_close($conn);

  
  
  ?>