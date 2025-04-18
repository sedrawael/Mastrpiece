@extends('layouts.app')


<link href="{{ asset('css/edet.css') }}" rel="stylesheet">
@section('title', 'Edit Profile')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-user-edit"></i> Edit Profile</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="avatar-upload">
                    <img src="{{ Auth::user()->profile_picture ? Storage::url('public/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}"
                         id="avatarPreview"
                         class="rounded-circle">
                    <label for="avatarInput" class="avatar-edit-btn">
                        <i class="fas fa-camera"></i>
                        <input type="file" id="avatarInput" name="profile_picture" accept="image/*" class="d-none">
                    </label>
                </div>
                @error('profile_picture')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
                <small class="text-muted d-block text-center mb-3">Allowed formats: JPEG, PNG (Max size 2MB)</small>

                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname"
                           value="{{ old('firstname', Auth::user()->firstname) }}" required>
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname"
                           value="{{ old('lastname', Auth::user()->lastname) }}" required>
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="{{ old('phone', Auth::user()->phone) }}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>

                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i> Cancel
                    </a>

                    @if(Auth::user()->profile_picture)
                        <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash-alt me-2"></i> Delete Picture
                        </button>
                    @endif
                </div>
                <div>
                    
                      <a href="{{ route('password.change') }}" class="btn btn-outline-secondary">
                       <i class="fas fa-lock"></i> Change Password
                       </a>
                    
                         </div>
            </form>
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('profile.picture.delete') }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>