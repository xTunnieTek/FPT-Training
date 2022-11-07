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
            <form method="post" action="{{route('addCourse')}}" enctype="multipart/form-data">
                @csrf
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Create Course</p>
                  <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                </div>
              </div>
              <div class="card-body">
                <p class="text-uppercase text-sm">Course Information</p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Course Name</label>
                        <input class="form-control" type="text" name="coursename"  placeholder="Course Name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label" >Category</label>
                        <input type="text" class="form-control" name="categoryid" value="{{$categoryid}}" placeholder="{{$categoryname}}" hidden>
                        <input type="text" class="form-control" value="{{$categoryname}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Cover</label>
                        <input class="form-control" type="file"  name="images"  >
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Link File Cover</label>
                        <input class="form-control" type="text"  name="images" placeholder="https://images" >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Start Date</label>
                      <input class="form-control" type="date" name="startdate" required >
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Creator</label>
                        <input class="form-control" type="text" value="{{ Auth::user()->name}}" name="trainer" disabled>
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Description</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Description</label>
                      <input class="form-control" type="text" value="Description for course"  name="description" required>
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
                      <h6 class="mb-0">Courses</h6>
                    </div>
                    <div class="col-6 text-end">
                       <a href="/all-course/Category={{$categoryid}}" class="btn btn-secondary btn-sm ms-auto">View All</a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <ul class="list-group">
                    @foreach ($course as $course)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">{{$course->coursename}}</h6>
                                <span class="text-xs">{{$course->startdate}}</span>
                            </div>
                            <div class="d-flex align-items-center text-sm">
                                <span class="me-2 text-success font-weight-bold">{{$course->trainer}} </span>
                                <a class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" href="{{"/manage-topic/".$course['courseid']}}"><i class="fas fa-file-pdf text-lg me-1"></i>View Course</a>
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
