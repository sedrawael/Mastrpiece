@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Playfair Display', serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-image: url('../images/slider-bg2.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        color: #333;
        position: relative;
        min-height: 100vh;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        position: relative;
        z-index: 2;
    }

    .password-change-container {
        max-width: 500px;
        width: 100%;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 3;
    }

    .password-change-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .password-change-header h2 {
        font-family: 'Oswald', sans-serif;
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .password-change-header i {
        color: #f3c024;
        margin-right: 10px;
        font-size: 1.8rem;
    }

    .password-change-form .form-group {
        margin-bottom: 25px;
        text-align: left;
    }

    .password-change-form label {
        font-weight: bold;
        color: #555;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
    }

    .password-change-form label i {
        margin-right: 8px;
        color: #666;
        font-size: 1rem;
    }

    .password-change-form input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.9);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .password-change-form input:focus {
        border-color: #f3c024;
        box-shadow: 0 0 0 3px rgba(243, 192, 36, 0.2);
        outline: none;
    }

    .btn-submit {
        background-color: #f3c024;
        color: #333;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-family: 'Oswald', sans-serif;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        margin-top: 10px;
    }

    .btn-submit:hover {
        background-color: #e0a800;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-submit i {
        margin-right: 8px;
    }

    .alert-password {
        padding: 15px;
        margin-bottom: 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
    }

    .alert-danger {
        background-color: rgba(220, 53, 69, 0.9);
        color: white;
        border-left: 5px solid #dc3545;
    }

    .alert-success {
        background-color: rgba(40, 167, 69, 0.9);
        color: white;
        border-left: 5px solid #28a745;
    }

    .alert-password i {
        margin-right: 10px;
        font-size: 1.2rem;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 5px;
        display: flex;
        align-items: center;
    }

    .invalid-feedback i {
        margin-right: 5px;
    }

    @media (max-width: 576px) {
        .password-change-container {
            padding: 30px;
            margin: 20px;
        }
        
        .password-change-header h2 {
            font-size: 1.8rem;
        }
    }
</style>

<div class="container">
    <div class="password-change-container">
        <div class="password-change-header">
            <h2><i class="fas fa-key"></i>Change Password</h2>
        </div>

        @if (session('error'))
            <div class="alert alert-danger alert-password">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-password">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="password-change-form">
            @csrf

            <div class="form-group">
                <label for="current_password">
                    <i class="fas fa-lock"></i>Current Password
                </label>
                <input type="password" class="@error('current_password') is-invalid @enderror" 
                       id="current_password" name="current_password" required
                       placeholder="Enter your current password">
                @error('current_password')
                    <span class="invalid-feedback">
                        <i class="fas fa-exclamation-triangle"></i>{{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">
                    <i class="fas fa-key"></i>New Password
                </label>
                <input type="password" class="@error('new_password') is-invalid @enderror" 
                       id="new_password" name="new_password" required
                       placeholder="At least 8 characters">
                @error('new_password')
                    <span class="invalid-feedback">
                        <i class="fas fa-exclamation-triangle"></i>{{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">
                    <i class="fas fa-check-circle"></i>Confirm Password
                </label>
                <input type="password" id="new_password_confirmation" 
                       name="new_password_confirmation" required
                       placeholder="Re-type your new password">
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Update Password
            </button>
        </form>
    </div>
</div>
@endsection