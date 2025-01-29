<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="dns-preferech" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}"></script>

</head>
<body style="min-height: 100vh; display: flex; flex-direction: column;">
    <!-- Navbar -->
    <nav class="navbar bg-dark border-bottom border-body shadow" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav offset-md-9">
                    <a class="nav-link active" aria-current="page" href="#">Features</a>
                    <a class="nav-link" href="#">Enterprise</a>
                    <a class="nav-link" href="#">Support</a>
                    <a class="nav-link" href="#">Pricing</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    @include('layout.footer')
</body>
</html>