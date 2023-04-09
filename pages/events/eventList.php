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

//Clear search keyword
if (isset($_POST["clear-btn"])) {
    $event_keyword = '';
    $sql_count = "SELECT count(*) FROM events";
    $query_count = mysqli_query($con, $sql_count);
    $event_quantity = mysqli_fetch_row($query_count);
}

// Delete

if (isset($_POST["delete-event"])) {
    $event_id = $_POST["eventid"];
    $sql = "DELETE FROM events WHERE id = '" . $event_id . "'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_affected_rows($con);
    if ($result != 0) {
        $message_success = "You deleted this event";
        header("Refresh:2");
    } else {
        $message_fail = "You hasn't delete this event";
    }
} else {
    $message_fail = '';
}

// Edit
if (isset($_POST["edit-event"])) {

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
        <header class="event-create-header">
            <h2>EVENT LIST</h2>
            <a class="back-homepage" href="../../index.php">
                < Homepage</a>
        </header>
        <div class="event__search-form">
            <label for="event-search-label">Keyword:</label>
            <form class="search-form" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                <div class="search-field">
                    <input class="event-search-input" type="text" name="event-keyword"
                        value="<?php echo $event_keyword ?? '' ?>">
                    <div class="search-area-btn">
                        <input class="search-btn hover" type="submit" name="search-btn" value="Search">
                        <input class="clear-btn" type="submit" name="clear-btn" value="Clear">
                    </div>
                </div>
            </form>
        </div>
        <p class="search-result-count">Searched event quantity: <?php echo $event_quantity[0] ?> </p>

        <?php if (isset($message_success)) {
    echo "<p class='delete_event_success'>" . $message_success . "</p>";
} elseif (isset($message_fail)) {
    echo "<p class='delete_event_fail'>" . $message_fail . "</p>";
}
?>

        <a class="add-event-btn hover" href="eventCreate.php">CREATE EVENT</a>
        <table class="event-list-tbl">
            <tr>
                <th>No</th>
                <th>Event name</th>
                <th>Slogan</th>
                <th>Leader</th>
                <th>Action</th>
            </tr>

            <?php $i = 1;foreach ($all_events as $key => $event) {?>
            <tr>
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
                    <td><?php echo $i++ ?></td>
                    <input type="hidden" name="eventid" value="<?php echo $event['id'] ?>">
                    <td><?php echo "<p class='eventname'> " . $event["name"] . "</p>" ?></td>
                    <td><?php echo "<p class='slogan'> " . $event["slogan"] . "</p>" ?></td>
                    <td><?php echo "<p class='leader'> " . $event["leader"] . "</p>" ?></td>
                    <td>
                        <input type="submit" value="Delete" name="delete-event" class="delete-btn hover"
                            onclick="return confirm('Are you sure you want to delete event <?php echo $event['name'] ?>?')">
                        <input type="submit" value="Edit" name="edit-event" class="edit-btn hover">
                        <input type="submit" value="Schedule" name="schedule-detail"
                            class="detail-btn schedule-btn hover">
                        <input type="submit" value="Comment" name="comment-detail" class="detail-btn comment-btn hover">
                    </td>
                </form>
            </tr>
            <?php }?>

        </table>

    </div>
    <script src="../../assets/main.js"></script>
</body>



</html>