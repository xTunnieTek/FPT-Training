@include('Layouts.defaultLayout')
<div class="position-absolute w-100 min-height-300 top-0 z-index-1" style="background-image: url('/assets/img/Courses/background.webp'); background-position-y: 50%; background-position-x: 10%;">
    <span class="mask bg-primary opacity-5"></span>
</div>
@include('Layouts.sidebar')
@include('Layouts.navbar')


<div class="card shadow-lg mx-4 card-profile-bottom">
    <div class="card-body p-3">
      <div class="row gx-4">
        <div class="col-auto">
          <div class="avatar avatar-xl position-relative">
            <img src="{{ Auth::user()->avatar_original}}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
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
            <form method="post" action="/trainee/{{$trainee->google_id}}/edit" enctype="multipart/form-data" >
                @csrf
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Training</p>
                  {{-- <a href="{{ route('updateProfile')}}" class="btn btn-primary btn-sm ms-auto">Update</a> --}}
                  <button class="btn btn-primary btn-sm ms-auto">Update</button>
                </div>
              </div>
              <div class="card-body">
                <p class="text-uppercase text-sm">User Information</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Skill</label>
                      <textarea class="form-control" name="skill" id="skill" rows="3">{{ $trainee->skill}}</textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">TOEIC Score</label>
                      <input class="form-control" type="number" name="toeic" id="toeic" value="{{  $trainee->toeic }}">
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Experience</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Experience</label>
                      <textarea class="form-control" name="exp" id="exp" rows="5">{{ $trainee->exp}}
                      </textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
      <div class="col-md-4">
        {{-- Print các khóa học --}}
        <div class="card card-profile">
            <div class="row justify-content-left">
              <div class="col-4 col-lg-4 order-lg-2">
                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0" style="text-align: center">
                    <img src="{{ Auth::user()->avatar_original }}" class="w-60 border-radius-md shadow-sm" >
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="text-left mt-4">
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

                {{-- Print --}}
                <h6>Skill</h6>
                <p>{{$trainee->skill}}</p>
                <h6>TOEIC Score </h6>
                <p>{{$trainee->toeic}}</p>
                <h6>Experience </h6>
                <p>{{$trainee->exp}}</p>
              </div>
            </div>
      </div>
        @include('Layouts.footer')
      </div>
    </div>
@include('Layouts.endLayout')
