@extends('public.v2.base')


@section('content')
    <div class="flex justify-content py-24">
        <div class="w-1/4 shadow border p-4 mx-auto py-5">
            <div class="flex">
                <h2 class="text-2xl font-semibold">Forget Password?</h2>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
            
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />
            
                    <x-input id="email" class="border border-slate-400 px-3 py-2 focus:outline-none shadow mt-1 w-full"  type="email" name="email" :value="old('email')" required autofocus />
                </div>
            
                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
