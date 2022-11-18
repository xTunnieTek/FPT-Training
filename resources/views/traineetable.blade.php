@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Manage Trainee</h6>
            <form action="">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control"  placeholder="Type here..." name="search" >
                </div>
            </form>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Campus</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Specialized</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                @php
                    $users = DB::table('users')->get();
                    $search = $_GET['search'] ?? '';
                @endphp
                @if($search)
                    @php
                        $trainee = DB::table('users')->where('name', 'like', '%'.$search.'%')
                        ->orWhere('city', 'like', '%'.$search.'%')
                        ->orWhere('specialized', 'like', '%'.$search.'%')
                        ->orWhere('address', 'like', '%'.$search.'%')
                        ->orWhere('role', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->get();
                    @endphp
                    @foreach ($trainee as $user)
                    @if ($user->role == 'trainee')
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                                @if(empty($user->avatar_original))
                                    <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="avatar avatar-sm me-3" >
                                @elseif(!empty($user->avatar_original))
                                    <img src="{{ $user->avatar_original }}" class="avatar avatar-sm me-3" >
                                @endif
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                              <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">{{ $user->city }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-dark">
                            {{ $user->specialized }}
                          </span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" style="	text-transform: uppercase;">{{ $user->role }}</span>
                        </td>
                        <td class="align-middle">
                            <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                    @endif
                    @endforeach
                @else
                @foreach ($trainee as $user)
                @if ($user->role == 'trainee')
                <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                            @if(empty($user->avatar_original))
                                <img src="https://yt3.ggpht.com/ytc/AMLnZu-WMQDBrCRSdXfuoyDMZGcI9Ur4hmnWeD8Fw7QDxQ=s900-c-k-c0x00ffffff-no-rj" class="avatar avatar-sm me-3" >
                            @elseif(!empty($user->avatar_original))
                                <img src="{{ $user->avatar_original }}" class="avatar avatar-sm me-3" >
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $user->name }}</h6>
                          <p class="text-xs text-secondary mb-0">{{ $user->email }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{ $user->city }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-dark">
                        {{ $user->specialized }}
                      </span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" style="	text-transform: uppercase;">{{ $user->role }}</span>
                    </td>
                    <td class="align-middle">
                        <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                            <i class="fas fa-user-edit"></i>
                        </a>
                        <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                @endif
                @endforeach
                @endif
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

