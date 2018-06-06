 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="style2.css" rel="stylesheet" type="text/css">
        <title>金融法規關鍵分析軟體機器人</title>
    </head>

<!--     <script language="JavaScript" type="text/JavaScript">
function check(){
p1 = document.form.pw1.value;
p2 = document.form1.pw2.value;
if ( p1 == p2 ) { 
if ( p1.length > 6 && p2.length > 6 ) {return true;}
else {alert("密碼設定至少 7 碼以上"); return false;}}
else {
alert("兩組密碼不一致");
return false;}
}

</SCRIPT> -->

        <body>

        <div id="container">
            <div id="headbox">
                <h1>金融法規關鍵分析軟體機器人</h1>
                <nav class="global-nav">
                    <ul>
                        <li class="nav-item"><a href="home.php">首頁</a></li>
                        <li class="nav-item"><a href="service.php">服務項目</a></li>
                        <li class="nav-item"><a href="tester1.php">試用專區</a></li>
                        <li class="nav-item active"><a href="useradd.php">會員註冊</a></li>
                        <li class="nav-item"><a href="about.php">意見回饋</a></li>
                    </ul>
                </nav>
            </div>

            <center>
            <div id="mainbody">
                <div class="personinfo">

            <?php

                echo'
                <form action="user_insert.php" method="post" enctype="multipart/form-data">
                <br>
                <h1><img src="notes.png">會員註冊</h1>
                <hr size="1px" align="center" width="50%"><br>
                帳號  <input type="text" name="Email" placeholder="請輸入email" required="required"/><br><br>
                密碼  <input type="text" name="Pass"/ required="required"> <br><br>
                名稱  <input type="text" name="Username" required="required" placeholder="請輸入姓名或暱稱"/> <br><br>
                手機  <input type="text" name="Cellphone" required="required"/> <br><br>
                會員類型  &nbsp;&nbsp;&nbsp;<input type="radio" name="Usertype" value="normal" required="required" checked>一般用戶
                <input type="radio" name="Usertype" value="Vip">VIP<br><br><br><br><br><br>
                <input type="submit" class="button" value="註冊"><br>
                </form>'

            ?>
                </div>
                
            </div>
            </center>


            
            <div id="footer"></div>

        </div>
    </body>
</html>