@extends('public.v2.base')
@section('content')
<div class="card mt-5 border-0 bg-light" style="border-radius: 16px">
    <div class="card-header text-center border-0 w-75 mx-auto mt-3" style="border-radius: 16px; font-weight:500">Pay Outstanding Fee</div>
    <div class="card-body ">
        <form method="GET" action="{{ route('get.dues') }}">
        <div class=" border w-100 d-flex p-1 bg-white" style="border-radius: 16px">
            <div class="p-2 justify-content-center align-items-center text-white" style="border-radius: 13px;font-weight:500 ;background-color:rgb(23, 133, 115)">+91</div>
            <input 
                name="q" 
                type="number" 
                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength="12" 
                placeholder="  911 0000 193" 
                @if (isset($_GET['q'])) 
                value="{{ $_GET['q'] }}"@endif 
                style="font-weight:500;" size="50" 
                class="mx-lg-3 mx-0 form-control shadow-none border-0"
            />
            <button class="btn btn-sm btn-apply justify-content-center px-lg-5 align-items-center d-flex shadow-none w-auto">
                <i class='bx bx-search me-2' ></i>
                Search
            </button>
        </div>
        <p class="small text-theme ms-2">enter your registered mobile no.</p>
        </form>
        @if (isset($_GET['q']))
        <div class="payment-list my-5 px-lg-3 px-0">
            {{-- heading --}}
            <h3 class="h5 my-3">{{ $user[0]->name }}</h3>
            <div class="row row-cols-lg-5 row-cols-md-5 row-cols-4 border bg-white p-2 mb-2 px-0" style="border-radius: 16px">
                <div class="cols fw-bold d-lg-block d-md-block d-none">#</div>
                <div class="cols fw-bold">Date</div>
                <div class="cols fw-bold">Fee</div>
                <div class="cols fw-bold">Status</div>
                <div class="cols fw-bold">Action</div>
            </div>
            {{-- data --}}
            @foreach ($dues as $due)
            <div class="row row-cols-lg-5 row-cols-md-5 row-cols-4 p-2 px-0 data-table align-items-center">
                <div class="cols d-lg-block d-md-block d-none">CWS{{ $due->id }}</div>
                <div class="cols">
                    @php
                        $date = new DateTime($due->dues_month);
                        echo $date->format('d M Y');
                    @endphp
                </div>
                <div class="cols">₹ {{ $due->amount }}</div>
                <div class="cols ">
                    @if ($due->status == 'dues')
                        <div class="d-inline-flex py-1 px-3 status-danger">dues</div>
                    @else
                        <div class="d-inline-flex py-1 px-3 status">paid</div>
                    @endif
                </div>
                @if ($due->status == 'dues')
                    <form action="{{ route('paytm.payment') }}" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="{{ $due->amount }}">
                        <input type="hidden" name="payment_id" value="{{ $due->id }}">
                        <input type="hidden" name="contact" value="{{ $user[0]->contact }}">
                        <!--<button type="submit" class="btn btn-sm btn-info">Pay</button>-->
                        <button type="submit" class="cols btn btn-sm w-100 btn-apply align-items-center d-flex justify-content-center"><i class='bx bx-rupee me-2' ></i> Pay</button>
                    </form>
                @else
                    <div>
                        <a href="{{ route('generate.pdf',['payment_id'=>$due->id]) }}" class="cols btn btn-sm w-100 btn-apply align-items-center d-inline-flex justify-content-center"><i class='bx bx-printer me-2' ></i> Print</a>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
