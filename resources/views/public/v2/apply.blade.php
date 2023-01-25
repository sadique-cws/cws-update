@extends('public.v2.base')
@section('css')
    <style>
        label{
            font-weight:500
        }
    </style>
@endsection
@section('content')
<div class="row my-5 ">
    <div class="col-lg-5 col-md-6 d-lg-block d-none pt-5">
        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_qfkr9cgr.json"  background="rgba(0, 0, 0, 0)"  speed="1"  style="width: 500px; height: 500px;"    autoplay></lottie-player>
    </div>
    <div class="col-lg-7 p-lg-3 col-md-10 mx-lg-0 mx-auto">
        <div class="card bg-transparent appy-div border-0">
            <div class="card-header border-0 bg-transparent">
                <h5 class="text-theme">Apply for Addmission</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('apply.addmission') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="flag" value="0">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control rounded shadow-sm">
                        @error('name')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="mother_name">Mother Name</label>
                            <input type="text" name="mother_name" value="{{ old('mother_name') }}" id="mother_name" class="form-control rounded shadow-sm">
                            @error('mother_name')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="father_name">Father Name</label>
                            <input type="text" name="father_name" value="{{ old('father_name') }}" id="father_name" class="form-control rounded shadow-sm">
                            @error('father_name')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                   <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="contact">Contact</label>
                            <input type="number" name="contact" value="{{ old('contact') }}" id="contact" class="form-control rounded shadow-sm">
                            @error('contact')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control rounded shadow-sm">
                            @error('email')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                   </div>
                   <div class="row mb-3">
                        <div class="col-lg-4 col-md-3 col-6">
                            <label for="education">Education</label>
                            <input type="text" name="education" value="{{ old('education') }}" class="form-control shadow-sm" id="eductaion">
                            @error('education')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-3 col-6">
                            <label for="dob">Date of Birth</label>
                            <input type="date"  name="dob" value="{{ old('dob') }}"  class="form-control shadow-sm" id="dob">
                            @error('dob')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <label for="education">Gender</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="" selected hidden disabled></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            @error('gender')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                   </div>
                   <div class="mb-3">
                       <label for="address">Address</label>
                       <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ old('address') }}</textarea>
                       @error('address')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                   <div class="mb-3">
                       <button class="btn btn-apply w-100">Add</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
