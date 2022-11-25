<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewpor<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, minimum-scale=1, user-scalable=yes">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>user_input</title>
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
</head>
<body>
<h1 style="text-align: center">みんなの症状ことば</h1>
<h2 style="text-align: center">頭がズキズキするのはどんなとき？</h2>
<br>
<br>
<br>
<br>
<form action="">
<div calss="row" style="float: none; margin:100 auto;">
    <div class="col-sm-9"></div>
        <div class="form-floating col-sm-3" style="float: none; margin:0 auto;">
            <input type="text" class="form-control" id = "input_text" placeholder="input_text" name="input_text" required>
            <button type="submit" class="btn btn-primary" id = "smt">みんなと<br>つながる</button>
            <!-- <button type="button" class="btn btn-primary" id = "regist">ユーザー登録</button>
            <div id='modal'>
            <div id='content'>
                <input type='button' value='X' class="close" id='btnClose'/>
                <label>이름을 입력하세요</label><br/>
                <input type='name' id='user_name' required/>
                <input type='button' value='입력' id='btnCheck' />
            </div>
        </div> -->
        </div>
</div>
</form>

<form action="">
<div calss="row" style="float: none; margin:100 auto;">
    <div class="col-sm-9"></div>
        <div class="form-floating col-sm-3" style="float: none; margin:0 auto;">
            <button type="button" class="btn btn-primary" id = "regist">ユーザー登録</button>
            <div id='modal'>
            <div id='content'>
                <input type='button' value='X' class="close" id='btnClose'/>
                <label>이름을 입력하세요</label><br/>
                <input type='text' id='user_name' placeholder="닉네임을 적어주세요" required>
                <button type='submit' id='btnCheck'>입력</button>
            </div>
        </div>
        </div>
</div>
</form>
</body>
<script>
let btnOpen  = document.getElementById('regist');
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

// btnCheck.onclick = closeRtn;
btnClose.onclick = closeRtn;
</script>
</html>t" content="width=device-width, initial-scale=1.0">
    <title>user_input</title>
</head>
<body>
    
</body>
</html>