<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Navbar</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: 'Ubuntu', sans-serif;
            list-style: none;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            transition: all 0.4s ease;
            background: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav .logo a {
            font-weight: 700;
            font-size: 30px;
            color: #4070f4;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links li {
            position: relative;
        }

        .nav-links a {
            color: #0E2431;
            font-size: 18px;
            font-weight: 500;
            padding: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-links a:hover {
            color: #4070f4;
        }

        /* Dropdown Styles */
        .dropdown {
            position: absolute;
            top: 40px;
            left: -40px;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            min-width: 100px;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease-in-out;
        }

        .dropdown li {
            padding: 10px;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #0E2431;
            font-size: 16px;
        }

        .dropdown a:hover {
            background: #4070f4;
            color: #fff;
        }

        .nav-links li:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(5px);
        }

        /* Sticky Navbar */
        nav.sticky {
            background: #4070f4;
            padding: 15px 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        nav.sticky .logo a {
            color: #fff;
        }

        nav.sticky .nav-links a {
            color: #fff;
        }

        nav.sticky .nav-links a:hover {
            color: #0E2431;
        }

        /* Dummy content */
        .home {
            height: 100vh;
            background: url("images/background.png") no-repeat center center/cover;
        }

        .profile_image {
  vertical-align: middle;
  width: 30px;
  height: 30px;
  border-radius: 50%;

}

    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="#">Library</a>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">Home</a>
                <ul class="dropdown">
                    <li><a href="#">Link 1</a></li>
                    <li><a href="#">Link 2</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Tab 2</a>
                <ul class="dropdown">
                    <li><a href="#">Link 3</a></li>
                    <li><a href="#">Link 4</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Menu</a>
                <ul class="dropdown">
                    <li><a href="#">Link 5</a></li>
                    <li><a href="#">Link 6</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <img class="profile_image" src="{{ Auth::check() ? (Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : 'https://z-lib.io/img/icon-user.svg') : 'https://z-lib.io/img/icon-user.svg' }}" alt="User">
                </a>
                <ul class="dropdown">
                    @if(Auth::check())
                        <!-- User is signed in -->
                        <li><a href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></li>
                        <li>
                            <li>
                                <a href="#" class="dropdown-item" id="logout-link">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            
                        </li>
                    @else
                        <!-- User is not signed in -->
                        <li><a href="{{ route('userlogin') }}">Sign in</a></li>
                    @endif
                </ul>
            </li>

        </ul>
    </nav>

    <section class="home"></section>

    <script>
        let nav = document.querySelector("nav");
        window.onscroll = function() {
            if (document.documentElement.scrollTop > 20) {
                nav.classList.add("sticky");
            } else {
                nav.classList.remove("sticky");
            }
        };
    </script>

<li>
    <a href="#" class="dropdown-item" id="logout-link">Log out</a>
</li>

<!-- Hidden logout form -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();  // Prevent default anchor behavior
        document.getElementById('logout-form').submit();  // Submit the hidden form
    });
</script>

</body>
</html>
