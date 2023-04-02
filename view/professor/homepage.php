<?php
session_start();

if (isset($_SESSION["Professor_ID"])) {

  $con = require "../../PHP/database.php";

  $query = "SELECT * FROM professor WHERE ID ={$_SESSION["Professor_ID"]}";

  $result = $con->query($query);

  $professor = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <title>Homepage</title>
  </head>

  <body>
    <header>
      <div class="logo-container">
        <img src="../../images/pr-logo.webp" alt="Your logo">
        <h3>Universiteti i Prishtinës "Hasan Prishtina"</h3>
      </div>
      <div class="tag-container">
        <ul>
          <li><a href="manage-classroom.php">Manage Classrooms</a></li>
          <li><a href="manage-course.php">Manage Courses</a></li>
          <li><a href="manage-student.php">Manage Students</a></li>
          <?php if (isset($professor)): ?>
            <li><a href="../../PHP/logout.php">Log Out</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </header>
    <?php if (isset($professor)): ?>
      <h1>
        <?= $professor["FullName"] ?>
      </h1>
    <?php else: ?>

    <?php endif; ?>