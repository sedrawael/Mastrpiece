



<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <h2>Get in Touch</h2>
        <p>We’d love to hear from you!</p>
        <div class="contact-content">
            <form method="POST" action="{{ route('messages.store') }}" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                </div>

                <button type="submit" class="btn-submit">Send Message</button>
            </form>
        </div>
    </div>
</section>

<style>
/* التنسيقات تبعتك بالزبط */
.contact-section {
    background-image: url('../images/slider-bg2.jpg');
    background-size: cover;
    background-position: center;
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
    color: #fff;
}

.contact-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.3);
    z-index: 1;
}

.contact-section .container {
    position: relative;
    z-index: 2;
}

.contact-section h2,
.contact-section p {
    color: #fff;
}

.contact-form {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 800px;
    margin: 0 auto;
    border: 2px solid #f3c024;
    position: relative;
    overflow: hidden;
}

.contact-form::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    border: 2px solid rgba(243, 192, 36, 0.3);
    border-radius: 10px;
    z-index: -1;
}

.contact-form .form-group {
    margin-bottom: 15px;
}

.contact-form label {
    color: #333;
}

.contact-form input,
.contact-form textarea {
    background-color: rgba(255, 255, 255, 0.9);
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    width: 100%;
    font-size: 1rem;
    color: #333;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #f3c024;
    box-shadow: 0 0 8px rgba(243, 192, 36, 0.5);
}

.contact-form textarea {
    height: 150px;
    resize: vertical;
}

.btn-submit {
    background-color: #f3c024;
    color: #333;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-submit:hover {
    background-color: #e89f10;
    transform: scale(1.05);
}

@media (max-width: 768px) {
    .contact-form {
        padding: 20px;
    }
}
</style>


