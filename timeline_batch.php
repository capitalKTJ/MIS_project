<?php
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
$time_word = $_POST["time_word"];
// echo $time_word;
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=webpage;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
    
    $handle = $link->prepare("SELECT word,tfidf,batch_name FROM batch_content INNER JOIN batch ON batch.batch_id=batch_content.batch_id WHERE word='$time_word'");//'select date, tfidf from detail_content inner join detail ON detail.detail_id=detail_content.detail_id' 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
        
    foreach($result as $row){
        array_push($dataPoints, array("label"=> $row->batch_name, "y"=> $row->tfidf));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
    
?>
<!DOCTYPE HTML>
<html>
<head>  
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
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
    zoomEnabled: true,
    zoomType: "x",
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "時間序列文字雲"
	},
    axisX:{
        title: "Batch name",
    },
    //axisX:{
        //viewportMinimum: 23,
        //viewportMaximum: 30
    //},
    axisY:{
        title: "TF-IDF",
    },
	data: [{
		type: "column", //change type to bar, line, area, pie, etc  
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
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
    <?php
    echo "<h2>";
echo $time_word;
echo "</h2>";
    ?>
<div id="chartContainer" style="height: 400px; width: 650px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script><br><br></div>
<div id="clear"></div>
<div id="footer"></div></div>
</body>
</html>

