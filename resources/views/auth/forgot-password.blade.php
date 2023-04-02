@extends('public.base')


@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col mx-auto my-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="fs-2 h4">Forget Password?</h2>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="form-control" placeholder="Enter registered email" type="email"
                                name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="btn btn-info w-100">
                                {{ __('Email Password Reset Link') }}
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
