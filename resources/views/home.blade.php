

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Booking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="tt.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="#home" class="navbar-logo">
                <img src="{{ asset('images/9dfe2123-53e7-4310-a838-eb94ba255eb7-removebg-preview.png') }}" alt="Snap Aqaba Logo">
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#Team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                </ul>
            
                <div class="login-icon">
                    <a href="{{ url('/login') }}" class="nav-link">
                   
                        <i class="fas fa-sign-in-alt"></i>
                    </a>
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
                    <a href="about.html" class="btn-book">اعرف المزيد</a>
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
            <h2 style="text-align: center;">Our Team</h2>
            <p style="text-align: center; margin-bottom: 40px;">Meet our talented photographers based in Aqaba, ready to capture your special moments.</p>
            <div class="team-members">
                <!-- Team Member 1 -->
                <div class="team-member">
                    <img src="images/team-1.jpg" alt="Team Member 1">
                    <h3>Mohammed Ahmed</h3>
                    <p>Professional photographer</p>
                    <div class="social-icons">
                        <a href="tel:+962790000001" target="_blank"><i class="fas fa-phone"></i></a>
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-member">
                    <img src="images/team-2.jpg" alt="Team Member 2">
                    <h3>Layla Khalid</h3>
                    <p>Professional photographer</p>
                    <div class="social-icons">
                        <a href="tel:+962790000002" target="_blank"><i class="fas fa-phone"></i></a>
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-member">
                    <img src="images/team-3.jpg" alt="Team Member 3">
                    <h3>Ali Hassan</h3>
                    <p>Professional photographer</p>
                    <div class="social-icons">
                        <a href="tel:+962790000003" target="_blank"><i class="fas fa-phone"></i></a>
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="team-member">
                    <img src="images/team-4.jpg" alt="Team Member 4">
                    <h3>Sara Mahmoud</h3>
                    <p>Professional photographer</p>
                    <div class="social-icons">
                        <a href="tel:+962790000004" target="_blank"><i class="fas fa-phone"></i></a>
                        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
<!-- Contact Section -->
<section id="contact" class="contact-section">
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
</section>
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

            <!-- روابط التواصل الاجتماعي -->
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

        <!-- حقوق النشر -->
        <div class="footer__bottom">
            <p class="footer__copyright">&copy; 2025 SNAP AQABA. All rights reserved.</p>
        </div>
    </div>
</footer>
<!-- Font Awesome Icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>

