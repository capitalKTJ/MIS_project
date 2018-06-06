<?php
include 'connect.php';
session_start();
// $_SESSION['session_Email']='';
// $Pass=$_POST["Pass"];
if(isset($_SESSION['session_Email'])){
    echo '<a href="user_logout.php">登出</a>  <br><br>';
    echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
	<script src="wordcloud2.js"></script>
	<script src="word1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="cssstyle.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>';
}else{ 
    echo '你沒有這個權限'; 
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    } 
        ?>   
<script>
    <!--console.log(tf);-->
    //var temp = document.cookie;
    //var array = [];
    //var array = temp.split(";");
    //document.write(array[0]);
    
    //console.log(temp);
</script>
<?php
if(isset($_SESSION['session_Email'])){
    echo'
<body>
    <form method="post" action="batch_cloud.php">';
}else{ 
  
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    } 
        ?>   
    <?php
    include 'connect.php';
    if(isset($_SESSION['session_Email'])){
    //print_r($_COOKIE);
    //echo $_COOKIE['temp'];
    $sql="SELECT * FROM batch ";//INNER JOIN tmdetail ON detail.detail_id=tmdetail.Detail_id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        //echo '</br>';
        echo '<table border=1>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo "<td>".$row["batch_name"]."</td>";
            echo "<td>";
            echo "<input type='checkbox' name='web[]' value='".$row["batch_id"]."' />";
            echo "</td>";
            echo '</tr>';
        }
        echo '</table>';
    }
    else {echo "0 results";}
    
   echo'
    <center><input type="submit" name="" class="button" value="確定" /></center>
    </form>
    <p id="list"></p>';
}else{ 
   
    header("Refresh:1; url=home.php" );//兩秒之後跳轉到登入頁面 
    }  ?>
</body>
</html>