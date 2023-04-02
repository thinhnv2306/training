<?php

$con = mysqli_connect("localhost", "root", "", "demo_mvc");

// Check connection
if ($con === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    return $con;
}

?>