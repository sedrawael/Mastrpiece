@include('nav')
@include('headd')

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <style>
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

        /* SweetAlert Custom Styles */
        .swal-title {
            font-family: 'Playfair Display', serif;
            color: #2c3e50 !important;
            font-size: 24px !important;
        }

        .swal-html-container {
            font-family: 'Oswald', sans-serif;
            color: #34495e !important;
            font-size: 18px !important;
        }

        .custom-swal {
            border-radius: 15px !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
            border: 2px solid #f3c024 !important;
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
</body>
</html>