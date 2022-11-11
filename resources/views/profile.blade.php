@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')


<div class="card shadow-lg mx-4 card-profile-top">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            @if(empty($user->avatar_original))
            <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="w-100 border-radius-lg shadow-sm" >
        @elseif(!empty($user->avatar_original))
            <img src="{{ $user->avatar_original }}" class="w-100 border-radius-lg shadow-sm" >
        @endif
          </div>
        </div>
        <div class="col-auto my-auto">
          <div class="h-100">
            <h5 class="mb-1">
                {{ Auth::user()->name }}
                <p style="text-transform:uppercase ">
                    {{ Auth::user()->role}}
                </p>
            </h5>
            <p class="mb-0 font-weight-bold text-sm">
                {{ Auth::user()->email }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <form method="post" action="{{ route('updateProfile')}}" enctype="multipart/form-data" >
                @csrf
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Edit Profile</p>
                  {{-- <a href="{{ route('updateProfile')}}" class="btn btn-primary btn-sm ms-auto">Update</a> --}}
                  <button class="btn btn-primary btn-sm ms-auto">Update</button>
                </div>
              </div>
              <div class="card-body">
                <p class="text-uppercase text-sm">User Information</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Username</label>
                      <input class="form-control" type="password" value="{{ Auth::user()->id }}@2001{{ Auth::user()->google_id }}@2001{{ Auth::user()->id }}"  disabled>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email address</label>
                      <input class="form-control" type="email" value="{{ Auth::user()->email}}" disabled id="email" name="email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Full name</label>
                      <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="name" id="name" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Birthday | MM/d/y</label>
                      <input class="form-control" type="date" name="birthday" id="birthday" value="{{ Auth::user()->birthday }}">
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Contact Information</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Address</label>
                      <input class="form-control" type="text" value="{{ Auth::user()->address }}" id="address" name="address">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Phone Number</label>
                        <input class="form-control" type="text" value="{{ Auth::user()->phone }}" id="phone" name="phone">
                    </div>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">City/Campus</label>
                      <select name="city" id="city" class="form-control" placeholder="Please choose campus">
                        <option value="{{ Auth::user()->city }}" selected>{{ Auth::user()->city }}</option>
                        <option value="FPT Hanoi">FPT Hanoi</option>
                        <option value="FPT Danang">FPT Danang</option>
                        <option value="FPT Quynhon">FPT Quynhon</option>
                        <option value="FPT Hochiminh">FPT Hochiminh</option>
                        <option value="FPT Cantho">FPT Cantho</option>
                        <option value="FPT Ville">FPT Ville</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Department/Specialized</label>
                        <select name="specialized" id="specialized" class="form-control" placeholder="{{ Auth::user()->specialized}}">
                            {{-- Đã chọn --}}
                            <option value="{{ Auth::user()->specialized}}" selected>{{ Auth::user()->specialized}}</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Business">Business</option>
                            <option value="Graphic Design">Graphic Design</option>
                            <option value="Training">Training Department</option>
                            <option value="Administrators">Administrators</option>
                          </select>
                    </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">About me</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">About me</label>
                      <input class="form-control" type="text" value="{{ Auth::user()->about }}" id="about" name="about">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
      <div class="col-md-4">
        <div class="card card-profile">
          @if (Auth::user()->city == 'FPT Hanoi')
            <img src="./assets/img/bg-profile-hn.jpg" alt="Image placeholder" class="card-img-top">
            @elseif (Auth::user()->city == 'FPT Danang')
            <img src="./assets/img/bg-profile-dn.jpg" alt="Image placeholder" class="card-img-top">
            @elseif (Auth::user()->city == 'FPT Quynhon')
            <img src="./assets/img/bg-profile-qn.jpg" alt="Image placeholder" class="card-img-top">
            @elseif (Auth::user()->city == 'FPT Hochiminh')
            <img src="./assets/img/bg-profile-hcm.jpg" alt="Image placeholder" class="card-img-top">
            @elseif (Auth::user()->city == 'FPT Cantho')
            <img src="./assets/img/bg-profile-ct.jpg" alt="Image placeholder" class="card-img-top">
            @elseif (Auth::user()->city == 'FPT Ville')
            <img src="./assets/img/bg-profile-vl.jpg" alt="Image placeholder" class="card-img-top">
            @else
            <img src="./assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
          @endif
          <div class="row justify-content-center">
            <div class="col-4 col-lg-4 order-lg-2">
              <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0" style="text-align: center">
                <a href="javascript:;" style="text-align: center">
                    @if(empty($user->avatar_original))
                    <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="rounded-circle img-fluid border border-3 border-white" >
                @elseif(!empty($user->avatar_original))
                    <img src="{{ $user->avatar_original }}" class="rounded-circle img-fluid border border-3 border-white" >
                @endif
                </a>
              </div>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="text-center mt-4">
              <h5>
                {{ Auth::user()->name }}<span class="font-weight-light">,
                    @php
                    $date = new DateTime(Auth::user()->birthday);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    echo $interval->y;
                @endphp
                </span>
              </h5>
              <div class="h6 font-weight-300">
                <i class="ni nilocation_pin mr-2"></i>{{ Auth::user()->city }} <br>
                {{ Auth::user()->specialized }}
              </div>
              <div class="h6 mt-4">
                <p>{{ Auth::user()->about }}</p>
              </div>
            </div>
          </div>
        </div>
        @include('Layouts.footer')
      </div>
    </div>
@include('Layouts.endLayout')
