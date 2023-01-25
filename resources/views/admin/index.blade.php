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

                       <div class="table-responsive mt-3">
                           <table class="table align-middle mb-0">
                               <thead class="table-light">
                                   <tr>
                                       <th>ID</th>
                                       <th>Student Name</th>
                                       <th>Father</th>
                                       <th>Due Month</th>
                                       <th>Status</th>
                                       <th>Due Amount</th>
                                       <th>Actions</th>
                                   </tr>
                               </thead>
                               <tbody>
                                    @foreach (payments('dues') as $dues)
                                    <tr class="@if($dues->student->status==3) bg-warning @endif">
                                        <td>#{{ $dues->id }}</td>
                                        <td>{{ $dues->student->name }}</td>
                                        <td>{{ $dues->student->father_name }}</td>
                                        <td class="">
                                        @php
                                            $date = new DateTime($dues->dues_month);
                                            echo $date->format('d M Y');
                                        @endphp</td>
                                        <td class=""><span class="badge bg-light-danger text-danger w-100">Dues</span></td>
                                        <td>₹ {{ $dues->amount }}</td>
                                        <td>
                                            <div class="d-flex d-print-none">
                                                <form action="{{ route('set.payment.paid') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="student_id" value="{{ $dues->student_id }}">
                                                    <input type="hidden" name="payment_id" value="{{ $dues->id }}">
                                                    <button class="btn btn-sm bg-light-success text-success">₹ Paid</button>
                                                </form>
                                                <button class="btn btn-sm bg-light-primary ms-2 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $dues->id }}"><i class="bx bx-edit"></i></button>
                                               
                                            </div>
                                        </td>

                                    </tr>
                                    <div class="modal fade" id="exampleModal{{ $dues->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update Dues Amount</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('update.dues.amount') }}" method="post">
                                                        @csrf
                                                        <input type="text" name="payment_id" value="{{ $dues->id }}">
                                                        <div class="mb-3">
                                                            <label for="amount">Amount</label>
                                                            <input type="text" value="{{ $dues->amount }}" name="amount" class="form-control shadow-sm" id="amount">
                                                        </div>
                                                        <div class="mb-3">
                                                            <input type="submit" value="change amount" class="btn btn-dark float-end">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                               </tbody>
                           </table>
                       </div>

                    </div>
                </div>
            </div>
        </div><!--end row-->

    </div>
@endsection
