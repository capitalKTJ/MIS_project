<?php
include 'connect.php';
session_start();
// $_SESSION['session_Email']='';
// $Pass=$_POST["Pass"];
if(isset($_SESSION['session_Email'])){
    echo '<a href="user_logout.php">登出</a>  <br><br>';
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
     <link href="sidemenu.css" rel="stylesheet" type="text/css">
        <link href="step.css" rel="stylesheet" type="text/css">
        <script src="textbox.js"></script>
        <title>金融法規關鍵分析軟體機器人</title>
          <style>
    table{
        table-layout: fixed;
        word-break: break-all;
        overflow:hidden
        top:5px; 
        left:50px; 
    } 
    </style>
</head>
<script>
    <!--console.log(tf);-->
    //var temp = document.cookie;
    //var array = [];
    //var array = temp.split(";");
    //document.write(array[0]);
    
    //console.log(temp);
</script>
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
                        <li class="nav-item active"><a href="search.php">會員專區</a></li>
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
                        <li class="side active"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>

  <div class="section">
    <div class="pagination">
    <form method="post" action="detail_cloud.php">';
}else{ 
    echo '你沒有這個權限'; 
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    } 
        ?>   
    <?php
    include 'connect.php';
    if(isset($_SESSION['session_Email'])){
    //print_r($_COOKIE);
    //echo $_COOKIE['temp'];
    $sql="SELECT * FROM detail ";//INNER JOIN tmdetail ON detail.detail_id=tmdetail.Detail_id";
    $result=mysqli_query($conn,$sql);
     $data_nums = mysqli_num_rows($result); //統計總比數
        $per = 5; //每頁顯示項目數量
        $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
            $page=1; //則在此設定起始頁數
        } else {
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
        }  $start = ($page-1)*$per; //每一頁開始的資料序號
        $result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");
    if(mysqli_num_rows($result)>0){
        //echo '</br>';
        echo '<table border=1>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo "<td>".$row["title"]."</td>";
            echo "<td>";
            echo "<a href=".$row["url"].">".$row["url"]."</a>";
            echo "</td>";
            echo "<td>";
            echo "<input type='checkbox' name='web[]' value='".$row["detail_id"]."' />";
            echo "</td>";
            echo '</tr>';
        }
        echo '</table>';
    }
    else {echo "0 results";}
     echo "<center>";
echo "<br><a href=?page=1>首頁</a> ";
        
        for( $i=1 ; $i<=$pages ; $i++ ) {
            if ( $page-5 < $i && $i < $page+5 ) {
                echo "<a href=?page=".$i.">".$i."</a> ";
            }
        } 
        echo "<a href=?page=".$pages.">末頁</a>，第". $page ."頁/共". $pages ."頁<br/>";

        echo '共 '.$data_nums.' 筆';
       echo "</center>";
   echo'
    <center><input type="submit" name="" class="button" value="確定" /></center>
    </form></div></div>
    <p id="list"></p>
    <div id="clear"></div>

            
        <div id="footer"></div> ';
    }else{ 
       
        header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
        } 
            ?>   
        
</body>
</html>