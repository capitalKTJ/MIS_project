<?php

$servername="127.0.0.1";
$username="root";
$password="";
$dbname="webpage";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){die("connection Failed.");}

date_default_timezone_set("Asia/Taipei");
mysqli_set_charset($conn,"utf8");
mysql_query("SET NAME utf8");
$Batch_id=getdate();

 $year =  $Batch_id["year"]; //年
 $month =  $Batch_id["mon"]; //月
 $day =  $Batch_id["mday"];  //日
 $hours =  $Batch_id["hours"];  //時
 $minutes =  $Batch_id["minutes"];  //分
 $seconds =  $Batch_id["seconds"];  //秒
 $microseconds = microtime(true);   //微秒
 $Batch_id=$year."-".$month."-".$day."\n".$hours.":".$minutes.":".$seconds.":".$microseconds;

$Batch_name = $_POST["Batch_name"];
$Url = $_POST["Url"];

// $error = $_FILES['file']['error'];
// $tmp_name = $_FILES['file']['tmp_name'];
// $size = $_FILES['file']['size'];
// $name = $_FILES['file']['name'];
// $type = $_FILES['file']['type'];

// if ($error == UPLOAD_ERR_OK && $size > 0) {
//   $fp = fopen($tmp_name, 'r');
//   $content = fread($fp, $size);
//   fclose($fp);  
//   $content = addslashes($content);
//   $sql = "INSERT INTO detail (filename, filetype, filesize, filecontent)VALUES ('$name', '$type', $size, '$content')";
//   print("File stored.");
// } else {
//   print("Database Save for upload failed.");
// }

if($Batch_name != null && $Url != null)
{
  
  $Url_ary = implode(",", $Url);
  //for($i = 1; $i < count($website) ; $i++){



  $SQL1="INSERT INTO Tmbatch(Batch_id,Batch_name)VALUES('$Batch_id','$Batch_name')";
  
  $SQL2="INSERT INTO Tmdetail(Batch_id,Url)VALUES('$Batch_id','$Url_ary')";
  //}
  //$result=mssql_query($SQL);
  

  echo '<meta http-equiv=REFRESH CONTENT=0;url=tester2.php>';
}
  //print_r($_POST);
/*$conn=mysqli_connect("127.0.0.1","root","","webpage");
mysql_select_db("webpage"); 
$query = "INSERT INTO main(batch_id,username,purpose,cloudname)VALUES('$batch_id','$username','$purpose','$cloudname')";
$result = mysql_query($query) or die("insert main failed:".mysql_error());  
$lastid = mysql_insert_id(); //得到上一个 插入的id值   
echo "last insert id :".$lastid."<br>";  
$query2 = "INSERT INTO detail(batch_id,website)VALUES('$batch_id','$website')";
echo $query2."<br>";  
$result2 = mysql_query($query2) or die("insert detail failed: ".mysql_error()); */


else
{
  echo "請輸入完整";
  header("Refresh: 2; url=tester1.php");
}


if(mysqli_query($conn,$SQL1)){
  
}else{echo"Error:".$SQL1."<br>".$conn->error;
}if(mysqli_query($conn,$SQL2)){
  
}else{echo"Error:".$SQL2."<br>".$conn->error;
}
mysqli_close($conn);
?>

