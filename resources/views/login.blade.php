<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Log in</h2>
            <form id="loginForm" action="{{ route('login') }}" method="POST">
                @csrf
                <input type="email" name="email" id="email" placeholder="Email" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <input type="password" name="password" id="password" placeholder="Password" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror

                <button type="submit">Login</button>
            </form>
            <div class="signup">
                I don't have an account yet
                <a href="{{ route('register') }}">Register a new account</a>
            </div>
        </div>
    </div>
</body>
</html>
