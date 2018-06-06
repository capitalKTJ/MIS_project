<?php
include 'connect.php';
session_start();
// $_SESSION['session_Email']='';
// $Pass=$_POST["Pass"];
if(isset($_SESSION['session_Email'])){
    echo '<form action="user_logout.php" method="post" enctype="multipart/form-data"><input type="Submit" value="登出" style="position:relative;left:90%;background-color: #92a8d1;color: black;border: 2px solid #8B8B8B;padding: 5px 10px;text-align: center;text-decoration: none;display: inline-block;font-size: 15px;margin: 2px 1px;transition-duration: 0.4s;cursor: pointer;" > </form> <br><br>';
    echo'
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="style2.css" rel="stylesheet" type="text/css">
        <link href="step.css" rel="stylesheet">
        
        <title>金融法規關鍵分析軟體機器人</title>
        <style type="text/css">  
            .label{   
            display:block;  
            margin:.7em 0em;   
            }   
        </style>';
    }else{ 
echo '你沒有這個權限'; 
header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
} 
    ?>   
        
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
       <script>
        $(function(){
            var timer;
        $('.btn').on('click',function(){
        $('.btn').addClass('click');
        clearTimeout(timer);
        timer = setTimeout(function(){
        $('.btn').removeClass('click');
            },2000);
                    });
                        });
</script>
<!-- <script src="/jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
  $("#show").click(function(){
  $("btn").show();
  });
});
</script> -->
<?php

// $Pass=$_POST["Pass"];
// $sql="select * from member where Email='$Email' and Pass='$Pass'";
if(isset($_SESSION['session_Email'])){
    echo'
    </head>

        <body>

        <div id="container">
            <div id="headbox">
                <h1>金融法規關鍵分析軟體機器人</h1>
                <nav class="global-nav">

                    <ul>
                        <li class="nav-item"><a href="home.php">首頁</a></li>
                        <li class="nav-item"><a href="service.php">服務項目</a></li>
                        <li class="nav-item"><a href="tester1.php">試用專區</a></li>
                        <li class="nav-item  active"><a href="user.php">會員專區</a></li>
                        <li class="nav-item"><a href="about.php">關於我們</a></li>
                    </ul>

                </nav>
                </nav>
            </div>

            <center>
            <div id="mainbody">
                <p style=" font-size: 20px;border-left-style: solid;border-width: 8px;border-left-color:#006699; text-align: justify-all;text-indent:2em;">成為我們的會員,除了提供試用專區的服務以外，還有金管會保險局、銀行局、證券期貨局相關裁罰案件的搜尋比對功能</p>
            

<div class="grid-container">
<div class="left">
    <form action="search.php" method="post" enctype="multipart/form-data">
    <input type="Submit" class="button" value="保險局" style="width:100px;"/>
    </form>
    <form>
    <input type="Submit" class="button" value="銀行局" style="width:100px;"/>
    </form>
    <form>
    <input type="Submit" class="button" value="證卷期貨局" style="width:100px;"/>
</form>
</div>
<div class="right">
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
  <div class="active step">
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

</div>

     <form action="wrselect.php" method="post" enctype="multipart/form-data">
                              
                        
                            
                        

                        <label class="label">網址 #1: <input type="text" name="website1" id="txt" /></label>
                        <label class="label">網址 #2: <input type="text" name="website2" id="txt" /></label>
                        <label class="label">網址 #3: <input type="text" name="website3" id="txt" /></label>

                        <center>
                            
                            <input type="Submit" class="button" value="分析資料" ></div></center>';
                          
                        }else{ 
                           
                            header("Refresh; url=home.php" );//兩秒之後跳轉到登入頁面 
                            } 
                            ?>
                               
                      <?php
                     
                      // $Pass=$_POST["Pass"];
                      // $sql="select * from member where Email='$Email' and Pass='$Pass'";
                      if(isset($_SESSION['session_Email'])){
                      echo'
                 
                        </form>                
                    <br>

                    </form>
            </center>
            
            </div></div></div>
            <div id="footer"></div>

        </div>';
    }else{ 
        
        header("Refresh; url=home.php" );//兩秒之後跳轉到登入頁面 
        } 
        ?>
    </body>
</html>
