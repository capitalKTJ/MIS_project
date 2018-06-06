<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
	<script src="wordcloud2.js"></script>
	<!--<script src="word1.js"></script>-->
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
        top:0; 
        left:50px; 
    } 
    </style>
</head>
<style>
#contain{
  border:solid #DBDBDB;
  align:center;
  width:99%;
  height:400px;
  /* left:19%; */
  /* position:absolute;top:10%; */
}
#wordCloud{
  background-color:#888888;
  width:98%;
  height:400px;
  left:0;/* position:absolute; */
}
</style>
<script language="javascript">
function changesize(){ 
    window.resizeTo(700,500); //指定預開啟的寬度與高度
    } 
    window.onload=changesize; 
    window.onresize=changesize;
</script>
<body onload="window.resizeTo(600,600);" onResize="window.resizeTo(600,600)">
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
                        <li class="side active"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>
<?php
    include 'connect.php';
    $show = $_GET["detail_id"];
    $title_1 = "";
    $url_1 = "";
    $sql="SELECT json,title,url FROM `detail` WHERE detail_id='$show'";
    $result=mysqli_query($conn,$sql) or die("fail");
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_array($result)) {
            $title_1 = $row['title'];
            $url_1 = $row['url'];
            $result_1=$row['json'];
            //echo $result_1;
            $retemp1_1 = str_replace('"','',$result_1);
            $retemp1_2 = str_replace('{','',$retemp1_1);
            $retemp1_3 = str_replace('}','',$retemp1_2);
            $retemp1_4 = str_replace(':',',',$retemp1_3);
            $result_array=explode(',',$retemp1_4);
            //print_r($result_array);
        }
    }
    else {echo "no results";}    
    ?>
    <script>
    $(function(){
    //var array1_1 = JSON.parse(<?php json_encode($result_array); ?>);
    var array1_1 = ["<?php echo join("\",\"",$result_array); ?>"];
    //console.log(array1_1);
    var array2_1 = [];
    for(var i=0;i<array1_1.length;i++){
        //console.log(array1_1[i]);
        var tarr_1 = [];
        tarr_1.push(array1_1[i],array1_1[i+1]);
        //console.log(tarr_1);
        array2_1.push(tarr_1);
        i++;
    }//console.log(array2_1);

    var tf;
    WordCloud($('#wordCloud')[0], {
            list: array2_1,
            classes: 'wordCloud',
            wait: 15,//30
            gridSize: 12,//10
            weightFactor: 250,//20
            fontFamily: 'Hiragino Mincho Pro, serif',
            color: 'random-dark',
            backgroundColor: '#FFFFFF',
            rotateRatio: 0,
            click: function (item) {
                 tf = confirm(item[0] + ': ' + item[1]);
                 //if (tf == true){
                     //var click_word = item[0];
                     //document.cookie = click_word;
                     //location.href = ("list.php?word=" + item[0]);
                 //}
            }
        });
        //文字雲特殊效果
        $(document).on('mouseenter','.wordCloud',function(){
            var font_size = parseFloat($(this).css("font-size"));
            var newSize = font_size + 10;
            $(this).css("font-size",newSize + 'px');
        }).on('mouseout','.wordCloud',function(){
            var font_size = parseFloat($(this).css("font-size"));
            var newSize = font_size - 10;
            $(this).css("font-size",newSize + 'px');
        });
        //document.getElementById("list").innerHTML = "123";
    //}
    });
    </script>
   
    <div class="section">
<p><?php echo $title_1;?></p>
<table border="0" height="50" width="650px" align="center" top:0; >
        <tr height="50">
            <td width="35%" align="center">
            
            </td>
            <tr>
            <td width="65%" align="center">
                <div id="contain">
                    <div id="wordCloud">
                    </div>
                </div>
            </td>
        </tr>
        </tr>
    </table><br><br>
                    </div>
     <div id="clear"></div>

            
        <div id="footer"></div></div>
    
</body>
</html>