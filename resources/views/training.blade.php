@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Training | <a class="btn btn-outline-primary btn-sm mb-0" href="/dashboard">Back</a></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID | Google ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skill</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Specialized</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
      @include('Layouts.footer')
    </div>
  </div>
@include('Layouts.endLayout')

