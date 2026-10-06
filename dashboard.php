<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");

    exit();

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard</title>

</head>

<body style="background-color: pink;">

<center>

    <h1>Community Emergency Resource Sharing System</h1>

    <hr>

    <h2>Welcome, <?php echo $_SESSION['name']; ?></h2>

    <p>
        Welcome to dashboard.
    </p>

    <hr>

    <h2>Emergency Resource Services</h2>

    <table border="1" cellpadding="15">

        <tr>

            <td>

                <h3>Share Resource</h3>

                <p>
                    Share food, water, medicine
                    and other emergency resources.
                </p>

                <a href="share_resource.php">
                    Share Resource
                </a>

            </td>

            <td>

                <h3>Request Resource</h3>

                <p>
                    Request resources that are
                    needed during emergencies.
                </p>

                <a href="request_resources.php">
                    Request Resource
                </a>

            </td>

        </tr>

        <tr>

            <td>

                <h3>View Resources</h3>

                <p>
                    View available resources
                    and emergency requests.
                </p>

                <a href="resources.php">
                    View Resources
                </a>

            </td>

            <td>

                <h3>Logout</h3>

                <p>
                    Logout from your account.
                </p>

                <a href="logout.php">
                    Logout
                </a>

            </td>

        </tr>

    </table>

    <hr>

    <p>
        Thank you for helping your community.
    </p>

</center>

</body>

</html>