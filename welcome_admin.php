<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
</head>
<body>
    <h1>Welcome Admin</h1>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee_management_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve all employee details
    $sql = "SELECT * FROM employees";
    $result = $conn->query($sql);

    // Display employee details
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Mobile Number</th><th>Designation</th><th>Gender</th><th>Course</th><th>Image</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["mobile_number"] . "</td>";
            echo "<td>" . $row["designation"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["course"] . "</td>";
            echo "<td><img src='uploads/" . $row["image"] . "' width='50'></td>";
            echo "<td><a href='edit_employee.php?id=" . $row["id"] . "'>Edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No employees found";
    }

    // Close connection
    $conn->close();
    ?>

    <br>
    <button onclick="location.href='add_employee.html'" type="button" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Add Employee</button>
</body>
</html>
