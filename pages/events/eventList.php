<?php

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
    <div class="wrapper-event">
        <div class="search-form">
            <label for="event-search-label">Keyword:</label>
            <form action="<?php $_SERVER["PHP_SELF"];?>">
                <input type="text" name="event-keyword">
                <input type="submit" name="search-btn" value="Search">
            </form>
        </div>
        <p class="search-result-count">Searched event quantity: </p>

        <table class="event-list">
            <tr>
                <th>No</th>
                <th>Event name</th>
                <th>Slogan</th>
                <th>Learder</th>
                <th>Action</th>
            </tr>
            <tr>
                abcdef
            </tr>
        </table>

    </div>
    <script src="../../assets/main.js"></script>
</body>



</html>