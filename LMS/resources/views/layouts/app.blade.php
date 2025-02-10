<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel Project</title>
</head>
<body>
    @include('layouts.UserNavbar') <!-- Include Navbar -->

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
