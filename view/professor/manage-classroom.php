<?php
$con = require "../../PHP/database.php";

$query = "select * from classroom";

$result = mysqli_query($con, $query);


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
                    <li><a href="manage-classroom.php">Manage Classrooms</a></li>
                    <li><a href="manage-course.php">Manage Courses</a></li>
                    <li><a href="manage-student.php">Manage Students</a></li>
                </ul>
            </div>
        </header>

        <div class="container" style="max-width:500px">
            <div class="row">
                <div class="col lg-6 md-6 sm-6">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <th scope="row">
                                        <?php echo $row['ID'] ?>
                                    </th>
                                    <td>
                                        <?php echo $row['Name'] ?>

                                    </td>
                                    <td>
                                        <button class="btn btn-success">Write</button>
                                    </td>

                                </tr>

                            <?php }

                                $con->close();
                                ?>
                        </tbody>
                    </table>
                    <button class="btn btn-success"> <a href="add-classroom.php" style="text-decoration:none">
                            <b>Add classroom<b></a> </button>
                </div>
            </div>
        </div>


    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>


</html>