@extends('Layout.main')

@section('title', 'Add User')
@section('content-title', 'Add User')
@section('bread-cumb')
<ol class="breadcrumb float-sm-right">
	<li class="breadcrumb-item"><a href="#">Home</a></li>
	<li class="breadcrumb-item"><a href="#">User</a></li>
	<li class="breadcrumb-item active">Add User</li>
</ol>
@endsection

@section('content')
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Quick Example</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-body">

			<div class="form-group">
				<label for="profilePicInput">Role</label>
				<select class="custom-select rounded-0" id="exampleSelectRounded0" name="role">
					<option>Root</option>
					<option>Admin</option>
					<option>Employee</option>
				</select>
			</div>

			<div class="form-group">
				<label for="profilePicInput">Profile Picture</label>
				<input type="file" class="form-control" id="profilePicInput" name="photo">
				@error('photo')
				<small>{{$message}}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
				@error('email')
				<small>{{$message}}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="nameInput">Name</label>
				<input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter name">
				@error('name')
				<small>{{$message}}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="phoneInput">Phone Number</label>
				<input type="text" class="form-control" id="phoneInput" name="phone_number" placeholder="Enter Phone Number">
				@error('phone_number')
				<small>{{$message}}</small>
				@enderror
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
				@error('password')
				<small>{{$message}}</small>
				@enderror
			</div>

		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>


</div>

@endsection