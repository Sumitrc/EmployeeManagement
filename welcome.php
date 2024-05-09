<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have additional custom styles -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Welcome Admin</h3>
                    </div>
                    <div class="card-body">
                        <p>You are logged in as an admin.</p>
                        <!-- Add any additional content here -->
                        <div class="text-center">
                            <a href="add_employee.html" class="btn btn-primary mr-2">Add Employee</a>
                            <a href="welcome_admin.php" class="btn btn-secondary">View Employees</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted text-center">
                        <a href="login.html" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <!-- Include any custom JavaScript if needed -->
</body>
</html>
