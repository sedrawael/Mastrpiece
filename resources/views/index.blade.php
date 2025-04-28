@extends('layouts.app')

@include('layouts.haed')
@include('layouts.navpar');

@include('layouts.sidebar');

@section('content')


<div class="container-fluid py-4">
  <div class="row">
      <div class="col-12">
          <div class="card mb-4">
              <div class="card-header pb-0">
                  <h6>Bookings List</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Event Type</th>
                                  <th>Date</th>
                                  <th>Phone</th>
                                  <th>Time</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($bookings as $booking)
                              <tr>
                                  <td>{{ $booking->name }}</td>
                                  <td>{{ $booking->email }}</td>
                                  <td>{{ $booking->event_type }}</td>
                                  <td>{{ $booking->date }}</td>
                                  <td>{{ $booking->phone }}</td>
                                  <td>{{ $booking->time }}</td>
                                  <td>
                                      <form class="delete-form" action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>
                                          </button>
                                      </form>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>

                      @if($bookings->isEmpty())
                      <div class="text-center p-4">
                          <strong>No bookings found.</strong>
                      </div>
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // معالجة جميع نماذج الحذف
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // منع الإرسال المباشر
            
            Swal.fire({
                title: 'تأكيد الحذف',
                text: "هل أنت متأكد من رغبتك في الحذف؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، احذف!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit(); // إرسال النموذج إذا تم التأكيد
                }
            });
        });
    });
});
</script>
@endsection
@section('styles')
<style>
.sidebar {
  width: 240px;
  position: fixed;
  left: 0;
  top: 64px;
  bottom: 0;
  z-index: 100;
}

.card {
  margin-left: 280px;
  width: calc(100% - 280px);
  transition: all 0.3s;
}

@media (max-width: 768px) {
  .sidebar {
      width: 100%;
      position: relative;
      top: 0;
  }
  
  .card {
      margin-left: 20px;
      width: calc(100% - 40px);
  }
}
</style>
@endsection<style>
  :root{
      --sidebar-w:240px;
      --nav-h:64px;
      --primary:#4a90e2;
      --secondary:#f8f9fa;
      --text-dark:#2d3436;
      --border:#e0e0e0;
  }
  
  /* تنسيقات أساسية */
  body{
      font-family:"Open Sans",sans-serif;
      background:#f5f7fb;
      margin:0;
      padding:20px;
  }
  
  /* تثبيت السايدبار */
  .sidebar{
      width:var(--sidebar-w)!important;
      position:fixed!important;
      left:0!important;
      top:var(--nav-h)!important;
      bottom:0!important;
      z-index:100;
      box-shadow:2px 0 8px rgba(0,0,0,.1);
  }
  
  /* البطاقة الرئيسية */
  .card{
      background:#fff;
      border-radius:10px;
      box-shadow:0 4px 6px rgba(0,0,0,.1);
      margin:1rem 0;
      width:calc(100% - var(--sidebar-w) - 30px)!important;
      margin-left:calc(var(--sidebar-w) + 20px)!important;
      transform:scale(.95);
  }
  
  /* جدول الحجوزات */
  .bookings-table{
      width:100%;
      border-collapse:collapse;
      font-size:.85em;
  }
  
  .bookings-table th,.bookings-table td{
      padding:.6rem;
      text-align:left;
      border-bottom:1px solid var(--border);
  }
  
  .bookings-table th{
      background:var(--primary);
      color:#fff;
      font-weight:600;
      text-transform:uppercase;
  }
  
  /* أزرار الحذف */
  .btn-danger{
      padding:.3rem .6rem;
      border-radius:8px;
      transition:all .3s ease;
  }
  
  .btn-danger:hover{
      transform:scale(1.1);
      box-shadow:0 2px 6px rgba(255,0,0,.2);
  }
  
  /* استجابة للجوال */
  @media (max-width:768px){
      .sidebar{
          width:100%!important;
          position:relative!important;
          height:auto!important;
      }
      .card{
          width:95%!important;
          margin:15px auto!important;
          transform:none!important;
      }
      .bookings-table{
          font-size:.8em;
      }
  }
  </style>