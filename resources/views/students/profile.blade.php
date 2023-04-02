@extends('students.base')

@section('studentContent')
    <div class="row">
        <div class="col-12">
            <div class="bg-white p-3 shadow-sm border rounded-sm mt-3">
                <div class="card-header">
                    <span clas="text-green-500">
                        <i class='bx bx-user'></i>
                    </span>
                    <span>About</span>
                </div>
                <div class="card-body p-0 mb-0  table-responsive">
                    <table class="table mt-3">
                        <tr>
                            <td class="fw-bold">First Name</td>
                            @php
                                $name = explode(' ', auth()->user()->name);
                            @endphp
                            <td class="text-muted">{{ $name[0] }}</td>

                            <td class="fw-bold">Last Name</td>
                            <td class="text-muted">
                                @if (count($name) > 1)
                                    {{ $name[1] }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Gender</td>
                            <td class="text-muted">{{ auth()->user()->gender }}</td>
                            <td class="fw-bold">Contact No.</td>
                            <td class="text-muted">{{ auth()->user()->contact }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Current Address</td>
                            <td class="text-muted">{{ auth()->user()->address }}</td>
                            <td class="fw-bold">Permanant Address</td>
                            <td class="text-muted">{{ auth()->user()->address }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email.</td>
                            <td class="text-muted">
                                <a class="text-primary nav-link"
                                    href="{{ auth()->user()->email }}">{{ auth()->user()->email }}</a>
                            </td>
                            <td class="fw-bold">Birthday</td>
                            <td class="text-muted">{{ date('d M Y', strtotime(auth()->user()->dob)) }}</td>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- end of post area -->

    <!-- calling post -->


    <div class="row">
        <div class="col-6 ">
            <div class="bg-white p-3 shadow-sm rounded-sm mt-3 border ">
                <div class="mb-3">
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
        </ul>
        @empty
            <div class="d-flex">
                <p class="display-1 fw-bold " style="color:#bababa">Empty Course</p>
            </div>
            @endforelse
          
        </div>
    </div>
    <div class=" col-6">
        <div class="bg-white p-3 shadow-sm border rounded-sm mt-3">
            <div class=" mb-3">
                <span clas="text-green-500">
                    <i class='bx bx-cart'></i>
                </span>
                <span class="tracking-wide">Your Cart </span>
            </div>
            <ul class="list-inside space-y-2 list-group">

                @forelse ($pendingCourses as $item)
                    <li class="list-group-item list-group-items-action d-flex justify-content-between bg-light rounded-md align-items-center ">
                        <div class="flex flex-col  p-3">
                            <div class="text-teal-600">{{ $item->course->title }}</div>
                            <div>
                                @if ($item->type == 0)
                                    <span class="text-teal-800 font-semibold">{{ $item->course->getPaidAmount() }}</span>
                                    <span class="text-gray-500 text-xs">(Duration: {{ $item->course->duration }}
                                        Months)</span>
                                @else
                                    <span class="text-teal-800 font-semibold">₹{{ $item->course->discount_fee }}</span>
                                    <del class="text-gray-500 text-xs">₹{{ $item->course->fee }}</del>
                                @endif
                            </div>
                        </div>
                        <form action="{{ route('paytm.payment') }}" method="post">
                            @csrf
                            <input type="hidden" name="amount"
                                value="@if ($item->type == 1) {{ $item->course->discount_fee }} @else {{ $item->course->getPaidAmount() }} @endif">
                            <input type="hidden" name="payment_id" value="{{ $item->id }}">
                            <input type="hidden" name="due_date" value="{{ $item->created_at }}">
                            <input type="hidden" name="contact" value="{{ auth()->user()->contact }}">
                            <button type="submit"
                                class="btn btn-danger">Pay
                                Online</button>
                        </form>
                    </li>
                @empty
                <div class="flex">
                    <p class="display-1 fw-bold " style="color:#bababa">Empty Cart</p>
                </div>
                @endforelse
            </ul>
        </div>
    </div>
    </div>
    <div class="bg-white p-3 shadow-sm rounded-sm mt-3 border">
        <div class="">
            <span clas="text-green-500">
                <i class='bx bx-credit-card' ></i>
            </span>
            <span class="tracking-wide">My Payments </span>

            <div class="w-100">
                <livewire:show-due />
            </div>
        </div>

    </div>
@endsection
