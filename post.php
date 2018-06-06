<?php

include 'connect.php';

$Email=$_POST["Email"];
$Pass=$_POST["Pass"];
 
$sql="select * from member where Email='$Email' and Pass='$Pass'";
 
if(mysqli_num_rows(mysqli_query($conn,$sql))>0){
    session_start();
    $_SESSION['session_Email']=$Email;
    echo "登入成功，正在導向會員頁面......";
    header("Refresh: 3; url=user.php" );
}

else{ 
    echo "登入失敗，3秒後回到首頁......"; 
    header("Refresh: 3; url=home.php" );
} 

?>