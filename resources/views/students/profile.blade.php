@extends('students.studentBase')

@section('studentContent')
<div class="bg-white p-3 shadow-sm rounded-sm">
    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
        <span clas="text-green-500">
            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </span>
        <span class="tracking-wide">About</span>
    </div>


    <div class="text-gray-700">
        <div class="grid md:grid-cols-2 text-sm">
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">First Name</div>
                @php
                    $name = explode(' ', auth()->user()->name);
                @endphp
                <div class="px-4 py-2">{{ $name[0] }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Last Name</div>
                <div class="px-4 py-2">@if (count($name) > 1)  {{$name[1]}}  @endif</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Gender</div>
                <div class="px-4 py-2">{{ auth()->user()->gender }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Contact No.</div>
                <div class="px-4 py-2">{{ auth()->user()->contact }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Current Address</div>
                <div class="px-4 py-2">{{ auth()->user()->address }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Permanant Address</div>
                <div class="px-4 py-2">{{ auth()->user()->address }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Email.</div>
                <div class="px-4 py-2">
                    <a class="text-blue-800 text-xs"
                        href="{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Birthday</div>
                <div class="px-4 py-2">{{ date('d M Y', strtotime(auth()->user()->dob)) }}</div>
            </div>
        </div>
    </div>

</div>

<!-- end of post area -->

<!-- calling post -->


<div class="flex gap-3">
    <div class="bg-white p-3 shadow-sm rounded-sm mt-3 w-1/2">
        <div>
            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                <span clas="text-green-500">
                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path fill="#fff"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </span>
                <span class="tracking-wide">Your Course</span>
            </div>
            <ul>
                @forelse ($courses as $item)
                    <li
                        class="flex justify-between bg-slate-100 border border-green-500 rounded-md items-center ">
                        <div class="flex flex-col  p-3">
                            @if ($item->type == 0)
                                <div class="text-teal-600 truncate">{{ $item->course->title }}</div>
                                <div>
                                    <span class="text-teal-800 font-semibold">₹{{$item->monthly_fee}}</span>
                                    <span class="text-gray-500 text-xs">(Monthly)</span>
                                </div>
                        </div>
                    @else
                        <div class="text-teal-600">{{ $item->course->title }}</div>
                        <div>
                            <span
                                class="text-teal-800 font-semibold">₹{{ $item->course->discount_fee }}</span>
                            <del class="text-gray-500 text-xs">₹{{ $item->course->fee }}</del>
                        </div>
        </div>
        @endif
        </li>
    @empty
        <p>Not Subscribe any course </p>
        @endforelse

        </ul>
    </div>
</div>
<div class="bg-white p-3 shadow-sm rounded-sm mt-3 w-1/2">
    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
        <span clas="text-green-500">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>

        </span>
        <span class="tracking-wide">Your Cart </span>
    </div>
    <ul class="list-inside space-y-2">

        @forelse ($pendingCourses as $item)
            <li class="flex justify-between bg-slate-100 border border-red-300 rounded-md items-center ">
                    <div class="flex flex-col  p-3">
                        <div class="text-teal-600">{{ $item->course->title }}</div>
                        <div>
                            @if ($item->type == 0)
                                <span class="text-teal-800 font-semibold">₹700</span>
                                <span class="text-gray-500 text-xs">(Monthly)</span>
                            @else
                                <span
                                class="text-teal-800 font-semibold">₹{{ $item->course->discount_fee }}</span>
                                <del class="text-gray-500 text-xs">₹{{ $item->course->fee }}</del>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('paytm.payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="@if($item->type==1){{ $item->course->discount_fee }} @else {{$item->monthly_fee}} @endif">
                        <input type="hidden" name="payment_id"   value="{{$item->id}}">
                        <input type="hidden" name="contact" value="{{ auth()->user()->contact }}">
                        <button type="submit"
                        class="bg-red-400 text-white hover:bg-red-500 shadow-lg rounded-l-xl py-3 px-2">Pay
                            Online</button>
                    </form>
            </li>
        @empty
            <p>Not Yet Course</p>
        @endforelse
    </ul>
</div>

</div>
<div class="bg-white p-3 shadow-sm rounded-sm mt-3">
<div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
    <span clas="text-green-500">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 8.25H9m6 3H9m3 6l-3-3h1.5a3 3 0 100-6M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>


    </span>
    <span class="tracking-wide">Due Fees </span>
</div>

</div>
@endsection
