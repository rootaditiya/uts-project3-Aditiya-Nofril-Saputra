@extends('Layout.main')

@section('title', 'Data Employee')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />

@section('css')

@endsection

@section('content-title', 'Data Employee')
@section('bread-cumb')
<ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item active">Employee</li>
</ol>
@endsection

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<a href="{{route('v2.employee.create')}}" class="btn btn-primary mb-3"> Tambah Data</a>
				
			</div>
			<!-- /.card-header -->
			<div class="card-body table-responsive p-0">
				<table class="table table-hover text-nowrap" id="employee-table">
					<thead>
						<tr>
							<th>No</th>
							<th>Photo</th>
							<th>Nama</th>
							<th>Email</th>
							<th>No Telpon</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
</div>
@endsection

@section('js')
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
		loadData();
	} );

	function loadData(){
		$('#employee-table').DataTable({
			processing:true,
			pagination:true,
			responsive:false,
			serverSide:true,
			searching:true,
			ordering:false,
			ajax:{
				url:"{{ route('employee.index') }}",
			},
			columns:[
			{
				data : 'no',
				name : 'no',
				render: function (data, type, row, meta) {
					return meta.row + 1;
				}
			},
			{
				data : 'photo',
				name : 'photo',
			},
			{
				data : 'nama',
				name : 'nama',
			},
			{
				data : 'email',
				name : 'email',
			},
			{
				data : 'phone_number',
				name : 'phone_number',
			},
			{
				data : 'action',
				name : 'action',
			},
			],
		});
	}

</script>
@endsection