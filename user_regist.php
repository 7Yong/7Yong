<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script> 
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
            width:300px;
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
    <h1 style="text-align: center"><img width="388" src="./images/ptitle.png" alt="みんなの症状ことば"></h1><br>
    <h2 style="text-align: center">頭がズキズキするのは<br>どんなとき？</h2><br>
    
    <form action = "room_menu.php" method="get" name = "send_info" onsubmit="return checkCookies()">
            <div calss="row">
                <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <input type="text" style="WIDTH: 200pt" class="form-control" id = "room_name" placeholder="input_text" name="room_name" required>
                    <button type="submit" style="WIDTH: 200pt; HEIGHT: 50pt" class="btn btn-danger" id = "submit_text">みんなと<br>つながる</button>
                </div>
                </div>
            </div>
    </form>
    <form action = "">
            <div calss="row">
                <div style = "margin:auto" class="col-sm-9">
                <div style = "margin:auto" class="form-floating col-sm-3">
                    <button type="button" class="btn text-white" style="background-color: purple;WIDTH: 200pt" id = "user_name_modal">ユーザー登録</button>
                    <div id='modal'>
                    <div id='content'>
                        <input type='button' value='X' class="close" id='btnClose'/>
                        <label>名前を入力してください。</label><br/>
                        <input type='input_user_name' id='input_user_name' required/>
                        <input type='submit' value='입력' id='btnCheck' onclick="setCookie()"/>
                    </div>
                </div>
                </div>
            </div>
    </form><br>
    <h1 style="text-align: center" id = "user_name"></h1>
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

        let request_text = "名前を入力してください。";
        let request_text_color = request_text.fontcolor("green");

		for (let i = 0; i < cookieArray.length; i++) {
			let nv = cookieArray[i].split("=");
			if (nv[0]==cname) { //똑같으면 쿠키 찾아진것
                //모달창 닫기
                let UserNameCookie = unescape(nv[1]);
                let UserNameColor = unescape(nv[1]).fontcolor("blue")
                $("#user_name_modal").css("visibility", "hidden");
				$("#user_name").html("歓迎致します " + UserNameColor + "様");
                //unescape: 저장할때 escape로 저장했으니 출력할때 유니코드값을 다시 바꿔주는 것
				return;
			}
		}		
		
		$("#user_name").html(request_text_color);			
	}
    function checkCookies(){
        let check_cookies = document.cookie;
        let request_text = "名前を入力してください。";
        let request_text_color = request_text.fontcolor("green");
        if(check_cookies === ''){
            alert("名前を入力してください。");
            return false;
        }
        else{
            return true;
        }

    }
    showCookies();
</script>
</html>