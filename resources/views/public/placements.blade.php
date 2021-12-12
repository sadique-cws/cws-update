@extends('layouts.publicBase')
@section('content')
    <div class="container mt-4">
        <div class="row">
            @foreach ($placements as $placement)
            <div class="col-lg-3">
                <div class="card border-0 " style="border-radius:1rem">
                    <div class="card-body">
                        <img src="{{ asset('images/placement/'.$placement->image) }}" style="border-radius:1rem" alt=" no image" class="card-img-top">
                        <div class="mt-3">
                            <h4 class="h3">{{ $placement->name }}</h4>
                            <p class="p text-muted">{{ $placement->role }} <br> @ {{ $placement->company_name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
