<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Script</title>
</head>
<body>
    <script>
        function logout() {
            // Make an AJAX request to the logout route
            fetch('/logout', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.ok) {
                    // If logout is successful, redirect to login page
                    window.location.href = '/login';
                    // Change the text of the logout link to Login
                    document.querySelector('.nav-link[href="#"]').textContent = 'Login';
                } else {
                    // If logout fails, handle error (optional)
                    console.error('Logout failed');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>
