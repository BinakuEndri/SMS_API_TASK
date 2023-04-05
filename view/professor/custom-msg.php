<?php include 'homepage.php' ?>
<!-- Twilio PHP SDK -->
<?php

if (isset($_POST['write'])) {
    $id = $_POST['id'];
    $con = require "../../PHP/database.php";
    $query5 = "SELECT * from student WHERE ID = '$id'";
    $result5 = mysqli_query($con, $query5);

    $row = $result5->fetch_assoc();

    $fullname = $row["FullName"];
    $classroom = $row["ClasroomID"];
    $number = $row["Number"];


}

?>

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-center">Send a Custom Message</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="../../PHP/costumMessage.php">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="<?php echo $fullname ?>" readonly
                                required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" name="message" id="message"
                                placeholder="Enter your message"></textarea>
                        </div>
                        <input type="hidden" value="<?php echo $number ?>" name="number">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

</html>