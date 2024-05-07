<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chinatown Historical Businesses Database</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #FF6347;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link {
            color: #ffffff;
            font-family: 'Noto Sans SC', sans-serif;
        }

        .navbar-custom .navbar-toggler-icon {
            background-color: #0000FF;
        }

        .navbar-brand {
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">CHINATOWN HISTORICAL BUSINESS DATABASE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('arcgis') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('survey') }}">Contribute</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        @else
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="button" class="nav-link logout-button" style="background: none; border: none; cursor: pointer;">Logout</button>
                            </form>
                        @endguest
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('business_points') }}">Database</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog') }}">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to toggle login/logout button text and action
        function toggleLoginButton() {
            // Check if the user is authenticated
            @auth
                document.querySelector('.nav-item a.nav-link[href="{{ route('login') }}"]').textContent = 'Logout';
                document.getElementById('logout-form').action = "{{ route('logout') }}";
            @else
                document.querySelector('.nav-item a.nav-link[href="{{ route('login') }}"]').textContent = 'Login';
            @endauth
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleLoginButton();
        });

        document.querySelector('.logout-button').addEventListener('click', function(event) {
            event.preventDefault();

            // Log that the logout button is clicked
            console.log('Logout button clicked');
            document.getElementById('logout-form').submit();
        });
    </script>

</body>
</html>
