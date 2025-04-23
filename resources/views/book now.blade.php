<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Booking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body::before {
            background: rgba(0, 0, 0, 0.6);
        }
        
        .booking-form {
            transform: translateY(-30px);
        }
        
        .form-group input:focus {
            background: #fff8e5;
        }
    </style>
</head>
<body>
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
            <p class="aaa">Fill out the form below to book your appointment with us.</p>

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ $user->name ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ $user->email ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" value="{{ $user->phone ?? '' }}" required>
            </div>

            <div class="form-group">
                <label for="event_type">Event Type</label>
                <select id="event_type" name="event_type" required>
                    <option value="" disabled selected>Select event type</option>
                    <option value="wedding">Wedding</option>
                    <option value="birthday">Birthday</option>
                    <option value="corporate">Corporate Event</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>
            </div>

            <div class="form-group">
                <label for="time">Time</label>
                <input type="time" id="time" name="time" required>
            </div>

            <button type="submit" class="btn-submit">Book Now</button>
            
        </form>
    </div>
</body>
</html>