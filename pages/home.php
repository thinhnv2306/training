<?php

require "config/database.php";
$query = mysqli_query($con, "SELECT * FROM admins WHERE reset_password_token !=''");
$all_users = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../assets/style.css">
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
                <th>Class</th>
                <th>User</th>
                <th>Event</th>
                <th>Create Event</th>
            </tr>
            <tr>
                <td><a href="" class="class search-btn">Search</a></td>
                <td><a href="" class="user search-btn">Search</a></td>
                <td><a href="" class="event search-btn">Search</a></td>
                <td><a href="" class="event-create search-btn">Search</a></td>
            </tr>
            <tr>
                <td><a href="" class="class add-btn">Add</a></td>
                <td><a href="" class="user add-btn">Add</a></td>
                <td><a href="" class="event add-btn">Add</a></td>
                <td><a href="" class="event-create add-btn">Add</a></td>
            </tr>
        </table>

        <h3>User need to reset password</h3>
        <table class="user-reset-tbl">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>New Password</th>
                <th>Action</th>
            </tr>

            <?php $i = 1;foreach ($all_users as $user) {?>
            <tr>
                <form action="<?php $_SERVER["PHP_SELF"];?>">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $user["login_id"] ?></td>
                    <td><?php echo '<input id="password" name="password" type="password" placeholder="Password" autocomplete="off"
                            onblur="checkValidateInputPass()">' ?></td>
                    <td><?php echo '<a id="reset-pass-btn" href="">Reset</a>' ?></td>
                </form>
            </tr>
            <?php }?>

        </table>

    </div>

</body>

</html>