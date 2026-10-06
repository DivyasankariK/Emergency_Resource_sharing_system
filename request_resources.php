<?php

session_start();

include("db.php");

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit();

}

$message = "";

if (isset($_POST['request'])) {

    $resource = $_POST['resource'];
    $quantity = $_POST['quantity'];
    $location = $_POST['location'];
    $emergency = $_POST['emergency'];

    $sql = "INSERT INTO resources
            (resource_name, quantity, location, type, emergency_level)
            VALUES
            ('$resource', '$quantity', '$location', 'request', '$emergency')";

    if (mysqli_query($conn, $sql)) {

        $message = "Emergency Request Submitted Successfully!";

    } else {

        $message = "Request Failed";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Request Emergency Resource</title>

</head>

<body style="background-color: pink;">

<center>

    <h1>Community Emergency Resource Sharing System</h1>

    <hr>

    <h2>Request Emergency Resource</h2>

    <p>
        Request the resource you need
        during an emergency.
    </p>

    <?php

    if ($message != "") {
        echo "<h3>$message</h3>";
    }

    ?>

    <form method="post">

        <table>

            <tr>

                <td>Resource Needed:</td>

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

                <td>Emergency Level:</td>

                <td>

                    <select name="emergency">

                        <option>Low</option>

                        <option>Medium</option>

                        <option>High</option>

                    </select>

                </td>

            </tr>

            <tr>

                <td></td>

                <td>

                    <input type="submit"
                           name="request"
                           value="Request Resource">

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