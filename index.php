<?php session_start();?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css">
    <!-- <link rel="stylesheet" href="assets/style.css"> -->
    <script src="js/main.js"></script>
    <title>EVENT KANRI</title>
</head>

<body>
    <?php
if (!isset($_SESSION['user_ses'])) {
    header('Location: pages/users/login.php');
} else {
    header('Location: pages/home.php');
}?>

</body>

</html>