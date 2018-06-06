<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>
	<script src="wordcloud2.js"></script>
	<!--<script src="word1.js"></script>-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!--<link href="cssstyle.css" rel="stylesheet" type="text/css">-->
    <title>Document</title>
</head>
<style>
#container{
  border:solid #DBDBDB;
  align:center;
  width:500px;
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

<body>
<?php
    include 'connect.php';
    $check_num2 = $_POST['web'];
    $count = count($check_num2);
    //echo $count;
    if($count != 1){
        echo "<script>alert('請選取1筆資料'); location.href = 'select_detail.php'</script>";
    }
?>
<?php
    $web = $_POST ["web"];
    //print_r($web);
?>
<?php
    $batch_name = "";
    $sql="SELECT json,batch_name FROM `batch`WHERE batch_id='$web[0]'";
    $result=mysqli_query($conn,$sql) or die("fail");
    if(mysqli_num_rows($result)>0){
        while ($row = mysqli_fetch_array($result)) {
            $title_1 = $row['batch_name'];
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

    <table border="0" height="400" width="60%" align="center">
        <tr height="400">
            <td width="35%"align="center">
            <p><?php echo $batch_name;?></p>
            </td>
            <td width="65%"align="center">
                <div id="container">
                    <div id="wordCloud">
                    </div>
                </div>
            </td>
        </tr>
    </table>
    
</body>
</html>