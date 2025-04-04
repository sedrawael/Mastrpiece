@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/SignUp.css') }}">

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Sign Up</h2>
            <form id="signupForm" method="POST" action="{{ route('register') }}">
                @csrf 

                <input type="text" name="firstname" placeholder="First Name" required>
                @error('firstname') <span class="error-message">{{ $message }}</span> @enderror

                <input type="text" name="lastname" placeholder="Last Name" required>
                @error('lastname') <span class="error-message">{{ $message }}</span> @enderror

                <input type="email" name="email" placeholder="Email" required>
                @error('email') <span class="error-message">{{ $message }}</span> @enderror

                <input type="password" name="password" placeholder="Password" required>
                @error('password') <span class="error-message">{{ $message }}</span> @enderror

                <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                <button type="submit">Sign Up</button>
            </form>

            <div class="login">
                Already have an account? <a href="{{ url('/login') }}">Log in</a>
            </div>
        </div>
    </div>
  </body>
  </html>