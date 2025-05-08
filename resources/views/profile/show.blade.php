@extends('layouts.app')
<link href="{{ asset('css/show.css') }}" rel="stylesheet">

@section('title', 'Profile')

@section('content')
<style>
  
    .profile-container {
    font-family: 'Playfair Display', serif;
    background-image: url('../images/slider-bg2.jpg' );
  
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    min-height: 100vh;
    width: 100%;
    position: relative;
    text-align: left;
}

    .profile-container::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .profile-card {
        max-width: 800px;
        width: 100%;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 2;
        margin: 50px auto;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header h2 {
        font-family: 'Oswald', sans-serif;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #f3c024;
        margin: 0 auto 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .profile-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    .info-value {
        padding: 12px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1.1rem;
    }

    .profile-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-edit,
    .btn-change-password {
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-family: 'Oswald', sans-serif;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #f3c024;
        color: #333;
        border: none;
    }

    .btn-edit:hover {
        background-color: #e89f10;
        transform: scale(1.05);
    }

    .btn-change-password {
        background-color: #333;
        color: #fff;
        border: none;
    }

    .btn-change-password:hover {
        background-color: #222;
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .profile-info {
            grid-template-columns: 1fr;
        }

        .profile-actions {
            flex-direction: column;
            align-items: center;
        }

        .btn-edit,
        .btn-change-password {
            width: 100%;
            justify-content: center;
        }
    }
    
    /* ============= Global Styles ============= */
    * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         font-family: 'Arial', sans-serif;
     }

     body {
         padding-top: 80px; /* نفس ارتفاع النافبار */
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
        height:60px;
        width: 100px;     }

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

</head>
<body>
<nav class="navbar">
 <div class="navbar-container">
   <a href="{{ url('/') }}" class="navbar-logo">
     <img src="{{ asset('images/9dfe2123-53e7-4310-a838-eb94ba255eb7-removebg-preview.png') }}" alt="Snap Aqaba Logo" width="150">
 </a>
     <ul class="navbar-menu">
         <li class="nav-item">
             <a href="/home" class="nav-link">
                 <i class="fnav-link"></i>Home
             </a>
         </li>


         <li class="nav-item">
           <a href="home#about" class="nav-link">About</a>
       </li>


           <li class="nav-item">
             <a href="home#services" class="nav-link">
                 <i class="nav-link"></i>Services
             </a>
         </li>

         <li class="nav-item">
             <a href="home#Team" class="nav-link">
                 <i class="nav-link"></i>Team
             </a>
         </li>


         <li class="nav-item">
             <a href="home#contact" class="nav-link">
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


<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img src="{{ Auth::user()->profile_picture ? Storage::url(Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                 alt="Profile Picture" 
                 class="profile-avatar">
            <h2>{{ Auth::user()->name }}</h2>
            <p>Member since {{ Auth::user()->created_at->diffForHumans() }}</p>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label>Email</label>
                <div class="info-value">{{ Auth::user()->email }}</div>
            </div>
            <div class="info-group">
                <label>Phone Number</label>
                <div class="info-value">{{ Auth::user()->phone ?? 'Not specified' }}</div>
            </div>
            <div class="info-group">
                <label>Registration Date</label>
                <div class="info-value">{{ Auth::user()->created_at->format('Y/m/d') }}</div>
            </div>
            <div class="info-group">
                <label>Last Updated</label>
                <div class="info-value">{{ Auth::user()->updated_at->diffForHumans() }}</div>
            </div>
        </div>

        <div class="profile-actions">
            <a href="{{ route('profile.edit') }}" class="btn-edit">
                <i class="fas fa-edit"></i> Edit Profile
            </a>
            
            <a href="{{ route('password.change') }}" class="btn-change-password">
                <i class="fas fa-lock"></i> Change Password
            </a> 
           
        </div>
    </div>
    @include('footer')
</div>

@endsection