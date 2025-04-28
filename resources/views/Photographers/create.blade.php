@extends('layouts.app')
@include('layouts.haed')

@section('content')
<style>
    .dashboard-input {
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    .dashboard-input:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
    }

    .dashboard-select {
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1em;
    }

    .image-upload-group {
        border: 2px dashed #e0e0e0;
        border-radius: 8px;
        padding: 1.5rem;
        text-align: center;
        margin-top: 1rem;
    }

    .upload-label {
        cursor: pointer;
        color: #4a90e2;
        display: block;
        margin-bottom: 1rem;
    }

    .btn-dashboard-primary {
        background: #4a90e2;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-dashboard-primary:hover {
        background: #357abd;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
        margin-bottom: 0.5rem;
        display: block;
    }

    h1 {
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
        color: #333;
        font-weight: bold;
    }

    .container {
        max-width: 700px;
        margin: 0 auto;
        padding: 2rem 1rem;
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="container">
    <h1>Add New Photographer</h1>

    <form action="{{ route('photographers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control dashboard-input" id="name" name="name" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control dashboard-input" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control dashboard-input" id="phone" name="phone" required>
        </div>
        
        <div class="mb-3">
            <label for="specialty" class="form-label">Specialty</label>
            <select class="form-control dashboard-input dashboard-select" id="specialty" name="specialty" required>
                <option value="Weddings">Weddings</option>
                <option value="Events">Events</option>
                <option value="Nature">Nature</option>
                <option value="Products">Products</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="price_per_hour" class="form-label">Price per Hour ($)</label>
            <input type="number" step="0.01" class="form-control dashboard-input" id="price_per_hour" name="price_per_hour" required>
        </div>
        
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1" checked>
            <label class="form-check-label" for="is_available">Available</label>
        </div>
        
        <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control dashboard-input" id="bio" name="bio" rows="3"></textarea>
        </div>
        
        <div class="mb-3 image-upload-group">
            <label for="profile_image" class="upload-label">Upload Profile Image</label>
            <input type="file" class="form-control" id="profile_image" name="profile_image">
        </div>
        
        <button type="submit" class="btn-dashboard-primary">Add Photographer</button>
    </form>
</div>
@endsection
