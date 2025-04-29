@extends('layouts.app')

@include('layouts.haed')
@include('layouts.navpar');

@include('layouts.sidebar');

@section('content')


<div class="container-fluid py-3">
    <div class="row">
      <div class="col-10" style="margin-left:auto " ; >
        <div class="card shadow-lg mb-2">
          <div class="card-header bg-gradient-primary shadow-dark border-radius-lg">
            <h4 class="text-white mb-0"><i class="fas fa-calendar-check me-3"></i>Booking Management</h4>
          </div>
  
          <div class="card-body px-2pt-4 pb-2">
            <div class="table-responsive">
              <table class="table compact-table align-items-center mb-0">
                <thead class="thead-light">
                  <tr>
                    <th class="text-nowrap">Client</th>
                    <th class="text-nowrap">Event</th>
                    <th class="text-nowrap">Date/Time</th>
                    <th class="text-nowrap">Contact</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
  
                <tbody>
                  @foreach ($bookings as $booking)
                  <tr class="border-bottom">
                    <td class="ps-3">
                      <div class="d-flex align-items-center">
                        <div class="avatar avatar-sm me-2 bg-gradient-info">
                          <span class="text-white">{{ strtoupper(substr($booking->name, 0, 1)) }}</span>
                        </div>
                        <div>
                          <h6 class="mb-0 text-sm">{{ $booking->name }}</h6>
                          <small class="text-muted">{{ $booking->email }}</small>
                        </div>
                      </div>
                    </td>
                    
                    <td>
                      <span class="badge bg-gradient-success">{{ $booking->event_type }}</span>
                    </td>
  
                    <td class="text-nowrap">
                      <div class="d-flex flex-column">
                        <span class="text-sm">{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</span>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}</small>
                      </div>
                    </td>
  
                    <td>
                      <span class="text-sm">{{ $booking->phone }}</span>
                    </td>
  
                    <td class="text-center">
                      <form class="delete-form d-inline-block" action="{{ route('bookings.destroy', $booking->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs shadow-sm">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
  
              @if($bookings->isEmpty())
              <div class="empty-state text-center py-5">
                <div class="empty-state-icon mb-3">
                  <i class="fas fa-calendar-times fa-3x text-gray-300"></i>
                </div>
                <h5 class="text-muted">No bookings found</h5>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <style>
  .compact-table {
  font-size: 0.875rem;
  min-width: 800px;
}
  
  .compact-table th {
    padding: 0.75rem 1rem;
    background: #f8fafc;
  }
  
  .compact-table td {
    padding: 0.75rem 1rem;
    vertical-align: middle;
  }
  
  .avatar {
    width: 28px;
    height: 28px;
    font-size: 0.75rem;
  }
  
  .btn-xs {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
  }
  
  .text-nowrap {
    white-space: nowrap;
  }
  
  @media (max-width: 768px) {
    .table-responsive {
      border: 1px solid #dee2e6;
      border-radius: 0.5rem;
      overflow-x: auto;
    }
    
    .compact-table {
      min-width: auto;
      width: 100%;
    }
    
    .compact-table th,
    .compact-table td {
      min-width: 120px;
      
    }
    .main-content {
    padding: 30px;
    max-width: 1200px; /* لمنع التمدد الزائد */
    margin-right: auto;
}

.content-form {
    width: 400px;
    max-width: 800px; /* تحديد عرض الفورم */
}
  }
  </style>