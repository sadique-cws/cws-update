@extends('public.v2.base')
@section('css')
    <style>
        label{
            font-weight:500
        }
    </style>
@endsection
@section('content')
<div class="my-5 flex w-10/12 mx-auto justify-center">
    <div class="w-5/12 pt-5 flex justify-center">
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qfkr9cgr.json"  background="rgba(0, 0, 0, 0)"  speed="1"  style="width: 500px; height: 500px;"    autoplay></lottie-player>
    </div>
    <div class="w-7/12 ">
        <div class="bg-white border  rounded-lg shadow">
            <div class="p-3 bg-transparent">
                <h5 class="text-theme font-semibold text-4xl">Apply for Admission</h5>
            </div>
            <div class="p-3">
                <form action="{{ route('register') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="flag" value="0">
                    <div class="mb-3 flex flex-col">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="rounded border shadow border-slate-400 px-3 py-2" placeholder="E.g Sadique Hussain">
                        @error('name')
                            <p class="text-xs  text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-center gap-3">
                        <div class="mb-3 flex flex-col flex-1">
                            <label class="" for="mother_name">Mother Name</label>
                            <input type="text" name="mother_name" value="{{ old('mother_name') }}" id="mother_name" class="rounded border shadow border-slate-400 px-3 py-2">
                            @error('mother_name')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="father_name">Father Name</label>
                            <input type="text" name="father_name" value="{{ old('father_name') }}" id="father_name" class="rounded border shadow border-slate-400 px-3 py-2">
                            @error('father_name')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                   <div class="flex gap-3">
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="contact">Contact</label>
                            <input type="number" name="contact" placeholder="Enter without +91" value="{{ old('contact') }}" id="contact" class="rounded border shadow border-slate-400 px-3 py-2" >
                            @error('contact')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="E.g someone@example.com" id="email" class="rounded border shadow border-slate-400 px-3 py-2">
                            @error('email')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                   </div>
                   <div class="flex mb-3 gap-3">
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="education">Education</label>
                            <input type="text" name="education" placeholder="E.g BCA, BTech, MCA etc" value="{{ old('education') }}" class="rounded border shadow border-slate-400 px-3 py-2"  id="eductaion">
                            @error('education')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="dob">Date of Birth</label>
                            <input type="date"  name="dob" value="{{ old('dob') }}"  class="rounded border shadow border-slate-400 px-3 py-1.5" id="dob">
                            @error('dob')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="education">Gender</label>
                            <select name="gender" id="gender" class="rounded border shadow border-slate-400 px-3 py-2">
                                <option value="" selected hidden disabled>Choose Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div> 
                   </div>
                   <div class="mb-3 flex flex-col">
                       <label for="address">Address</label>
                       <textarea name="address" placeholder="Write Address details" id="address" cols="30" rows="3" class="rounded border shadow border-slate-400 px-3 py-2">{{ old('address') }}</textarea>
                       @error('address')
                            <p class="text-xs  text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-center gap-3">
                        <div class="mb-3 flex flex-col flex-1">
                            <label class="" for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" id="password" class="rounded border shadow border-slate-400 px-3 py-2" placeholder="Must be 5 character length">
                            @error('password')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 flex flex-col flex-1">
                            <label for="password_confirmation">Confirm password</label>
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="rounded border shadow border-slate-400 px-3 py-2" placeholder="ReEnter Password">
                            @error('password_confirmation')
                                <p class="text-xs  text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                   <div class="flex justify-end">
                       <button class="flex-1 bg-teal-700 text-white px-3 py-2 rounded hover:bg-teal-900">Add</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

@endsection
