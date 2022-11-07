@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            {{-- tạo button back trang trước --}}
            <h6>Courses | <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm ms-auto ">Back</a> </h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Date</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Specialized</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($course as $course)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                                @if ($course->courseimage == null)
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOmlrM_TVR1HT9NLCnu9wGDk5dbK-RTXpyWw&usqp=CAU" class="avatar avatar-sm me-3">
                                @else
                                    <img src="{{ $course->images }}" class="avatar avatar-sm me-3" >
                                @endif
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $course->coursename }}</h6>
                              {{-- <p class="text-xs text-secondary mb-0">{{ $course->trainer }}</p> --}}
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $course->trainer }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            {{-- {{ $user->specialized }} --}}
                            <h6 class="mb-0 text-sm" style="text-align: left">
                                {{ $course->startdate }}
                            </h6>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" style="	text-transform: uppercase;">{{ $course->categoryname }}</span>
                        </td>
                        <td class="align-middle">
                          <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                            Edit
                          </a>
                        </td>
                        <td class="align-middle">
                            <a href="{{"/delete-course/".$course['courseid']}}" class="text-secondary font-weight-bold text-xs">
                              Delete
                            </a>
                          </td>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @include('Layouts.footer')
    </div>
  </div>
@include('Layouts.endLayout')

