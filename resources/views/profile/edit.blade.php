@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')
<style>
    body {
        font-family: 'Playfair Display', serif;
        background-image: url('../images/slider-bg2.jpg');
        background-size: cover;
        background-position: center;
        color: #333;
        text-align: right;
        position: relative;
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
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        position: relative;
        z-index: 2;
    }

    .card {
        max-width: 650px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        z-index: 3;
    }

    .card-header h4 {
        font-family: 'Oswald', sans-serif;
        font-size: 1.8rem;
        margin-bottom: 25px;
        color: #333;
        text-align: center;
    }

    .form-label {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.9);
        font-family: 'Playfair Display', serif;
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #f3c024;
        box-shadow: 0 0 8px rgba(243, 192, 36, 0.5);
        outline: none;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-primary {
        background-color: #f3c024;
        color: #333;
        border: none;
    }

    .btn-primary:hover {
        background-color: #e89f10;
        transform: scale(1.05);
    }

    .avatar-upload {
        position: relative;
        width: 150px;
        height: 150px;
        margin: 0 auto 20px;
    }

    #avatarPreview {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 3px solid #fff;
        border-radius: 50%;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        transition: 0.3s;
    }

    .avatar-edit-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        background: #f3c024;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.3s;
    }

    .avatar-edit-btn:hover {
        background: #e89f10;
    }

    .alert {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 10px;
        padding: 1rem 1.5rem;
    }

    .text-danger {
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .btn {
            width: 100%;
            margin-bottom: 10px;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-user-edit"></i> تعديل الملف الشخصي</h4>
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
                    <img src="{{ Auth::user()->profile_picture ? Storage::url(Auth::user()->profile_picture) : asset('images/default-avatar.png') }}"
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
                <small class="text-muted d-block text-center mb-3">الصيغ المسموحة: JPEG, PNG (الحجم الأقصى 2MB)</small>

                <div class="mb-3">
                    <label for="name" class="form-label">الاسم الكامل</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', Auth::user()->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="{{ old('phone', Auth::user()->phone) }}">
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> حفظ التغييرات
                    </button>

                    <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times me-2"></i> إلغاء
                    </a>

                    @if(Auth::user()->profile_picture)
                        <button type="button" class="btn btn-outline-danger" onclick="confirmDelete()">
                            <i class="fas fa-trash-alt me-2"></i> حذف الصورة
                        </button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<form id="deleteForm" action="{{ route('profile.picture.delete') }}" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script>
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        if (e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('avatarPreview').src = event.target.result;
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    function confirmDelete() {
        if (confirm('هل أنت متأكد من رغبتك في حذف الصورة الشخصية؟')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection
