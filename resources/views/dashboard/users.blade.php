@extends('layouts.layout')

@section('content')
<div class="user-management-container">
    <!-- Card Header -->
    <div class="management-header">
        <h2 class="management-title">
            <i class="fas fa-users-cog"></i> User Management
        </h2>
    </div>

    <!-- Users Table -->
    <div class="users-table-container">
        <table class="users-table" id="usersTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Registration Date</th>
                    <th>Contact Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="user-id">@USER{{ $user->id }}</td>
                    <td class="user-info-cell">
                        <div class="user-info">
                            <div class="user-avatar">
                                @if($user->profile_picture)
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="User Image">
                                @else
                                    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Image">
                                @endif
                            </div>
                            <div class="user-details">
                                <div class="user-name">{{ $user->firstname }} {{ $user->lastname }}</div>
                                <div class="user-email">{{ $user->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="registration-date">
                        <div class="date">{{ $user->created_at->format('Y-m-d') }}</div>
                        <div class="time">{{ $user->created_at->format('h:i A') }}</div>
                    </td>
                    <td class="contact-info">
                        <div class="phone">{{ $user->phone ?? 'N/A' }}</div>
                        <div class="user-status {{ $user->is_active ? 'active' : 'inactive' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </div>
                    </td>
                    <td class="actions-cell">
                        <div class="actions-buttons">
                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="edit-btn" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('dashboard.users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" title="Delete" onclick="return confirm('Are you sure you want to delete this user?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
 :root {
        --primary-black: #000000;
        --primary-pink: #E91E63;
        --primary-white: #FFFFFF;
        --light-gray: #f5f5f5;
        --dark-gray: #333333;
    }

    .user-management-container {
        padding: 20px;
        background-color: var(--light-gray);
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .management-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--primary-pink);
    }

    .management-title {
        color: var(--primary-black);
        font-size: 24px;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .management-title i {
        margin-left: 10px;
        color: var(--primary-pink);
    }

    .users-table-container {
        overflow-x: auto;
        /* تم إزالة الخلفية الزهرية هنا */
        padding: 0; /* تم تقليل البادنج */
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
        background-color: var(--primary-white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1); /* ظل خفيف بدلاً من الخلفية الملونة */}
    .users-table thead {
        background-color: var(--primary-pink);
        color: var(--primary-white);
    }

    .users-table th {
        padding: 15px;
        text-align: left;
        font-weight: 600;
    }

    .users-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
    }

    .users-table tbody tr:last-child td {
        border-bottom: none;
    }

    .users-table tbody tr:hover {
        background-color: rgba(255, 105, 180, 0.05);
    }

    .user-info-cell {
        min-width: 250px;
    }

    .user-info {
        display: flex;
        align-items: center;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 15px;
        border: 2px solid var(--primary-pink);
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-details {
        flex: 1;
    }

    .user-name {
        font-weight: 600;
        color: var(--primary-black);
        margin-bottom: 3px;
    }

    .user-email {
        font-size: 13px;
        color: #666;
    }

    .user-id {
        font-weight: 600;
        color: var(--primary-pink);
    }

    .registration-date {
        min-width: 120px;
    }

    .date {
        font-weight: 500;
        margin-bottom: 3px;
    }

    .time {
        font-size: 13px;
        color: #666;
    }

    .contact-info {
        min-width: 150px;
    }

    .phone {
        margin-bottom: 5px;
    }

    .user-status {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 15px;
        font-size: 12px;
        font-weight: 500;
    }

    .user-status.active {
        background-color: rgba(0, 200, 83, 0.1);
        color: #00C853;
    }

    .user-status.inactive {
        background-color: rgba(255, 0, 0, 0.1);
        color: #F44336;
    }

    .actions-cell {
        min-width: 100px;
    }

    .actions-buttons {
        display: flex;
        gap: 10px;
    }

    .edit-btn, .delete-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        border: none;
    }

    .edit-btn {
        background-color: rgba(255, 105, 180, 0.1);
        color: var(--primary-pink);
    }

    .edit-btn:hover {
        background-color: var(--primary-pink);
        color: var(--primary-white);
    }

    .delete-btn {
        background-color: rgba(244, 67, 54, 0.1);
        color: #F44336;
    }

    .delete-btn:hover {
        background-color: #F44336;
        color: var(--primary-white);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .management-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
        
        .users-table th, 
        .users-table td {
            padding: 10px;
            font-size: 14px;
        }
    }
</style>
@endsection