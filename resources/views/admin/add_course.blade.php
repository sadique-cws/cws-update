@extends('layouts.base')
@section('page_title',' | Dashboard')
@section('add_course','mm-active')
@section('content')

<style>
    label{
        font-weight: bold
    }
</style>
    <div class="container">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent">
                <h5>Add Course</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.add.course') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="flag" value="1">
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control rounded shadow-sm">
                        @error('title')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <label for="duration">Duration</label>
                            <input type="text" name="duration" value="{{ old('duration') }}" id="duration" class="form-control rounded shadow-sm">
                            @error('duration')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-2">
                            <label for="fee">Fee</label>
                            <input type="text" name="fee" value="{{ old('fee') }}" id="fee" class="form-control rounded shadow-sm">
                            @error('fee')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-2">
                            <label for="d_fee">Discount Fee</label>
                            <input type="text" name="discount_fee" value="{{ old('discount_fee') }}" id="d_fee" class="form-control rounded shadow-sm">
                            @error('discount_fee')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3 col-lg-4">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" name="cover_image" value="{{ old('cover_image') }}" id="cover_image" class="form-control rounded shadow-sm">
                            @error('cover_image')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                   <div class="mb-3">
                       <label for="description">Description</label>
                       <textarea name="description" id="description" cols="30" rows="6" class="form-control"></textarea>
                       @error('description')
                            <p class="small text-danger">{{ $message }}</p>
                        @enderror
                   </div>
                   <div class="mb-3">
                       <button class="btn btn-dark w-100">Add</button>
                   </div>
                </form>
            </div>
        </div>
    </div>
@endsection
