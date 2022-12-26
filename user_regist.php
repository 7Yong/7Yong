<?php
    $kw = htmlspecialchars($_REQUEST['kw'], ENT_QUOTES, "UTF-8");
    $user_name = $_GET["user_name"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-latest.js"></script> 
    <style>
        #modal{
            display : none;
            z-index : 1;
            background-color: rgba(0,0,0,.3);
            position:fixed;
            left:0;
            top: 0;
            width:100%;
            height:100%;
            
        }
        #modal>#content{
            width:330px;
            margin:100px auto;
            padding:20px;
            position: relative;
            background-color:#fff;
        }

        #modal .close{
            position:absolute;
            top:4px;
            right:4px;	
            font-size:20px;
            border:0;
            background-color: #fff;
        }

        #modal .close:hover,
        #modal .close:focus {
        color : #000;
        text-decoration: none;
        cursor :pointer;
        }
</style>
    <title><?php echo htmlentities($kw); ?>のはどんなとき？</title>
</head>
<body>
<div style="line-height:30%">
<br>
<br>
    <h1 style="text-align: center;font-size:16px">
    <a href="first_page.php?kw=<?=$kw?>&user_name=<?=$user_name?>" height="5" width="10">
      <img style="width: 234px;"src="./images/2logoMinnnanokotoba.svg" alt="みんなの症状ことば" />
    <a>
  </h1>
    <h3 style="text-align: center;font-size:11pt;color:#888888">（スマートフォン向け）</h3>
  <br>
    </div>
    <h3 style="text-align: center;font-size:16px"><span style="color:#e52a94"><b><?php echo htmlentities($kw); ?></span>のは<br>どんなとき</b>？</h3><br>
    <!-- <h3 style="text-align: center;font-size:16px"><b>トークルームをつくりましょう！</b></h3><br> -->
    <form action="room_menu.php" method="get" name = "send_info" onsubmit="return check_user()">
            <div calss="row">
                <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <input type="hidden" name="kw" id = "kw" value="<?php echo htmlentities($kw); ?>">
                    <input type="text" style="WIDTH: 100%" class="form-control" id = "room_name" name="room_name" required required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('内容を入力してください。');">
                    <br>
                    <input type="hidden" name="user_name" id = "user_name" value="">
                    <button type="submit" class="btn text-white" style="background-color: #00bbff;WIDTH: 100%" id = "submit_text" onclick="room_regist()">みんなとトークする</button>
                </div>
                </div>
            </div>
    </form>
    <br>
    <form action = "user_regist.php" method="get">
            <div calss="row">
                <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <button type="button" class="btn text-white" style="background-color: #66cc66;WIDTH: 100%" id = "user_name_modal">ユーザー登録</button>
                    <div id='modal'>
                    <div id='content'>
                        <input type='button' value='X' class="close" id='btnClose'/>
                        <label>ユーザーネームを入力してください。</label>
                        <br>
                        <input type=hidden name=kw value=<?=$kw?>>
                        <input class="form-control" type='text' name = 'user_name' id='input_user_name' required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('ユーザーネームを入力してください。')"/>
                    <br>
                        <input type='submit' class="btn text-white" style="background-color: #0399e4;" value='登録' id='btnCheck' onclick="user_regist()"/>
                    </div>
                </div>
                </div>
            </div>
    </form>
    <h3 style="text-align: center;font-size:16px;font-weight: bold" id = "show_user_name"></h3>
</body>
<script>
let btnOpen  = document.getElementById('user_name_modal');
let btnCheck = document.getElementById('btnCheck');
let btnClose = document.getElementById('btnClose');

// modal 창을 감춤
let closeRtn = function(){
	let modal = document.getElementById('modal');
	modal.style.display = 'none';
	
}

// modal 창을 보여줌
btnOpen.onclick = function(){
	let modal = document.getElementById('modal');
	modal.style.display = 'block';
	
}

btnClose.onclick = closeRtn;
</script>
<script>
    function user_regist() {
        const user_regist = $("#input_user_name").val();
	if(user_regist.length>0){
		localStorage.setItem("user_name", JSON.stringify(user_regist))
	}
    }
    //   JSON.parse(localStorage.getItem("super"))
    function show_user_name() {
        const user_regist_name = JSON.parse(localStorage.getItem("user_name")).fontcolor("#0399e4");
        document.getElementById('user_name').value = JSON.parse(localStorage.getItem("user_name"));
        if (user_regist_name) { //똑같으면 쿠키 찾아진것
                $("#user_name_modal").css("visibility", "hidden");
				$("#show_user_name").html("こんにちは " + user_regist_name + "様");
                //unescape: 저장할때 escape로 저장했으니 출력할때 유니코드값을 다시 바꿔주는 것
				return;
			}
    }
    function room_regist() {
        const room_regist = $("#room_name").val();
        localStorage.setItem("room_name", JSON.stringify(room_regist))
        return true;
    }
    function check_user(){
        const check_user = JSON.parse(localStorage.getItem("user_name"));
        const request_text = "ユーザー登録をしてください。";
        const request_text_color = request_text.fontcolor("green");
        if(JSON.parse(localStorage.getItem("user_name"))){
            return true;
        }
        else{
            alert("ユーザー登録をしてください。");
            return false;
        }
    }
    show_user_name()
</script>
</html>
