<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Employee Details</h1>

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

        // Retrieve employee details based on ID from the database
        $employeeId = $_GET['id'];
        $sql = "SELECT * FROM employees WHERE id = $employeeId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Pre-fill form fields with existing employee details
            $name = $row['name'];
            $email = $row['email'];
            $mobile = $row['mobile_number'];
            $designation = $row['designation'];
            $gender = $row['gender'];
            $course = $row['course'];
            // Display the edit form
            ?>
            <form action="update_employee.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $employeeId; ?>">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
                <label for="mobile">Mobile Number:</label>
                <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>">
                <label for="designation">Designation:</label>
                <input type="text" id="designation" name="designation" value="<?php echo $designation; ?>">
                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="<?php echo $gender; ?>">
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" value="<?php echo $course; ?>"><br><br>
                <input type="submit" value="Save Changes">
                        </form>
            <?php
        } else {
            echo "Employee not found";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
