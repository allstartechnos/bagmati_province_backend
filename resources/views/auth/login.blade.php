<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="card custom-card my-4">
                    <div class="card-body p-5 shadow-lg">
                        <div class="mb-4 d-flex justify-content-center">
                            <a href="/">
                                <img src="{{ asset('images/setting/' . $setting->logo) }}" alt="logo"
                                    class="img-fluid" style="max-width: 120px;" style="object-fit: contain">
                                <img src="assets/images/brand-logos/desktop-white.png" alt="logo"
                                    class="desktop-white">
                            </a>
                        </div>


                        <p class="h5 mb-2 text-center">Sign In</p>
                        <p class="mb-4 text-muted op-7 fw-normal text-center">{{ auth()->user()?->name ?? '' }}</p>

                        <form method="POST" action="{{ route('login') }}" class="main_form">
                            @csrf
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="signin-username" class="form-label text-default">User Name<sup
                                            class="fs-12 text-danger">*</sup></label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="signin-email"
                                        placeholder="user name" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="signin-password" class="form-label text-default d-block ">Password<sup
                                            class="fs-12 text-danger">*</sup>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="float-end fw-normal text-muted">Forget password ?</a>
                                        @endif
                                    </label>

                                    <div class="position-relative">
                                        <input type="password" name="password"
                                            class="form-control create-password-input @error('password') is-invalid @enderror"
                                            id="signin-password" placeholder="password" required>
                                        <a href="javascript:void(0);" class="show-password-button text-muted"
                                            onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></a>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2">

                                    </div>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                        <div class="btn-list text-center mt-4">

                            @isset($setting->facebook)
                                <a href="{{ $setting->facebook }}" class="btn btn-icon btn-wave btn-primary-light"
                                    target="_blank">
                                    <i class="ri-facebook-line lh-1 align-center fs-17"></i>
                                </a>
                            @endisset
                            @isset($setting->instagram)
                                <a href="{{ $setting->instagram }}" class="btn btn-icon btn-wave btn-primary2-light"
                                    target="_blank">
                                    <i class="ri-instagram-line lh-1 align-center fs-17"></i>
                                </a>
                            @endisset
                            @isset($setting->twitter)
                                <a href="{{ $setting->twitter }}" class="btn btn-icon btn-wave btn-primary1-light"
                                    target="_blank">
                                    <i class="ri-twitter-x-line lh-1 align-center fs-17"></i>
                                </a>
                            @endisset
                            @isset($setting->youtube)
                                <a href="{{ $setting->youtube }}" class="btn btn-icon btn-wave btn-primary1-light"
                                    target="_blank">
                                    <i class="ri-youtube-line lh-1 align-center fs-17"></i>
                                </a>
                            @endisset

                            @isset($setting->linkedin)
                                <a href="{{ $setting->linkedin }}" class="btn btn-icon btn-wave btn-primary1-light"
                                    target="_blank">
                                    <i class="ri-linkedin-line lh-1 align-center fs-17"></i>
                                </a>
                                </li>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
