 @extends('layouts.admin', ['page' => 'Index'])

 @section('title')
     {{ $panel ?? '' }}
 @endsection

 @section('content')
     <div class="row d-flex justify-content-center">

         <div class="col-xl-8">
             <div class="card custom-card border">
                 <div class="card-body">
                     <div class="d-flex justity-content-between">
                         <h6 class="card-title">Total Admin List </h6>
                         <i class="fa fa-plus-circle ms-auto text-success" data-bs-toggle="tooltip" title="Add Post"
                             style="font-size: 26px;"></i>
                     </div>
                     {{-- <table class="table table-striped table-hover datatable"> --}}
                     <div class="table-responsive">
                         <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                             <thead>
                                 <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">Full Name</th>
                                     <th scope="col">Username</th>
                                     <th scope="col">Email</th>
                                     <th scope="col">Role</th>
                                     {{-- <th scope="col">Is Ban</th> --}}
                                     <th scope="col" class="text-center">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($data['users'] as $user)
                                     <tr>
                                         <th scope="row">{{ $loop->iteration }}</th>
                                         <td>{{ $user->name }}</td>
                                         <td>{{ $user->username }}</td>
                                         <td><a href="#">{{ Str::limit($user->email, 25) }}</a>
                                         </td>

                                         <td>
                                             @if ($user->role == 'user')
                                                 User
                                             @elseif($user->role == 'admin')
                                                 <span class="text-success">Admin</span>
                                             @endif
                                         </td>

                                         {{-- <td>
                                             <div class="main-toggle-group d-sm-flex align-items-center">
                                                 <div class="toggle is_ban toggle-md my-1 {{ $user->is_ban == '0' ? 'on' : 'off' }}"
                                                     data-id="{{ $user->id }}" id="push-notifications">
                                                     <span></span>
                                                 </div>
                                                 <div class="toggle is_ban toggle-md my-1 on" data-id="{{ $user->id }}"
                                                     id="push-notifications">
                                                     <span></span>
                                                 </div>
                                             </div>
                                         </td> --}}
                     </div>
                     </td>
                     <td class="d-sm-flex justify-content-around align-items-center">

                         <a data-bs-toggle="modal" data-bs-target="#view-{{ $user->id }}"
                             class="btn btn-sm btn-icon btn-danger-light"><i class="ri-eye-line"></i></a>

                         <a href="{{ route($base_route . 'edit', $user->id) }}"
                             class="btn btn-sm btn-icon btn-success-light"><i class="ri-pencil-line"></i></a>

                         <form action="{{ route($base_route . 'destroy', $user->id) }}" enctype="multipart/form-data"
                             method="POST" class="main_form">
                             @csrf
                             @method('DELETE')
                             <a class="btn btn-sm btn-icon btn-danger-light delete-confirm"><i
                                     class="ri-delete-bin-line"></i></a>
                         </form>

                     </td>
                     </tr>
                     @endforeach
                     </tbody>
                     </table>
                     {{-- //View Details --}}
                 </div>

             </div>
             {{-- //View Details --}}
             @foreach ($data['users'] as $user)
                 <div class="modal fade" id="view-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <span>View Details</span>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                         class="fa fa-close"></i></button>

                             </div>
                             <div class="modal-body">

                                 <div class="card-body">


                                     <!-- Floating Labels Form -->
                                     <form class="row g-3">
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="text" value="{{ isset($user) ? $user->name : '' }}"
                                                     class="form-control" id="floatingName" placeholder="Your Name"
                                                     readonly>
                                                 <label for="floatingName">Your Name</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="text" value="{{ isset($user) ? $user->username : '' }}"
                                                     class="form-control" id="floatingName" placeholder="Your Name"
                                                     readonly>
                                                 <label for="floatingName">Your Username</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="email" value="{{ isset($user) ? $user->email : '' }}"
                                                     class="form-control" id="floatingEmail" placeholder="Your Email"
                                                     readonly>
                                                 <label for="floatingEmail">Your Email</label>
                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 <input type="text" value="{{ $user->profile?->phone }}"
                                                     class="form-control" id="floatingPassword" placeholder="Password"
                                                     readonly>
                                                 <label for="floatingPassword">Phone</label>
                                             </div>
                                         </div>


                                         <div class="col-md-6">
                                             <div class="mb-3">
                                                 <label for="">User Role :</label> <br />

                                                 @if ($user->role == 'superadmin')
                                                     <span class="badge bg-primary rounded-pill px-3 py-2">Super
                                                         Admin</span>
                                                 @elseif($user->role == 'admin')
                                                     <span class="badge bg-success rounded-pill px-3 py-2">Admin</span>
                                                 @elseif($user->role == 'user')
                                                     <span class="badge bg-primary rounded-pill px-3 py-2">User</span>
                                                 @endif

                                             </div>
                                         </div>
                                         <div class="col-md-6">
                                             <div class="form-floating">
                                                 @if (isset($user?->profile?->image))
                                                     <img src="{{ asset('images/profile/' . $user->profile?->image) }}"
                                                         width="120" class="img-thumbnail">
                                                 @else
                                                     <img src="{{ asset('dummy_image.jpg') }}" width="100"
                                                         class="img-thumbnail">
                                                 @endif

                                             </div>
                                         </div>

                                         <!-- End floating Labels Form -->


                                     </form>
                                 </div>

                             </div>


                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
     <div class="col-lg-4">
         <div class="card">
             <div class="card-body">
                 <h6 class="card-title">{!! isset($data['user']) ? '<i class="ri-edit-2-fill"></i>' : '<i class="ri-add-large-fill"></i>' !!}
                     {{ isset($data['user']) ? 'Update' : 'Create' }}
                     Admin</h6>

                 <!-- Floating Labels Form -->
                 @isset($data['user'])
                     <form action="{{ route('admin.admin_create.update', $data['user']->id) }}" method="POST"
                         class="row g-3 main_form">
                         @csrf
                         @method('PUT')
                     @else
                         <form action="{{ route('admin.admin_create.store') }}" method="POST" class="row g-3 main_form">
                             @csrf
                             @endif
                             <div class="col-md-12 ">
                                 <div class="form-floating my-1">
                                     <input type="text" name="name"
                                         value="{{ isset($data['user']) ? $data['user']->name : '' }}" class="form-control"
                                         id="floatingName" placeholder="Your Name">
                                     {{-- <span class="text-danger">{{ $errors->first('name') }}</span>
                        --}}
                                     <label for="floatingName">Full Name</label>
                                 </div>
                             </div>

                             <div class="col-md-12 ">
                                 <div class="form-floating my-1">
                                     <input type="text" name="username"
                                         value="{{ isset($data['user']->username) ? $data['user']->username : '' }}"
                                         class="form-control" id="floatingName" placeholder="Your Name">
                                     {{-- <span class="text-danger">{{ $errors->first('name') }}</span>
                        --}}
                                     <label for="floatingName">Username</label>
                                 </div>
                             </div>

                             <div class="col-md-12 my-1">
                                 <div class="form-floating">
                                     <input type="email" name="email"
                                         value="{{ isset($data['user']) ? $data['user']->email : '' }}"
                                         class="form-control email" id="floatingEmail" placeholder="Your Email">
                                     {{-- <span class="text-danger">{{ $errors->first('email') }}</span>
                        --}}
                                     <label for="floatingEmail"> Email</label>
                                 </div>
                             </div>
                             <div class="col-md-12 my-1">
                                 <div class="form-floating">
                                     <input type="text" name="password" value="12345" class="form-control password"
                                         id="floatingPassword" placeholder="12345" readonly>
                                     <label for="floatingPassword">Default Password</label>
                                 </div>
                             </div>

                             <div class="text-center text-center mx-auto">


                                 <button type="submit"
                                     class="btn btn-{{ isset($data['user']) ? 'danger' : 'primary' }} text-center mx-auto btn-w-md d-flex align-items-center justify-content-center btn-wave waves-light text-nowrap waves-effect waves-light"
                                     data-bs-toggle="modal" data-bs-target="#create-folder">
                                     {!! isset($data['user']) ? '<i class="ri-edit-2-fill p-1"></i>' : '<i class="ri-add-large-fill p-1"></i>' !!}
                                     {{ isset($data['user']) ? 'Update' : 'Create' }}
                                     Admin
                                 </button>
                             </div>
                         </form><!-- End floating Labels Form -->

                 </div>
             </div>

         </div>
         </div>
     @endsection
