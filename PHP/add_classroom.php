<?php

$conn = require "database.php";


if (isset($_POST['add_classroom'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];


    $sql = "INSERT INTO classroom(ID, Name)
  VALUES ('$id', '$name')";

    if ($conn->query($sql) === TRUE) {
        echo "New classroom added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>