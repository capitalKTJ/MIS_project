<?php
include 'connect.php';
session_start();
// $_SESSION['session_Email']='';
// $Pass=$_POST["Pass"];
if(isset($_SESSION['session_Email'])){
    echo '<form action="user_logout.php" method="post" enctype="multipart/form-data"><input type="Submit" value="登出" style="position:relative;left:90%;background-color: #92a8d1;color: black;border: 2px solid #8B8B8B;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;" > </form> <br><br>';
    echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
	<script src="wordcloud2.js"></script>
	<script src="word1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <link href="memberstyle.css" rel="stylesheet" type="text/css">
        <link href="step.css" rel="stylesheet" type="text/css">
        <link href="sidemenu.css" rel="stylesheet" type="text/css">
        <script src="textbox.js"></script>
        <title>金融法規關鍵分析軟體機器人</title>
        <style type="text/css">  
            .label{   
            display:block;  
            margin:.7em 0em;   
            }   
        </style>
        
</head>

<body>
     <div id="container">
            <div id="headbox">
                <h1>金融法規關鍵分析軟體機器人</h1>
                <center><img src="membersonly.png"></center>

<!--                 <nav class="global-nav">
                    <hr size="1px" align="center" width="100%">
                    <ul>
                        <li class="nav-item "><a href="home.php">首頁</a></li>
                        <li class="nav-item"><a href="tester1.php">試用專區</a></li>
                        <li class="nav-item active"><a href="#">會員專區</a></li>
                        <li class="nav-item"><a href="service.php">服務項目</a></li>
                        <li class="nav-item"><a href="#">客服專線</a></li>
                    </ul>
                    <hr size="1px" align="center" width="100%">
                </nav> -->
            </div>
<div class="subnav">
   <ul class="navi">

                       
                        <li class="side active"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>
<!-- <div id="clear"></div> -->

  <div class="section">
    <form action="search_list.php" method="post">
      <br><br>
      <img src="analytics.png">
      請輸入字詞：<input type="text" name="search_word">
        <br><center>
        <input type="submit" class="button" value="搜尋"></center>
    </form></div>
     <div id="clear"></div>

            
        <div id="footer"></div>
    </div>';
}else{ 
    echo '你沒有這個權限'; 
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    } ?>

</body>
</html>