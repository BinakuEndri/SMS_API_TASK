<?php
session_start();

$conn = require "database.php";


if (isset($_POST['add_classroom'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $professor = $_POST['professor_id'];
    $classroom = $_POST['classroom_id'];



    $sql = "INSERT INTO course(ID, Name,Professor,ClasroomID)
  VALUES ('$id', '$name',$professor,$classroom)";

    if ($conn->query($sql) === TRUE) {
        $_SESSION["Course_add"] = "The Course has been added";
        header("Location: ../view/professor/add-course.php");
    } else {
        $_SESSION["Course_error"] = "The Course failed to be added";
        header("Location: ../view/professor/add-course.php");
    }
}

$conn->close();
?>