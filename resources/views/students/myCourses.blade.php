@extends('students.base')

@section('studentContent')
     <div class="col-12">
            <div class="bg-white p-3 shadow-sm rounded-sm mt-3 border ">
                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                    <span clas="text-green-500">
                        <i class='bx bxs-graduation'></i>
                    </span>
                    <span class="tracking-wide">Your Course @if (count($courses))
                            ({{ count($courses) }})
                        @endif
                    </span>
                </div>
                <ul>
                    @forelse ($courses as $item)
                        <li
                            class="d-flex my-2 justify-between bg-light border border-success rounded-md align-items-center ">
                            <div class="d-flex flex-column p-3">
                                @if ($item->type == 0)
                                    <div class="text-success truncate">{{ $item->course->title }}</div>
                                    <div>
                                        <span class="text-success fw-bold">₹{{ $item->course->getPaidAmount() }} X
                                            {{ $item->course->duration }} Months</span>
                                        <span class="text-muted small">(Total Fees:
                                            ₹{{ $item->course->getPaidAmount() * $item->course->duration }})/-</span>
                                    </div>
                            </div>
                        @else
                            <div class="text-success">{{ $item->course->title }}</div>
                            <div>
                                <span class="text-success fw-bold">₹{{ $item->course->discount_fee }}</span>
                                <del class="text-muted small">₹{{ $item->course->fee }}</del>
                            </div>
            </div>
            @endif
            </li>
        @empty
            <div class="flex">
                <p class="display-1 fw-bold " style="color:#bababa">Empty Course</p>
            </div>
            @endforelse
            </ul>
        </div>

    </div>
@endsection
