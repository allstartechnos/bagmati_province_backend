@extends('layouts.admin')

@section('title')
    {{ $panel ?? 'Admin' }}
@endsection

@push('css')
@endpush


@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card profile-card">
                <div class="profile-banner-img">
                    <img src="{{ asset('backend/assets/images/media/media-69.jpg') }}" height="150px" class="card-img-top"
                        alt="...">
                </div>
                <div class="card-body pb-0 position-relative">
                    <div class="row profile-content">
                        <div class="col-xl-3">
                            <div class="card custom-card overflow-hidden border">
                                <div class="card-body border-bottom border-block-end-dashed">
                                    <div class="text-center">
                                        <span class="avatar avatar-xxl avatar-rounded online mb-3">
                                            @if ($profile && $profile->image)
                                                <img src="{{ asset($img_path . $profile->image) }}" class="profileImage"
                                                    alt="Profile Image">
                                            @else
                                                <img src="{{ asset('backend/assets/images/faces/11.jpg') }}" alt="">
                                            @endif
                                        </span>


                                        {{-- <span class="fs-22">
                                            <label for="cameraInput" style="cursor: pointer;">
                                                <i class="fe fe-camera fs-22"></i>
                                            </label>

                                            <input type="file" name="image" id="cameraInput" class="upload_photo"
                                                accept="image/*" style="display: none;">
                                        </span>
                                        <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        <h5 id="name" class="fw-semibold mb-1">{{ auth()->user()->name ?? 'Admin' }}
                                        </h5>

                                        <span class="text-muted">
                                            @if (auth()->user()->role == 'admin')
                                                Admin
                                            @elseif(auth()->user()->role == 'superadmin')
                                                Super Admin
                                            @endif
                                        </span>
                                        <p class="fs-12 mb-0 text-muted"> <span class="me-3" id="address">
                                                <i
                                                    class="ri-building-line me-1 align-middle"></i>{{ $profile->address ?? 'N/A' }}</span>
                                            <span>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-1 me-0 justify-content-center">
                                    @if (!is_null($profile->github))
                                        <div>
                                            <a href="{{ $profile->github ?? '#' }}" target="_blank" id="github">
                                                <span class="avatar avatar-md bg-dark"><i
                                                        class="ri-github-line fs-16"></i></span>
                                            </a>
                                        </div>
                                    @endisset
                                    @if (!is_null($profile->facebook))
                                        <div>
                                            <a href="{{ $profile->facebook ?? '#' }}" target="_blank" id="facebook">
                                                <span class="avatar avatar-md bg-secondary"><i
                                                        class="ri-facebook-line fs-16"></i></span>
                                            </a>
                                        </div>
                                    @endisset

                                    @if (!is_null($profile->youtube))
                                        <div>
                                            <a href="{{ $profile->youtube ?? '#' }}" target="_blank" id="youtube">
                                                <span class="avatar avatar-md bg-danger"><i
                                                        class="ri-youtube-line fs-16"></i></span>
                                            </a>
                                        </div>
                                    @endisset

                                    @if (!is_null($profile->whatsapp))
                                        <div id="twitter">
                                            <a href="{{ $profile->whatsapp ?? '#' }}" target="_blank"
                                                id="whatsapp"><span class="avatar avatar-md bg-primary"><i
                                                        class="ri-whatsapp-line fs-16"></i></span></a>
                                        </div>
                                    @endisset
                                    @if (!is_null($profile->instagram))
                                        <div>
                                            <a href="{{ $profile->instagram ?? '#' }}" target="_blank"
                                                id="instagram">
                                                <span class="avatar avatar-md bg-danger"><i
                                                        class="ri-instagram-line fs-16"></i></span>
                                            </a>
                                        </div>
                                    @endisset

                                    @if (!is_null($profile->linkedin))
                                        <div>
                                            <a href="{{ $profile->linkedin ?? '#' }}" target="_blank"
                                                id="linkedin">
                                                <span class="avatar avatar-md bg-primary2"><i
                                                        class="ri-linkedin-line fs-16"></i></span>
                                            </a>
                                        </div>
                                    @endisset

        </div>
        <div class="p-3 pb-1 d-flex flex-wrap justify-content-between">
            <div class="fw-medium fs-15 text-primary1">
                Basic Info :

            </div>
        </div>
        <div class="card-body border-bottom border-block-end-dashed p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item pt-2 border-0">
                    <div><span
                            class="avatar avatar-sm avatar-rounded text-primary p-1 bg-primary-transparent me-2">
                            <i class="ri-user-line align-middle fs-15"></i>
                        </span>
                        <span class="text-muted"
                            id="username">{{ auth()->user()->username ?? 'N/A' }}</span>
                    </div>
                </li>


                <li class="list-group-item pt-2 border-0">
                    <div><span
                            class="avatar avatar-sm avatar-rounded text-primary p-1 bg-primary-transparent me-2">
                            <i class="ri-mail-line align-middle fs-15"></i>
                        </span><span class="text-muted"
                            id="email">{{ auth()->user()->email ?? 'admin@example.com' }}</span>
                    </div>
                </li>
                <li class="list-group-item pt-2 border-0">
                    <div> <span
                            class="avatar avatar-sm avatar-rounded text-primary3 p-1 bg-primary3-transparent me-2">
                            <i class="ri-phone-line align-middle fs-15"></i>
                        </span><span class="text-muted" id="phone">
                            {{ $profile->phone ?? '+977-1 123 139' }}</span></div>
                </li>
                <li class="list-group-item pt-2 border-0">
                    <div> <span
                            class="avatar avatar-sm avatar-rounded text-primary3 p-1 bg-primary3-transparent me-2">
                            <i class="ri-home-line align-middle fs-15"></i>
                        </span><span class="text-muted" id="website">
                            {{ $profile->website ?? 'https://example.com' }}</span></div>
                </li>

            </ul>
        </div>


    </div>
</div>
<div class="col-xl-9">
    <div class="card custom-card overflow-hidden border">
        <div class="card-body">
            <ul class="nav nav-tabs tab-style-6 mb-3 p-0" id="myTab" role="tablist">
                <li class="nav-item text-start" role="presentation">
                    <button class="nav-link active w-100 text-start" id="edit-profile-tab"
                        data-bs-toggle="tab" data-bs-target="#edit-profile-tab-pane" type="button"
                        role="tab" aria-controls="edit-profile-tab-pane"
                        aria-selected="true">Edit Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link w-100 " id="profile-about-tab" data-bs-toggle="tab"
                        data-bs-target="#profile-about-tab-pane" type="button" role="tab"
                        aria-controls="profile-about-tab-pane" aria-selected="true">Change
                        Password</button>
                </li>

            </ul>
            <div class="tab-content" id="profile-tabs">
                <div class="tab-pane p-0 border-0" id="profile-about-tab-pane" role="tabpanel"
                    aria-labelledby="profile-about-tab" tabindex="0">

                    <ul class="list-group list-group-flush border rounded-3">

                        <form action="{{ route('admin.update_password') }}" method="POST"
                            enctype="multipart/form-data" class="main_form">
                            @csrf
                            <li class="list-group-item p-3">
                                <span class="fw-medium fs-15 d-block mb-3">Reset Password :</span>
                                <div class="row gy-3 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Old Password :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="old_password"
                                            class="form-control" value=""
                                            placeholder="Old password">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">New Password :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="password" name="new_password"
                                            class="form-control" value=""
                                            placeholder="New Password">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Confirm Password :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="password" name="confirm_password"
                                            class="form-control" value=""
                                            placeholder="Confirm password">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium"> </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <button type="submit" class="btn btn-primary">Update
                                            Password</button>
                                    </div>
                                </div>
                            </li>
                        </form>
                </div>
                <div class="tab-pane show active p-0 border-0" id="edit-profile-tab-pane"
                    role="tabpanel" aria-labelledby="edit-profile-tab" tabindex="0">

                    <form action="{{ route($base_route . 'store') }}" method="POST"
                        enctype="multipart/form-data" class="main_form">

                        @csrf
                        <ul class="list-group list-group-flush border rounded-3">
                            <li class="list-group-item p-3">
                                <span class="fw-medium fs-15 d-block mb-3">Personal Info :</span>
                                <div class="row gy-3 align-items-center">

                                    <div class="col-xl-3">
                                        <div class="lh-3">
                                            <span class="fw-medium mt-3">Profile Image :</span>
                                            <span class="avatar avatar-m avatar-rounded float-end">
                                                @if ($profile && $profile->image)
                                                    <img src="{{ asset($img_path . $profile->image) }}"
                                                        alt="Profile Image" class="profileImage">
                                                @else
                                                    <img src="{{ asset('backend/assets/images/faces/11.jpg') }}"
                                                        alt="">
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="file" name="image" id="image"
                                            hidden>
                                        <label for="image"
                                            class="btn btn-secondary btn-sm btn-wave waves-effect waves-light">
                                            Upload Image
                                        </label>

                                        <span id="fileName" class="ms-2 text-muted"> </span>
                                        <button type="submit"
                                            class="btn btn-sm btn-primary btn-wave waves-effect waves-light"><i
                                                class="ri-upload-2-line me-1"></i>Change
                                            Image</button>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">User Name :</span>

                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="username"
                                            class="form-control"
                                            value="{{ isset(auth()->user()->username) ? auth()->user()->username : old('username') }}">
                                        <div class="text-danger">{{ $errors->first('username') }}
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Full Name :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ isset(auth()->user()?->name) ? auth()->user()?->name : old('name') }}">

                                    </div>

                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Email :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="email" name="email" class="form-control"
                                            readonly
                                            value="{{ isset(auth()->user()?->email) ? auth()->user()?->email : old('email') }}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <span class="fw-medium fs-15 d-block mb-3">Contact Info :</span>
                                <div class="row gy-3 align-items-center">

                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Phone :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ isset($profile->phone) ? $profile->phone : old('phone') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Website :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="website" class="form-control"
                                            value="{{ isset($profile->website) ? $profile->website : old('website') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Address :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ isset($profile->address) ? $profile->address : old('address') }}">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item p-3">
                                <span class="fw-medium fs-15 d-block mb-3">Social Info :</span>
                                <div class="row gy-3 align-items-center">
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Github :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="github" class="form-control"
                                            value="{{ isset($profile->github) ? $profile->github : old('github') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Facebook :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="facebook"
                                            class="form-control"
                                            value="{{ isset($profile->facebook) ? $profile->facebook : old('facebook') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Twitter :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="twitter" class="form-control"
                                            value="{{ isset($profile->twitter) ? $profile->twitter : old('twitter') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Youtube :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="youtube" class="form-control"
                                            value="{{ isset($profile->youtube) ? $profile->youtube : old('youtube') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Linkedin :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="linkedin"
                                            class="form-control"
                                            value="{{ isset($profile->linkedin) ? $profile->linkedin : old('linkedin') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">WhatsApp :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="whatsapp"
                                            class="form-control"
                                            value="{{ isset($profile->whatsapp) ? $profile->whatsapp : old('whatsapp') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Viber :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" name="viber" class="form-control"
                                            value="{{ isset($profile->viber) ? $profile->viber : old('viber') }}">
                                    </div>
                                    <div class="col-xl-3">
                                        <div class="lh-1">
                                            <span class="fw-medium">Instagram :</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control"
                                            name="instagram"
                                            value="{{ isset($profile->instagram) ? $profile->instagram : old('instagram') }}">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end p-3">
                                    <button type="submit" class="btn btn-danger">Update
                                        Profile</button>
                                </div>
                    </form>

                </div>
                </li>

                </ul>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@push('js')
