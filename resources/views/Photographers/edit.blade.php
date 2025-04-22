@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2d3436;
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        border-bottom: 2px solid #4a90e2;
        padding-bottom: 0.5rem;
    }

    .form-label {
        font-weight: 600;
        color: #636e72;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background: #fff;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
        outline: none;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }

    .form-check-input {
        width: 1.2em;
        height: 1.2em;
        margin-top: 0.25em;
        border: 1px solid #e0e0e0;
    }

    .form-check-input:checked {
        background-color: #4a90e2;
        border-color: #4a90e2;
    }

    .form-check-label {
        margin-left: 0.5rem;
        color: #636e72;
    }

    .rounded {
        border-radius: 8px !important;
        border: 2px solid #e0e0e0;
        padding: 3px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .btn-primary {
        background: #4a90e2;
        border: none;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 1rem;
    }

    .btn-primary:hover {
        background: #357abd;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .container {
            margin: 20px;
            padding: 20px;
        }
        
        h1 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="container">
    <h1>Edit Photographer</h1>
    <form action="{{ route('photographers.update', $photographer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $photographer->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $photographer->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $photographer->phone }}" required>
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>
            <select class="form-control" id="specialty" name="specialty" required>
                <option value="Weddings" {{ $photographer->specialty == 'Weddings' ? 'selected' : '' }}>Weddings</option>
                <option value="Events" {{ $photographer->specialty == 'Events' ? 'selected' : '' }}>Events</option>
                <option value="Nature" {{ $photographer->specialty == 'Nature' ? 'selected' : '' }}>Nature</option>
                <option value="Products" {{ $photographer->specialty == 'Products' ? 'selected' : '' }}>Products</option>
                <option value="Other" {{ $photographer->specialty == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price_per_hour" class="form-label">Price Per Hour</label>
            <input type="number" step="0.01" class="form-control" id="price_per_hour" name="price_per_hour" value="{{ $photographer->price_per_hour }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1" {{ $photographer->is_available ? 'checked' : '' }}>
            <label class="form-check-label" for="is_available">Available</label>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $photographer->bio }}</textarea>
        </div>

        <div class="mb-3">
            <label for="profile_image" class="form-label">Profile Image</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
            @if($photographer->profile_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $photographer->profile_image) }}" width="80" height="80" class="rounded">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection