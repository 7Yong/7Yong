<?php
    $host = '13.208.78.196';
    $user = 'yong';
    $pw = 'dlruddyd12';
    $dbName = 'ShanriProject';
    $conn = mysqli_connect($host, $user, $pw, $dbName);

    $kw = htmlspecialchars($_REQUEST['kw'], ENT_QUOTES, "UTF-8");
    $room_name = $_GET["room_name"];
    $user_name = $_GET["user_name"];
    $room_content = $_POST['room_content'];

    // $sql = "INSERT INTO created_room (RoomName, UserName, Content) VALUES('$room_name', '$user_name', '$room_content')";
    $check = "SELECT * FROM  ";
    $stmt = "INSERT INTO new_created_room (kw, RoomName, UserName, Content) VALUES('$kw','$room_name', '$user_name', '$room_content')";
    mysqli_query($conn, $stmt);

    echo "<script>location.replace('show_room_contents.php?kw=$kw&room_name=$room_name&user_name=$user_name')</script>";
?>
