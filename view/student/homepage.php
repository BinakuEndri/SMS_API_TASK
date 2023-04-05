<?php
session_start();

if (isset($_SESSION["Student_ID"])) {

  $con = require "../../PHP/database.php";

  $query = "SELECT * FROM student WHERE ID ={$_SESSION["Student_ID"]}";

  $result = $con->query($query);

  $student = $result->fetch_assoc();
} else {
  header("Location: ../../PHP/logout.php");

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>

  <body>
    <header>
      <div class="logo-container">
        <img src="../../images/pr-logo.webp" alt="Your logo">
        <h3>Universiteti i Prishtinës "Hasan Prishtina"</h3>
      </div>
      <div class="tag-container">
        <ul>
          <li><a href="take_exam.php">Exams</a></li>
          <li><a href="grades.php">Results</a></li>
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

    <?php

    $id = $student['ID'];
    $query1 = "SELECT * from grade where Student_ID = '$id'";

    $resultt = mysqli_query($con, $query1);

    ?>
    <div class="container" style="max-width:500px">
      <div class="row">
        <div class="col lg-6 md-6 sm-6">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Value</th>

                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php while ($row = mysqli_fetch_assoc($resultt)) {
                  ?>
                  <th scope="row">
                    <?php echo $row['ID'] ?>
                  </th>
                  <td>
                    <?php $course = $row['Course_ID'];
                    $query2 = "SELECT * from course Where ID = '$course'";
                    $res = mysqli_query($con, $query2);
                    $course = $res->fetch_assoc();

                    echo $course['Name'];

                    ?>
                  </td>
                  <td>
                    <?php echo $row['Value'] ?>

                  </td>


                  <?php if (empty($row['Status'])) { ?>
                    <td>
                      <form action="refuse.php" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo $row['ID'] ?>">
                        <button class="btn btn-danger" type="submit" name="refuse">Refuzo</button>
                      </form>
                    </td>

                  <?php } else {
                    ?>
                    <td>
                      Refused
                    </td>
                  <?php } ?>

                </tr>

              <?php }

                $con->close();
                ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

</html>