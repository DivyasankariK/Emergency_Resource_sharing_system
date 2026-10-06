<?php

session_start();

include("db.php");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Emergency Resources</title>

    <style>

        body {
            background-color: pink;
            font-family: Arial;
        }

        table {
            background-color: white;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

    </style>

</head>

<body>

<center>

<h1>Community Emergency Resource Sharing System</h1>

<hr>

<h2>Available Emergency Resources</h2>

<table>

<tr>

    <th>Resource</th>
    <th>Quantity</th>
    <th>Location</th>
    <th>Status</th>
    <th>Action</th>

</tr>

<?php

$sql = "SELECT * FROM resources WHERE type='share'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td><?php echo $row['resource_name']; ?></td>

    <td><?php echo $row['quantity']; ?></td>

    <td><?php echo $row['location']; ?></td>

    <td>Available</td>

    <td>
        <a href="delete_resource.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>

</tr>

<?php

}

?>

</table>

<hr>

<h2>Emergency Requests</h2>

<table>

<tr>

    <th>Resource Needed</th>
    <th>Quantity</th>
    <th>Location</th>
    <th>Emergency Level</th>
    <th>Action</th>

</tr>

<?php

$sql = "SELECT * FROM resources WHERE type='request'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

    <td><?php echo $row['resource_name']; ?></td>

    <td><?php echo $row['quantity']; ?></td>

    <td><?php echo $row['location']; ?></td>

    <td><?php echo $row['emergency_level']; ?></td>

    <td>
        <a href="delete_resource.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>

</tr>

<?php

}

?>

</table>

<br>

<a href="dashboard.php">Back to Dashboard</a>

<br><br>

<a href="index.php">Home</a>

</center>

</body>

</html>
```