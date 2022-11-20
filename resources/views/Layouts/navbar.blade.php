<main class="main-content position-relative border-radius-lg z-index-2">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">
                @php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $today = date("Y-m-d");
                    $time = date("H:i:s");
                @endphp
                <span class="text-white font-weight-bold">{{ date('l, d F Y', strtotime($today)) }}</span>
                <span class="text-white font-weight-bold"></span>
            </li>
          </ol>
            {{-- Check time --}}
            @if ($time >= "00:00:00" && $time < "12:00:00")
                <h6 class="font-weight-bolder text-white mb-0">Good Morning,  {{ Auth::user()->name }}</h6>
            @elseif ($time >= "12:00:00" && $time < "18:00:00")
                <h6 class="font-weight-bolder text-white mb-0">Good Afternoon,  {{ Auth::user()->name }}</h6>
            @elseif ($time >= "18:00:00" && $time < "24:00:00")
                <h6 class="font-weight-bolder text-white mb-0">Good Evening,  {{ Auth::user()->name }}</h6>
            @endif
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <button class="form-control" data-bs-toggle="modal" data-bs-target="#search" style="width:15rem !important"> Search </button>
                    {{-- <input type="text" class="form-control"  placeholder="Type here..." name="search" > --}}
                </div>
            </div>
          </div>
        </div>
        <a class="nav-link " href="{{ route('profile') }}">
            @if(!empty($user->avatar_original))
                <img src="{{ $user->avatar_original }}" class="img-avatar" >
            @elseif(empty($user->avatar_original))
                <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="img-avatar" >
            @endif
        </a>
      </div>
    </nav>
