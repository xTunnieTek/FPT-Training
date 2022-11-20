@php
    $search = Request::get('search');
    $user = DB::table('users')->where('name', 'like', '%'.$search.'%')->get();
    $course = DB::table('courses')->where('coursename', 'like', '%'.$search.'%')->get();
    $topic = DB::table('topics')
    ->join('courses', 'topics.courseid', '=', 'courses.courseid')
    ->where('coursename', 'like', '%'.$search.'%')
    ->orWhere('title', 'like', '%'.$search.'%')->get();
@endphp


<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid" style="padding: 5px; background-color:#101d35; border-radius:5px; border:none;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal-body text-start">
                        <h5 style="color: #5d6e8b !important">Search</h5>
                           <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" id="search" placeholder="Search" autofocus>
                                </div>
                           </form>
                           {{-- Print result search --}}

                            @if($search)
                                <div class="row">
                                    <div class="col-md-12">
                                        @if($user->count() > 0)
                                        <hr><h4>Users</h4>
                                        <ul>
                                            @foreach ($user as $item)
                                            <li><a href="/manage-user/{{$item->id}}/edit" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{$item->email}}">{{$item->name}}</a><br></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @if($course->count() > 0)
                                        <hr><h4>Courses</h4>
                                        <ul>
                                            @foreach ($course as $item)
                                            <li><a href="/all-course/Category={{$item->categoryid}}">{{$item->coursename}}</a><br></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        @if($topic->count() > 0)
                                        <hr><h4>Topics</h4>
                                        <ul>
                                            @foreach ($topic as $item)
                                            <li><a href="/all-topic/{{$item->courseid}}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="{{$item->coursename}}">{{$item->title}}</a><br></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                                @else
                                    <hr>
                                    <p>No Result</p>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
            <a class="nav-link {{ (request()->is('learning')) ? 'active' : '' }}" href="{{ route('updateTraining') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Update Training</span>
            </a>
          </li>
         @else
         <li class="nav-item">
            <a class="nav-link {{ (request()->is('learning')) ? 'active' : '' }}" href="{{ route('learning') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Learning Space</span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ (request()->is('mycourse')) ? 'active' : '' }}" href="{{ route('mycourse')}}">
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
              <a class="nav-link {{ (request()->is('trainee/*')) ? 'active' : '' }}" href="/trainee/{{$trainee}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Training Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}" href="{{ route('profile') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Profile</span>
              </a>
            </li>
         @endif

        @elseif (Auth::user()->role == 'admin' || Auth::user()->role == 'trainer' || Auth::user()->role == 'staff')
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('dashboard') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('news')) ? 'active' : '' }}" href="{{route('news')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">News</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('manage-category')) ? 'active' : '' }}" href="{{ route('manageCategory')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-copy-04 text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Category</span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ (request()->is('manage-training')) ? 'active' : '' }}" href="{{ route('Managetraining')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-archive-2 text-primary text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Training</span>
              </a>
            </li>
          <li class="nav-item">
              <a class="nav-link {{ (request()->is('manage-trainee')) ? 'active' : '' }}" href="{{ route('manageTrainee') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-copy-04 text-white text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Trainee</span>
              </a>
            </li>
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manage Account</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}" href="{{ route('profile') }}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Profile</span>
            </a>
          </li>
          {{-- Check role nếu bằng 1 thì show không thì hidden --}}
            @if (Auth::user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('manage-staff')) ? 'active' : '' }}" href="{{ route('manageStaff')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-badge text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Manage Staff</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('manage-trainer')) ? 'active' : '' }}" href="{{ route('manageTrainer')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Manage Trainer</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('manage-user')) ? 'active' : '' }}" href="{{ route('manageUser')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Manage Users</span>
                </a>
              </li>
            @elseif (Auth::user()->role == 'staff')
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('manage-trainer')) ? 'active' : '' }}" href="{{ route('manageTrainer')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Manage Trainer</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('manage-user')) ? 'active' : '' }}" href="{{ route('manageUser')}}">
                  <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1">Manage Users</span>
                </a>
              </li>
            @endif
        @endif
        </ul>
      </div>
    <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none flex-end" id="sidenavCard">
          <div class="card-body text-center p-3 w-100 pt-0">
            {{-- Logout --}}
              <a class="btn btn-primary btn-sm mb-0 w-100" href="{{ route('logout') }}" type="button">Logout</a>
          </div>
        </div>
    </div>
  </aside>
  <!-- Chưa đóng Body -->
