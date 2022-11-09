@include('Layouts.defaultLayout')
<div class="position-absolute w-100 min-height-300 top-0 z-index-1" style="background-image: url('/assets/img/banner-2.png'); background-position-y: 100%; background-position-x: 90%;">
    <span class="mask bg-primary opacity-5"></span>
</div>
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
        @foreach ($category as $category)
        <div class="col-3">
            <div class="card" style="width: 20rem; margin-top: 15rem">
                <img class="card-img-top" style="max-height: 400px" src="/assets/img/courses/index.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$category->categoryname}}</h5>
                  <p class="card-text" style="white-space: nowrap; text-overflow: ellipsis;overflow: hidden;">{{$category->description}}</p>
                    <a href="/learning/{{$category->categoryid}}" class="btn btn-success">Go {{$category->categoryname}} Course</a>
                </div>
            </div>
        </div>
        @endforeach
      @include('Layouts.footer')
    </div>
</div>
@include('Layouts.endLayout')
