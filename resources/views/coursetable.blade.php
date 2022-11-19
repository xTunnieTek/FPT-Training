@include('Layouts.defaultLayout')
@foreach ($course as $item)
<div class="modal fade" id="exampleModal{{$item->courseid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <div class="col-md-7">
                        <img src="{{$item->images}}" alt="" width="100%" height="100%">
                    </div>
                    <div class="col-md-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #172b4d !important">{{$item->coursename}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="{{url('/edit-course')}}/{{$item->courseid}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="topicname" class="form-label" style="color: #172b4d !important">Topic Name</label>
                                    <input type="text" class="form-control" id="topicname" name="coursename" value="{{$item->coursename}}">
                                </div>
                                <div class="mb-3">
                                    <label for="topicname" class="form-label" style="color: #172b4d !important">Start Date</label>
                                    <input type="text" class="form-control" id="topicname" name="startdate" value="{{$item->startdate}}">
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label" style="color: #172b4d !important">Images</label>
                                    <input type="text" class="form-control" id="link" name="images" value="{{$item->images}}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label" style="color: #172b4d !important">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5">{{$item->description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label" style="color: #172b4d !important">Trainer</label>
                                    <select name="trainer" id="trainer"  class="form-control">
                                        @php
                                            $trainer = DB::table('users')->where('role', 'trainer')->get();
                                        @endphp
                                        @foreach ($trainer as $item)
                                            <option value="{{$item->name}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" style="float: right;">Save</button>
                                {{-- <a href="/edit-topic/{{$item->topicid}}/update" class="btn btn-primary">Update</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Courses | <a class="btn btn-outline-primary btn-sm mb-0" href="/manage-course/Category={{$categoryid}}">Back</a></h6>
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
                            <a href="" class="text-secondary font-weight-bold text-xs"  data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#exampleModal{{$course->courseid}}">
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

