<?php include 'homepage.php' ?>

<?php
$con = require "../../PHP/database.php";

$classroomid = $student['ClasroomID'];
$query1 = "SELECT * from course where ClasroomID = '$classroomid'";

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
                                <?php echo $row['Name'] ?>

                            </td>
                            <?php if (empty($row['Status'])) { ?>
                                <td>
                                    <form action="take.php" method="POST">
                                        <input type="hidden" name="id" id="id" value="<?php echo $row['ID'] ?>">
                                        <button class="btn btn-success" type="submit" name="take">Take</button>
                                    </form>
                                </td>

                            <?php } else {
                                ?>
                                <td>
                                    Alredy Taken
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

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

</html>