<?php

require "config/database.php";
$query = mysqli_query($con, "SELECT * FROM admins WHERE reset_password_token !=''");
$all_users = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_POST["key"])) {

    if (isset($_POST["reset-btn" . $_POST["key"]])) {
        $key = $_POST["key"];
        $username = $_POST["username"];
        $password = $_POST["password" . $key];
        $sql = "UPDATE admins SET reset_password_token = '', password = '" . $password . "' WHERE login_id ='" . $username . "'";
        $query = mysqli_query($con, $sql);
        if (mysqli_affected_rows($con)) {
            ${'message' . $key} = "Reset password successfully";
            header("Refresh:2");

        } else {
            ${'err_message' . $key} = "Reset password unsuccessfully.";
        }
    }
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
                <td><a href="#" class="class search-btn">Search</a></td>
                <td><a href="pages/users/userList.php" class="user search-btn">Search</a></td>
                <td><a href="pages/events/eventList.php" class="event search-btn">Search</a></td>
                <td><a href="" class="event-create search-btn">Search</a></td>
            </tr>
            <tr>
                <td><a href="" class="class add-btn">Add</a></td>
                <td><a href="pages/users/userAdd.php" class="user add-btn">Add</a></td>
                <td><a href="pages/events/eventCreate.php" class="event add-btn">Add</a></td>
                <td><a href="" class="event-create add-btn">Add</a></td>
            </tr>
        </table>

        <h3 class="reset-tbl-title">User need to reset password</h3>
        <table class="user-reset-tbl">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th style="width:60%">New Password</th>
                <th>Action</th>
            </tr>

            <?php $i = 1;foreach ($all_users as $key => $user) {?>
            <tr class="list-reset">
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                    <td><?php echo $i++ ?></td>
                    <td><?php echo "<p class = 'username-item' name = 'username'>" . $user["login_id"] . "</p>"
    ?><input type="hidden" name="username" value="<?php echo $user["login_id"] ?>">
                    </td>
                    <td><?php if (isset(${'message' . $key})) {echo "<p class='message-success' >" . ${'message' . $key} . "</p>";

    } elseif (isset(${'err_message' . $key})) {echo "<p class='error_pass' >" . ${'err_message' . $key} . "</p>";}
    ;
    echo '<input name="key" type="hidden" value=' . $key . '>';
    echo '<p id="err_pass' . $key . '" class="error_pass"></p> <input id="password-input' . $key . '" class="password-field" name="password' . $key . '" type="password" placeholder="Password" autocomplete="off"
                            onblur="checkValidateInputPass(event)">';?>
                    </td>
                    <td><?php echo '<input id="reset-pass-btn' . $key . '" class="reset-pass-btn" type="submit" value="Reset" name="reset-btn' . $key . '">' ?>
                    </td>
                </form>
            </tr>
            <?php }?>

        </table>

    </div>
    <script src="assets/main.js"></script>
</body>

</html>