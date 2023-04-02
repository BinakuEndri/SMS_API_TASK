<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $con = require "../PHP/database.php";
  $query = sprintf(
    "SELECT * FROM student WHERE Username = '%s'",
    $con->real_escape_string($_POST["username"])
  );

  $query1 = sprintf(
    "SELECT * FROM professor WHERE Username = '%s'",
    $con->real_escape_string($_POST["username"])
  );

  $result = $con->query($query);
  $result1 = $con->query($query1);


  $student = $result->fetch_assoc();
  $professor = $result1->fetch_assoc();

  if ($student) {
    if (password_verify($_POST["password"], $student["Password"])) {
      session_start();

      session_regenerate_id();
      $_SESSION["Student_ID"] = $student["ID"];

      header("Location: student/homepage.php");
      exit();
    } else {
      die("Wrong passowrd");

    }
  }
  if ($professor) {

    if (password_verify($_POST["password"], $professor["Password"])) {
      session_start();

      $_SESSION["Professor_ID"] = $professor["ID"];
      header("Location: professor/homepage.php");
      exit();


    } else {
      die("Wrong passowrd");
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>Login</title>
  </head>

  <body>
    <div class="container">
      <img src="../images/pr-logo.webp" alt="" width="150px">
      <h2 style="text-align:center;">Universiteti i Prishtinës</h2>
      <h3>"Hasan Prishtina"</h3>
      <form action="" method="POST" id="login-form">
        <div class="form-field">
          <label for="username">
            Username or Email
          </label>
          <input type="text" name="username" id="username" size="50" required autofocus />
        </div>

        <div class="form-field">
          <label for="pass">
            Password
          </label>
          <input type="password" name="password" id="pass" size="50" required />
        </div>

        <div id="form-submit">
          <input type="submit" value="Login" />
        </div>
        <div id="forgot-link">
          <a href="">Forgot Password</a>
        </div>
      </form>


    </div>

  </body>

</html>