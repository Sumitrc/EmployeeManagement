$(document).ready(function() {
    // Submit event listener for login form
    $('#login-form').submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        
        // Get username and password from form
        var username = $('#username').val();
        var password = $('#password').val();
        
        // You can perform client-side validation here if needed
        
        // AJAX request to server-side validation
        $.ajax({
            type: 'POST',
            url: 'validate_login.php', // PHP file to handle validation
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                // Handle response from server
                if (response === 'success') {
                    // Redirect to welcome page or perform other actions
                    window.location.href = 'welcome.html';
                } else {
                    // Display error message or perform other actions
                    alert('Invalid username or password. Please try again.');
                }
            }
        });
    });
});
