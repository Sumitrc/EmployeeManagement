<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO employees (name, email, mobile_number, designation, gender, course, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $mobile, $designation, $gender, $course, $image);

    // Set parameters and execute
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $designation = $_POST["designation"];
    $gender = $_POST["gender"];
    $course = implode(", ", $_POST["course"]); // Convert array to comma-separated string
    $image = $_FILES["image"]["name"];

    // Create the uploads directory if it doesn't exist
    $uploadDirectory = 'uploads/';
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true); // Create directory with full permissions
    }

    // Upload image file
    $target_dir = "uploads/"; // Directory where images will be stored
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Close statement and connection
        $stmt->close();
        $conn->close();
        
        // Display success message and button to navigate back to welcome page
        echo '<div style="text-align: center; margin-top: 20px;">';
        echo '<p style="font-size: 18px; color: green;">Employee added successfully.</p>';
        echo '<button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;" onclick="window.location.href=\'welcome.php\'" type="button">Back to Welcome Page</button>';
        echo '</div>';

        exit(); // Terminate script execution
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
