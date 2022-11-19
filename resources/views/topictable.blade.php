@include('Layouts.defaultLayout')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> --}}

@foreach ($topic as $item)
<div class="modal fade" id="exampleModal{{$item->topicid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <div class="col-md-7">
                        <iframe width="100%" height="100%" src="{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #172b4d !important">{{$item->title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <form action="{{url('/edit-topic')}}/{{$item->topicid}}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="topicname" class="form-label" style="color: #172b4d !important">Topic Name</label>
                                    <input type="text" class="form-control" id="topicname" name="title" value="{{$item->title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="link" class="form-label" style="color: #172b4d !important">Link</label>
                                    <input type="text" class="form-control" id="link" name="link" value="{{$item->link}}">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label" style="color: #172b4d !important">About</label>
                                    <textarea class="form-control" id="description" name="about" rows="3">{{$item->about}}</textarea>
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
            <h6>Topic | <a class="btn btn-outline-primary btn-sm mb-0" href="/manage-topic/{{$courseid}}">Back</a></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">About</th>
                    <th colspan="2" class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($topic as $topic)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{ $topic->images }}" class="avatar avatar-sm me-3" alt="courses">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $topic->title }}</h6>
                              <p class="text-xs text-secondary mb-0">{{ $course->trainer }}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $topic->link }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            {{-- {{ $user->specialized }} --}}
                            <h6 class="mb-0 text-sm" style="text-align: left">
                                {{ $topic->about }}
                            </h6>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" style="	text-transform: uppercase;">{{ $topic->categoryname }}</span>
                        </td>
                        <td class="align-middle">
                          <a href="" class="text-secondary font-weight-bold text-xs"  data-original-title="Edit user" data-bs-toggle="modal" data-bs-target="#exampleModal{{$topic->topicid}}">
                            Edit
                          </a>
                        </td>
                        <td class="align-middle">
                            <a href="/delete-topic/{{$topic->topicid}}" class="text-secondary font-weight-bold text-xs" >
                              Delete
                            </a>
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