<script>
    // $(document).ready(function() {

    //     $.ajax({
    //         url: {{ route('admin.profile.index') }},
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function(res) {

    //             if (res.profile) {
    //                 let profile = res.profile;

    //                 // $('#username').text(profile.username ?? '');
    //                 // $('#phone').text(profile.phone ?? '');
    //                 // $('#website').text(profile.website ?? '');
    //                 // $('#address').text(profile.address ?? '');
    //                 // $('#github').text(profile.github ?? '');
    //                 // $('#facebook').text(profile.facebook ?? '');
    //                 // $('#twitter').text(profile.twitter ?? '');
    //                 // $('#youtube').text(profile.youtube ?? '');
    //                 // $('#linkedin').text(profile.linkedin ?? '');
    //                 // $('#whatsapp').text(profile.whatsapp ?? '');
    //                 // $('#viber').text(profile.viber ?? '');
    //                 // $('#instagram').text(profile.instagram ?? '');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(error);
    //         }
    //     });

    // });

    function updateData(res) {
        let profile = res.profile;

        $('#name').text(profile.user.name ?? '');
        $('#username').text(profile.user.username ?? '');
        $('#phone').text(profile.phone ?? '');
        $('#website').text(profile.website ?? '');
        $('#address').text(profile.address ?? '');

        // Social Links 
        $('#github').attr('href', profile.github ?? '#');
        $('#facebook').attr('href', profile.facebook ?? '#');
        $('#twitter').attr('href', profile.twitter ?? '#');
        $('#youtube').attr('href', profile.youtube ?? '#');
        $('#linkedin').attr('href', profile.linkedin ?? '#');
        $('#whatsapp').attr('href', profile.whatsapp ?? '#');
        $('#viber').attr('href', profile.viber ?? '#');
        $('#instagram').attr('href', profile.instagram ?? '#');

        // ✅ Profile Image
        if (profile.image) {
            $('.profileImage').attr('src', res.image_path + profile.image);
        } else {
            $('.profileImage').attr('src', '/dummy_image.jpg');
        }
    }
</script>
@endpush
