<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
        <script src="wordcloud2.js"></script>
		<script src="word1.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="style2.css" rel="stylesheet" type="text/css">
        <link href="step.css" rel="stylesheet" type="text/css">
        <link href="sidemenu.css" rel="stylesheet" type="text/css">
        <script src="textbox.js"></script>
        <title>金融法規關鍵分析軟體機器人</title>
        <style type="text/css">  
            .label{   
            display:block;  
            margin:.7em 0em;   
            }   
        </style>
        
    </head>
  <script>
    $(function(){
    $(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "count.json",
        dataType: "json",
        cache: false,
        success: function(data) {
            processData(data);
        },
    });
});

function processData(allText) {
    //var allTextwords = allText.split(/\r\n|\n/);
    //var headers = allTextwords[0].split(',');
    var words = [];
    $.each(allText,function(key,val){
         
         var temp = [];
         temp.push(key,val);
         //document.write(temp);
         //document.write("\n");
         words.push(temp);
    })
    //console.log(words);
    
    //console.log(allText);
    /*for (var i=1; i<allTextwords.length; i++) {
        var data = allTextwords[i].split(',');
        if (data.length == headers.length) {

            var tarr = [];
            for (var j=0; j<headers.length; j++) {
                tarr.push(data[j]);
            }
            words.push(tarr);
        }
    }*/
    //console.log(words);
    //document.write(words);

 var tf;
  WordCloud($('#wordCloud')[0], {
            list: words,
            classes: 'wordCloud',
            wait: 30,
            gridSize: 10,
            weightFactor: 250,
            fontFamily: 'Hiragino Mincho Pro, serif',
            color: 'random-dark',
            backgroundColor: '#FFFFFF',
            rotateRatio: 0,
            click: function (item) {
                 tf = confirm(item[0] + ': ' + item[1]);
                 if (tf == true){
                     //var click_word = item[0];
                     //document.cookie = click_word;
                    //  location.href = ("list.php?word=" + item[0]);
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
            var newSize = font_size - 10 ;
            $(this).css("font-size",newSize + 'px');
        });
        //document.getElementById("list").innerHTML = "123";
    }
            
  });
    </script>
  <body>

        <div id="container">
            <div id="headbox">
                <h1>文字軌跡分析服務</h1>
                <nav class="global-nav">

                    <ul>
                        <li class="nav-item"><a href="home.php">首頁</a></li>
                        <li class="nav-item"><a href="service.php">服務項目</a></li>
                        <li class="nav-item active"><a href="tester1.php">試用專區</a></li>
                        <li class="nav-item"><a href="useradd.php">會員註冊</a></li>
                        <li class="nav-item"><a href="about.php">關於我們</a></li>
                    </ul>

                </nav>
            </div>

<center>
         <div id="mainbody">

            
<div class="ui small steps">
  <div class="step">
    <img src="checked.png">
    <div class="content">
      <div class="title">step1<br>&nbsp;&nbsp;輸入網址</div>
    </div>
  </div>
  <!-- <div class="step">
    <img src="checked.png">
    <div class="content">
      <div class="title">step2<br>&nbsp;&nbsp;取得資料</div>
    </div>
  </div> -->
  <div class="step">
    <img src="checked.png">
    <div class="content">
      <div class="title">step2<br>&nbsp;&nbsp;分析資料</div>
    </div>
  </div>
  <div class="active step">
    <img src="cloud.png">
    <div class="content">
      <div class="title">step3<br>&nbsp;&nbsp;產生文字雲</div>
    </div>
  </div>

</div><br><br>
<div id="wdcontainer" style="width:98.7%;margin-left:0;">
            <div id="wordCloud" style="width:650px;height:550px;border:thin solid #DBDBDB;background-color:#DBDBDB">
            </div>
        </div>
</center>


        </div>

        <div id="clear"></div>

            
        <div id="footer"></div>

        </div>
        </div>
    </body>
    
</html>