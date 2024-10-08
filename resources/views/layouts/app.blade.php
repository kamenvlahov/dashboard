<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid" style="background-color: #c9d487;">
                <a class="navbar-brand" href="#">Dashboard</a>
            </div>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>


</body>

</html>