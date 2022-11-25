<?php
    $host = '13.208.78.196';
    $user = 'yong';
    $pw = 'dlruddyd12';
    $dbName = 'ShanriProject';
    $conn = mysqli_connect($host, $user, $pw, $dbName);

    $room_name = $_GET["room_name"];
    $user_name = $_COOKIE["user_name"];
    $room_content = $_POST['room_content'];

    // $sql = "INSERT INTO created_room (RoomName, UserName, Content) VALUES('$room_name', '$user_name', '$room_content')";
    $check = "SELECT * FROM  ";
    $stmt = "INSERT INTO created_room (RoomName, UserName, Content) VALUES('$room_name', '$user_name', '$room_content')";
    mysqli_query($conn, $stmt);

    echo "<script>location.replace('show_room_contents.php?room_name=$room_name')</script>";
?>