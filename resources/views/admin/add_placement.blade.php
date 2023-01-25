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
                            <input type="text" name="company_name" value="{{ old('company_name') }}" id="mother_name" class="form-control rounded shadow-sm">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="father_name">Job Role</label>
                            <input type="text" name="job_role" value="{{ old('job_role') }}" id="father_name" class="form-control rounded shadow-sm">
                        </div>
                    </div>
                  
                   <div class="row mb-3">
                        <div class="col-lg-4">
                            <label for="image">Image</label>
                            <input type="file" name="image" value="{{ old('image') }}" class="form-control shadow-sm" id="image">
                        </div>
                        <div class="col-lg-4">
                            <label for="dob">Joining Date</label>
                            <input type="date"  name="joining_date" value="{{ old('joining_date') }}"  class="form-control shadow-sm">
                        </div>
                        <div class="col-lg-4">
                            <label for="type">Job Type</label>
                            <select name="job_type" value="{{ old('job_type') }}"  class="form-control shadow-sm" id="type">
                                    <option>Part Time</option>
                                    <option>Full Time</option>
                                    <option>Remote</option>
                                    <option>Intership</option>
                                    <option>Founder</option>
                            </select>
                        </div>
                   </div>
                   <div class="mb-3">
                       <label for="address">Description</label>
                       <textarea name="description" id="description" cols="30" rows="6" class="form-control">{{old('description')}}</textarea>
                   </div>
                   <div class="mb-3">
                       <button class="btn btn-dark w-100">Add</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
@endsection
