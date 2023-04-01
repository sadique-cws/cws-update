@extends('layouts.base')
@section('page_title',' | Dashboard')
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col">
                    <div class="card radius-10 overflow-hidden bg-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Students</p>
                                    <h5 class="mb-0 text-white">{{ app\models\User::where('user_type','student')->count() }}</h5>
                                </div>
                                <div class="ms-auto text-white">	<i class='bx bx-group font-30'></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="chart4"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 overflow-hidden bg-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-white">Total Dues</p>
                                    <h5 class="mb-0 text-white">₹
                                        @php
                                            $dues= 0;
                                            foreach(payments('dues') as $due){
                                                $dues += $due->amount;
                                            }

                                            echo $dues;
                                        @endphp
                                    </h5>
                                </div>
                                <div class="ms-auto text-white">	<i class='bx bx-wallet font-30'></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="chart1"></div>
                    </div>
                </div>
                
              <div class="col">
                    <div class="card radius-10 overflow-hidden bg-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    @php
                                        $date = new DateTime();
                                        $due_month = $total_paid;
                                        $total = 0;
                                        foreach ($due_month as $d) {
                                              $total+=$d->amount;
                                        }
                                        echo $total;

                                    @endphp
                                    <p class="mb-0 text-white">{{ $date->format('M'); }} Paid</p>
                                </div>
                                <div class="ms-auto text-white">	<i class='bx bx-chat font-30'></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="chart3"></div>
                    </div>
                </div> 
          </div><!--end row-->

          {{-- recent payments --}}
          <div class="row">
            <div class="col">
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">Dues Payments</h5>
                            </div>
                            <div class="ms-auto">
                                <a href="{{ route('dues.payments') }}" class="btn btn-primary btn-sm radius-30">View All Dues</a>
                            </div>
                        </div>

                      <livewire:show-due/>
                    </div>
                </div>
            </div>
        </div><!--end row-->

    </div>
@endsection
