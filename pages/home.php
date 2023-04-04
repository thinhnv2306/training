<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="user-info">
                <p class="username">Username: <?php echo $_SESSION["sess_user"] ?> </p>
                <p class="logined-time">Login time: <?php echo $_SESSION['login_time'] ?> </p>
            </div>
            <div class="logout"><a href="/pages/users/logout.php">Logout</a></div>
        </header>
        <table class="home-tbl">
            <tr>
                <th>Phòng học</th>
                <th>Người dùng</th>
                <th>Sự kiện</th>
                <th>Tổ chức sự kiện</th>
            </tr>
            <tr>
                <td><a href="" class="class search-btn">Tìm kiếm</a></td>
                <td><a href="" class="user search-btn">Tìm kiếm</a></td>
                <td><a href="" class="event search-btn">Tìm kiếm</a></td>
                <td><a href="" class="event-create search-btn">Tìm kiếm</a></td>
            </tr>
            <tr>
                <td><a href="" class="class add-btn">Thêm mới</a></td>
                <td><a href="" class="user add-btn">Thêm mới</a></td>
                <td><a href="" class="event add-btn">Thêm mới</a></td>
                <td><a href="" class="event-create add-btn">Thêm mới</a></td>
            </tr>
        </table>

    </div>

</body>

</html>