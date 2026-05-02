<?php
include("config.php");

if (isset($_GET["id"])) {
    $singleId = intval($_GET["id"]);

    $query = "DELETE FROM students WHERE id = $singleId";
    $deleteData = mysqli_query($connections, $query);

    if ($deleteData) {
        header("Location: index.php");
        exit();
    } else {
        echo "Failed to Delete";
    }
}
?>