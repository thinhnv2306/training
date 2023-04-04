<?php
session_start();
require "../../config/database.php";

if (isset($_SESSION["sess_user"])) {
    header("Location: ../../index.php");
}

if (isset($_POST["submit"])) {
    $error = array(
        "err_id" => "",
        "err_pass" => "");
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != '' && $password != '') {
        if ((strlen($username) > 3) && (strlen($password) > 5)) {
            $query = mysqli_query($con, "SELECT * FROM admins WHERE login_id ='" . $username . "' AND password = '" . $password . "'");
            $numrows = mysqli_num_rows($query);
            if ($numrows > 0) {
                while ($row = mysqli_fetch_assoc($query)) {
                    $db_username = $row['login_id'];
                    $db_password = $row['password'];
                }
                if ($username == $db_username && $password == $db_password) {
                    $_SESSION['sess_user'] = $username;
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $_SESSION['login_time'] = date('Y-m-d H:i');
                    header("Location: ../../index.php");
                }
            } else {
                $error = array(
                    "err_id" => "Incorrect username or password!",
                    "err_pass" => "");
            }
        } elseif ((strlen($username) < 4) && (strlen($password) > 5)) {
            $error = array(
                "err_id" => "Please input username at least 4 characters",
                "err_pass" => "");
        } elseif ((strlen($username) > 3) && (strlen($password) < 6)) {
            $error = array(
                "err_id" => "",
                "err_pass" => "Please input password at least 6 characters");
        } elseif ((strlen($username) < 4) && (strlen($password) < 6)) {
            $error = array(
                "err_id" => "Please input username at least 4 characters",
                "err_pass" => "Please input password at least 6 characters");
        }

    } elseif ($username == '' && $password == '') {
        $error = array(
            "err_id" => "Username can't be blank. Please input!",
            "err_pass" => "Password can't be blank. Please input!");
        // header("Location: login.php");
    } elseif ($username == '' && $password != '') {
        $error = array(
            "err_id" => "Username can't be blank. Please input!",
            "err_pass" => "");
    } elseif ($username != '' && $password == '') {
        $error = array(
            "err_id" => "",
            "err_pass" => "Password can't be blank. Please input!");
    }
} else {
    $error = array("err_id" => "",
        "err_pass" => "");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>EVENT KANRI</title>
</head>

<body>
    <div class="container">
        <h3>Login</h3>
        <div class="form-login">
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="post">
                <div class="form-input">
                    <?php if (isset($error["err_id"]) && !empty($error["err_id"])) {echo '<p class="error">' . $error["err_id"] . '</p>';}?>
                    <p id="error-id" class="error-message"></p>
                    <!-- <label for="">Username</label> -->
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input id="username" name="username" type="text" placeholder="Username" autocomplete="off"
                            value="<?php echo $_POST["username"] ?? '' ?>" onblur="checkValidateLogin()">
                    </div>
                </div>
                <div class="form-input">
                    <?php if (isset($error["err_pass"]) && !empty($error["err_pass"])) {echo '<p class="error">' . $error["err_pass"] . '</p>';}?>
                    <p id="error-password" class="error-message"></p>
                    <!-- <label for="">Password</label> -->
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password" name="password" type="password" placeholder="Password" autocomplete="off"
                            onblur="checkValidateLogin()">
                    </div>
                </div>
                <div class="submit-reset">
                    <input class="submit-btn" type="submit" value="Login" name="submit" />
                    <a class="reset-pass" href="reset_password.php">Forgot Password?</a>

                </div>
            </form>
        </div>
    </div>
    <script src="../../assets/main.js">
    // Check Login//
    </script>
</body>

</html>