<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=2, minimum-scale=1, user-scalable=yes"
    />
    <title></title>
    <style>
      body {
        margin: 0;
      }

      .wrapper {
        display: grid;
        place-items: center;
        /*   place-content: center; */
        min-height: 100vh;
      }

      .item {
        padding: 50px;
        font-weight: 900;
        font-size: 30px;
      }
    </style>
  </head>
  <body>
    <h1 style="text-align: center">みんなの症状ことば</h1>
    <h2 style="text-align: center">今日の調子はどう？</h2>
    <div class="wrapper">
      <a class="item" href="#" onclick="location.href = 'user_input.php'"
        >頭がズキズキする
      </a>
    </div>
  </body>
</html>
