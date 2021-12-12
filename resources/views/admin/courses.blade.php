@extends('layouts.base')
@section('page_title',' | students')
@section('manage_course','mm-active')
@section('css')
	<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css' ) }}" rel="stylesheet" />
@endsection
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header border-0 d-flex">
                <div class="h5 pt-2">Courses</div>
                <span class="d-flex ms-auto"><a href="{{ route('admin.add.course') }}" class="btn btn-dark ">Add new Course</a></span>
            </div>
            <div class="card-body">
                <div class="table-responsive p-2">
                    <table id="example2" class="table p-2 table-borderless table-hover">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>duration</th>
                                <th>fee</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <td>
                                    <div class="rounded" style="height: 50px;width:50px">
                                        <img src="{{ asset('images/course/'.$course->image) }}" style="height: 50px;width:50px" alt="" class="img-fluid rounded border">
                                    </div>
                                </td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->duration }}</td>
                                <td>{{ $course->fee }}</td>
                                <td>
                                    @if ($course->status == 1)
                                        <span class="badge bg-light-success text-success">Active</span>
                                    @else
                                        <span class="badge bg-light-danger text-danger">Deactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('admin.courses.delete',['course_id'=>$course->id]) }}" class="text-danger bg-light-danger border-0"><i class="bx bxs-trash"></i></a>
                                        <a href="{{ route('admin.edit.course.view',['course_id'=>$course->id]) }}" class="ms-4 text-primary bg-light-primary border-0"><i class="bx bxs-edit"></i></a>
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
