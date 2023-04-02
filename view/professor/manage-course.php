<?php include 'homepage.php' ?>


<?php
$con = require "../../PHP/database.php";

$query = "select * from course";

$result = mysqli_query($con, $query);


?>
<div class="container" style="max-width:500px">
    <div class="row">
        <div class="col lg-6 md-6 sm-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Classroom</th>

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
                                <?php echo $row['Professor'] ?>

                            </td>
                            <td>
                                <?php echo $row['ClasroomID'] ?>

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
            <button class="btn btn-success"> <a href="add-course.php" style="text-decoration:none">
                    <b>Add Course<b></a> </button>
        </div>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>


</html>