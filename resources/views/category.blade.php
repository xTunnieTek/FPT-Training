@include('Layouts.defaultLayout')
<div class="position-absolute w-100 min-height-300 top-0 z-index-1" style="background-image: url('https://aasarchitecture.com/wp-content/uploads/FPT-Technology-building-by-Vo-Trong-Nghia-Architects-00.jpg'); background-position-y: -55%; background-position-x: 90%;">
    <span class="mask bg-primary opacity-5"></span>
</div>
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4 z-index-2 bottom">
    <div class="row">
        @foreach ($category as $category)
        <div class="col-4">
            <div class="card" style="width: 20rem; margin-top: 15rem">
                <img class="card-img-top" style="max-height: 400px" src="{{$category->images}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$category->categoryname}}</h5>
                  <p class="card-text">{{$category->description}}</p>
                  @if (Auth::user()->specialized == $category->categoryname)
                    <a href="{{ route('manageCourse')}}" class="btn btn-primary">Go {{$category->categoryname}} Course</a>
                  @endif
                </div>
            </div>
        </div>
        @endforeach
        @include('Layouts.footer')
    </div>
</div>
@include('Layouts.endLayout')
