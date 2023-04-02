@extends('students.base')

@section('studentContent')
    <div class="bg-white p-3 shadow-sm rounded-sm mt-3">
        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
            <span clas="text-green-500">
                <i class='bx bx-credit-card' ></i>
            </span>
            <span class="tracking-wide">Fees Details </span>
        </div>

        <div class="w-full">
            <livewire:show-due/>
        </div>

    </div>
@endsection
