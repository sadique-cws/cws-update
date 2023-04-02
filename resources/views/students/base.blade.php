@extends('public.base')
@section('sidebar')
    @include("students.studentSidebar")
    
@endsection
@section('content')
    <div class="container">
            @section('studentContent')
                @show
    </div>
@endsection
