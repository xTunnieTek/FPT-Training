@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')


<div class="card shadow-lg mx-4 card-profile-top">
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
                <p style="text-transform:uppercase ">{{ Auth::user()->role}}</p>
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
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/Usgm5c6nCeM?controls=0&ampmodestbranding=0&amprel=0" autoplay=1 ></iframe>
            {{-- <iframe width="100%" height="500" src="{{$key->link}}?controls=0&ampmodestbranding=0&amprel=0" autoplay=1 ></iframe> --}}
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Topics</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <ul class="list-group">
                        @foreach ($topic as $topic )
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$topic->title}}</h6>
                                <span class="text-xs">{{$topic->coursename}}</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <span class="me-2 text-success font-weight-bold">{{$topic->trainer}}</span>
                                <a class="btn btn-link text-info text-sm mb-0 px-0 ms-4" href="/mycourse/{{$topic->courseid}}/Lab={{$topic->topicid}}"><i class="fa-solid fa-clapperboard"></i>  &nbsp; View Course</a>
                            </div>
                        </li>
                        @endforeach
                  </ul>
                </div>
              </div>
            </div>
        </div>
        @include('Layouts.footer')
      </div>
    </div>
@include('Layouts.endLayout')
