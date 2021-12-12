@extends('layouts.base')
@section('page_title',' | students')
@section('manage_placement','mm-active')
@section('css')
	<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css' ) }}" rel="stylesheet" />
@endsection
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header border-0 d-flex">
                <div class="h5 pt-2">placements</div>
                <span class="d-flex ms-auto"><a href="{{ route('add.placement') }}" class="btn btn-dark ">Add new placement</a></span>
            </div>
            <div class="card-body">
                <div class="table-responsive p-2">
                    <table id="example2" class="table p-2 table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>name</th>
                                <th>Joining date</th>
                                <th>role</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($placements as $placement)
                            <tr>
                                <td>
                                    <div class="rounded" style="height: 50px;width:50px">
                                        <img src="{{ asset('images/placement/'.$placement->image) }}" style="height: 50px;width:50px" alt="" class="img-fluid rounded border">
                                    </div>
                                </td>
                                <td>{{ $placement->name }}</td>
                                <td>{{ $placement->joining_date }}</td>
                                <td>{{ $placement->role }}</td>
                                <td>
                                    @if ($placement->status == 1)
                                        <span class="badge bg-light-success text-success">Active</span>
                                    @else
                                        <span class="badge bg-light-danger text-danger">Deactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.placements.delete',['id'=>$placement->id]) }}" class="text-danger bg-light-danger border-0"><i class="bx bxs-trash"></i></a>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
	<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
@endsection
