@extends('layouts.app')

<style>
    /* ============= Global Styles ============= */
    * {
     }

     body {
     

         
     }

     /* ============= Navbar Styles ============= */
     .navbar {
        color: white;
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
            width: 100px;
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
<link href="{{ asset('css/edet.css') }}" rel="stylesheet">
@section('title', 'Edit Profile')

@section('content')
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
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-user-edit"></i> Edit Profile</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="avatar-upload">
                    <img src="{{ Auth::user()->profile_picture ? Storage::url('public/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}"
                         id="avatarPreview"
                         class="rounded-circle">
                    <label for="avatarInput" class="avatar-edit-btn">
                        <i class="fas fa-camera"></i>
                        <input type="file" id="avatarInput" name="profile_picture" accept="image/*" class="d-none">
                    </label>
                </div>
                @error('profile_picture')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                <small class="text-muted d-block text-center mb-3">Allowed formats: JPEG, PNG (Max size 2MB)</small>

                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="{{ old('firstname', Auth::user()->firstname) }}" required>
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="{{ old('lastname', Auth::user()->lastname) }}" required>
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="{{ old('phone', Auth::user()->phone) }}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>

                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>

                    @if(Auth::user()->profile_picture)
                        <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash-alt me-2"></i> Delete Picture
                        </button>
                    @endif
                </div>
                <div>
                    
                      <a href="{{ route('password.change') }}" class="btn btn-outline-secondary">
                       <i class="fas fa-lock"></i> Change Password
                       </a>
                    
                         </div>
            </form>
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('profile.picture.delete') }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@include('footer')