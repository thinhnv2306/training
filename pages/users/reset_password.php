<?php
session_start();
require "../../config/database.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $random_time = microtime();
    $sql = "UPDATE admins SET reset_password_token = '" . $random_time . "' WHERE login_id ='" . $username . "'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)) {
        $message = "Request to reset password successfully";
        $username = "";
    } else {
        $err_message = "Request to reset password unsuccessfully. </br>Please re-check your input username or internet connection.";
    }
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
        <h3>Reset Password</h3>
        <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
            <div class="reset-field">
                <?php if (isset($message)) {echo '<p class="message">' . $message . '</p>';} elseif (isset($err_message)) {echo '<p class="err_message">' . $err_message . '</p>';}?>

                <p id="error_name" class="error-message"></p>
                <span>Username</span>
                <input type="text" id="username" class="username-reset" name="username"
                    placeholder="Input username to reset" onkeyup="checkValidateReset()"
                    value=<?php if (isset($username)) {echo $username;}?>>
            </div>
            <input id="reset-btn" type="submit" value="Reset Password" name="submit">

        </form>
        <a class="backlogin-btn" href="/index.php">Back to Login</a>
    </div>

    <script src="../../assets/main.js">
    // Check Login//
    </script>
</body>

</html>