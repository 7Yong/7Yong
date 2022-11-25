<?php
    $room_name = $_GET["room_name"];
    $user_name = $_COOKIE["user_name"];
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
    <title>RommWrite</title>
</head>
<body>
<h1 style="text-align: center"><img width="388" src="./images/ptitle.png" alt="みんなの症状ことば"></h1><br>
<h3 style="text-align: center">頭がズキズキする</h3><br>
<h4 style="text-align: center;color:blue;" id = "room_name">
    <?php
    echo "#",$room_name
    ?>
</h4><br>
    <form action="content_save.php?room_name=<?=$room_name?>" method="post">
    <div style = "margin:auto" class="col-sm-9">
    <div style = "margin:auto" class="form-floating col-sm-3">
    <h2>
        <?php
        echo "@",$user_name
        ?>
    </h2>
        <textarea style="resize: none;" class="form-control" rows="8" cols="100" name = "room_content" required></textarea>
        <button type="submit" class="btn btn-primary" style="WIDTH: 100%" id = "submit_content">トークを保存</button>
    </div>
    </div>
    </form>
    <form action="room_menu.php" method="get">
            <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <input type=hidden name=room_name value=<?=$room_name?>>
                    <button type="submit" class="btn btn-danger" style="WIDTH: 100%" id = "back">戻る</button>
                </div>
            </div>
    </form>
</body>
<script>
</script>
</html>