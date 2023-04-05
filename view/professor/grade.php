<?php include 'homepage.php' ?>
<?php include '../../PHP/message.php' ?>

<?php

if (isset($_POST['grade'])) {
    $id = $_POST['id'];
    $con = require "../../PHP/database.php";
    $query = "SELECT * from student WHERE ID = '$id'";
    $result = mysqli_query($con, $query);

    $row = $result->fetch_assoc();

    $fullname = $row["FullName"];
    $classroom = $row["ClasroomID"];
    $number = $row["Number"];

    $query2 = "SELECT * from course WHERE ClasroomID = '$classroom'";

    $result2 = mysqli_query($con, $query2);





}
?>
<div class="container" style="max-width: 750px">
    <?php
    if (isset($_SESSION['message'])) {
        showMessage($_SESSION['message']);
        unset($_SESSION['message']);
    }
    if (isset($_SESSION['message_error'])) {
        showMessage($_SESSION['message_error']);
        unset($_SESSION['message_error']);
    }
    ?>
    <h2>Add Grade</h2>
    <form action="../../PHP/add_grade.php" method="post">

        <div class="form-group">
            <label for="professor_id">Course:</label>
            <select class="form-select" aria-label="Default select example" name="course">
                <?php

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                    <option value="<?php echo $row2['ID'] ?>">
                        <?php echo $row2['ID'] . " " . $row2['Name'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="hidden" value="<?php echo $id ?>" name="student" required>
            <input type="hidden" value="<?php echo $number ?>" name="number" required>

            <input type="text" class="form-control" placeholder="<?php echo $fullname ?>" readonly required>

        </div>
        <div class="form-group">
            <label for="value">Value:</label>
            <input type="number" class="form-control" id="value" name="value" min="5" max="10" required>
        </div>

        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary" name="add_grade">Grade</button>
        </div>
    </form>
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

</html>