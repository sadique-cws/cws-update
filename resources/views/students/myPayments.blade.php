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

        <table class="table-auto w-full text-sm">
            <thead>
                <tr>
                    <th class="px-1 py-2 border">#id</th>
                    <th class="px-1 py-2 border">Month</th>
                    <th class="px-1 py-2 border">Amount</th>
                    <th class="px-1 py-2 border">Due Date</th>
                    <th class="px-1 py-2 border">Mode</th>
                    <th class="px-1 py-2 border">Date of Payment</th>
                    <th class="px-1 py-2 border">Status</th>
                </tr>

            </thead>
            <tbody class="text-center">
                @forelse ($payments as $pay)
                    <tr>
                        <td class="px-1 py-2 border">{{ $pay->id }}</td>
                        <td class="px-1 py-2 border">{{ date('M Y', strtotime($pay->dues_month)) }}</td>
                        <td class="px-1 py-2 border">₹{{ $pay->amount }}</td>
                        <td class="px-1 py-2 border">{{ date('d M Y', strtotime($pay->dues_month)) }}</td>
                        <td class="px-1 py-2 border">{{ $pay->payment_mode }}</td>
                        <td class="px-1 py-2 border">{{ date('d M Y h:i A', strtotime($pay->updated_at)) }}</td>
                        <td class="px-1 py-2 border">
                            @if ($pay->status == 'dues')
                                <form action="{{ route('paytm.payment') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="amount" value="{{ $pay->amount }}">
                                    <input type="hidden" name="payment_id" value="{{ $pay->id }}">
                                    <input type="hidden" name="contact" value="{{ auth()->user()->contact }}">
                                    <button type="submit"
                                        class="bg-orange-600 text-white px-2 py-1 rounded hover:bg-orange-500">Pay
                                        Online</button>
                                </form>
                            @else
                                <span class="flex gap-3 justify-center">
                                    <a href="{{ route('generate.pdf',['payment_id'=>$pay->id]) }}"
                                        class="bg-gray-600 px-2 py-1 rounded-md text-xs capitalize text-white flex items-center ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                        <span>Reciept</span>
                                    </a>
                                </span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <th colspan="10">
                            <h2 class="mt-3 text-md text-red-500 capitalize text-left">Not Found any fee details</h2>
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
