@include('Layouts.defaultLayout')
<div class="position-absolute w-100 min-height-300 top-0 z-index-1" style="background-image: url('/assets/img/banner-2.png'); background-position-y: 100%; background-position-x: 90%;">
    <span class="mask bg-primary opacity-5"></span>
</div>
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
        @php
            $user = Auth::user()->google_id;
            $trainee = DB::table('trainingid')->where('google_id', $user)->first();
        @endphp
        @if ($trainee == null)
            <div class="col-md-12">
                <div class="card" style="width: 100%; margin-top: 15rem">
                    <div class="card-body">
                    {{-- <h5 class="card-title" style="text-align: center">Vui Lòng Cập Nhật Thông Tin Đào Tạo Của Bạn</h5>
                    <h6 class="card-title" style="text-align: center">Please Update Your Training Information</h6> --}}
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <h5 class="card-title" style="text-align: center">BẠN KHÔNG THUỘC TỔ CHỨC GIÁO DỤC FPT - VUI LÒNG THỬ ĐĂNG NHẬP LẠI BẰNG @FPT.EDU.VN</h5>
                        <h6 class="card-title" style="text-align: center">Unable to update information - You do not belong to FPT education organization</h6>
                    @else
                        <h5 class="card-title" style="text-align: center">Vui Lòng Cập Nhật Thông Tin Đào Tạo Của Bạn</h5>
                        <h6 class="card-title" style="text-align: center">Please Update Your Training Information</h6>
                    @endif
                    </div>
                </div>
            </div>
        @else
            @foreach ($category as $category)
            <div class="col-md-3" style="margin-top: 15rem">
                <div class="card" style="width: 85%; margin-top: 2rem">
                    <img class="card-img-top" style="max-height: 400px" src="/assets/img/courses/index.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{$category->categoryname}}</h5>
                    <p class="card-text" style="white-space: nowrap; text-overflow: ellipsis;overflow: hidden;">{{$category->description}}</p>
                        <a href="/learning/{{$category->categoryid}}" class="btn btn-success">Go {{$category->categoryname}} Course</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
      @include('Layouts.footer')
    </div>
</div>
@include('Layouts.endLayout')
