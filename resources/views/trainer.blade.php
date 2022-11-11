@include('Layouts.defaultLayout')
@include('Layouts.sidebar')
@include('Layouts.navbar')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-8">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Manage Trainer</h6>
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
                    @foreach ($trainers as $user)
                    @if ($user->role == 'trainer')
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
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
        <div class="col-4">
            <form method="post" enctype="multipart/form-data" action="{{route('addTrainer')}}">
                @csrf
            <div class="card">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0">Create An Account For Trainer</p>
                  <button class="btn btn-primary btn-sm ms-auto">Create</button>
                </div>
              </div>
              <div class="card-body">
                <p class="text-uppercase text-sm">User Information</p>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Email address</label>
                      <input class="form-control" type="email" id="email" name="email">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Full name</label>
                      <input class="form-control" type="text" name="name" id="name" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Password</label>
                      <input class="form-control" type="password" name="password" id="password">
                    </div>
                  </div>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Contact Information</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Permission</label>
                          <select name="role" id="role" class="form-control">
                            <option value="trainer" selected>Trainer</option>
                          </select>
                        </div>
                      </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">City/Campus</label>
                      <select name="city" id="city" class="form-control" placeholder="Please choose campus">
                        <option value="FPT Hanoi">FPT Hanoi</option>
                        <option value="FPT Danang">FPT Danang</option>
                        <option value="FPT Quynhon">FPT Quynhon</option>
                        <option value="FPT Hochiminh">FPT Hochiminh</option>
                        <option value="FPT Cantho">FPT Cantho</option>
                        <option value="FPT Ville">FPT Ville</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Department/Specialized</label>
                        <select name="specialized" id="specialized" class="form-control" >
                            <option value="Information Technology">Information Technology</option>
                            <option value="Business">Business</option>
                            <option value="Graphic Design">Design Graphics</option>
                            <option value="Training">Training Department</option>
                            <option value="Admin">Administrators</option>
                          </select>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </form>
    </div>
      @include('Layouts.footer')
    </div>
  </div>
@include('Layouts.endLayout')

