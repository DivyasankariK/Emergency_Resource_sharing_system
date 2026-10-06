<?php

session_start();

include("db.php");

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM resources WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {

        header("Location: resources.php");

        exit();

    } else {

        echo "Delete Failed";

    }

}

?>
