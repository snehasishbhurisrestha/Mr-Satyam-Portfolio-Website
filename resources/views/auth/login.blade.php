<x-guest-layout>
    @section('title','Login')
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="mt-4" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <x-input-label class="form-label" for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <form method="POST" class="mt-4" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email" style="color:#fff !important;">Email</label>
            <input type="text" class="form-control" type="email" id="email" value="{{ old('email') }}" name="email" placeholder="Enter Email" required autofocus autocomplete="username">
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger"  />
        </div>


        <div class="mb-3">
            <label class="form-label" for="password" style="color:#fff !important;">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required autocomplete="current-password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- <div class="mb-3 row">
            <div class="col-sm-6 text-center">
                <button class="btn btn-primary w-md waves-effect waves-light btn-grad" type="submit">Log In</button>
            </div>
         
        </div> --}}
        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-primary w-md waves-effect waves-light btn-grad" type="submit">Log In</button>
        </div>
        @if (Route::has('password.request'))
        {{-- <div class="mb-3 mt-2 mb-0 row">
            <div class="col-12 mt-3">
                <a href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
            </div>
        </div> --}}
        @endif
    </form>
</x-guest-layout>
