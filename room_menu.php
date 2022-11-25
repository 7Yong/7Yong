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
    <title>RoomMenu</title>
</head>
<body>
<h1 style="text-align: center"><img width="388" src="./images/ptitle.png" alt="みんなの症状ことば"></h1><br>
<h2 style="text-align: center">仲間ルームを作ろう！</h2><br>
<h4 style="text-align: center;color:blue;" id = "room_name">
    <?php
    echo "#",$room_name
    ?>
</h4><br>
<form action = "room_write.php" method="get"><!--method="get"-->
            <div calss="row text-center">
                <div style = "margin:0 auto" class="col-sm-9">
                <div style = "margin:0 auto" class="form-floating col-sm-3">
                    <input type=hidden name=room_name value=<?=$room_name?>>
                    <button type="submit" style="WIDTH: 100%" class="btn btn-danger" id = "save_room">仲間ルーム作成</button>
                </div>
                </div>
            </div>
</form><br>
<form action="user_regist.php">
            <div calss="row text-center">
                <div style = "margin:0 auto" class="col-sm-9">
                <div style = "margin:0 auto" class="form-floating col-sm-3">
                    <button class="btn text-white" style="background-color: purple;WIDTH: 100%;" id = "go_home">閉じる</button>
                </div>
                </div>
            </div>
</form>

<br>
<h4 style="text-align: center;color:red;">すでにあるトークルーム</h4><br>
<?php
    $host = '13.208.78.196';
    $user = 'yong';
    $pw = 'dlruddyd12';
    $dbName = 'ShanriProject';
    $conn = mysqli_connect($host, $user, $pw, $dbName);

    $sql = "select RoomName, max(Date) as Date from created_room group by RoomName order by Date desc";
    mysqli_query($conn, $sql);

    $result = $conn->query($sql);
    if(isset($result) && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $RoomName = $row['RoomName'];
            echo "<a href=show_room_contents.php?room_name=$RoomName>#$RoomName</a>"."<hr>";
        }
    }
?>
</body>
</html>