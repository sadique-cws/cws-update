@extends('public.v2.base')


@section('content')
    <div class="flex justify-content py-24">
        <div class="w-1/4 shadow border p-4 mx-auto py-5">
            <div class="flex">
                <h2 class="text-2xl font-semibold">Student Login</h2>
            </div>
            <form method="POST" action="{{ route('login') }}" class="mt-3">
                @csrf
        
                <!-- Email Address -->
                <div class="flex flex-col">
                    <x-label for="email" :value="__('Email')" />
        
                    <x-input id="email" class="border border-slate-400 px-3 py-2 focus:outline-none shadow mt-1 w-full" type="email" name="email" :value="old('email')" required
                        autofocus />
                </div>
        
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
        
                    <x-input id="password" class="border border-slate-400 px-3 py-2 focus:outline-none shadow mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>
        
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
        
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
        
                    <x-button class="ml-3">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>

            <div class="flex-1 w-full mt-5">
                @if (session()->has('status'))
                    <div class="bg-green-100 rounded-lg py-5 px-6 mb-4 text-base text-green-700" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700" role="alert">
                            {{ $error }}</div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
@endsection
