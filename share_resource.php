<?php

session_start();

include("db.php");

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit();

}

$message = "";

if (isset($_POST['share'])) {

    $resource = $_POST['resource'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];

    $sql = "INSERT INTO resources
            (resource_name, quantity, location, type, emergency_level)
            VALUES
            ('$resource', '$quantity', '$location', 'share', 'Low')";

    if (mysqli_query($conn, $sql)) {

        $message = "Resource Shared Successfully!";

    } else {

        $message = "Resource Sharing Failed";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Share Emergency Resource</title>

</head>

<body style="background-color: pink;">

<center>

    <h1>Community Emergency Resource Sharing System</h1>

    <hr>

    <h2>Share Emergency Resource</h2>

    <p>
        You can share an emergency resource
        with people in your community.
    </p>

    <?php

    if ($message != "") {
        echo "<h3>$message</h3>";
    }

    ?>

    <form method="post">

        <table>

            <tr>

                <td>Resource Name:</td>

                <td>
                    <input type="text"
                           name="resource"
                           required>
                </td>

            </tr>

            <tr>

                <td>Quantity:</td>

                <td>
                    <input type="text"
                           name="quantity"
                           required>
                </td>

            </tr>

            <tr>

                <td>Location:</td>

                <td>
                    <input type="text"
                           name="location"
                           required>
                </td>

            </tr>

            <tr>

                <td></td>

                <td>
                    <input type="submit"
                           name="share"
                           value="Share Resource">
                </td>

            </tr>

        </table>

    </form>

    <hr>

    <a href="dashboard.php">
        Back to Dashboard
    </a>

    <br><br>

    <a href="resources.php">
        View Resources
    </a>

</center>

</body>

</html>