<?php
include 'connect.php';
session_start();
?>
<?php
 if(isset($_SESSION['session_Email'])){
  
echo'
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
        top:5px; 
        left:50px; 
    } 
    </style>
</head>
<style>
#contain{
  border:solid #000000;
  align:center;
  width:800px;
  height:400px;/* left:9.5%; */
  position:absolute;
  top:30%;
}
#wordCloud_1,#wordCloud_2{
    display: inline-block;
    line-height: 400px;
}
#wordCloud_1{
  background-color:#888888;
  border-right:solid #000000;
  width:49%;
  height:400px;
  left:0;
  position:absolute;
}
#wordCloud_2{
  background-color:#222222;
  width:49%;
  height:400px;
  right:0;
  position:absolute;
}
</style>
<script></script>
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
                        <li class="side active"><a href="select_2.php">資料對比</a></li>
                        <li class="side"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>'; 
}else{ 
    echo '你沒有這個權限'; 
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    } 
    ?>
<?php
    include 'connect.php';
    $sub = $_POST['sub'];
    //echo $sub;
    $check_num2 = $_POST['web'];
        $count = count($check_num2);
        //echo $count;
        if($count != 2){
            echo "<script>alert('請選取2筆資料'); location.href = 'select_2.php'</script>";
        }
    //echo $count;
    //if($count != 2){
        //echo "<script>alert('請選取2筆資料'); location.href = 'select_2.php'</script>";
    //}
?>
<?php
    $web = $_POST ["web"];
    //print_r($web);
?>
<?php
    $title_1 = "";
    $url_1 = "";
    if($sub == "all"){
        $sql="SELECT json,title,url FROM `detail` WHERE detail_id='$web[0]'";
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
    }else{
        $sql="SELECT word,tfidf,title,url FROM detail_content INNER JOIN detail ON detail.detail_id=detail_content.detail_id WHERE detail.detail_id='$web[0]' AND detail_content.sub='$sub'";
        $result=mysqli_query($conn,$sql) or die("fail");
        if(mysqli_num_rows($result)>0){
            $i = 0;
            $j = 0;
            $result_word = array();
            $result_tfidf = array();
            while ($row = mysqli_fetch_array($result)) {
                $title_1 = $row['title'];
                $url_1 = $row['url'];
                $result_word[$i]=$row['word'];
                $i++;
                $result_tfidf[$j]=$row['tfidf'];
                $j++;  
                //$result_array=explode(',',$retemp1_4);
                //print_r($result_array);
            }
            //print_r($result_word);
            //print_r($result_tfidf);
            //echo $result_word[0];
            $result_array = [];
            for($k=0;$k<count($result_word);$k++){
                array_push($result_array,$result_word[$k]);
                array_push($result_array,$result_tfidf[$k]); 
            }
            //print_r($result_array);
        }
        else {echo "no results";}
    }
        
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
    }
    //console.log(array2_1);
    //array1_1.forEach(function(data){
        //console.log(data);
        //array2_1[data[0]]=data[1];
        //array2_1.push(data[0],data[1]);
    //})

    //console.log(array2_1);
    //document.write(array1_1.length);
    
    //while(array1_1.length>0){
        //for(var i=0;i<array1_1.length;i++){
            //var tarr1 = [];
            //for (var j=0; j<2; j++) {
                //tarr1.push(array1_1[j]);
                //console.log(tarr1);
            //}
            //array2_1.push(tarr1);
            //i++;
            //tarr1.push(array1_1[i],array1_1[i+1]);
            //var i += 1;
        //}
        //document.write(array2_1);
    //}
    var tf;
    WordCloud($('#wordCloud_1')[0], {
            list: array2_1,
            classes: 'wordCloud',
            wait: 10,//30
            gridSize: 10,//10
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

<?php
    $title_2 = "";
    $url_2 = "";
    if($sub == "all"){
        $sql_2="SELECT json,title,url FROM `detail` WHERE detail_id='$web[1]'";
        $result2=mysqli_query($conn,$sql_2) or die("fail");
        if(mysqli_num_rows($result2)>0){
            while ($row_2 = mysqli_fetch_array($result2)) {
                $title_2 = $row_2['title'];
                $url_2 = $row_2['url'];
                $result_2=$row_2['json'];
                //echo $result_2;
                $retemp2_1 = str_replace('"','',$result_2);
                $retemp2_2 = str_replace('{','',$retemp2_1);
                $retemp2_3 = str_replace('}','',$retemp2_2);
                $retemp2_4 = str_replace(':',',',$retemp2_3);
                $result_array_2=explode(',',$retemp2_4);
                //print_r($result_array_2);
            }
        }
        else {echo "no results";}
    }else{
        $sql="SELECT word,tfidf,title,url FROM detail_content INNER JOIN detail ON detail.detail_id=detail_content.detail_id WHERE detail.detail_id='$web[1]' AND detail_content.sub='$sub'";
        $result2=mysqli_query($conn,$sql) or die("fail");
        if(mysqli_num_rows($result2)>0){
            $m = 0;
            $n = 0;
            $result_word_2 = array();
            $result_tfidf_2 = array();
            while ($row_2 = mysqli_fetch_array($result2)) {
                $title_2 = $row_2['title'];
                $url_2 = $row_2['url'];
                $result_word_2[$m]=$row_2['word'];
                $m++;
                $result_tfidf_2[$n]=$row_2['tfidf'];
                $n++;  
                //$result_array=explode(',',$retemp1_4);
                //print_r($result_array);
            }
            //print_r($result_word);
            //print_r($result_tfidf);
            //echo $result_word[0];
            $result_array_2 = [];
            for($o=0;$o<count($result_word_2);$o++){
                array_push($result_array_2,$result_word_2[$o]);
                array_push($result_array_2,$result_tfidf_2[$o]); 
            }
            //print_r($result_array_2);
        }
        else {echo "no results";}
    }
    ?>
    <script>
    $(function(){
    //var array1_2 = JSON.parse(<?php json_encode($result_array); ?>);
    var array1_2 = ["<?php echo join("\",\"",$result_array_2); ?>"];
    console.log(array1_2);
    var array2_2 = [];
    for(var j=0;j<array1_2.length;j++){
        //console.log(array1_2[j]);
        var tarr_2 = [];
        tarr_2.push(array1_2[j],array1_2[j+1]);
        //console.log(tarr_2);
        array2_2.push(tarr_2);
        j++;
    }
    //console.log(array2_2);
    var tf_2;
    WordCloud($('#wordCloud_2')[0], {
            list: array2_2,
            classes: 'wordCloud',
            wait: 10,//30
            gridSize: 10,//10
            weightFactor: 250,//20
            fontFamily: 'Hiragino Mincho Pro, serif',
            color: 'random-dark',
            backgroundColor: '#FFFFFF',
            rotateRatio: 0,
            click: function (item) {
                tf_2 = confirm(item[0] + ': ' + item[1]);
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
    <table height="600" width="650px" align="center">
        <tr height="20">
            <td width="400px"align="center"><?php echo $title_1;?></td>
            <td width="400px"align="center"><?php echo $title_2;?></td>
        </tr>
        <tr height="400">
            <td colspan="2">
            <div id="contain">
                <div id="wordCloud_1" style="width:49%;height:400px;">12334</div><!--style="width:50%;height:400px;border:thin solid #DBDBDB;background-color:#DBDBDB"-->
                <div id="wordCloud_2" style="width:49%;height:400px;">
                </div>
            </td>
        </tr>
    </table></div>
     <div id="clear"></div>

            
        <div id="footer"></div></div>
</body>
</html>