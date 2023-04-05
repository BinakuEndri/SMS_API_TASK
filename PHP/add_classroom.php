<?php
session_start();
$conn = require "database.php";


if (isset($_POST['add_classroom'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];


    $sql = "INSERT INTO classroom(ID, Name)
  VALUES ('$id', '$name')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["Classroom_add"] = "The classroom has been added";
        header("Location: ../view/professor/add-classroom.php");
    } else {
        $_SESSION["Classroom_error"] = "The classroom failed to be  added";
        header("Location: ../view/professor/add-classroom.php");
    }
}

$conn->close();
?>