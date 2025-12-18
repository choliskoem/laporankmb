<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <style>
        body {
            background: #f5f6fa;
        }

        /* ---------------------------------------
        SIDEBAR
        -----------------------------------------*/
        .sidebar {
            width: 250px;
            position: fixed;
            height: 100vh;
            background: #0A3FA3;
            padding-top: 25px;
            box-shadow: 3px 0 12px rgba(0, 0, 0, 0.15);
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            width: 70px;
            margin-bottom: 8px;
        }

        .sidebar h4 {
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .menu-title {
            color: #aac4ff;
            font-size: 13px;
            margin: 20px 20px 8px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .sidebar a {
            color: #e3e9ff;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            margin: 6px 0;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            transform: translateX(3px);
        }

        .sidebar a.active {
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            font-weight: 700;
            border-left: 4px solid #fff;
        }

        /* ---------------------------------------
        TOP NAV
        -----------------------------------------*/
        .navbar-custom {
            margin-left: 250px;
            background: #ffffff;
            border-bottom: 1px solid #e2e2e2;
            padding: 15px 25px;
            font-size: 18px;
            font-weight: 600;
            color: #0A3FA3;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        /* ---------------------------------------
        MAIN CONTENT
        -----------------------------------------*/
        .main-content {
            margin-left: 250px;
            padding: 25px 30px;
        }

        /* responsive */
        @media(max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .navbar-custom,
            .main-content {
                margin-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/rrilogo.png') }}" alt="RRI">
        </div>

        <h4 class="text-center">RRI Dashboard</h4>

        <div class="menu-title">Main Menu</div>

        <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="fa fa-home"></i>
            Dashboard
        </a>

        <a href="/contents" class="{{ request()->is('contents*') ? 'active' : '' }}">
            <i class="fa fa-film"></i>
            Data Konten
        </a>

        <a href="/persons" class="{{ request()->is('persons*') ? 'active' : '' }}">
            <i class="fa fa-users"></i>
            Data Person
        </a>

        {{-- <a href="/programs" class="{{ request()->is('programs*') ? 'active' : '' }}">
            <i class="fa fa-tv"></i>
            Program
        </a> --}}

        <div class="menu-title">Account</div>

        <a href="/logout">
            <i class="fa fa-right-from-bracket"></i>
            Logout
        </a>
    </div>

    <!-- TOP NAV -->
    <nav class="navbar navbar-custom">
        @yield('page-title', 'Halaman')
    </nav>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    @stack('scripts')
</body>

</html>
