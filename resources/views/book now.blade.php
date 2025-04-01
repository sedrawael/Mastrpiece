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
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <!-- Booking Section -->
    
    <section id="book-now" class="book-now-section">
        <div class="container">

            <h2>Book Now</h2>
            <p class="aaa">Fill out the form below to book your appointment with us.</p>
            <form class="booking-form">
                <!-- Full Name Field -->
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>

                <!-- Phone Number Field -->
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>

                <!-- Event Type Field -->
                <div class="form-group">
                    <label for="event-type">Event Type</label>
                    <select id="event-type" name="event-type" required>
                        <option value="" disabled selected>Select event type</option>
                        <option value="wedding">Wedding</option>
                        <option value="birthday">Birthday</option>
                        <option value="corporate">Corporate Event</option>
                        <option value="graduation">Graduation</option>
                        <option value="party">Private Party</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Date Field -->
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required>
                </div>

                <!-- Time Field -->
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" id="time" name="time" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">Book Now</button>
            </form>
        </div>
    </section>
</body>
</html>