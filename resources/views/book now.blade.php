<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Booking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
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
            width: 100px;
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

<script>
    // Mobile Menu Toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navbarMenu = document.querySelector('.navbar-menu');

    menuToggle.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
    });

    // Scroll Effect
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
    @if(session('success'))
    <script>
        const toast = document.createElement('div');
        toast.style.cssText = 'position:fixed;top:20px;right:20px;background:#28a745;color:white;padding:15px;border-radius:5px;';
        toast.innerText = '{{ session('success') }}';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    </script>
    @endif

    <div class="container">
        <form class="booking-form" method="POST" action="{{ route('booking.store') }}">
          @csrf
          <h2>Book Now</h2>
          <p class="aaa">Fill out the form and book your appointment with us</p>
      
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" value="{{ $user->name ?? '' }}" required>
              </div>
            </div>
      
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" value="{{ $user->email ?? '' }}" required>
              </div>
            </div>
      
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="{{ $user->phone ?? '' }}" required>
              </div>
            </div>
      
            <div class="col-md-6">
              <div class="form-group">
                <label for="event_type">Event Type</label>
                <select id="event_type" name="event_type" required>
                  <option value="" disabled selected>Select event type</option>
                  <option value="wedding">Wedding</option>
                  <option value="birthday">Birthday</option>
                  <option value="corporate">Corporate Event</option>
                </select>
              </div>
            </div>
      
            <div class="col-md-6">
              <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
              </div>
            </div>
      
            <div class="col-md-6">
              <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" required>
              </div>
            </div>
          </div>
      
          <input type="hidden" id="photographer_id" name="photographer_id">
      
          <button type="button" class="btn-select-photographer" data-bs-toggle="modal" data-bs-target="#photographerModal">
            Select Photographer
          </button>
        </form>
      </div>
      

    <!-- Photographer Selection Modal -->
    <div class="modal fade" id="photographerModal" tabindex="-1" aria-labelledby="photographerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content" style="padding: 20px;">
              <div class="modal-header">
                  <h5 class="modal-title" id="photographerModalLabel">Choose Your Photographer</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                  <div class="row">
                      @foreach($photographers as $photographer)
                      <div class="col-md-4 mb-4">
                          <div class="card photographer-card" 
                              style="cursor: pointer;" 
                              onclick="selectPhotographer(
                                  {{ $photographer->id }},
                                  `{{ $photographer->name }}`,
                                  `{{ $photographer->specialty }}`,
                                  {{ $photographer->price_per_hour }}
                              )">
                              <img src="{{ asset('storage/' . $photographer->profile_image) }}" 
                                  class="card-img-top" 
                                  alt="{{ $photographer->name }}" 
                                  style="height: 200px; object-fit: cover;">
                              <div class="card-body text-center">
                                  <h5 class="card-title">{{ $photographer->name }}</h5>
                                  <p class="text-muted mb-0">{{ $photographer->specialty }}</p>
                                  <p class="text-success">${{ number_format($photographer->price_per_hour, 2) }}/hour</p>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  function selectPhotographer(id, name, specialty, price) {
      document.getElementById('photographer_id').value = id;

      const photographerModal = bootstrap.Modal.getInstance(document.getElementById('photographerModal'));
      photographerModal.hide();

      Swal.fire({
          title: `Booking Confirmation`,
          html: `
              <div style="text-align: left; padding: 15px;">
                  <div style="margin-bottom: 20px; border-bottom: 2px solid #f3c024; padding-bottom: 15px;">
                      <h3 style="color: #2c3e50; margin-bottom: 10px;">${name}</h3>
                      <div style="display: grid; grid-template-columns: max-content 1fr; gap: 10px; align-items: center;">
                          <span style="font-weight: 600; color: #34495e;">Specialty:</span>
                          <span>${specialty}</span>
                          
                          <span style="font-weight: 600; color: #34495e;">Rate:</span>
                          <span style="color: #27ae60; font-weight: bold;">$${price.toFixed(2)}/hour</span>
                      </div>
                  </div>
                  <p style="color: #e74c3c; font-size: 18px; font-weight: 600; text-align: center;">
                      Confirm your booking with this photographer?
                  </p>
              </div>
          `,
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#28a745',
          cancelButtonColor: '#dc3545',
          confirmButtonText: 'Confirm Booking',
          cancelButtonText: 'Cancel',
          customClass: {
              popup: 'custom-swal',
              title: 'swal-title',
              htmlContainer: 'swal-html-container'
          },
          showClass: {
              popup: 'swal2-show-animation'
          }
      }).then((result) => {
          if (result.isConfirmed) {
              document.querySelector('.booking-form').submit();
          } else {
              document.getElementById('photographer_id').value = '';
          }
      });
  }
  </script>
  @include('footer')
</body>