<?php

$conn = require "database.php";


if (isset($_POST['add_classroom'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $professor = $_POST['professor_id'];
    $classroom = $_POST['classroom_id'];



    $sql = "INSERT INTO course(ID, Name,Professor,ClasroomID)
  VALUES ('$id', '$name',$professor,$classroom)";

    if ($conn->query($sql) === TRUE) {
        echo "New course added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>