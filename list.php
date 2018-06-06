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
               <!--  <nav class="global-nav">
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

                        <li class="side active"><a href="threeurl.php">網址呈現</a></li>
                        <li class="side"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>

<div class="section">
    <div class="pagination">
    <?php
    include 'connect.php';
    $word = $_GET["word"];
    echo $word;
    //print_r($_COOKIE);
    //echo $_COOKIE['temp'];
    $sql="SELECT * FROM selecturl WHERE json like '%".$word."%'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        //echo '</br>';
        echo '<table border=1>';
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo "<td>";
          echo "<a href=".$row["website"].">".$row["website"]."</a>";
          echo "</td>";
          echo '</tr>';
        }
        echo '</table>';
    }
    else {echo "0 results";}

    ?>
</div></div>
    <p id="list"></p>
    <div id="clear"></div>

            
        <div id="footer"></div></div>
</body>
</html>