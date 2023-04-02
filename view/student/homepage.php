<?php
session_start();

if (isset($_SESSION["Student_ID"])) {

  $con = require "../../PHP/database.php";

  $query = "SELECT * FROM student WHERE ID ={$_SESSION["Student_ID"]}";

  $result = $con->query($query);

  $student = $result->fetch_assoc();
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/homepage.css">
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
          <li><a href="#">Tag 1</a></li>
          <li><a href="#">Tag 2</a></li>
          <li><a href="#">Tag 3</a></li>
          <?php if (isset($student)): ?>
            <li><a href="../../PHP/logout.php">Log Out</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </header>
    <?php if (isset($student)): ?>
      <p>
        <?= $student["FullName"] ?>
      </p>
    <?php else: ?>

    <?php endif; ?>

  </body>

</html>