
<div>
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
                 @foreach ($payments as $dues)
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
                             <form wire:submit.prevent="pay_dues">
        
                                 <input type="hidden"  wire:model="student_id" value="{{ $dues->student_id }}">
                                 <input type="hidden"  wire:model="payment_id" value="{{ $dues->id }}">
                                 <button type="submit" onclick="confirm('Are you sure?!') || event.preventDefault();" class="btn btn-sm bg-light-success text-success">₹ Paid</button>
                             </form>
                             <button  class="btn btn-sm bg-light-primary ms-2 text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $dues->id }}"><i class="bx bx-edit"></i></button>
                            
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