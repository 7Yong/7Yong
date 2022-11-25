<?php
    $room_name = $_GET["room_name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
    <title>ShowRoomContents</title>
    <style>
    div.fixed {
        position: fixed;
    }
    </style>
</head>
<body>
    <h1 style="text-align: center"><img width="388" src="./images/ptitle.png" alt="みんなの症状ことば"></h1><br>
    <h3 style="text-align: center">頭がズキズキする</h3><br>
    <h4 style="text-align: center" id = "room_name">
    <?php
    echo "#",$room_name
    ?>
</h4><br>
<h4 style="text-align: center">
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
                echo "@".$row['UserName'];
                echo "  ".$row['Date']."<br>";
                echo $row['Content']."<hr>";
            }
        }
        //style = "float:none;position: fixed;bottom: 100px;"
    ?>
</h4>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <form action="room_menu.php" method="get">
        <div calss="row">
            <div style = "position: fixed;bottom: 100px;" class="col-sm-9">
            <div style = "position: fixed;bottom: 100px;" class="form-floating col-sm-3">
                <input type=hidden name=room_name value=<?=$room_name?>>
                <button type="submit" style = "WIDTH: 150px" class="btn btn-danger" id = "go_menu">他のルームをみる</button>
            </div>
            </div>
        </div>
    </form>
    <form action="room_write.php" method="get">
        <div calss="row">
            <div style = "position: fixed;bottom: 50px;" class="col-sm-9">
            <div style = "position: fixed;bottom: 50px;" class="form-floating col-sm-3">
                <input type=hidden name=room_name value=<?=$room_name?>>
                <button type="submit" style = "WIDTH: 150px" class="btn btn-danger" id = "back">ルーム入力</button>
            </div>
            </div>
        </div>
    </form>
    <form action="user_regist.php">
    <div calss="row">
            <div style = "position: fixed;bottom: 0px;" class="col-sm-9">
            <div style = "position: fixed;bottom: 0px;" class="form-floating col-sm-3">
                <button class="btn text-white" style="background-color: purple;WIDTH: 150px;" id = "go_home">閉じる</button>
            </div>
            </div>
    </div>
    </form>
    
</body>
</html>