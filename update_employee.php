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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employeeId = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $designation = $_POST["designation"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];

    // Update employee details in the database
    $sql = "UPDATE employees SET name='$name', email='$email', mobile_number='$mobile', designation='$designation', gender='$gender', course='$course' WHERE id='$employeeId'";

    if ($conn->query($sql) === TRUE) {
        // If the update was successful, redirect back to the admin welcome page
        header("Location: welcome_admin.php");
        exit();
    } else {
        echo "Error updating employee details: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
