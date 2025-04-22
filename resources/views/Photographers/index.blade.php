@extends('layouts.app')

        
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<title>
  Material Dashboard 3 by Creative Tim
</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />

@include('layouts.navpar');



@include('layouts.sidebar');

@section('content')




 




<style>
    body {
  font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Helvetica, Arial, sans-serif; 
}
    :root {
        --primary-color: #4a90e2;
        --secondary-color: #7ed321;
        --danger-color: #ff4757;
        --text-dark: #2d3436;
        --text-medium: #636e72;
        --bg-light: #f8f9fa;
        --border-color: #e0e0e0;
    }

    .photographers-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid var(--primary-color);
    }

    .photographers-table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
    }

    .photographers-table thead th {
        background: var(--bg-light);
        color: var(--text-dark);
        padding: 1rem;
        text-align: left;
        border-bottom: 2px solid var(--border-color);
    }

    .photographers-table tbody td {
        padding: 1rem;
        border-bottom: 1px solid var(--border-color);
        vertical-align: middle;
    }

    .profile-image {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--primary-color);
    }

    .status-badge {
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .available {
        background: rgba(126, 211, 33, 0.1);
        color: var(--secondary-color);
    }

    .not-available {
        background: rgba(255, 71, 87, 0.1);
        color: var(--danger-color);
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }

    .btn-custom {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-view {
        background: rgba(74, 144, 226, 0.1);
        color: var(--primary-color);
    }

    .btn-edit {
        background: rgba(255, 193, 7, 0.1);
        color: #ffc107;
    }

    .btn-delete {
        background: rgba(255, 71, 87, 0.1);
        color: var(--danger-color);
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .alert-custom {
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    @media (max-width: 768px) {
        .photographers-container {
            margin: 1rem;
            padding: 1rem;
        }
        
        .photographers-table thead {
            display: none;
        }
        
        .photographers-table tbody td {
            display: block;
            text-align: right;
            padding: 0.75rem;
        }
        
        .photographers-table tbody td::before {
            content: attr(data-label);
            float: left;
            font-weight: 600;
            color: var(--text-medium);
        }
        
        .action-buttons {
            justify-content: flex-end;
        }
    }
</style>

<div class="photographers-container">
    <div class="header-section">
        <h1>Photographers List</h1>
        <a href="{{ route('photographers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New
        </a>
    </div>

    @if(session('success'))
        <div class="alert-custom alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <table class="photographers-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Specialty</th>
                <th>Price/Hour</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($photographers as $photographer)
                <tr>
                    <td data-label="Image">
                        <img src="{{ asset('storage/' . $photographer->profile_image) }}" 
                             class="profile-image"
                             alt="{{ $photographer->name }}">
                    </td>
                    <td data-label="Name">{{ $photographer->name }}</td>
                    <td data-label="Specialty">{{ $photographer->specialty }}</td>
                    <td data-label="Price/Hour">{{ number_format($photographer->price_per_hour, 2) }} JD</td>
                    <td data-label="Status">
                        <span class="status-badge {{ $photographer->is_available ? 'available' : 'not-available' }}">
                            {{ $photographer->is_available ? 'Available' : 'Not Available' }}
                        </span>
                    </td>
                    <td data-label="Actions">
                        <div class="action-buttons">
                            <a href="{{ route('photographers.show', $photographer->id) }}" 
                               class="btn-custom btn-view">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('photographers.edit', $photographer->id) }}" 
                               class="btn-custom btn-edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('photographers.destroy', $photographer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn-custom btn-delete"
                                        onclick="return confirm('Are you sure you want to delete?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@yield('content')

@include('layouts.footar');


@endsection