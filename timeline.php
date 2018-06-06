<?php
 
$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
$time_word = $_POST["time_word"];
echo $time_word;
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
	
    $handle = $link->prepare("SELECT word,tfidf,`date` FROM detail_content INNER JOIN detail ON detail.detail_id=detail_content.detail_id WHERE word='$time_word'");//'select date, tfidf from detail_content inner join detail ON detail.detail_id=detail_content.detail_id' 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("label"=> $row->date, "y"=> $row->tfidf));
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
        title: "Time",
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>