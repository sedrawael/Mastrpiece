{{-- resources/views/messages/show.blade.php --}}
@extends('layouts.layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <!-- Card Header -->
                <div class="card-header bg-gradient-primary shadow-dark">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="text-white mb-0"><i class="fas fa-envelope-open-text me-3"></i>Message Details</h3>
                        <a href="{{ route('messages.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Sender Info -->
                        <div class="col-md-4 border-end">
                            <div class="sender-info">
                                <div class="avatar bg-gradient-info shadow-lg">
                                    <span class="text-white">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                </div>
                                <h4 class="mt-3">{{ $message->name }}</h4>
                                <p class="text-muted">{{ $message->email }}</p>
                                <hr>
                                <div class="meta-info">
                                    <p class="mb-1">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        {{ $message->created_at->format('M d, Y') }}
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-clock me-2"></i>
                                        {{ $message->created_at->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Message Content -->
                        <div class="col-md-8">
                            <div class="message-content">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="text-primary">
                                        <i class="fas fa-tag me-2"></i>
                                        {{ $message->subject ?? 'No Subject' }}
                                    </h5>
                                    <span class="badge bg-gradient-success">
                                        {{ $message->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                
                                <div class="message-body bg-light p-4 rounded">
                                    {!! nl2br(e($message->message)) !!}
                                </div>

                                <!-- Actions -->
                                <div class="mt-4 d-flex justify-content-end">
                                    <form class="delete-form" action="{{ route('messages.destroy', $message->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash me-2"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    border-radius: 1rem;
    overflow: hidden;
}

.bg-gradient-primary {
    background: linear-gradient(310deg, #1171ef 0%, #11cdef 100%);
}

.avatar {
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 1.5rem;
}

.message-body {
    min-height: 200px;
    border: 1px solid #e9ecef;
}

.badge.bg-gradient-success {
    background: linear-gradient(310deg, #2dce89 0%, #2dcecc 100%);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
}

.sender-info {
    text-align: center;
    padding-right: 2rem;
}

.meta-info {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 0.5rem;
}

.btn-light {
    border: 1px solid #dee2e6;
    transition: all 0.3s ease;
}

.btn-light:hover {
    background: #fff;
    transform: translateY(-1px);
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delete Confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete Message?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) this.submit();
            });
        });
    });
});
</script>
@endpush