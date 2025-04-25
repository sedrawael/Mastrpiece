@extends('layouts.app')

        
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="../assets/img/favicon.png">
<title>
  Material Dashboard 3 by Creative Tim
</title>
<!--     Fonts and icons     -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
<!-- Nucleo Icons -->
<link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
<!-- CSS Files -->
<link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />

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
              <table class="table align-items-center mb-0 bookings-table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Event Type</th>
                    <th>Date</th>
                    <th>Phone</th>
                    <th>Time</th>
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
  
  @endsection
  
  
  
  <style>
    :root {
      --primary-color: #4a90e2;
      --secondary-color: #f8f9fa;
      --text-dark: #2d3436;
      --border-color: #e0e0e0;
      --success-color: #2ecc71;
      --danger-color: #e74c3c;
    }

    body {
      font-family: "Open Sans", sans-serif;
      line-height: 1.4;
      background-color: #f5f7fb;
      margin: 0;
      padding: 10px;
    }

    .card {
      position: relative;
      left: -20px;
      width: calc(100% + 20px);
      background: white;
      border-radius: 0 10px 10px 0;
      box-shadow: 8px 0 18px -8px rgba(74, 144, 226, 0.15),
                  0 2px 10px rgba(0, 0, 0, 0.06);
      padding: 1rem;
      margin: 1rem 0;
    }

    .bookings-table {
      width: 100%;
      border-collapse: collapse;
      margin-left: -40px;
    }

    .bookings-table th,
    .bookings-table td {
      text-align: left;
      padding: 0.6rem 1rem;
      border-bottom: 1px solid var(--border-color);
      position: relative;
      font-size: 0.85em;
    }

    .bookings-table th {
      background: var(--secondary-color);
      font-weight: 600;
      color: var(--text-dark);
    }

    .bookings-table td::before {
      content: "";
      position: absolute;
      left: 0.5rem;
      top: 50%;
      transform: translateY(-50%);
      width: 3px;
      height: 30%;
      background: var(--primary-color);
      opacity: 0.3;
      border-radius: 2px;
    }

    .form-container {
      position: fixed;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 260px;
      background: white;
      box-shadow: 4px 0 12px rgba(0,0,0,0.08);
      padding: 1rem;
      z-index: 1000;
      border-radius: 0 8px 8px 0;
    }

    .form-container input,
    .form-container select,
    .form-container button {
      padding: 0.4rem;
      font-size: 0.8em;
      margin-bottom: 0.6rem;
      width: 100%;
    }

    .form-container h2 {
      font-size: 1em;
      margin-bottom: 1rem;
    }

    .btn-action {
      padding: 0.4rem 0.8rem;
      border: none;
      border-radius: 6px;
      transition: transform 0.2s;
      cursor: pointer;
    }

    .btn-action:hover {
      transform: translateY(-1px);
    }

    .status-badge {
      display: inline-block;
      padding: 0.3rem 0.8rem;
      border-radius: 12px;
      font-size: 0.75em;
      font-weight: 600;
    }

    .status-confirmed {
      background: #e8f5e9;
      color: var(--success-color);
    }

    @media (max-width: 768px) {
      .card {
        left: -10px;
        width: calc(100% + 15px);
        padding: 0.8rem;
      }

      .bookings-table th,
      .bookings-table td {
        padding: 0.5rem 0.8rem;
      }

      .form-container {
        width: 220px;
        padding: 0.8rem;
      }

      .form-container h2 {
        font-size: 0.9em;
      }
    }
  </style>