@extends("layouts/publicBase")
@section('content')
    <div class="container my-5" style="height: auto;min-height:200px">
        <div class="card mb-3 ">
            <div class="card-body">
                <h2 class="lead mb-1">Pay Outstanding Fee</h2>
                <form method="GET" action="{{ route('get.dues') }}">
                    <div class="input-group">
                        {{-- <input type="number" pattern="\d*" maxlength="10" placeholder="  enter phone no ...." class="form-control rounded" name="q" id="search"> --}}
                        <input name="q"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            type = "number"
                            maxlength = "10"
                            class="form-control   text-primary"
                            placeholder="  enter phone no ...." @if (isset($_GET['q'])) value="{{ $_GET['q'] }}"@endif
                        />
                        <button class="btn btn-dark"><i class="bx bx-search"></i></button>
                    </div>
                    <p class="small text-muted">Enter Registered Mobile No..</p>

                </form>
            </div>
        </div>
        @if (isset($_GET['q']))
        <div class="card shadow-sm">
            <div class="card-header border-0 bg-transparent">
                <h5 class="card-title h3">#{{ $user[0]->id }} <span class="ms-3">{{ $user[0]->name }}</span></h5>
            </div>
            <div class="card-body">
                <ul class="list-group ">
                    <table class="table table-sm table-borderless table-hover table-auto">
                        <tr>
                            <th>#ID</th>
                            <th>Date</th>
                            <th>Fee</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        @foreach ($dues as $due)
                            <tr>
                                <td>
                                    CWS00{{ $due->id }}
                                </td>
                                <td>
                                    @php
                                        $date = new DateTime($due->dues_month);
                                        echo $date->format('d M Y');
                                    @endphp
                                </td>
                                <td>₹ {{ $due->amount }}</td>
                                <td>
                                    @if ($due->status == 'dues')
                                        <span class="badge bg-danger">{{ $due->status }}</span>
                                    @else
                                        <span class="badge bg-success">{{ $due->status }}</span>
                                    @endif
                                </td>
                                @if ($due->status == 'dues')
                                <td>
                                    <form action="{{ route('paytm.payment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="amount" value="{{ $due->amount }}">
                                        <input type="hidden" name="payment_id" value="{{ $due->id }}">
                                        <input type="hidden" name="contact" value="{{ $user[0]->contact }}">
                                        <button type="submit" class="btn btn-sm btn-info">Pay</button>
                                    </form>
                                </td>
                                @else

                                <td>
                                    <a href="{{ route('generate.pdf',['payment_id'=>$due->id]) }}" class="btn btn-sm btn-info"><i class="bx bx-file"></i> print</a>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </ul>
            </div>
        </div>
        @endif
    </div>
@endsection
