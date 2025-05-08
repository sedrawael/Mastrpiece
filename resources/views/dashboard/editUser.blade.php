@extends('layouts.layout')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 text-white">
                        <i class="fas fa-user-edit me-2"></i>
                        Edit User Information
                    </h5>
                </div>
                
                
                <div class="card-body">
                    <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">First Name</label>
                            <input type="text" name="firstname" 
                                   class="form-control form-control-lg border-2 py-3"
                                   value="{{ $user->firstname }}" required>
                            <div class="form-text">Name as it will appear in the system</div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Last Name</label>
                            <input type="text" name="lastname" 
                                   class="form-control form-control-lg border-2 py-3"
                                   value="{{ $user->lastname }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted">Email</label>
                            <input type="email" name="email" 
                                   class="form-control form-control-lg border-2 py-3"
                                   value="{{ $user->email }}" required>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <button type="submit" class="btn btn-success px-4 py-2">
                                <i class="fas fa-save me-2"></i>
                                Save Changes
                            </button>
                            
                            <a href="{{ route('dashboard.users') }}" class="btn btn-outline-secondary px-4 py-2">
                                <i class="fas fa-times me-2"></i>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    :root {
        --primary-color: #4e73df;
        --primary-light: #e8f0fe;
        --secondary-color: #858796;
        --success-color: #1cc88a;
    }
  
    body {
        background-color: #f8f9fc;
    }
    
    .card {
        border: none;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    
    .form-control {
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .btn-success {
        background-color: var(--success-color);
        border-color: var(--success-color);
    }
    
    .btn-outline-secondary {
        border-color: var(--secondary-color);
        color: var(--secondary-color);
    }
    
    .btn {
        font-weight: 600;
        transition: all 0.2s;
    }
    
    .btn:hover {
        transform: translateY(-1px);
    }
    
    .form-label {
        font-size: 0.9rem;
    }
    
    .form-text {
        font-size: 0.8rem;
    }
</style>
@endsection
