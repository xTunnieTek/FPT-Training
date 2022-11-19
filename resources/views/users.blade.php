@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
              <h6>Manage User | Permission: <span style="color: rgb(89, 255, 47); text-transform: uppercase;"> {{Auth::user()->role}}</span></h6>
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
                            <select class="form-control" name="city" >
                                <option value="All">All</option>
                                <option value="FPT Cantho">FPT Cantho</option>
                                <option value="FPT Hanoi">FPT Hanoi</option>
                                <option value="FPT Quynhon">FPT Quynhon</option>
                                <option value="FPT Hochiminh">FPT Hochiminh</option>
                                <option value="FPT Danang">FPT Danang</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <select class="form-control" name="role" >
                                <option value="All">All</option>
                                <option value="trainer">Trainer</option>
                                <option value="trainee">Trainee</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Specialized</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $users = DB::table('users')->get();
                        //Search
                        $search = $_GET['search'] ?? '';
                        $specialized = $_GET['specialized'] ?? '';
                            $city = $_GET['city'] ?? '';
                            $role = $_GET['role'] ?? '';
                            if($specialized != 'All'){
                                $users = DB::table('users')->where('specialized', 'like', '%'.$specialized.'%')->get();
                            }
                            if($city != 'All'){
                                $users = DB::table('users')->where('city', 'like', '%'.$city.'%')->get();
                            }
                            if($role != 'All'){
                                $users = DB::table('users')->where('role', 'like', '%'.$role.'%')->get();
                            }
                    @endphp
                    @if($search)
                        @php
                            $users = DB::table('users')->where('name', 'like', '%'.$search.'%')
                                ->orWhere('city', 'like', '%'.$search.'%')
                                ->orWhere('specialized', 'like', '%'.$search.'%')
                                ->orWhere('address', 'like', '%'.$search.'%')
                                ->orWhere('role', 'like', '%'.$search.'%')
                                ->orWhere('email', 'like', '%'.$search.'%')
                                ->get();
                            @endphp
                    @foreach ($users as $user)
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
                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->city }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0">{{ $user->specialized }}</p>
                        </td>
                        <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->address }}</p>
                        </td>
                        <td>
                            <span class="badge badge-sm bg-gradient-info">{{ $user->role }}</span>
                        </td>
                        <td class="align-middle">

                            @if($user->role == 'trainee' || $user->role == 'trainer')
                                @if (Auth::user()->role == 'staff')
                                    <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @elseif (Auth::user()->role == 'admin')
                                    <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            @elseif($user->role == 'staff')
                                @if (Auth::user()->role == 'admin')
                                    <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @elseif($search == '')
                        @foreach ($users as $user)
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
                            <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                            </td>
                            <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $user->city }}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <p class="text-xs font-weight-bold mb-0">{{ $user->specialized }}</p>
                            </td>
                            <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $user->address }}</p>
                            </td>
                            <td>
                                <span class="badge badge-sm bg-gradient-info">{{ $user->role }}</span>
                            </td>
                            <td class="align-middle">

                                @if($user->role == 'trainee' || $user->role == 'trainer')
                                    @if (Auth::user()->role == 'staff')
                                        <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @elseif (Auth::user()->role == 'admin')
                                        <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
                                @elseif($user->role == 'staff')
                                    @if (Auth::user()->role == 'admin')
                                        <a href="/manage-user/{{ $user->id }}/edit" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user" >
                                            <i class="fas fa-user-edit"></i>
                                        </a>
                                        <a href="/manage-user/{{ $user->id }}/delete" class="btn btn-block btn-primary mb-3" data-toggle="tooltip" data-original-title="Edit user">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
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

