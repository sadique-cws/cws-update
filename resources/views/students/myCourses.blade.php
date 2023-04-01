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
            <span class="tracking-wide">My Courses</span>
        </div>

        <div class="w-full">
            <ul>
                @forelse ($courses as $item)
                    <li
                        class="flex my-2 justify-between m-h bg-slate-100 border border-green-500 rounded-md items-center ">
                        <div class="flex flex-col  p-3">
                            @if ($item->type == 0)
                                <div class="text-teal-600 truncate">{{ $item->course->title }}</div>
                                <div>
                                    <span class="text-teal-800 font-semibold">₹{{$item->course->getPaidAmount()}} X {{$item->course->duration}} Months</span>
                                    <span class="text-gray-500 text-xs">(Duration: {{$item->course->duration}} Months)</span>
                                </div>
                        </div>
                    @else
                        <div class="text-teal-600">{{ $item->course->title }}</div>
                        <div>
                            <span
                                class="text-teal-800 font-semibold">₹{{ $item->course->discount_fee }}</span>
                            <del class="text-gray-500 text-xs">₹{{ $item->course->fee }}/-</del>
                        </div>
                    </li>
                    @endif

                    @endforeach
            </ul>
        </div>

    </div>
@endsection
