<x-guest-layout>
    <div class="login__form--holder">
        <div class="login__form">
            <div class="d-flex justify-content-center mb-4">
                <a href="{{ route('frontend.index') }}">
                    <div class="logo mt-3">
                        <img src="{{ asset('images/setting/' . $setting->logo) }}" width="100%" height="100%"
                            alt="">
                    </div>
                </a>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <label>
                    <label for="email" :value="__('Email')"></label>
                    <input id="email" class="form-control" type="email" name="email"
                        @error('email') is-invalid @enderror value="" required autofocus placeholder="Email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
            </form>
        </div>


    </div>
    </div>
</x-guest-layout>
