@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Courses</p>
                  <h5 class="font-weight-bolder">
                    @php
                        $courses = DB::table('courses')->count();
                        echo $courses;
                    @endphp
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                  <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                  <h5 class="font-weight-bolder">
                    @php
                        $users = DB::table('users')->count();
                        echo $users;
                    @endphp
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                  <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Enroll</p>
                  <h5 class="font-weight-bolder">
                    @php
                        $enroll = DB::table('enroll')->count();
                        echo $enroll;
                    @endphp
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">Trainee</p>
                  <h5 class="font-weight-bolder">
                    @php
                        $trainee = DB::table('trainingid')->count();
                        echo $trainee;
                    @endphp
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
          <div class="card-header pb-0 pt-3 bg-transparent">
            <h6 class="text-capitalize">Overview</h6>
          </div>
          <div class="card-body p-3">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <a class="twitter-timeline" data-lang="en" data-width="644" data-height="382" data-theme="light" href="https://twitter.com/fpt_software?ref_src=twsrc%5Etfw">Tweets by fpt_software</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card ">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-2">Report Courses</h6>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center h-100">
              <tbody>
                  @php
                        $course = DB::table('courses')->get();
                  @endphp
                {{-- Print max 04 course --}}
                @foreach ($course as $item)
                <tr>
                    <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div>
                            <img src="./assets/img/icons/flags/GB.png" alt="Course flag">
                          </div>
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Course ID:</p>
                            <h6 class="text-sm mb-0">{{$item->courseid}}</h6>
                          </div>
                        </div>
                    </td>
                    <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Course Name:</p>
                            <h6 class="text-sm mb-0">{{$item->coursename}}</h6>
                          </div>
                        </div>
                    </td>
                    <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Start Date:</p>
                            <h6 class="text-sm mb-0">{{$item->startdate}}</h6>
                          </div>
                        </div>
                    </td>
                    <td class="w-30">
                        <div class="d-flex px-2 py-1 align-items-center">
                          <div class="ms-4">
                            <p class="text-xs font-weight-bold mb-0">Trainer:</p>
                            <h6 class="text-sm mb-0">{{$item->trainer}}</h6>
                          </div>
                        </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Top Trainer of Month</h6>
          </div>
          <div class="card-body p-3">
            <ul class="list-group">
                {{-- List all users role trainer --}}
                @php
                    $trainer = DB::table('users')->where('role', 'trainer')->get();
                @endphp
                @foreach ($trainer as $item)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                        <i class="ni ni-satisfied text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">{{$item->name}}</h6>
                        <span class="text-xs">Top Trainer</span>
                    </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                    </div>
                </li>
                @endforeach
            </ul>
              {{-- <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                  <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                    <i class="ni ni-satisfied text-white opacity-10"></i>
                  </div>
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">Ngo Thi Mai Loan</h6>
                    <span class="text-xs">250 Topics in Course</span>
                  </div>
                </div>
                <div class="d-flex">
                  <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                </div>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>
      @include('Layouts.footer')
    </div>
</div>
@include('Layouts.endLayout')
