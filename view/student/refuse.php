<?php
session_start();
$con = require "../../PHP/database.php";

if (isset($_POST['refuse'])) {
    $id = $_POST['id'];
    $status = "Refuse";
    $query = "UPDATE grade SET Status = '$status' WHERE ID ='$id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        header("Location: homepage.php");
    } else {
        header("Location: homepage.php");

    }
}
?>