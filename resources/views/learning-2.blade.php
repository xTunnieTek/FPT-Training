@include('Layouts.defaultLayout')
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> --}}
<div class="position-absolute w-100 min-height-300 top-0 z-index-1" style="background-image: url('/assets/img/banner-2.png'); background-position-y: 100%; background-position-x: 90%;">
    <span class="mask bg-primary opacity-5"></span>
</div>


@foreach ($course as $item)
<div class="modal fade" id="exampleModal{{$item->courseid}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="container-fluid" style="padding: 0;">
                <div class="row">
                    <div class="col-md-7">
                        <img src="/assets/img/courses/index.jpg"style="width: 100%;">
                    </div>
                    <div class="col-md-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: #172b4d !important">{{$item->coursename}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                            <p style="color: #172b4d !important"><b>Start Date: </b> {{$item->startdate}} </p>
                            <p style="color: #172b4d !important"><b>Category: </b> {{$item->categoryname}}</p>
                            <p style="color: #172b4d !important"><b>Teacher: </b> {{$item->trainer}}</p>
                            <p style="color: #172b4d !important"><b>About: </b><br>{{$item->description}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="/training/{{Auth::user()->google_id}}/{{$item->courseid}}" class="btn btn-primary">Enroll</a>
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
    <div class="row" style="margin-top: 15rem">
        @foreach ($course as $course)
        <div class="col-md-3">
           <div class="hover-btn">
            <div class="card" style="width: 85%; margin-top: 2rem">
                <img class="card-img-top" style="max-height: 400px" src="/assets/img/courses/index.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$course->coursename}}</h5>
                    <p class="card-text text-center" style="white-space: nowrap; text-overflow: ellipsis;overflow: hidden;">{{$course->description}}</p>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$course->courseid}}">View detail</button>
                    <a href="/training/{{Auth::user()->google_id}}/{{$item->courseid}}" class="btn btn-primary">Enroll</a>
                </div>
            </div>
           </div>
        </div>
        @endforeach
        @include('Layouts.footer')
    </div>
</div>


@include('Layouts.endLayout')
