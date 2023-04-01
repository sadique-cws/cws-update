@extends('public.v2.base')
@section('content')
    <div class="flex justify-content py-24">
        <div class="w-1/4 shadow border p-4 mx-auto py-5">
            <div class="flex">
                <h2 class="text-2xl font-semibold">Reset Password</h2>
            </div> 
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="hidden">
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="border border-slate-400 px-3 py-2 focus:outline-none shadow mt-1 w-full"
                        type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="border border-slate-400 px-3 py-2 focus:outline-none shadow mt-1 w-full"
                        type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation"
                        class="border border-slate-400 px-3 py-2 focus:outline-none shadow mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
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
