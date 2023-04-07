<?php
require "../../config/database.php";
$query = mysqli_query($con, "SELECT * FROM events ORDER BY id DESC");
$all_events = mysqli_fetch_all($query, MYSQLI_ASSOC);

//Search form

if (isset($_POST["search-btn"])) {
    $event_keyword = $_POST["event-keyword"];
    if ($event_keyword != '') {

        //count event search
        $sql_count = "SELECT count(*) FROM events WHERE name LIKE '%" . $event_keyword . "%' OR slogan LIKE '%" .
            $event_keyword . "%' OR leader LIKE '%" . $event_keyword . "%'OR description LIKE '%" . $event_keyword . "%'";
        $query_count = mysqli_query($con, $sql_count);
        $event_quantity = mysqli_fetch_row($query_count);

        //get event search

        $sql_event = "SELECT * FROM events WHERE name LIKE '%" . $event_keyword . "%' OR slogan LIKE '%" .
            $event_keyword . "%' OR leader LIKE '%" . $event_keyword . "%'OR description LIKE '%" . $event_keyword . "%' ORDER BY id DESC";
        $query_event = mysqli_query($con, $sql_event);
        $all_events = mysqli_fetch_all($query_event, MYSQLI_ASSOC);

    } else {
        $sql_count = "SELECT count(*) FROM events";
        $query_count = mysqli_query($con, $sql_count);
        $event_quantity = mysqli_fetch_row($query_count);

        //get event search

    }
} else {
    $sql_count = "SELECT count(*) FROM events";
    $query_count = mysqli_query($con, $sql_count);
    $event_quantity = mysqli_fetch_row($query_count);

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
    <div class="wrapper-event">
        <div class="event__search-form">
            <label for="event-search-label">Keyword:</label>
            <form class="search-form" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                <div class="search-field">
                    <input class="event-search-input" type="text" name="event-keyword"
                        value="<?php echo $event_keyword ?? '' ?>">
                    <input class="search-btn" type="submit" name="search-btn" value="Search">
                </div>
            </form>
        </div>
        <p class="search-result-count">Searched event quantity: <?php echo $event_quantity[0] ?> </p>

        <table class="event-list-tbl">
            <tr>
                <th>No</th>
                <th>Event name</th>
                <th>Slogan</th>
                <th>Learder</th>
                <th>Action</th>
            </tr>

            <?php $i = 1;foreach ($all_events as $key => $event) {?>
            <tr>
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                    <td><?php echo $i++ ?></td>
                    <input type="hidden" name="eventid" value="'<?php echo $event['id'] ?>'">
                    <td><?php echo "<p class='eventname'> " . $event["name"] . "</p>" ?></td>
                    <td><?php echo "<p class='slogan'> " . $event["slogan"] . "</p>" ?></td>
                    <td><?php echo "<p class='leader'> " . $event["leader"] . "</p>" ?></td>
                    <td>
                        <input type="submit" value="Delete" name="delete-event" class="delete-btn">
                        <input type="submit" value="Edit" name="edit-event" class="edit-btn">
                        <input type="submit" value="Schedule" name="schedule-detail" class="detail-btn">
                        <input type="submit" value="Comment" name="comment-detail" class="detail-btn">
                    </td>
                </form>
            </tr>
            <?php }?>

        </table>

    </div>
    <script src="../../assets/main.js"></script>
</body>



</html>