<?php

$conn = require "database.php";


if (isset($_POST['add_professor'])) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $number = $_POST['number'];

    $sql = "INSERT INTO professor(ID, FullName, UserName, Email, Password, Number)
  VALUES ('$id', '$full_name', '$user_name', '$email', '$password', '$number')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>