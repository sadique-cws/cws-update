@extends('public.base')


@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col mx-auto my-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="fs-2">Student Login</h2>
                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf
                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email"
                                class="form-control"
                                type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password"
                                class="form-control"
                                type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mb-3">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="d-flex items-content-center flex-column mt-2">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-secondary "
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-button class="btn btn-success w-100 mt-2">
                                {{ __('Log in') }}
                            </x-button>
                        </div>
                    </form>

                    <div class="flex-grow-1 mt-2">
                        @if (session()->has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}</div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
