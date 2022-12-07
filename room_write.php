<?php
    $room_name = $_GET["room_name"];
    $user_name = $_COOKIE["user_name"];
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
    <title>頭がズキズキする</title>
</head>
<body>
<div style="line-height:30%">
<br>
<br>
<h1 style="text-align: center;font-size:16px">
    <a href="https://anq.medicalkotoba.com/" height="5" width="10">
      <img src="./images/newlogo.png" alt="みんなの症状ことば" />
    <a>
  </h1><br>
<h4 style="text-align: center;font-size:16px;color:#e52a94;font-weight: bold">頭がズキズキする</h4><br>
<h4 style="text-align: center;font-size:16px;color:#0399e4;font-weight: bold" id = "room_name">
    <?php
    echo "#",$room_name
    ?>
</h4><br>
</div>
    <form action="content_save.php?room_name=<?=$room_name?>" method="post">
    <div style = "float:none;margin:0 auto" class="col-sm-9">
    <div style = "float:none;margin:0 auto" class="form-floating col-sm-3">
    <h2 style = "font-size:16px;font-weight: bold">
        <?php
        echo "@",$user_name
        ?>
    </h2>
        <textarea style="resize: none;" class="form-control" rows="8" cols="100" name = "room_content" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('内容を入力してください。')"></textarea>
        <br>
        <button type="submit" class="btn text-white" style="background-color: #00bbff;WIDTH: 100%" id = "submit_content">トークを保存</button>
    </div>
    </div>
    </form>
    <br>
    <form action="room_menu.php" method="get">
            <div style = "float:none;margin:0 auto" class="col-sm-9">
                <div style = "float:none;margin:0 auto" class="form-floating col-sm-3">
                    <input type=hidden name=room_name value=<?=$room_name?>>
                    <button type="submit" class="btn text-white" style="background-color: #c0c0c0;WIDTH: 100%" id = "back">戻る</button>
                </div>
            </div>
    </form>
</body>
</html>
