<?php
    $kw = htmlspecialchars($_REQUEST['kw'], ENT_QUOTES, "UTF-8");
    $user_name = $_GET["user_name"];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=2, minimum-scale=1, user-scalable=yes"
    />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script> 
    <title>みんなの症状ことば</title>
    <style>
    body {
        font-family: 'Hiragino Kaku Gothic ProN','Hiragino Sans','Meiryo',sans-serif;
    }
    
    </style>
  </head>
  <div style="line-height:30%">
  <body>
  <br>
  <br>
  <h1 style="text-align: center;font-size:16px">
    <a href="mainmedicalkotoba.php?user_name=<?=$user_name?>" height="5" width="10">
      <img style="width: 234px;"src="./images/2logoMinnnanokotoba.svg" alt="みんなの症状ことば" />
    <a>
  </h1>
    <h3 style="text-align: center;font-size:11pt;color:#888888">（スマートフォン向け）</h3>
    <br>
    <h3 style="text-align: center;font-size:16px"><b>今日の調子はどう？</b></h3>
    <br>
    <br>
    <br>
    <h3 style="text-align: center;font-size:16px">
      <a href="user_regist.php?kw=<?=$kw?>&user_name=<?=$user_name?>"><?php echo htmlentities($kw); ?></a>
    </h3>
    <br>
    <form action="mainmedicalkotoba.php?user_name=<?=$user_name?>" method="get" id = "check_data">
            <div calss="row">
            <h3 style="text-align: center;font-size:16px;color:#e52a94;font-weight: bold">戻ってキーワードを入れてください。</h3>
                <div style = "margin:auto;left: 0;right: 0;text-align: center" class="col-sm-9">
                <div style = "margin:auto;left: 0;right: 0;display:inline-block" class="form-floating col-sm-3">
                    <br>
                    <input type="hidden" name="user_name" id = "user_name" value="">
                    <button type="submit" class="btn text-white" style="background-color: #c0c0c0;WIDTH: 50%" id = "submit_text">戻る</button>
                </div>
                </div>
            </div>
    </form>
    <br>
    <br>
    <form>
      <input type="hidden" name="checkUser" id = "checkUser" value=<?=$user_name?>>
      <input type="hidden" name="checkKw" id = "checkKw" value=<?=$kw?>>
    </form>
    <h3 style="text-align: center;font-size:16px">
    <?php
    $host = '13.208.78.196';
    $user = 'yong';
    $pw = 'dlruddyd12';
    $dbName = 'ShanriProject';
    $conn = mysqli_connect($host, $user, $pw, $dbName);

    $sql = "select kw, UserName, max(Date) as Date from new_created_room where UserName = '$user_name' group by kw, UserName order by Date desc";
    mysqli_query($conn, $sql);

    $result = $conn->query($sql);
    if(isset($result) && $result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $kw = $row['kw'];
            echo "<a href=user_regist.php?kw=$kw&user_name=$user_name>#$kw</a>"."<BR>"."<BR>";
        }
    }
?>
    </h3>
  </body>
  </div>
<script>
  let kwValue = $("#checkKw").val();
  let userValue = $("#checkUser").val();
  if(kwValue || userValue){
    document.getElementById("check_data").style.display ='none';
  }
  console.log(kwValue);
</script>
</html>
