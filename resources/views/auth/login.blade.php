@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto p-4">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-center text-xl font-bold mb-4">{{ __('Login') }}</div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
{{--                <div class="mb-4 flex items-center">--}}
{{--                    <input id="remember" type="checkbox" class="form-checkbox h-4 w-4 text-blue-500" name="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                    <label for="remember" class="ml-2 text-sm text-gray-600">{{ __('Remember Me') }}</label>--}}
{{--                </div>--}}

                <!-- Submit and Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        {{ __('Login') }}
                    </button>

{{--                    @if (Route::has('password.request'))--}}
{{--                        <a class="text-sm text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">--}}
{{--                            {{ __('Forgot Your Password?') }}--}}
{{--                        </a>--}}
{{--                    @endif--}}
                </div>
            </form>
        </div>
    </div>
@endsection
