<?php include 'homepage.php' ?>
<!-- Add Student Form -->
<div class="container" style="max-width: 750px">
    <h2>Add Student</h2>
    <form action="../../PHP/add_classroom.php" method="post">

        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" placeholder="Enter ID" name="id" required>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
        </div>

        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary" name="add_classroom">Add Classroom</button>
        </div>
    </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N"
    crossorigin="anonymous"></script>

</html>