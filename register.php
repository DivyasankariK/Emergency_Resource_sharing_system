<?php

include("db.php");

$message = "";
$message_type = "";

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    /* Check Password */

    if ($password != $confirm_password) {

        $message = "Passwords do not match.";
        $message_type = "error";

    } else {

        /* Check Email Already Exists */

        $check_sql = "SELECT * FROM users WHERE email='$email'";

        $check_result = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {

            $message = "This email is already registered. Please Login.";
            $message_type = "error";

        } else {

            /* Encrypt Password */

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            /* Insert User */

            $sql = "INSERT INTO users
                    (name, email, phone, password)
                    VALUES
                    ('$name', '$email', '$phone', '$hashed_password')";

            if (mysqli_query($conn, $sql)) {

                $message = "Registration Successful! You can now Login.";
                $message_type = "success";

            } else {

                $message = "Registration Failed.";
                $message_type = "error";

            }

        }

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>User Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body style="background-color: pink;">

<center>

    <h1>Community Emergency Resource Sharing System</h1>

    <hr>

    <h2>User Registration</h2>

    <?php

    if ($message != "") {

        echo "<p><b>$message</b></p>";

    }

    ?>

    <form method="post">

        <table cellpadding="8">

            <tr>

                <td>Name:</td>

                <td>
                    <input type="text"
                           name="name"
                           required>
                </td>

            </tr>

            <tr>

                <td>Email:</td>

                <td>
                    <input type="email"
                           name="email"
                           required>
                </td>

            </tr>

            <tr>

                <td>Phone:</td>

                <td>
                    <input type="text"
                           name="phone"
                           required>
                </td>

            </tr>

            <tr>

                <td>Password:</td>

                <td>
                    <input type="password"
                           name="password"
                           required>
                </td>

            </tr>

            <tr>

                <td>Confirm Password:</td>

                <td>
                    <input type="password"
                           name="confirm_password"
                           required>
                </td>

            </tr>

            <tr>

                <td></td>

                <td>

                    <input type="submit"
                           name="register"
                           value="Register">

                </td>

            </tr>

        </table>

    </form>

    <br>

    <a href="login.php">
        Already have an account? Login
    </a>

    <br><br>

    <a href="index.php">
        Back to Home
    </a>

</center>

</body>

</html>
