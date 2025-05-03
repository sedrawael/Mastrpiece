

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="tt.css">
</head>
<body>

    <nav class="custom-navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="custom-navbar-logo">
                <img src="{{ asset('images/9dfe2123-53e7-4310-a838-eb94ba255eb7-removebg-preview.png') }}" alt="Snap Aqaba Logo" width="150">
            </a>
       
            <div class="custom-navbar-collapse">
                <ul class="custom-navbar-nav">
                    <li class="custom-nav-item">
                        <a class="custom-nav-link" href="#home">Home</a>
                    </li>
                    <li class="custom-nav-item">
                        <a class="custom-nav-link" href="#about">About</a>
                    </li>
                    <li class="custom-nav-item">
                        <a class="custom-nav-link" href="#services">Services</a>
                    </li>
                    <li class="custom-nav-item">
                        <a class="custom-nav-link" href="#Team">Team</a>
                    </li>
                    <li class="custom-nav-item">
                        <a class="custom-nav-link" href="#contact">Contact Us</a>
                    </li>
                </ul>
                <div class="auth-links">
                    @guest
                        <a href="{{ route('login') }}" class="custom-nav-link" aria-label="Login">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="custom-nav-link" aria-label="Register">
                            <i class="fas fa-user-plus"></i> Register
                        </a>
                    @else
                        <a href="{{ route('profile.show') }}" class="custom-nav-link" aria-label="Profile">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <a href="{{ route('logout') }}" class="custom-nav-link" aria-label="Logout"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1 class="www">SNAP AQABA</h1>
            <h1 class="www">Book Professional Photographers</h1>
            <p class="www">Find and book the best photographers for your events, weddings, or personal shoots.</p>
            <a href="{{ url('/book-now') }}" class="btn-book">Book Now</a>  

        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about-section">
        <div class="container">
            <h2>About Us</h2>
            <div class="about-content">
                <div class="about-text">
                    <p>Welcome to <strong>Snap Aqaba</strong>, the premier platform for booking professional photographers in Aqaba. We connect you with talented photographers who specialize in capturing your most precious moments.</p>
                    <p>Whether it's a wedding, corporate event, or a personal photoshoot, our photographers are here to deliver stunning results tailored to your needs.</p>
                    <ul class="about-list">
                        <li> <strong>Experienced Photographers</strong></li>
                        <li><strong>High-Quality Results</strong></li>
                        <li><strong>Easy Booking Process</strong></li>
                    </ul>
                </div>
                <div class="about-image">
<img src="{{ asset('images/11089c9c-e693-4a21-9499-a47fa19f5b40 (1).jpg') }}" alt="About Us">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <h2>Our Services</h2>
            <p>We offer a wide range of photography services to meet your needs.</p>
            <ul class="services-list">
                <!-- Service 1: Wedding Photography -->
                <li>
                    <img src="images/professional-wedding-photographer-taking-pictures-bride-groom-nature-autumn_114963-19970.avif" alt="Wedding Photography">
                    <h3>Wedding Photography</h3>
                    <p>Capture the most beautiful moments of your special day.</p>
                </li>

                <!-- Service 2: Portrait Sessions -->
                <li>
                    <img src="images/article-JmBAp1thnI-m (1).webp" alt="Portrait Sessions">
                    <h3>Portrait Sessions</h3>
                    <p>Professional sessions that reflect your personality.</p>
                </li>

                <!-- Service 3: Event Coverage -->
                <li>
                    <img src="images/media_141bdd2608fd6dc116e7ab632f16d9ddafe6418a7.png" alt="Event Coverage">
                    <h3>Event Coverage</h3>
                    <p>Complete documentation of your special events.</p>
                </li>

                <!-- Service 4: Commercial Photography -->
                <li>
                    <img src="images/Product-Photography.webp" alt="Commercial Photography">
                    <h3>Commercial Photography</h3>
                    <p>Professional photos for your products and brand.</p>
                </li>
            </ul>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section" id="Team">
        <div class="container">
            <h2 style="text-align: center;">Our Photographers</h2>
            <p style="text-align: center; margin-bottom: 40px;">
                Meet our talented photographers based in Aqaba, ready to capture your special moments.
            </p>
            <div class="team-members">
                @foreach ($photographers as $photographer)
                    <div class="team-member">
                        <img src="{{ asset('storage/' . $photographer->profile_image) }}" alt="{{ $photographer->name }}">
                        <h3>{{ $photographer->name }}</h3>
                        <p>{{ $photographer->specialty }}</p>
                        {{-- <p>{{ $photographer->phone }}</p> --}}
    
                        <button style="background-color: #f3c024; border: none; margin-bottom: 13px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#photographerModal{{ $photographer->id }}">
                            View Details
                        </button>
                    </div>
    
                    <!-- Modal -->
                    <div class="modal fade" id="photographerModal{{ $photographer->id }}" tabindex="-1" aria-labelledby="photographerModalLabel{{ $photographer->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="photographerModalLabel{{ $photographer->id }}">{{ $photographer->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset('storage/' . $photographer->profile_image) }}" style="width: 200px; height: 200px; object-fit: cover;" class="rounded-circle mb-3" alt="{{ $photographer->name }}">
                                    <p><strong>Specialty:</strong> {{ $photographer->specialty }}</p>
                                    <p><strong>Phone:</strong> {{ $photographer->phone }}</p>
                                    <p><strong>Email:</strong> {{ $photographer->email }}</p>
                                    <p><strong>Price per Hour:</strong> ${{ $photographer->price_per_hour }}</p>
                                    <p><strong>Available:</strong> {{ $photographer->is_available ? 'Yes' : 'No' }}</p>
                                    <p><strong>Bio:</strong> {{ $photographer->bio }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                @endforeach
            </div>
        </div>
    </section>
            
 @include('contact') 
<!-- Contact Section -->
{{-- <section id="contact" class="contact-section">
    <div class="container">
        <h2>Get in Touch</h2>
        <p>We’d love to hear from you!</p>
        <div class="contact-content">
      
            <!-- نموذج الاتصال -->
            <form class="contact-form">
                <!-- حقل الاسم -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>

                <!-- حقل البريد الإلكتروني -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>

                <!-- حقل الرسالة -->
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                </div>

                <!-- زر الإرسال -->
                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </div>
</section> --}}
<!-- Font Awesome Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<!-- Footer -->
<footer class="footer">
    <div class="footer__container">
        <div class="footer__content">
            <!-- عنوان الفوتر -->
            <div class="footer__section">
                <h3 class="footer__title">Follow SNAP AQABA</h3>
                <p class="footer__description">Follow us on social networks and contact our support team in case of any questions.</p>
            </div>

            <div class="footer__section">
                <h4 class="footer__subtitle">Follow Us</h4>
                <div class="footer__social-icons">
                    <a href="https://facebook.com" target="_blank" class="footer__social-link"><i class="fab fa-facebook"></i></a>
                    <a href="https://instagram.com" target="_blank" class="footer__social-link"><i class="fab fa-instagram"></i></a>
                    <a href="https://twitter.com" target="_blank" class="footer__social-link"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- معلومات الاتصال -->
            <div class="footer__section">
                <h4 class="footer__subtitle">Contact Us</h4>
                <ul class="footer__contact-info">
                    <li class="footer__contact-item">
                        <i class="fas fa-envelope footer__contact-icon"></i> SNAP AQABA@mail.com
                    </li>
                    <li class="footer__contact-item">
                        <i class="fas fa-phone footer__contact-icon"></i> 1-641-784-3010
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer__bottom">
            <p class="footer__copyright">&copy; 2025 SNAP AQABA. All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- Font Awesome Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>