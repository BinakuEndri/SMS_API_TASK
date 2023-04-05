<?php include 'homepage.php' ?>

<?php
$con = require "../../PHP/database.php";

$query = "select * from student";

$result = mysqli_query($con, $query);


?>

<div class="container">

    <div class="row">

        <div class="col lg-6 md-6 sm-6">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th scope="col">ID</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Number</th>
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
                                <?php echo $row['FullName'] ?>

                            </td>
                            <td>
                                <?php echo $row['Email'] ?>

                            </td>
                            <td>
                                <?php echo $row['Number'] ?>
                            </td>
                            <td>
                                <div class="row" style="max-width: 200px;">
                                    <div class="col">
                                        <form action="grade.php" method="POST">
                                            <input type="hidden" name="id" id="id" value="<?php echo $row['ID'] ?>">
                                            <button class="btn btn-primary" type="submit" name="grade">Grade</button>
                                        </form>
                                    </div>
                                    <div class="col">

                                        <form action="custom-msg.php" method="POST">
                                            <input type="hidden" name="id" id="id" value="<?php echo $row['ID'] ?>">
                                            <button class="btn btn-success" type="submit" name="write">Write</button>
                                        </form>
                                    </div>
                                </div>

                            </td>

                        </tr>

                    <?php }

                        $con->close();
                        ?>
                </tbody>
            </table>
            <button class="btn btn-success"> <a href="add-student.php" style="text-decoration:none; color:white">
                    <b>Add Student<b></a> </button>
        </div>
    </div>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>


</html>