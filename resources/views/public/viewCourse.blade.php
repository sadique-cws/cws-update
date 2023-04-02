@extends('public.base')

@section('css')
    @livewireStyles
@endsection
@section('content')
    <livewire:course-view :course="$course"/>
@endsection


@section('js')
    @livewireScripts
@endsection