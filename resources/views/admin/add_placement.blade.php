@extends('layouts.base')
@section('page_title',' | Dashboard')
@section('placements','mm-active')
@section('content')

<style>
    label{
        font-weight: bold
    }
</style>
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent">
                <h5>Add Student Placements</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('store.placement') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control rounded shadow-sm">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="mother_name">Company Name</label>
                            <input type="text" name="company_name" value="{{ old('mother_name') }}" id="mother_name" class="form-control rounded shadow-sm">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="father_name">Job Role</label>
                            <input type="text" name="job_role" value="{{ old('father_name') }}" id="father_name" class="form-control rounded shadow-sm">
                        </div>
                    </div>
                   {{-- <div class="row">
                        <div class="mb-3 col-lg-6">
                            <label for="contact">Contact</label>
                            <input type="number" name="contact" value="{{ old('contact') }}" id="contact" class="form-control rounded shadow-sm">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control rounded shadow-sm">
                        </div>
                   </div> --}}
                   <div class="row mb-3">
                        <div class="col">
                            <label for="image">Image</label>
                            <input type="file" name="image" value="{{ old('image') }}" class="form-control shadow-sm" id="image">
                        </div>
                        <div class="col">
                            <label for="dob">Joining Date</label>
                            <input type="date"  name="joining_date" value="{{ old('dob') }}"  class="form-control shadow-sm" id="dob">
                        </div>
                   </div>
                   <div class="mb-3">
                       <label for="address">Description</label>
                       <textarea name="address" id="description" cols="30" rows="6" class="form-control"></textarea>
                   </div>
                   <div class="mb-3">
                       <button class="btn btn-dark w-100">Add</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
@endsection
