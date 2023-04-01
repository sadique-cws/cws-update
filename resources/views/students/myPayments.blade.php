@extends('students.studentBase')

@section('studentContent')
    <div class="bg-white p-3 shadow-sm rounded-sm mt-3">
        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
            <span clas="text-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 8.25H9m6 3H9m3 6l-3-3h1.5a3 3 0 100-6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <span class="tracking-wide">Fees Details </span>
        </div>

        <div class="w-full">
            <livewire:show-due/>
        </div>

    </div>
@endsection
