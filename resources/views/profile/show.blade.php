@extends('layouts.app')

@section('title', 'الملف الشخصي')

@section('content')
<style>
    .profile-container {
    font-family: 'Playfair Display', serif;
    background-image: url('../images/slider-bg2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; 
    min-height: 100vh;
    width: 100%;
    position: relative;
    text-align: right;
}

    .profile-container::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .profile-card {
        max-width: 800px;
        width: 100%;
        padding: 40px;
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 2;
        margin: 50px auto;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header h2 {
        font-family: 'Oswald', sans-serif;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #f3c024;
        margin: 0 auto 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
    }

    .profile-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #555;
    }

    .info-value {
        padding: 12px;
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 8px;
        border: 1px solid #ddd;
        font-size: 1.1rem;
    }

    .profile-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-edit,
    .btn-change-password {
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-family: 'Oswald', sans-serif;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-edit {
        background-color: #f3c024;
        color: #333;
        border: none;
    }

    .btn-edit:hover {
        background-color: #e89f10;
        transform: scale(1.05);
    }

    .btn-change-password {
        background-color: #333;
        color: #fff;
        border: none;
    }

    .btn-change-password:hover {
        background-color: #222;
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .profile-info {
            grid-template-columns: 1fr;
        }

        .profile-actions {
            flex-direction: column;
            align-items: center;
        }

        .btn-edit,
        .btn-change-password {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img src="{{ Auth::user()->profile_picture ? Storage::url(Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                 alt="صورة الملف الشخصي" 
                 class="profile-avatar">
            <h2>{{ Auth::user()->name }}</h2>
            <p>عضو منذ {{ Auth::user()->created_at->diffForHumans() }}</p>
        </div>

        <div class="profile-info">
            <div class="info-group">
                <label>البريد الإلكتروني</label>
                <div class="info-value">{{ Auth::user()->email }}</div>
            </div>
            <div class="info-group">
                <label>رقم الهاتف</label>
                <div class="info-value">{{ Auth::user()->phone ?? 'غير محدد' }}</div>
            </div>
            <div class="info-group">
                <label>تاريخ التسجيل</label>
                <div class="info-value">{{ Auth::user()->created_at->format('Y/m/d') }}</div>
            </div>
            <div class="info-group">
                <label>آخر تحديث</label>
                <div class="info-value">{{ Auth::user()->updated_at->diffForHumans() }}</div>
            </div>
        </div>

        <div class="profile-actions">
            <a href="{{ route('profile.edit') }}" class="btn-edit">
                <i class="fas fa-edit"></i> تعديل الملف الشخصي
            </a>
            {{-- 
            <a href="{{ route('password.change') }}" class="btn-change-password">
                <i class="fas fa-lock"></i> تغيير كلمة المرور
            </a> 
            --}}
        </div>
    </div>
</div>
@endsection
