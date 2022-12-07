<?php
    $room_name = $_GET["room_name"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
    <title>ShowRoomContents</title>
    <style>
    body {
        font-family: 'Hiragino Kaku Gothic ProN','Hiragino Sans','Meiryo',sans-serif;
    }
    
    </style>
</head>
<body>
<div style="line-height:30%">
<h1 style="text-align: center;font-size:16px">
    <a href="https://anq.medicalkotoba.com/user_regist.php" height="5" width="10" target="_blank">
      <img src="./images/newlogo.png" alt="みんなの症状ことば" />
    <a>
  </h1><br>
    <h3 style="text-align: center;font-size:16px;color:#e52a94">頭がズキズキする</h3><br>
    </div>
    <h4 style="text-align: center;font-size:16px;color:#0399e4" id = "room_name">
    <?php
    echo "#",$room_name
    ?>
</h4><br>

<h4 style="font-size:14px;color:#333333">
    <?php 
        $host = '13.208.78.196';
        $user = 'yong';
        $pw = 'dlruddyd12';
        $dbName = 'ShanriProject';
        $conn = mysqli_connect($host, $user, $pw, $dbName);
        $sql = "select * from created_room where RoomName = '$room_name' order by Date desc";
        mysqli_query($conn, $sql);
        $result = $conn->query($sql);
        if(isset($result) && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "&nbsp&nbsp&nbsp";
                echo "@".$row['UserName']."  ".$row['Date']."<br>";
                //echo "  ".$row['Date']."<br>";
                echo "&nbsp&nbsp&nbsp";
                echo $row['Content'];
                echo "<hr>";
            }
        }
        //style = "float:none;position: fixed;bottom: 100px;"
    ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</h4>
<div style = "background-color:white;" calss="row">
    <form action="room_menu.php" method="get">
        <div calss="row">
            <div style = "position: fixed;bottom: 100px;width: 380px;height: 50px;margin: 0px auto;background-color: white;left: 0;right: 0;text-align: center" class="col-sm-9">
            <div style = "position: fixed;bottom: 100px;width: 380px;height: 50px;margin: 0px auto;background-color: white;left: 0;right: 0;display:inline-block" class="form-floating col-sm-3">
                <input type=hidden name=room_name value=<?=$room_name?>>
                <button type="submit" class="btn text-white" style="background-color: #00bfff;WIDTH: 70%" id = "go_menu">他のルームをみる</button>
            </div>
            </div>
        </div>
    </form>
    <form action="room_write.php" method="get">
        <div calss="row">
            <div style = "position: fixed;bottom: 50px;width: 380px;height: 50px;margin: 0px auto;background-color: white;left: 0;right: 0;text-align: center" class="col-sm-9">
            <div style = "position: fixed;bottom: 50px;width: 380px;height: 50px;margin: 0px auto;background-color: white;left: 0;right: 0;display:inline-block" class="form-floating col-sm-3">
                <input type=hidden name=room_name value=<?=$room_name?>>
                <button type="submit"class="btn text-white" style="background-color: #32cd32;WIDTH: 70%" id = "back">新規トークルームの作成</button>
            </div>
            </div>
        </div>
    </form>
    <form action="user_regist.php">
    <div calss="row">
            <div style = "position: fixed;bottom: 0px;width: 380px;height: 50px;margin: 0px auto;background-color: white;left: 0;right: 0;text-align: center" class="col-sm-9">
            <div style = "position: fixed;bottom: 0px;width: 380px;height: 50px;margin: 0px auto;background-color: white;left: 0;right: 0;display:inline-block" class="form-floating col-sm-3">
                <button class="btn text-white" style="background-color: #c0c0c0;WIDTH: 70%" id = "go_home">閉じる</button>
            </div>
            </div>
    </div>
    </form>
    </div>
</body>
</html>
