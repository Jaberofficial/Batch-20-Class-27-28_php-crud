<?php
include("config.php");
?>

<?php

if (isset($_GET["id"])) {
    $singleId = $_GET["id"];

    $query = "SELECT * FROM students WHERE id=$singleId";

    $singleData = mysqli_query($connections, $query);
    $realData = mysqli_fetch_assoc($singleData);

    $id = $realData["id"];
    $name = $realData["name"];
    $roll = $realData["roll"];
    $class = $realData["class"];
    $address = $realData["address"];
    $phone = $realData["phone"];
    $email = $realData["email"];
    $bloodGroup = $realData["blood"];

}

else{
    $id = '' ;
    $name = '' ;
    $roll = '' ;
    $class = '' ;
    $address = '' ;
    $phone = '' ;
    $email = '' ;
    $bloodGroup = '' ;
}


if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $roll = $_POST["roll"];
    $class = $_POST["class"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $bloodGroup = $_POST["blood"];



    $query = "UPDATE students SET name='$name', roll= $roll, class='$class', address='$$address', phone='$phone', email='$email', blood='$bloodGroup' WHERE id=$singleId";

    $updateData = mysqli_query($connections, $query);//true-false

    if ($updateData) {
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

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
            </div>

            <div class="mb-3">
                <label for="roll" class="form-label">Student Roll:</label>
                <input type="number" class="form-control" id="roll" name="roll" value="<?php echo $roll ?>" required>
            </div>

            <div class="mb-3">
                <label for="class" class="form-label">Student Class:</label>
                <input type="text" class="form-control" id="class" name="class" value="<?php echo $class ?>" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Student Address:</label>
                <textarea class="form-control" id="address" name="address" required><?php echo $address ?></textarea>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Student Phone:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Student Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required>
            </div>

            <div class="mb-3">
                <label for="blood" class="form-label">Student Blood Group:</label>
                <select name="blood" id="blood" class="form-control" required>
                    <option value="A+"<?php if($bloodGroup =='A+'){echo'selected';} ?>>A+</option>
                    <option value="A-" <?php if($bloodGroup =='A-'){echo'selected';} ?>>A-</option>
                    <option value="B+" <?php if($bloodGroup =='B+'){echo'selected';} ?>>B+</option>
                    <option value="B-" <?php if($bloodGroup =='B-'){echo'selected';} ?>>B-</option>
                    <option value="AB+" <?php if($bloodGroup =='AB+'){echo'selected';} ?>>AB+</option>
                    <option value="AB-" <?php if($bloodGroup =='AB-'){echo'selected';} ?>>AB-</option>
                    <option value="O+" <?php if($bloodGroup =='O+'){echo'selected';} ?>>O+</option>
                    <option value="O-" <?php if($bloodGroup =='O-'){echo'selected';} ?>>O-</option>
                </select>
            </div>



            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>