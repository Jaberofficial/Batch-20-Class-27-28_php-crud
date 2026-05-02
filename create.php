<?php
include("config.php");
?>

<?php

if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $class = $_POST["class"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $bloodGroup = $_POST["blood"];



    $query = "INSERT INTO students (name, roll, class, address, phone, email, blood) VALUES('$name', '$roll', '$class', '$address', '$phone', '$email', '$bloodGroup')";
    $insertData = mysqli_query($connections, $query);//true-false

    if ($insertData) {
        header("location:index.php");
    } else {
        echo "Failed to Insert Data";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">SMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Add New Student</a>
                    </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-dark text-white rounded-top-2">
                <h3 class="mb-0">Add New Student</h3>
            </div>
            <div class="card-body p-4">

                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Student Roll</label>
                            <input type="number" class="form-control" name="roll" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Student Class</label>
                            <input type="text" class="form-control" name="class" required>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Student Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label class="form-label">Student Phone</label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Student Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>


                        <div class="col-md-4 mb-3">
                            <label class="form-label">Blood Group</label>
                            <select name="blood" class="form-select" required>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" name="submit" class="btn btn-primary px-4 rounded-3">
                            Submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>