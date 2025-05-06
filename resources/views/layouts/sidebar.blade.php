<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="http://127.0.0.1:8000/content">
        <img src="{{ asset('images/9dfe2123-53e7-4310-a838-eb94ba255eb7-removebg-preview.png') }}" alt="Snap Aqaba Logo">
        <span class="ms-1 text-sm text-dark">Snap Aqaba</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/profile.html">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> --}}

        <li class="nav-item">
          <a class="nav-link active bg-gradient-dark text-white" href="http://127.0.0.1:8000/content">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('photographers.index') }}">
              <i class="material-symbols-rounded opacity-5">photo_camera</i>
              <span class="nav-link-text ms-1">Photographers</span>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('bookings.index') }}">
            <i class="material-symbols-rounded opacity-5">event_available</i>
            <span class="nav-link-text ms-1">Bookings</span>
        </a>
    </li>

        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('messages.index') }}">
              <i class="material-symbols-rounded opacity-5">message</i> 
              <span class="nav-link-text ms-1">Messages</span>
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="{{ route('admin.profile') }}">
          <i class="material-symbols-rounded opacity-5">admin_panel_settings</i>
          <span class="nav-link-text ms-1">Admin Profile</span>
        </a>
      </li>
      
      </ul>
    </div>
  </aside>
