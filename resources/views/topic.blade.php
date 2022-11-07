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
            <h6 class="mb-1">
                {{ Auth::user()->name }}
                <p style="text-transform:uppercase ">{{ Auth::user()->role}}</p>
            </h6>
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
            <form method="post" action="{{route('addTopic')}}" enctype="multipart/form-data">
                @csrf
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Create Topic</p>
                  <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                </div>
              </div>
              <div class="card-body">
                <p class="text-uppercase text-sm">Course Information</p>
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Title</label>
                      <input type="text" name="topicid" value="" hidden>
                        <input class="form-control" type="text" name="title"  placeholder="Course Name">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Courses</label>
                      {{-- <input type="text" class="form-control" name="courseid" value="a" d> --}}
                        <select class="form-control" name="courseid">
                            @foreach ($course as $item )
                                <option value="{{ $item->courseid }}">{{ $item->coursename }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Link Video</label>
                        <input class="form-control" type="text" id="videoUrl" name="link">
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Preview</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <iframe width="100%" height="315" id="myFrame" title="YouTube video player" frameborder="0"></iframe>
                        <a class="btn btn-primary btn-sm ms-auto" onclick="showVideo()">Preview</a>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Content</label>
                      <textarea class="form-control" name="about" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </form>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Topics</h6>
                    </div>
                    <div class="col-6 text-end">
                    {{-- <button class="btn btn-outline-primary btn-sm mb-0" onclick="showVideo()">Preview</button> --}}
                      {{-- <a class="btn btn-outline-success btn-sm mb-0" href="{{ route('allCourse')}}">View All</a> --}}
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group list-group-flush">
                        @foreach($topic as $item)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$item->title}}</h6>
                                <span class="text-xs">{{$item->coursename}}</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <span class="me-2 text-success font-weight-bold">Active</span>
                                <a class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" href=""><i class="fas fa-file-pdf text-lg me-1"></i>View Topic</a>
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
    <script>
        function showVideo() {
            var videoUrl = document.getElementById("videoUrl").value
            document.getElementById("myFrame").src = videoUrl
        }
    </script>
@include('Layouts.endLayout')
