<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
	<script src="wordcloud2.js"></script>
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
  border:thin solid #DBDBDB;
  align:center;
  width:650px;
  height:400px;/* left:19%; */
  /* position:absolute;top:10%; */
}
#wordCloud{
  background-color:#DBDBDB;
  width:100%;
  height:400px;
  left:0;/* position:absolute; */
}
</style>
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

                        
                        <li class="side"><a href="search.php">搜尋字詞</a></li>
                        <li class="side"><a href="select_2.php">資料對比</a></li>
                        <li class="side active"><a href="select_mult.php">合併資料檢視</a></li>
                        <li class="side"><a href="select_detail.php">單筆資料檢視</a></li>
                        <li class="side"><a href="time_search_batch.php">時間軸分析</a></li>
                    
                    </ul>
</div>

    <?php
        include 'connect.php';
        $sub = $_POST['sub'];
        //echo $sub;
        $check_num2 = $_POST['web'];
        $count = count($check_num2);
        //echo $count;
        if($count != 2){
            echo "<script>alert('請選取2筆資料'); location.href = 'select_mult.php'</script>";
        }
        //if($count = 0){
            //echo "<script>alert('請選取資料'); location.href = 'select_mult.php'</script>";
        //}
    ?>
    <?php
        $web = $_POST ["web"];
        //print_r($web);
    ?>
    <?php
        $title_1 = "";
        $url_1 = "";
        $title_2 = "";
        $url_2 = "";
        if($sub == "all"){
            $sql_1 = "SELECT json,title,url FROM `detail` WHERE detail_id='$web[0]'";
            $result1=mysqli_query($conn,$sql_1) or die("fail");
            if(mysqli_num_rows($result1)>0){
                while ($row = mysqli_fetch_array($result1)) {
                    $title_1 = $row['title'];
                    $url_1 = $row['url'];
                    $result_1=$row['json'];
                    //echo $result_1;
                    $retemp1_1 = str_replace('"','',$result_1);
                    $retemp1_2 = str_replace('{','',$retemp1_1);
                    $retemp1_3 = str_replace('}','',$retemp1_2);
                    $retemp1_4 = str_replace(':',',',$retemp1_3);
                    $result_array_1=explode(',',$retemp1_4);
                    //print_r($result_array);
                }
            }
            //print_r($result_array_1);
        
            $sql_2 = "SELECT json,title,url FROM `detail` WHERE detail_id='$web[1]'";
            $result2=mysqli_query($conn,$sql_2) or die("fail");
            if(mysqli_num_rows($result2)>0){
                while ($row = mysqli_fetch_array($result2)) {
                    $title_2 = $row['title'];
                    $url_2 = $row['url'];
                    $result_2=$row['json'];
                    //echo $result_1;
                    $retemp2_1 = str_replace('"','',$result_2);
                    $retemp2_2 = str_replace('{','',$retemp2_1);
                    $retemp2_3 = str_replace('}','',$retemp2_2);
                    $retemp2_4 = str_replace(':',',',$retemp2_3);
                    $result_array_2=explode(',',$retemp2_4);
                    //print_r($result_array);
                }
            }
            //print_r($result_array_2);
            }else{
                $sql_1="SELECT word,tfidf,title,url FROM detail_content INNER JOIN detail ON detail.detail_id=detail_content.detail_id WHERE detail.detail_id='$web[0]' AND detail_content.sub='$sub'";
                $result1=mysqli_query($conn,$sql_1) or die("fail");
                if(mysqli_num_rows($result1)>0){
                    $i = 0;
                    $j = 0;
                    $result_word_1 = array();
                    $result_tfidf_1 = array();
                    while ($row = mysqli_fetch_array($result1)) {
                        $title_1 = $row['title'];
                        $url_1 = $row['url'];
                        $result_word_1[$i]=$row['word'];
                        $i++;
                        $result_tfidf_1[$j]=$row['tfidf'];
                        $j++;  
                        //$result_array=explode(',',$retemp1_4);
                        //print_r($result_array);
                    }
                    //print_r($result_word_1);
                    //print_r($result_tfidf_1);
                    //echo $result_word_1[0];
                    $result_array_1 = [];
                    for($k=0;$k<count($result_word_1);$k++){
                        array_push($result_array_1,$result_word_1[$k]);
                        array_push($result_array_1,$result_tfidf_1[$k]); 
                    }
                    //print_r($result_array_1);
                }

                $sql_2="SELECT word,tfidf,title,url FROM detail_content INNER JOIN detail ON detail.detail_id=detail_content.detail_id WHERE detail.detail_id='$web[1]' AND detail_content.sub='$sub'";
                $result2=mysqli_query($conn,$sql_2) or die("fail");
                if(mysqli_num_rows($result2)>0){
                    $m = 0;
                    $n = 0;
                    $result_word_2 = array();
                    $result_tfidf_2 = array();
                    while ($row = mysqli_fetch_array($result2)) {
                        $title_2 = $row['title'];
                        $url_2 = $row['url'];
                        $result_word_2[$m]=$row['word'];
                        $m++;
                        $result_tfidf_2[$n]=$row['tfidf'];
                        $n++;  
                        //$result_array=explode(',',$retemp1_4);
                        //print_r($result_array);
                    }
                    //print_r($result_word_2);
                    //print_r($result_tfidf_2);
                    //echo $result_word_2[0];
                    $result_array_2 = [];
                    for($o=0;$o<count($result_word_2);$o++){
                        array_push($result_array_2,$result_word_2[$o]);
                        array_push($result_array_2,$result_tfidf_2[$o]); 
                    }
                    //print_r($result_array_2);
                }
                
            }
    ?>
    
    <script>
    $(function(){
    //first array
    var array1_1 = ["<?php echo join("\",\"",$result_array_1); ?>"];
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
    var arraykey_1 = [];
    for(var i=0;i<array1_1.length;i++){
        arraykey_1.push(array1_1[i]);
        i++;
    }
    //console.log(arraykey_1);
    //second array
    var array1_2 = ["<?php echo join("\",\"",$result_array_2); ?>"];
    //console.log(array1_2);
    var array2_2 = [];
    for(var j=0;j<array1_2.length;j++){
        //console.log(array1_1[i]);
        var tarr_2 = [];
        tarr_2.push(array1_2[j],array1_2[j+1]);
        //console.log(tarr_2);
        array2_2.push(tarr_2);
        j++;
    }
    //console.log(array2_2);
    var arraykey_2 = [];
    for(var i=0;i<array1_2.length;i++){
        arraykey_2.push(array1_2[i]);
        i++;
    }
    //console.log(arraykey_2);
    //final array
    var array_final = [];
    for(var m=0;m<array2_1.length;m++){
        //console.log(array2_1[m][0]);
        var array_temp = [];
        var val ;
        for(var n=0;n<array2_2.length;n++){
        //console.log(array2_2[n][0]);
            if(array2_1[m][0] == array2_2[n][0]){
                var p = parseFloat(array2_1[m][1]);
                var q = parseFloat(array2_2[n][1]);
                var temp = p+q;
                val = temp/2;
                //console.log(val);
                break;
            }else{
                val = array2_1[m][1];
            }
        }
        var value = val.toString();
        array_temp.push(array2_1[m][0],value);
        //console.log(array_temp);
        array_final.push(array_temp);
    }//console.log(array_final);

    function differenceOf2Arrays (array1, array2) {
        var temp = [];
        for(i in array2) {
            if(array1.indexOf(array2[i]) === -1) temp.push(i);
        }
        return temp;
    }
    var diff = differenceOf2Arrays(arraykey_1, arraykey_2);
    //console.log(diff);
    
    for(i=0;i<diff.length;i++){
        //console.log(array2_2[diff[i]][0]);
        var diff2d = [];
        diff2d.push(array2_2[diff[i]][0],array2_2[diff[i]][1]);
        array_final.push(diff2d);
    }
    //console.log(array_final);
    var tf;
    WordCloud($('#wordCloud')[0], {
            list: array_final,
            classes: 'wordCloud',
            wait: 15,//30
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
<div class="section">
    
    <table border="0" height="100" width="650px" align="center">
        <tr height="400">
            <td width="35%"align="center">
            <p><?php echo $title_1;?><!-- <br><?php echo $url_1;?> --></p></td>
            <td><p>&</p></td>
            <td><p><?php echo $title_2;?><!-- <br><?php echo $url_2;?> --></p>
            </td></tr><tr height="400">
            <td width="60%"align="center">
                <div id="contain">
                    <div id="wordCloud">
                    </div>
                    
                </div><br><br>
            </td>
        </tr>
    </table></div>
     <div id="clear"></div>

            
        <div id="footer"></div></div>
    
</body>
</html>