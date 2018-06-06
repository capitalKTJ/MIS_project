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
    <style>
    table{
        table-layout: fixed;
        word-break: break-all;
        overflow:hidden
        
        top:10px; 
        left:50px; 
    } 
    </style>

        
        <title>金融法規關鍵分析軟體機器人</title>
       
</head>
<style>
table {
    border-collapse: collapse;
}
</style>
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
<!-- 
                <nav class="global-nav">
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
                        <li class="side active"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>

</div>

   <div class="section">
    <div class="pagination">
    <?php
    error_reporting(0);
    include 'connect.php';
    $search_word = $_POST["search_word"];
    // if ($search_word==null) {
    //     echo "<script>alert('請輸入字詞'); location.href = 'search.php'</script>";
    // }
    echo $search_word;
    
    $sql="SELECT * FROM detail WHERE json like '%".$search_word."%'"; //content INNER JOIN tmdetail ON content.Detail_id=tmdetail.Detail_id
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
        echo "<table border=1>";
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <form method="post" action="show_word.php?detail_id=<?php echo $row["detail_id"]; ?>" target="_blank">
            <?php
            echo "<tr>";
            echo "<td hidden>".$row["detail_id"]."</td>";
            echo "<td width=240>".$row["date"]."</td>";
            echo "<td width=400>".$row["title"]."</td>";
            echo "<td width=400>";
            echo "<a href=".$row["url"].">".$row["url"]."</a>";
            echo "</td>";
            ?>
            <td width="255"><input type="submit" name="show" class="button" value="查看文字雲" /></td><!--submit-->
        </form>
            <?php
            echo "</tr>";
            echo "</form>";
          }
          echo "</table>";
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
?>

</div></div>
        <div id="footer"></div></div>
</body>
</html>