<?php 

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "parking_management_system";

    $conn = mysqli_connect($server,$user,$pass,$database);

    if (!$conn) {
        die (mysqli_error($conn));
    }

?>