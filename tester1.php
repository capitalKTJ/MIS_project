 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="oxxo.studio">
        <meta name="copyright" content="oxxo.studio">
        <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1.0;minimum-scale=1.0;user-scalable=0; ">
        
        <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
        <link href="style2.css" rel="stylesheet">
        <link href="step.css" rel="stylesheet">
        <link href="loading1.css" rel="stylesheet">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="catalog/view/javascript/jquery/jquery-1.6.1.min.js"></script>
        <script src="jquery.loading.js"></script>
         <!-- <meta http-equiv="refresh" content="5;url=cloud.php" />  -->
        
        <title>金融法規關鍵分析軟體機器人</title>
 <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      
        <style type="text/css">  
            .label{   
            display:block;  
            margin:.7em 0em;   
            }   
        </style>
  <!-- <script> 
function subm(){ 
fup.target="_self"; 
fup.action="giveresult.php"; 
fup.submit(); 
fup.action="tester2.php"; 
fup.submit(); 
} 
</script> -->

    </head>


    <body>


        <div id="container">
            <div id="headbox">
                <h1>金融法規關鍵分析軟體機器人</h1>
                <nav class="global-nav">

                    <ul>
                        <li class="nav-item"><a href="home.php">首頁</a></li>
                        <li class="nav-item"><a href="service.php">服務項目</a></li>
                        <li class="nav-item active"><a href="tester1.php">試用專區</a></li>
                        <li class="nav-item"><a href="useradd.php">會員註冊</a></li>
                        <li class="nav-item"><a href="about.php">意見回饋</a></li>
                    </ul>

                </nav>
            </div>

<center>
        <div id="mainbody">

            
<div class="ui small steps">
  <div class="active step">
    <img src="pencil.png">
    <div class="content">
      <div class="title">step1<br>&nbsp;&nbsp;輸入網址</div>
    </div>
  </div>
 <!--  <div class="step">
    <img src="documents.png">
    <div class="content">
      <div class="title">step2<br>&nbsp;&nbsp;取得資料</div>
    </div>
  </div> -->
  <div class="step">
    <img src="analytics.png">
    <div class="content">
      <div class="title">step2<br>&nbsp;&nbsp;分析資料</div>
    </div>
  </div>
  <div class="step">
    <img src="cloud.png">
    <div class="content">
      <div class="title">step3<br>&nbsp;&nbsp;產生文字雲</div>
    </div>
  </div>

</div><br><br>


<form action="giveresult.php" method="POST" >
                              
                        <p id="user">  
                       
                      
                        </p>

                        <label class="label">網址 <input type="text" name="website" id="txt" /></label>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tf/idf權重植  <input type="text" name="tf">&nbsp;&nbsp;建議值：20
<br><br>
詞性選擇:
<select name="noun">
　<option value="n">名詞</option>
　<option value="v">動詞</option>
　<option value="nr">人名</option>
　<option value="adj">形容詞</option>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br>

                        <center>
                            <input type="Submit" class="button" value="分析資料"  /></center>
                            </form>  
                            <form action="cloud.php" method="POST"><input type="Submit" class="button" value="文字雲呈現"  /></center>
                            </form> 
                            </div></div>
                        
                       

    </center>

        <div id="clear"></div>

            
        <div id="footer"></div>

        

    </body>
</html>