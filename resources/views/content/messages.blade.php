@extends("layouts.layout")

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                {{-- عنوان الصفحة --}}
                <div class="card-header bg-primary text-white" >
                    <h3 class="mb-0"><i class="fas fa-inbox me-2"></i>Inbox Messages</h3>
                </div>

                {{-- محتوى الرسائل --}}
                <div class="card-body p-0">
                    @if($messages->count())
                    <div class="table-responsive">
                        <table class="table table-hover align-items-center mb-0">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">Sender</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">message</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">the date</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">procedures</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $msg)
                                <tr class="border-bottom">
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-sm me-3 bg-gradient-info">
                                                <span class="text-white">{{ strtoupper(substr($msg->name, 0, 1)) }}</span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 text-sm">{{ $msg->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $msg->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm mb-0">{{ Str::limit($msg->message, 50) }}</p>
                                    </td>
                                    <td>
                                        <span class="text-sm">{{ $msg->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('messages.show', $msg->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('messages.destroy', $msg->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="empty-state text-center py-5">
                        <div class="empty-state-icon">
                            <i class="fas fa-envelope-open-text fa-3x text-gray-300"></i>
                        </div>
                        <h3 class="mt-3">No messages</h3>
                    </div>
                    @endif
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

{{-- الأكواد البرمجية يجب أن تكون خارج @section('content') --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'نجاح!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'موافق'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'خطأ!',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33',
            confirmButtonText: 'موافق'
        });
    @endif
});
</script>
@endpush
@push('styles')
<style>
.card {
    border-radius: 15px;
    overflow: hidden;
}

.avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.bg-gradient-info {
    background: linear-gradient(310deg, #1171ef 0%, #11cdef 100%);
}

.table-hover tbody tr:hover {
    background-color: #f8f9fa;
    cursor: pointer;
}

.empty-state {
    opacity: 0.7;
}

.text-gray-600 {
    color: #6c757d !important;
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}
</style>
@endpush