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
                </ul>
            </div>
        </header>
        <!-- Add Student Form -->
        <div class="container" style="max-width: 750px">
            <h2>Add Student</h2>
            <form action="../../PHP/add_course.php" method="post">

                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" required>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="professor_id">Classroom:</label>
                    <select class="form-select" aria-label="Default select example" name="professor_id">
                        <option selected>Open this select menu</option>

                        <?php
                        $con = require "../../PHP/database.php";

                        $query = "select * from professor";

                        $result = mysqli_query($con, $query);


                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['ID'] ?>">
                                <?php echo $row['ID'] . " " . $row['FullName'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="classroom_id">Classroom:</label>
                    <select class="form-select" aria-label="Default select example" name="classroom_id">
                        <option selected>Open this select menu</option>

                        <?php
                        $query1 = "select * from classroom";

                        $resultt = mysqli_query($con, $query1);


                        while ($row = mysqli_fetch_assoc($resultt)) {
                            ?>
                            <option value="<?php echo $row['ID'] ?>">
                                <?php echo $row['ID'] . " " . $row['Name'] ?>
                            </option>
                            <?php
                        }
                        $con->close();
                        ?>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary" name="add_classroom">Add Course</button>
                </div>
            </form>
        </div>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
        crossorigin="anonymous"></script>

</html>