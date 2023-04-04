<?php
session_start();
require "../../config/database.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $query = mysqli_query($con, "UPDATE admins SET reset_password_token=" . "'" . microtime() . "'" . " WHERE login_id ='" . $username . "'");
    if (mysqli_num_rows($query) > 0) {
        $message = "Request to reset password successfully";
    } else {
        $message = "Request to reset password unsuccessfully";
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
                <?php if (isset($message)) {echo '<p class="message">' . $message . '</p>';}?>

                <p id="error_name" class="error-message"></p>
                <span>Username</span>
                <input type="text" id="username" class="username-reset" name="username"
                    placeholder="Input username to reset" onblur="checkValidateReset()">
            </div>
            <input id="reset-btn" type="submit" value="Reset Password" name="submit">
        </form>
    </div>

    <script src="../../assets/main.js">
    // Check Login//
    </script>
</body>

</html>