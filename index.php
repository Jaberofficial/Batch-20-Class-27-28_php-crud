<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-5">
        <div class="table-responsive rounded-2 overflow-hidden shadow-lg">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>Class</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Blood Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM students";
                    $students = mysqli_query($connections, $query);
                    $serialNumber = 1;

                    while ($row = mysqli_fetch_assoc($students)) {

                        $id = $row["id"];
                        $name = $row["name"];
                        $roll = $row["roll"];
                        $class = $row["class"];
                        $address = $row["address"];
                        $phone = $row["phone"];
                        $email = $row["email"];
                        $bloodGroup = $row["blood"];

                        echo '<tr>
                        <th scope="row">' . $serialNumber . '</th>
                        <td>' . $name . '</td>
                        <td>' . $roll . '</td>
                        <td>' . $class . '</td>
                        <td>' . $address . '</td>
                        <td>' . $phone . '</td>
                        <td>' . $email . '</td>
                        <td>' . $bloodGroup . '</td>
                        <td>
                            <a href="edit.php?id=' . $id . '" class="btn btn-info btn-sm">Edit</a>

                            <button 
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                onclick="setDeleteId(' . $id . ')">
                                Delete
                            </button>
                        </td>
                    </tr>';

                        $serialNumber++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">

                <div class="modal-body text-center p-4">
                    <div class="mb-3">
                        <span style="font-size: 60px; color: red;">?</span>
                    </div>

                    <h5 class="mb-4">Are you sure you want to delete this user?</h5>

                    <div class="d-flex justify-content-center gap-3">
                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                            Cancel
                        </button>

                        <a href="#" id="confirmDeleteBtn" class="btn btn-danger px-4">
                            Delete
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function setDeleteId(id) {
            document.getElementById("confirmDeleteBtn").href = "delete.php?id=" + id;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>