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
    <title>頭がズキズキするのはどんなとき？</title>
</head>
<body>
<div style="line-height:30%">
<br>
<br>
    <h1 style="text-align: center;font-size:16px">
    <a href="https://anq.medicalkotoba.com/" height="5" width="10">
      <img src="./images/newlogo.png" alt="みんなの症状ことば" />
    <a>
  </h1>
  <br>
    </div>
    <h3 style="text-align: center;font-size:16px"><span style="color:#e52a94"><b>頭がズキズキする</span>のは<br>どんなとき</b>？</h3><br>

    <form action = "room_menu.php" method="get" name = "send_info" onsubmit="return checkCookies()">
            <div calss="row">
                <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <input type="text" style="WIDTH: 100%" class="form-control" id = "room_name" name="room_name" required required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('容を入力してください。');">
                    <br>
                    <button type="submit" class="btn text-white" style="background-color: #00bbff;WIDTH: 100%" id = "submit_text">みんなとつながる</button>
                </div>
                </div>
            </div>
    </form>
    <br>
    <form action = "">
            <div calss="row">
                <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <button type="button" class="btn text-white" style="background-color: #66cc66;WIDTH: 100%" id = "user_name_modal">ユーザー登録</button>
                    <div id='modal'>
                    <div id='content'>
                        <input type='button' value='X' class="close" id='btnClose'/>
                        <label>ユーザーネームを入力してください。</label>
                        <br>
                        <input class="form-control" type='input_user_name' id='input_user_name' required/>
                        <br>
                        <input type='submit' class="btn text-white" style="background-color: #0399e4;" value='登録' id='btnCheck' onclick="setCookie()"/>
                    </div>
                </div>
                </div>
            </div>
    </form>
    <h3 style="text-align: center;font-size:16px;font-weight: bold" id = "user_name"></h3>
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
    function setCookie() {
        let cookie_name = "user_name";
		let cookie_user_name = $("#input_user_name").val();
		//쿠키값(cvalue) 	escape() 저장 -> %uBC30%uB2E4%uC5F0 한글이 16진수로 출력된다
		//$("#demo").html(escape(cvalue));
		//unescape(??); 16진수를 한글로 바꾸자
		
		//만료시점(10일)
		let now = new Date();
		now.setDate(now.getDate()+10); //오늘날짜+10일 (18+10=28)
		
		//쿠키 저장
		document.cookie = cookie_name + "=" + cookie_user_name+"; expires="+now.toUTCString();
	}
    
    function showCookies() {
		let cname = "user_name";
		// "id=admin; color=red; age=30"
		let cookies = document.cookie;
		//let cookieArray = cookies.split(";");
		let cookieArray = cookies.split(/;\s/);

        // let request_text = "名前を入力してください。";
        // let request_text_color = request_text.fontcolor("green");

		for (let i = 0; i < cookieArray.length; i++) {
			let nv = cookieArray[i].split("=");
			if (nv[0]==cname) { //똑같으면 쿠키 찾아진것
                //모달창 닫기
                let UserNameCookie = unescape(nv[1]);
                let UserNameColor = unescape(nv[1]).fontcolor("#0399e4")
                $("#user_name_modal").css("visibility", "hidden");
				$("#user_name").html("こんにちは " + UserNameColor + "様");
                //unescape: 저장할때 escape로 저장했으니 출력할때 유니코드값을 다시 바꿔주는 것
				return;
			}
		}		
		
		$("#user_name").html(request_text_color);			
	}
    function checkCookies(){
        let check_cookies = document.cookie;
        let request_text = "ユーザー登録をしてください。";
        let request_text_color = request_text.fontcolor("green");
        if(check_cookies === ''){
            alert("ユーザー登録をしてください。");
            return false;
        }
        else{
            return true;
        }

    }
    showCookies();
</script>
</html>
