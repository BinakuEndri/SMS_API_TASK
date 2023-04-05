<?php include 'homepage.php' ?>
<?php include '../../PHP/message.php' ?>


<!-- Add Student Form -->


<div class="container" style="max-width: 750px">
    <?php

    if (isset($_SESSION['Student_add'])) {
        showMessage($_SESSION['Student_add']);
        unset($_SESSION['Student_add']);
    }
    ?>
    <?php
    if (isset($_SESSION['Student_error'])) {
        showMessage($_SESSION['Student_error']);
        unset($_SESSION['Student_error']);
    }
    ?>


    <h2>Add Student</h2>
    <form action="../../PHP/add_student.php" method="post">

        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" required>
        </div>

        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name"
                required>
        </div>

        <div class="form-group">
            <label for="user_name">Username:</label>
            <input type="text" class="form-control" id="user_name" placeholder="Enter Username" name="user_name"
                required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password"
                required>
        </div>

        <div class="form-group">
            <label for="number">Number:</label>
            <input type="text" class="form-control" id="number" placeholder="Enter Number" name="number" required>
        </div>

        <div class="form-group">
            <label for="classroom_id">Classroom:</label>
            <select class="form-select" aria-label="Default select example" name="classroom_id">
                <option selected>Open this select menu</option>

                <?php
                $con = require "../../PHP/database.php";

                $query = "select * from classroom";

                $result = mysqli_query($con, $query);


                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <option value="<?php echo $row['ID'] ?>">
                        <?php echo $row['Name'] ?>
                    </option>
                    <?php
                }
                $con->close();
                ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary" name="add_student">Add Student</button>
        </div>
    </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

</html>