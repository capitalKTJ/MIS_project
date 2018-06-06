<?php

include 'connect.php';

$Email=$_POST["Email"];
$Pass=$_POST["Pass"];
$Username=$_POST["Username"];
$Cellphone=$_POST["Cellphone"];
$Usertype=$_POST["Usertype"];

if($Email != null && $Pass != null && $Username != null && $Cellphone != null && $Usertype != null){
    $sql="INSERT INTO `member`(`Email`, `Pass`, `Username`, `Cellphone`, `Usertype`) VALUES ('$Email','$Pass','$Username','$Cellphone','$Usertype')";
    if(mysqli_query($conn,$sql)){
	    echo '註冊成功! 請稍後...';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=home.php>';
    }
    else{
	    echo '註冊失敗!';
	    echo '<meta http-equiv=REFRESH CONTENT=2;url=useradd.php>';
    }
}

else{
	echo "請輸入完整";
	echo '<meta http-equiv=REFRESH CONTENT=2;url=useradd.php>';
}

mysqli_close($conn);//關閉

?>