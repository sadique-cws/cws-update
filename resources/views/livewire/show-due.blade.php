
<div>
    @if (count($payments))
    <table class="w-full">
        <thead class="table-light">
            <tr>
                <th class="border">ID</th>
                <th class="border">Course Name</th>
                <th class="border">Due Date</th>
                <th class="border">Status</th>
                <th class="border">Amount</th>
                <th class="border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $dues)
            <tr class="@if($dues->student->status==3) bg-warning @endif">
                <td class="border">{{ $dues->ORDERID }}</td>
                <td class="border">{{ $dues->studentCourse->course->title }}</td>
                <td class="border text-center">
                    @if ($dues->STATUS == "TXN_SUCCESS")
                        <span class="bg-green-400 text-white px-3 rounded">Paid</span>
                    @else
                        <span class="bg-red-400 text-white px-3 rounded">Due</span>
                    @endif
                </td>
                <td class="border"> {{date("d M Y",strtotime($dues->due_date))}}</td>
                <td class="border">₹ {{ round($dues->TXNAMOUNT) }}</td>
                <td class="border">
                    <div class="flex d-print-none">
                        @if ($dues->STATUS != "TXN_SUCCESS")
                        <form action="{{ route('paytm.payment') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $dues->ORDERID }}" name="orderid">
                            <button type="submit"
                            class="bg-green-400 text-white hover:bg-green-500 shadow-lg text-sm  rounded-lg py-1 px-2">Pay
                                Online</button>
                        </form>
                        @endif
                    </div>
                </td>

            </tr>
        
            @endforeach
        </tbody>
    </table>
    @else
    <div class="flex">
        <p class="text-6xl font-bold font-sans text-slate-200">Empty Payment</p>
    </div>
    @endif
   
</div>