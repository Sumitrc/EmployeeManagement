<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from POST data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if username and password are valid (you'll replace this with your actual validation logic)
    // For demonstration purposes, let's assume valid credentials are "admin" and "password"
    if ($username === "admin" && $password === "password") {
        // If credentials are valid, return success message
        echo "success";
    } else {
        // If credentials are invalid, return error message
        echo "error";
    }
} else {
    // If request method is not POST, return error message
    echo "error";
}
?>
