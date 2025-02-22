<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Sidebar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
    --primary-color: #3E8DA8; /* Updated primary color */
    --secondary-color: #2C6378; /* A darker shade of the primary color */
    --text-color: white;
    --hover-color: #4CA1B8; /* A lighter shade of the primary color */
    --navbar-gradient: linear-gradient(135deg, #3E8DA8, #2C6378); /* Updated gradient */
}

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: var(--navbar-gradient);
            color: var(--text-color);
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .menu-btn {
            background: none;
            border: none;
            color: var(--text-color);
            font-size: 24px;
            cursor: pointer;
        }

        .navbar h1 {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            margin: 0;
            font-size: 1.5rem;
        }

        .nav-links {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .nav-links a {
            color: var(--text-color);
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .nav-links a:hover {
            background: var(--hover-color);
        }

        .profile {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--text-color);
        }

        .profile-dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background: var(--secondary-color);
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 150px;
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .profile-dropdown.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .profile-dropdown a {
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: var(--text-color);
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .profile-dropdown a:hover {
            background: var(--hover-color);
        }

        .profile-dropdown a i {
            margin-right: 10px;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            left: -250px;
            top: 0;
            height: 100%;
            background: linear-gradient(135deg, #444, #333);
            padding-top: 60px;
            transition: left 0.3s ease-in-out;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 0 10px 10px 0;
            overflow-y: auto;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            background: rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h3 {
            margin: 0;
            font-size: 1.5rem;
            color: var(--text-color);
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            color: var(--text-color);
            display: block;
            transition: background 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar a:hover {
            background: var(--hover-color);
            padding-left: 20px;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            background: none;
            border: none;
            color: var(--text-color);
            cursor: pointer;
        }

        .sidebar::-webkit-scrollbar {
            width: 8px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .backdrop {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            transition: opacity 0.3s ease-in-out;
        }

        .content {
            padding: 20px;
            transition: margin-left 0.3s;
            flex: 1;
        }

        .footer {
            background: var(--primary-color);
            color: var(--text-color);
            text-align: center;
            padding: 10px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .navbar {
                padding: 10px;
            }

            .menu-btn {
                font-size: 20px;
            }

            .sidebar a {
                padding: 10px;
            }
        }
    </style>
    <script defer>
        document.addEventListener("DOMContentLoaded", function () {
            const sidebar = document.getElementById("sidebar");
            const backdrop = document.getElementById("backdrop");
            const menuBtn = document.querySelector(".menu-btn");
            const closeBtn = document.querySelector(".close-btn");
            const profile = document.querySelector(".profile");
            const profileDropdown = document.querySelector(".profile-dropdown");

            function toggleSidebar() {
                sidebar.classList.toggle("open");
                backdrop.style.display = sidebar.classList.contains("open") ? "block" : "none";
            }

            function toggleDropdown() {
                profileDropdown.classList.toggle("active");
            }

            menuBtn.addEventListener("click", toggleSidebar);
            closeBtn.addEventListener("click", toggleSidebar);
            backdrop.addEventListener("click", toggleSidebar);
            profile.addEventListener("click", toggleDropdown);

            // Close dropdown when clicking outside
            document.addEventListener("click", function (event) {
                if (!profile.contains(event.target)) {
                    profileDropdown.classList.remove("active");
                }
            });
        });
    </script>
</head>
<body>
    <header class="navbar">
        <button class="menu-btn" aria-label="Toggle sidebar" aria-expanded="false">&#9776;</button>
        <h1>My Website</h1>
        <nav class="nav-links">
            <a href="{{ route('/') }}">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <div class="profile">
                <img src="{{ Auth::check() ? (Auth::user()->profile_picture ? asset(Auth::user()->profile_picture) : 'https://z-lib.io/img/icon-user.svg') : 'https://z-lib.io/img/icon-user.svg' }}" alt="Profile Picture">
                <div class="profile-dropdown">
                    @if(Auth::check())
                    <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i> {{ Auth::user()->name }}</a>
                    <a href="#"><i class="fas fa-cog"></i> Settings</a>
                    <a href="#" id="logout-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <a href="{{ route('userlogin') }}"><i class="fas fa-cog"></i> Sign in</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <nav class="sidebar" id="sidebar">
        <button class="close-btn">&times;</button>
        <div class="sidebar-header">
            <h3>Menu</h3>
        </div>
        @if(Auth::check())
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Home</a>
        <a href="{{ route('DisplayBorrow') }}"><i class="fas fa-book-open"></i> My Borrows</a>
        <a href="#"><i class="fas fa-cogs"></i> Services</a>
        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Log out</a>
        @else
        <a href="{{ route('userlogin') }}"><i class="fas fa-envelope"></i> Sign in</a>
        @endif
    </nav>

    <div class="backdrop" id="backdrop"></div>

    

    {{-- <footer class="footer">
        <p>&copy; 2023 My Website. All rights reserved.</p>
    </footer> --}}

    <script>
        document.getElementById('logout-link').addEventListener('click', function(event) {
            event.preventDefault();  // Prevent default anchor behavior
            document.getElementById('logout-form').submit();  // Submit the hidden form
        });
    </script>
</body>
</html>