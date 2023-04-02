<?php
// session_start();
require_once "../../database.php";

if (isset($_POST["submit"])) {

    if ($_POST['username'] != '' && $_POST['password'] != '') {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
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
            echo "Invalid username or password!";
        }
    } else {
        echo "All fields are required!";
    }

}
;