<body class="g-sidenav-show dark-version bg-gray-600">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 ps" id="sidenav-main" data-color="warning">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://www.facebook.com/FSTunnie" target="_blank">
        <img src="/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Training Management</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
      @if ( Auth::user()->role == 'trainee')
        @php
          $user = Auth::user()->google_id;
          $trainee = DB::table('trainingid')->where('google_id', $user)->first();
        @endphp
       @if ($trainee == null)
       <li class="nav-item">
          <a class="nav-link active" href="{{ route('updateTraining') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Update Training</span>
          </a>
        </li>
       @else
       <li class="nav-item">
          <a class="nav-link" href="{{ route('learning') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Learning Space</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('mycourse')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-collection text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">My Course</span>
            </a>
          </li>
          @php
            // Get id trainee
            $trainee = Auth::user()->google_id;
          @endphp
          <li class="nav-item">
            <a class="nav-link" href="/trainee/{{$trainee}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Training Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('profile') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Profile</span>
            </a>
          </li>
       @endif

      @elseif (Auth::user()->role == 'admin' || Auth::user()->role == 'trainer' || Auth::user()->role == 'staff')
      <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./pages/tables.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Schedules</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('manageCategory')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Category</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-archive-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Document</span>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link " href="">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-copy-04 text-white text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Class</span>
            </a>
          </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manage Account</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('profile') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        {{-- Check role nếu bằng 1 thì show không thì hidden --}}
          @if (Auth::user()->role == 'admin')
          <li class="nav-item">
              <a class="nav-link " href="{{ route('manageStaff')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Staff</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('manageTrainer')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Trainer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ route('manageUser')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Users</span>
              </a>
            </li>
          @elseif (Auth::user()->role == 'staff')
            <li class="nav-item">
              <a class="nav-link " href="{{ route('manageTrainer')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Manage Trainer</span>
              </a>
            </li>
          @endif

      @endif
      </ul>
    </div>
  <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <div class="card-body text-center p-3 w-100 pt-0">
          {{-- Logout --}}
            <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('logout') }}" type="button">Logout</a>
        </div>
      </div>
  </div>
</aside>
