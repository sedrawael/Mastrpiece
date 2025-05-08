@extends('layouts.app')

@section('content')
<style>
    /* ============= Global Styles ============= */
    * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Arial', sans-serif;
     }

    

     /* ============= Navbar Styles ============= */
     .navbar {
       background-color: #333;
         position: fixed;
         top: 0;
         width: 100%;
         z-index: 1000;
         height: 80px;
         transition: all 0.3s ease;
     }

     .navbar.scrolled {
       background-color: #333;
         height: 70px;
     }

     .navbar-container {
         max-width: 1200px;
         margin: 0 auto;
         padding: 0 20px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         height: 100%;
     }

     .navbar-logo img {
        height: 80px;
    width: auto;
    display: block;
    transition: transform 0.3s ease; 
     }

     .navbar-logo:hover img {
         transform: scale(1.05);
     }

     .navbar-menu {
         display: flex;
         list-style: none;
         align-items: center;
     }

     .nav-item {
         margin-left: 30px;
         position: relative;
     }

     .nav-link {
         color: #ecf0f1;
         text-decoration: none;
         font-size: 16px;
         padding: 8px 12px;
         transition: all 0.3s ease;
         display: flex;
         align-items: center;
     }

     .nav-link i {
         margin-right: 8px;
         font-size: 14px;
     }

     .nav-link:hover {
         color: #f3c024;
         transform: translateY(-2px);
     }

     .auth-links {
         display: flex;
         gap: 20px;
         margin-left: 40px;
     }

     /* ============= Mobile Menu ============= */
     .menu-toggle {
         display: none;
         color: #ecf0f1;
         font-size: 24px;
         cursor: pointer;
     }

     @media (max-width: 992px) {
         .navbar-menu {
             position: fixed;
             top: 80px;
             right: -100%;
             background: #2c3e50;
             width: 250px;
             height: calc(100vh - 80px);
             flex-direction: column;
             align-items: flex-start;
             padding: 30px 20px;
             transition: all 0.3s ease;
         }

         .navbar-menu.active {
             right: 0;
         }

         .nav-item {
             margin: 15px 0;
             width: 100%;
         }

         .nav-link {
             padding: 12px;
             width: 100%;
         }

         .auth-links {
             flex-direction: column;
             margin-left: 0;
             gap: 15px;
         }

         .menu-toggle {
             display: block;
         }
     }
     body::before {
         background: rgba(0, 0, 0, 0.6);
     }

     .booking-form {
         transform: translateY(-30px);
         max-width: 900px; 
         margin: 0 auto;   
         padding: 40px;    
     }

     .form-group input:focus {
         background: #fff8e5;
     }
     .btn-select-photographer {
       display: inline-block;
       background-color: #f3c024;
       color: #fff;
       padding: 12px 24px;
       font-size: 16px;
       font-weight: bold;
       border: none;
       border-radius: 8px;
       cursor: pointer;
       transition: background-color 0.3s ease;
       margin-top: 20px;
     }

     .btn-select-photographer:hover {
       background-color: #E89F10;
     }

 </style>

<style>
    body {
        font-family: 'Playfair Display', serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-image: url('../images/slider-bg2.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #333;
        position: relative;
        min-height: 100vh;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        position: relative;
        z-index: 2;
    }

    .password-change-container {
        max-width: 500px;
        width: 100%;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 3;
    }

    .password-change-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .password-change-header h2 {
        font-family: 'Oswald', sans-serif;
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .password-change-header i {
        color: #f3c024;
        margin-right: 10px;
        font-size: 1.8rem;
    }

    .password-change-form .form-group {
        margin-bottom: 25px;
        text-align: left;
    }

    .password-change-form label {
        font-weight: bold;
        color: #555;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
    }

    .password-change-form label i {
        margin-right: 8px;
        color: #666;
        font-size: 1rem;
    }

    .password-change-form input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .password-change-form input:focus {
        border-color: #f3c024;
        box-shadow: 0 0 0 3px rgba(243, 192, 36, 0.2);
        outline: none;
    }

    .btn-submit {
        background-color: #f3c024;
        color: #333;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-family: 'Oswald', sans-serif;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background-color: #e0a800;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-submit i {
        margin-right: 8px;
    }

    .alert-password {
        padding: 15px;
        margin-bottom: 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
    }

    .alert-danger {
        background-color: rgba(220, 53, 69, 0.9);
        color: white;
        border-left: 5px solid #dc3545;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.9);
        color: white;
        border-left: 5px solid #28a745;
    }

    .alert-password i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 5px;
        display: flex;
        align-items: center;
    }

    .invalid-feedback i {
        margin-right: 5px;
    }

    @media (max-width: 576px) {
        .password-change-container {
            padding: 30px;
            margin: 20px;
        }
        
        .password-change-header h2 {
            font-size: 1.8rem;
        }
    }
</style>
<nav class="navbar">
    <div class="navbar-container">
      <a href="{{ url('/') }}" class="navbar-logo">
        <img src="{{ asset('images/9dfe2123-53e7-4310-a838-eb94ba255eb7-removebg-preview.png') }}" alt="Snap Aqaba Logo" >
    </a>
        <ul class="navbar-menu">
            <li class="nav-item">
                <a href="/home" class="nav-link">
                    <i class="fnav-link"></i>Home
                </a>
            </li>


            <li class="nav-item">
              <a href="/home#about" class="nav-link">About</a>
          </li>


              <li class="nav-item">
                <a href="/home#services" class="nav-link">
                    <i class="nav-link"></i>Services
                </a>
            </li>

            <li class="nav-item">
                <a href="/home#Team" class="nav-link">
                    <i class="nav-link"></i>Team
                </a>
            </li>


            <li class="nav-item">
                <a href="/home#contact" class="nav-link">
                    <i class="nav-link"></i>Contact
                </a>
            </li>

            <div class="auth-links">
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            <i class="fas fa-sign-in-alt"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">
                            <i class="fas fa-user-plus"></i>Register
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/profile" class="nav-link">
                            <i class="fas fa-user"></i>Profile
                        </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" aria-label="Logout"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </a>
                </li>
                @endguest
            </div>
        </ul>

        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </div>
</nav>

<div class="container">
    <div class="password-change-container">
        <div class="password-change-header">
            <h2><i class="fas fa-key"></i>Change Password</h2>
        </div>

        @if (session('error'))
            <div class="alert alert-danger alert-password">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-password">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="password-change-form">
            @csrf

            <div class="form-group">
                <label for="current_password">
                    <i class="fas fa-lock"></i>Current Password
                </label>
                <input type="password" class="@error('current_password') is-invalid @enderror" 
                       id="current_password" name="current_password" required
                       placeholder="Enter your current password">
                @error('current_password')
                    <span class="invalid-feedback">
                        <i class="fas fa-exclamation-triangle"></i>{{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">
                    <i class="fas fa-key"></i>New Password
                </label>
                <input type="password" class="@error('new_password') is-invalid @enderror" 
                       id="new_password" name="new_password" required
                       placeholder="At least 8 characters">
                @error('new_password')
                    <span class="invalid-feedback">
                        <i class="fas fa-exclamation-triangle"></i>{{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">
                    <i class="fas fa-check-circle"></i>Confirm Password
                </label>
                <input type="password" id="new_password_confirmation" 
                       name="new_password_confirmation" required
                       placeholder="Re-type your new password">
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Update Password
            </button>
        </form>
    </div>
</div>
@include('footer')
@endsection