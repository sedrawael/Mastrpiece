@extends('layouts.app')

@section('content')
<style>
    :root {
        --primary-color: #4a90e2;
        --secondary-color: #7ed321;
        --text-dark: #2d3436;
        --text-medium: #636e72;
        --bg-light: #f8f9fa;
        --border-color: #e0e0e0;
    }

    .photographer-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .photographer-header {
        text-align: center;
        margin-bottom: 2rem;
        border-bottom: 2px solid var(--primary-color);
        padding-bottom: 1rem;
    }

    .photographer-header h1 {
        font-size: 2.5rem;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .detail-item {
        padding: 1rem;
        background: var(--bg-light);
        border-radius: 8px;
        border-left: 4px solid var(--primary-color);
    }

    .detail-item strong {
        color: var(--text-medium);
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .detail-item p {
        color: var(--text-dark);
        font-size: 1.1rem;
        margin: 0;
    }

    .profile-image {
        text-align: center;
        margin: 2rem 0;
    }

    .profile-image img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid var(--primary-color);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .bio-section {
        background: var(--bg-light);
        padding: 1.5rem;
        border-radius: 8px;
        margin: 2rem 0;
    }

    .bio-section p {
        line-height: 1.8;
        color: var(--text-dark);
        margin: 0;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: var(--primary-color);
        color: white;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background: #357abd;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .photographer-container {
            margin: 1rem;
            padding: 1.5rem;
        }
        
        .photographer-header h1 {
            font-size: 2rem;
        }
        
        .profile-image img {
            width: 150px;
            height: 150px;
        }
    }
</style>

<div class="photographer-container">
    <div class="photographer-header">
        <h1>
            <i class="fas fa-camera"></i>
            {{ $photographer->name }}
        </h1>
    </div>

    <div class="profile-image">
        @if($photographer->profile_image)
            <img src="{{ asset('storage/'.$photographer->profile_image) }}" alt="{{ $photographer->name }}">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile">
        @endif
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <strong>Email</strong>
            <p>{{ $photographer->email }}</p>
        </div>

        <div class="detail-item">
            <strong>Phone</strong>
            <p>{{ $photographer->phone }}</p>
        </div>

        <div class="detail-item">
            <strong>Specialty</strong>
            <p>{{ $photographer->specialty }}</p>
        </div>

        <div class="detail-item">
            <strong>Price per Hour</strong>
            <p>{{ number_format($photographer->price_per_hour, 2) }} د.أ</p>
        </div>
    </div>

    <div class="bio-section">
        <h3>About Me</h3>
        <p>{{ $photographer->bio }}</p>
    </div>

    <a href="{{ route('photographers.index') }}" class="back-button">
        <i class="fas fa-arrow-left"></i>
        Back to List
    </a>
</div>
@endsection