@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Training | <a class="btn btn-outline-primary btn-sm mb-0" href="/dashboard">Back</a></h6>
            <form action="">
                <div class="row">
                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control"  placeholder="Type here..." name="search" >
                        </div>
                    </div>
                    <div class="col-1">
                        <select class="form-control" name="specialized" >
                            <option value="All">All</option>
                            <option value="Business">Business</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Graphic Design">Graphic Design</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID | Google ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Course</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Specialized</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                @php
                    $users = DB::table('users')->get();
                    $search = $_GET['search'] ?? '';
                    $specialized = $_GET['specialized'] ?? '';
                    if($specialized != 'All'){
                        $enroll = DB::table('users')
                        ->join('enroll', 'users.google_id', '=', 'enroll.trainingid')
                        ->join('courses', 'enroll.courseid', '=', 'courses.courseid')
                        ->join('category', 'courses.categoryid', '=', 'category.categoryid')
                        ->where('category.categoryname', '=', $specialized)
                            ->get();
                    }
                @endphp
                @if($search)
                    @php
                        $enroll = DB::table('users')
                        ->join('enroll', 'users.google_id', '=', 'enroll.trainingid')
                        ->join('courses', 'enroll.courseid', '=', 'courses.courseid')
                        ->where('users.name', 'like', '%'.$search.'%')
                        ->orWhere('users.specialized', 'like', '%'.$search.'%')
                        ->orWhere('users.google_id', 'like', '%'.$search.'%')
                        ->orWhere('enroll.date', 'like', '%'.$search.'%')
                        ->orWhere('courses.coursename', 'like', '%'.$search.'%')
                        ->get();
                    @endphp
                    @foreach ($enroll as $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    @if(empty($item->avatar_original))
                                        <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="avatar avatar-sm me-3" >
                                    @elseif(!empty($item->avatar_original))
                                        <img src="{{ $item->avatar_original }}" class="avatar avatar-sm me-3" >
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $item->trainingid }}</p>
                                </div>
                              </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $item->coursename }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $item->date }}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $item->specialized }}</p>
                          </td>
                        <td>
                            <span class="badge badge-sm bg-gradient-info">{{ $item->role }}</span>
                        </td>
                        <td class="align-middle">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                            <a href="/delete-training/{{$item->enrollid}}" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                        </td>
                      </tr>
                    @endforeach
                @else
                @foreach ($enroll as $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    @if(empty($item->avatar_original))
                                        <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="avatar avatar-sm me-3" >
                                    @elseif(!empty($item->avatar_original))
                                        <img src="{{ $item->avatar_original }}" class="avatar avatar-sm me-3" >
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm">{{ $item->name }}</h6>
                                  <p class="text-xs text-secondary mb-0">{{ $item->trainingid }}</p>
                                </div>
                              </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $item->coursename }}</p>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $item->date }}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $item->specialized }}</p>
                          </td>
                        <td>
                            <span class="badge badge-sm bg-gradient-info">{{ $item->role }}</span>
                        </td>
                        <td class="align-middle">
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
                            <a href="/delete-training/{{$item->enrollid}}" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                        </td>
                      </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
      @include('Layouts.footer')
    </div>
  </div>
@include('Layouts.endLayout')

