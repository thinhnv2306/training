<?php

require "config/database.php";
$query = mysqli_query($con, "SELECT * FROM admins WHERE reset_password_token !=''");
$all_users = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST["submit"])) {

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/assets/style.css">
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
            <tr class="list-reset">
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $user["login_id"] ?></td>
                    <td>

                        <?php echo '<p class="error_pass"></p> <input class="password-input" name="password" type="password" placeholder="Password" autocomplete="off"
                            onblur="checkValidateInputPass(event)">' ?>
                    </td>
                    <td><?php echo '<input id="reset-pass-btn" type="submit" value="Reset" name="reset-btn">' ?>
                    </td>
                </form>
            </tr>
            <?php }?>

        </table>

    </div>
    <script src="assets/main.js"></script>
</body>

</html>