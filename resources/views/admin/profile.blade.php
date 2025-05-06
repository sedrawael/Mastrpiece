@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <h3 class="mb-0 text-white">Admin Profile</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <!-- Profile Image Section -->
                        <div class="col-md-4 text-center">
                            <div class="profile-image-container mb-4">
                                <img src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('uploads/default.png') }}" 
                                     class="img-thumbnail rounded-circle profile-img" 
                                     alt="Profile Image"
                                     width="200"
                                     height="200">
                                <div class="mt-3">
                                    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-block">
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Details Section -->
                        <div class="col-md-8">
                            <div class="profile-details">
                                <h4 class="text-primary mb-4">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
                                
                                <div class="detail-item row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Email:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>

                                <div class="detail-item row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Phone:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ Auth::user()->phone ?? 'Not provided' }}
                                    </div>
                                </div>

                                <div class="detail-item row mb-3">
                                    <div class="col-sm-4">    
                                        <strong>Joined At:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ Auth::user()->created_at->format('F j, Y') }}
                                    </div>
                                </div>

                                <div class="detail-item row mb-3">
                                    <div class="col-sm-4">
                                        <strong>Member Since:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ Auth::user()->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <div class="text-right">
                        <small class="text-muted">Last updated: {{ Auth::user()->updated_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .profile-img {
        border: 3px solid #dee2e6;
        transition: all 0.3s ease;
    }
    .profile-img:hover {
        transform: scale(1.05);
        border-color: #4e73df;
    }
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    .detail-item {
        padding: 0.5rem;
        border-radius: 5px;
    }
    .detail-item:nth-child(odd) {
        background-color: #f8f9fa;
    }
    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }
</style>
@endsection