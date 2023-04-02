<?php
require "../../config/database.php";
if (isset($_POST["submit"])) {
    $error = array(
        "err_id" => "",
        "err_pass" => "");
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != '' && $password != '') {
        $query = mysqli_query($con, "SELECT * FROM admins WHERE login_id ='" . $username . "' AND password = '" . $password . "'");
        $numrows = mysqli_num_rows($query);
        if ($numrows > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $db_username = $row['login_id'];
                $db_password = $row['password'];
            }
            if ($username == $db_username && $password == $db_password) {
                session_start();
                $_SESSION['sess_user'] = $username;
                header("Location: ../common/home.php");
            }
        } else {
            echo "Người dùng hoặc mật khẩu không đúng";
        }

    } elseif ($username == '' && $password == '') {
        $error = array(
            "err_id" => "Hãy nhập login id",
            "err_pass" => "Hãy nhập password");
        // header("Location: login.php");
    } elseif ($username == '' && $password != '') {
        $error = array(
            "err_id" => "Hãy nhập login id",
            "err_pass" => "");
    } elseif ($password == '' && $username != '') {
        $error = array(
            "err_id" => "",
            "err_pass" => "Hãy nhập password");
    }
} else {
    $error = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h3>Login</h3>
        <div class="form-login">
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-input">
                    <?php
if (isset($error["err_id"])) {
    echo '<p class="error">' . $error["err_id"] . '</p>';}?>
                    <label for="">Người dùng</label>
                    <input name="username" type="text" placeholder="Tên người dùng" autocomplete="off">
                </div>
                <div class="form-input">
                    <?php
if (isset($error["err_pass"])) {
    echo '<p class="error">' . $error["err_pass"] . '</p>';
}?>
                    <label for="">Mật khẩu</label>
                    <input name="password" type="password" placeholder="Mật khẩu" autocomplete="off">
                </div>
                <div>
                    <a href="reset_password.php">Quên mật khẩu</a>
                    <input type="submit" value="Đăng nhập" name="submit" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>