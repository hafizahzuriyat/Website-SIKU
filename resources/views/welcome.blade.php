<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKU - Sistem Kerjasama</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #D1D0CE;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #333;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #555;
        }
        a {
            color: #3182ce;
            text-decoration: none;
            font-weight: 500;
        }
        .button-login {
            background-color: #3182ce;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-login:hover {
            background-color: #1e4bb7;
        }
        .button-register {
            background-color: #2E8B57;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-register:hover {
            background-color: #006400;
        }
        .button-dashboard {
            background-color: #696969;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button-dashboard:hover {
            background-color: #2F4F4F;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="logo_new.png" alt="UHB Logo">
    </div>
    <div class="container">
        <h1>Selamat Datang di Sistem Kerjasama</h1>
        <h1>Universitas Harapan Bangsa</h1>
        <p>Platform ini membantu dalam mengelola kerjasama antar lembaga di Universitas Harapan Bangsa.</p>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify">
                @auth
                    <a
                        href="{{ url('/home') }}" 
                        class="button-dashboard"
                    >
                        Dashboard
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="button-login"
                    >
                        Log in
                    </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}" 
                        class="button-register"
                    >
                        Register
                    </a>
                @endif
                @endauth
            </nav>
        @endif
    </div>
</body>
</html>
