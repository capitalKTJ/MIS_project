<?php
include 'connect.php';
session_start();
 if(isset($_SESSION['session_Email'])){
  
echo'
<!DOCTYPE
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
     <link href="sidemenu.css" rel="stylesheet" type="text/css">
        <link href="step.css" rel="stylesheet" type="text/css">
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
                <!-- <nav class="global-nav">
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

                        <li class="side"><a href="threeurl.php">網址分析</a></li>
                        <li class="side"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side active"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>


 <div class="section">
                    <nav class="global-nav">
<!--                     <hr size="1px" align="center" width="100%"> -->
                    <ul>
                        <li class="nav-item active"><a href="2012.php">2012</a></li>
                        <li class="nav-item active"><a href="2013.php">2013</a></li>
                        <li class="nav-item active"><a href="2014.php">2014</a></li>
                    </ul>
<!--                     <hr size="1px" align="center" width="100%"> -->
                </nav>

                      <nav class="global-nav">
<!--                     <hr size="1px" align="center" width="100%"> -->
                    <ul>
                        <li class="nav-item active"><a href="">2015</a></li>
                        <li class="nav-item active"><a href="">2016</a></li>
                        <li class="nav-item active"><a href="">2017</a></li>
                    </ul>
<!--                     <hr size="1px" align="center" width="100%"> -->
                </nav>

</div>
    <div id = "clear"></div>
<div id="footer"></div>
</div>';
}else{ 
    echo '你沒有這個權限'; 
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    } 
    ?>


</body>
</html>