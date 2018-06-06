<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <link href="memberstyle.css" rel="stylesheet" type="text/css">
     <link href="sidemenu.css" rel="stylesheet" type="text/css">
        <link href="step.css" rel="stylesheet" type="text/css">
        <script src="textbox.js"></script>
        <title>金融法規關鍵分析軟體機器人</title>
</head>
<style>
#time_container {
    height: 500px; 
    min-width: 310px; 
    max-width: 1600px;
    margin: 0 auto;
}
</style>
<body>
	<div id="container">
            <div id="headbox">
                <h1>金融法規關鍵分析軟體機器人</h1>
                <center><img src="membersonly.png"></center>
                </div>

<!--<div class="subnav">
   <ul class="navi">

                        <li class="side"><a href="threeurl.php">網址分析</a></li>
                        <li class="side"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side active"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>-->

    <?php
    include 'connect.php';
    $time_word = 2012;
    $time = [201201, 201202, 201203, 201204, 201205, 201206, 201207, 201208, 201209, 201210, 201211, 201212];
    $words = ['保險','規定','有限公司','業務','招攬','投資','保單','人壽','代理人','契約'];
        $data = [];
        for($j=0;$j<12;$j++){
                $temp = [];
                for($i=0;$i<10;$i++){
                    $sql_1="SELECT word,tfidf,batch_name FROM batch_content INNER JOIN batch ON batch.batch_id=batch_content.batch_id WHERE word='$words[$i]' AND batch_name like '%".$time[$j]."%'";
                    $result_1=mysqli_query($conn,$sql_1) or die("fail");
                    if(mysqli_num_rows($result_1)>0){
                        $row = mysqli_fetch_array($result_1);
                            array_push($temp,$row['tfidf']);
                    }else{
                        array_push($temp,"0"); 
                    }
                }
                //print_r($temp);
                array_push($data,$temp);
        }
        //print_r($data);
    ?>        
    <script>
    $(function () {
        var words = ["<?php echo join("\",\"",$words); ?>"];
        var ti = "<?php echo $time_word."時間序列"; ?>";
        var datas = <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>;
        $('#time_container').highcharts({
            title: {
                text: ti
            },
            chart: {
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: true,
                    alpha: 25,
                    beta: 25,
                    depth: 790,
                },
                //zoomType: 'x'
            },
            plotOptions: {
                column: {
                    depth: 40,
                    stacking: true,
                    grouping: false,
                    groupZPadding: 25
                },
            },
            xAxis: {
                categories: words,
                width: 1160,
                gridLineColor: '#ccc'
            },
            yAxis : {
                title: {
                    text: 'TF-IDF',
                    margin: 80
                },
                margin: 50,
                min: 0, 
                max: 0.1,
                gridLineColor: '#eee'
            },
            series: [{
                data: datas[0],
                name: 'Jan',
                stack: 0
            }, {
                data: datas[1],
                name: 'Feb',
                stack: 1
            }, {
                data: datas[2],
                name: 'Mar',
                stack: 2
            }, {
                data: datas[3],
                name: 'Apr',
                stack: 3
            }, {
                data: datas[4],
                name: 'May',
                stack: 4
            }, {
                data: datas[5],
                name: 'Jun',
                stack: 5
            }, {
                data: datas[6],
                name: 'Jul',
                stack: 6
            }, {
                data: datas[7],
                name: 'Aug',
                stack: 7
            }, {
                data: datas[8],
                name: 'Sep',
                stack: 8
            }, {
                data: datas[9],
                name: 'Oct',
                stack: 9
            }, {
                data: datas[10],
                name: 'Nov',
                stack: 10
            }, {
                data: datas[11],
                name: 'Dec',
                stack: 11
            }]
        }); 
    });
    </script>
    <div id="time_container" style="height: 500px; width: 900px;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script><br><br>
<div id="clear"></div>
<div id="footer"></div></div>
</body>
</html>