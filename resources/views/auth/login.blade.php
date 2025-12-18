<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RRI Dashboard</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #0A3FA3, #0F5AD6);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-wrapper {
            width: 950px;
            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
        }

        /* LEFT SIDE */
        .login-left {
            width: 50%;
            padding: 55px 45px;
        }

        .login-left h3 {
            font-weight: 700;
            margin-bottom: 25px;
            color: #0A3FA3;
        }

        .form-control {
            padding: 10px 12px;
        }

        .btn-login {
            background: #0A3FA3;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
        }

        .btn-login:hover {
            opacity: .92;
        }

        /* RIGHT SIDE */
        .login-right {
            width: 50%;
            background: #F4F7FF;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 40px;
            text-align: center;
            border-left: 1px solid #e6e6e6;
        }

        .login-right img {
            width: 260px;
            margin-bottom: 20px;
        }

        .welcome-title {
            font-size: 22px;
            font-weight: 700;
            color: #0A3FA3;
        }

        .welcome-desc {
            max-width: 300px;
            font-size: 14px;
            color: #6c757d;
        }

        @media(max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                width: 95%;
            }

            .login-left,
            .login-right {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <!-- LEFT: FORM LOGIN -->
        <div class="login-left">
            <h3 class="text-center">Login</h3>

            @if ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="fw-semibold">Username or Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label class="fw-semibold">Password</label>
                    <div class="input-group">
                        <input type="password" id="passwordInput" name="password" class="form-control"
                            placeholder="Password" required>
                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                            <i id="iconShow" class="fa fa-eye"></i>
                        </button>
                    </div>
                    <div class="text-end mt-1">
                        <a href="#" class="small text-primary">Forgot password?</a>
                    </div>
                </div>

                {{-- <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div> --}}

                <button class="btn btn-login w-100">Login</button>

                {{-- <div class="mt-3 text-center">
                    <small>Don't have an account? <a href="#" class="text-primary fw-semibold">Sign up</a></small>
                </div> --}}
            </form>
        </div>

        <!-- RIGHT: ILLUSTRATION -->
        <div class="login-right">
            <img src="{{ asset('images/rrilogo.png') }}" alt="RRI Logo">

            <div class="welcome-title">Selamat Datang</div>
            <div class="welcome-desc">
                Silakan login untuk melanjutkan ke dashboard RRI Anda.
            </div>
        </div>

    </div>

    <script>
        function togglePassword() {
            let input = document.getElementById('passwordInput');
            let icon = document.getElementById('iconShow');

            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>

</body>

</html>
