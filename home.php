 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="wordcloud2.js"></script>
        <script src="word1.js"></script>
        <link href="style2.css" rel="stylesheet" type="text/css">
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
    <?php
    include 'connect.php';
    $sql="SELECT json FROM `selecturlset` ORDER BY set_id DESC LIMIT 1";
    $result=mysqli_query($conn,$sql) or die("fail");
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_array($result)) {
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
        }console.log(array2_1);
    
        var tf;
        WordCloud($('#wordCloud')[0], {
                list: array2_1,
                classes: 'wordCloud',
                wait: 15,//30
                gridSize: 20,//10
                weightFactor: 250,//20
                fontFamily: 'Hiragino Mincho Pro, serif',
                color: 'random-dark',
                backgroundColor: 'rgba(255, 255, 255, 0.7)',
                rotateRatio: 0,
                click: function (item) {
                     tf = confirm(item[0] + ': ' + item[1]);
                     if (tf == true){
                         var click_word = item[0];
                         document.cookie = click_word;
                         location.href = ("list.php?word=" + item[0]);
                     }
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
    <body>
    
<!-- <script type="text/javascript" color="102,185,255" opacity="100" zIndex="-2" count="99" src="//static.ffis.me/javascript/canvas-nest.min.js"></script> -->
        <div id="container">
            <div id="headbox">
                <h1>金融法規關鍵分析軟體機器人</h1>
                <nav class="global-nav">
<!--                     <hr size="1px" align="center" width="100%"> -->
                    <ul>
                        <li class="nav-item active"><a href="home.php">首頁</a></li>
                        <li class="nav-item"><a href="service.php">服務項目</a></li>
                        <li class="nav-item"><a href="tester1.php">試用專區</a></li>
                        <li class="nav-item"><a href="useradd.php">會員註冊</a></li>
                        <li class="nav-item"><a href="about.php">關於我們</a></li>
                    </ul>
<!--                     <hr size="1px" align="center" width="100%"> -->
                </nav>
            </div>
<!--             	<img src="hello.jpg" width="500" height="150" alt="" valign="middle">
                <ul>
                	<li class="menudeco"></li>
                	<li><a href="#">認識我們</a></li>
                	<li class="menudeco"></li>
                	<li><a href="#">服務項目</a></li>
                	<li class="menudeco"></li>
                	<li><a href="#">會員專區</a></li>
                	<li class="menudeco"></li>
                	<li><a href="#">客服專線</a></li>
                	<li class="menudeco"></li>
                </ul> -->



        <div id="sidebar">

            <?php

            echo'
            <form action="post.php" method="post" enctype="multipart/form-data">
            <center><h2><img src="user.png" vspace="20" hspace="5" width="38" height="36" alt="" valign="middle">會員登入</h2>
            <hr size="1px" align="center" width="80%"><br>
            帳號  <input type="text" name="Email"/><br><br>
            密碼  <input type="password" name="Pass"/> <br><br>
            <input type="submit" class="button" value="登入"><br>
            <hr size="1px" align="center" width="80%">
            還不是會員？ <a href="useradd.php">加入會員</a></center>
            </form>'

            ?>

        </div>


        <div id="sidebody">

        	<div class="topic">服務簡介</div>
            <hr size="1px" align="center" width="100%">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;運用歷年來金融監督管理委員會-保險局的「裁罰案件」資料去做關鍵字詞的分析，整合成文字雲的形式以方便使用者觀看。


<br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分析後的顯示結果可以幫助使用者了解最近企業容易因為哪些因素遭到裁罰，而使用者就能依據我們所提供的資訊提早採取預防措施，達到「錢財不流失」的目的。
            <br><br><br><br>
            <div class="topic">立即前往試用 => <a href="tester1.php"><input type="submit" class="button" value="GO!"></a><br></div>

            <!-- <div class="sidebody1"><center>服務簡介</center></div><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我們的服務可以讓您一次匯入多筆網址或檔案，自動幫您做資料的分析，利用tf-idf評估各個詞語的重要程度，找出關鍵字詞，並根據分析結果產生文字雲。<br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此服務可以讓您輕鬆掌握文章關鍵字詞與時下火紅的資訊，另外您也可以付費使用時間軸的服務，透過定期分析資訊，讓您了解此資訊從過去到現在的變化和差別。
            <br><br><br><br>

            <div class="sidebody1"><center>試用專區</center></div>



                <?php
                /*echo "試用專區";*/
                    echo'
                    <form action="insert.php" method="post" enctype="multipart/form-data">
                              
                        <p id="user">  
                        <label>使用者: <input type="text" name="username" /></label><br><br>
                        <label>分析目的: <input type="text" name="purpose" /></label><br><br>
                        <label>文字雲名稱: <input type="text" name="cloudname" /></label>
                        </p>

                        <form id="myForm" method="get" action="./" />

                        <label class="label">網址 #1: <input type="text" name="website1" id="txt" /></label>
                        <label class="label">網址 #2: <input type="text" name="website2" id="txt" /></label>
                        <label class="label">網址 #3: <input type="text" name="website3" id="txt" /></label>
                        <center><p><input type="Submit" class="button" value="送出" /></p></center>
                        </form> 
                    </form>'
                ?> -->

        </div>
        <div id="wordCloud" style="width:450px;height:300px;border:thin solid rgba(255, 255, 255, 0.7);background-color:rgba(255, 255, 255, 0.7);position:relative;top:400px;left:480px;">
            </div>
        <div id="clear"></div>

            
        <div id="footer"></div>

        </div>
        </div>
    </body>
</html>