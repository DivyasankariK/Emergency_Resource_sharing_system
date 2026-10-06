<?php

session_start();

include("db.php");

$message = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user using email
    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        // Verify hashed password
        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];

            header("Location: dashboard.php");
            exit();

        } else {

            $message = "Invalid Email or Password";

        }

    } else {

        $message = "Invalid Email or Password";

    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <title>User Login</title>
</head>

<body style="background-color: pink;">

<center>

    <h1>Community Emergency Resource Sharing System</h1>

    <hr>

    <h2>User Login</h2>

    <?php

    if ($message != "") {
        echo "<h3>$message</h3>";
    }

    ?>

    <form method="post">

        <table>

            <tr>
                <td>Email:</td>

                <td>
                    <input type="email"
                           name="email"
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

                <td></td>

                <td>
                    <input type="submit"
                           name="login"
                           value="Login">
                </td>

            </tr>

        </table>

    </form>

    <br>

    <a href="index.php">
        Back to Home
    </a>

    <br><br>

    <a href="register.php">
        Create New Account
    </a>

</center>

</body>

</html>