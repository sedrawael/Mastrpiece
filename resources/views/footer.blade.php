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
<style>
    /* Footer Styles */
.footer {
    background-color: #333;
    color: #fff;
    padding: 60px 0 20px;
    text-align: center;
}

.footer__container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer__content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
}

.footer__section {
    flex: 1;
    min-width: 250px;
    text-align: left;
}

.footer__title {
    font-family: 'Oswald', sans-serif;
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #f3c024;
}

.footer__subtitle {
    font-family: 'Oswald', sans-serif;
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #f3c024;
}

.footer__description {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    color: #ccc;
    margin-bottom: 20px;
}

.footer__social-icons {
    display: flex;
    gap: 15px;
}

.footer__social-link {
    color: #fff;
    font-size: 1.5rem;
    transition: color 0.3s ease, transform 0.3s ease;
}

.footer__social-link:hover {
    color: #f3c024;
    transform: scale(1.2);
}

.footer__contact-info {
    list-style: none;
    padding: 0;
}

.footer__contact-item {
    font-family: 'Arial', sans-serif;
    font-size: 1rem;
    color: #ccc;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.footer__contact-icon {
    color: #f3c024;
    font-size: 1.2rem;
}

.footer__bottom {
    border-top: 1px solid #444;
    padding-top: 20px;
    font-family: 'Arial', sans-serif;
    font-size: 0.9rem;
    color: #ccc;
}

.footer__copyright {
    margin: 0;
}
</style>