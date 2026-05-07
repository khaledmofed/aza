<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — {{ setting('site_name', 'The Way') }}</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Lato', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1a1a2e;
            background-image:
                radial-gradient(ellipse at 20% 50%, rgba(180,30,30,0.15) 0%, transparent 60%),
                radial-gradient(ellipse at 80% 20%, rgba(180,30,30,0.1) 0%, transparent 50%);
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #fff;
            border-radius: 4px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            overflow: hidden;
        }

        .login-header {
            background: #1a1a2e;
            padding: 36px 40px 28px;
            text-align: center;
            border-bottom: 3px solid #c0392b;
        }

        .login-header .logo-wrap {
            display: inline-block;
            margin-bottom: 12px;
        }

        .login-header .logo-wrap img {
            max-width: 160px;
            max-height: 70px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }

        .login-header h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            margin-top: 4px;
        }

        .login-body {
            padding: 36px 40px 40px;
        }

        .alert-error {
            background: #fef2f2;
            border-left: 3px solid #c0392b;
            color: #c0392b;
            padding: 10px 14px;
            font-size: 13px;
            border-radius: 2px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #888;
            margin-bottom: 8px;
            font-family: 'Montserrat', sans-serif;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #bbb;
            font-size: 15px;
        }

        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 1px solid #e0e0e0;
            border-radius: 2px;
            font-family: 'Lato', sans-serif;
            font-size: 14px;
            color: #333;
            outline: none;
            transition: border-color 0.2s;
            background: #fafafa;
        }

        .form-group input:focus {
            border-color: #c0392b;
            background: #fff;
        }

        .form-error {
            color: #c0392b;
            font-size: 12px;
            margin-top: 5px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .remember-row input[type="checkbox"] {
            accent-color: #c0392b;
            width: 15px;
            height: 15px;
        }

        .remember-row label {
            font-size: 13px;
            color: #666;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: #c0392b;
            color: #fff;
            border: none;
            border-radius: 2px;
            font-family: 'Montserrat', sans-serif;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-login:hover { background: #a93226; }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            text-decoration: none;
            letter-spacing: 1px;
            transition: color 0.2s;
        }
        .back-link:hover { color: rgba(255,255,255,0.7); }
        .back-link i { margin-right: 5px; }
    </style>
</head>
<body>

    <div class="login-wrapper">
        <div class="login-card">

            <div class="login-header">
                <div class="logo-wrap">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset_image(setting('site_logo'), asset('images/logo.png')) }}"
                             alt="{{ setting('site_name', 'The Way') }}">
                    </a>
                </div>
                <h2>Admin Panel</h2>
            </div>

            <div class="login-body">
                {{ $slot }}
            </div>
        </div>

        <a href="{{ route('home') }}" class="back-link">
            <i class="bi bi-arrow-left"></i> Back to Website
        </a>
    </div>

</body>
</html>
