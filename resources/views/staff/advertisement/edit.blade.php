@extends('layouts.admin.admin')

@section('title','Update Advertisement')

@section('content')

<div class="container">
	<div class="col-md-10 col-md-offset-1">
	<form class="form-horizontal" method="POST" action="{{ route('staff.advertisement.update',$adv->advertisement_id)}}" enctype="multipart/form-data">
		{{csrf_field()}}
		{{ method_field('PUT') }}

		<!-- Alert -->
				@include('error.flash-message')

				@foreach($errors->all() as $key)
					<li>{{ $key }}</li>

				@endforeach

	<div class="panel panel-default">
		
		<div class="panel-heading">New Advertisement</div>
		
		
		<div class="panel-body">
			
				<div class="form-group">
					<label class="col-md-4 control-label">Advertisement ID</label>
					<div class="col-md-6">
						<input type="text" name="advertisement_id" class="form-control" value=" {{$adv->advertisement_id}} " readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Advertisement Name</label>
					<div class="col-md-6">
						<input type="text" name="advertisement_name" class="form-control" value="{{$adv->advertisement_name}}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Advertisement Image</label>
					<div class="col-md-6">
						<input type="file" name="advertisement_img" class="form-control" value="{{$adv->advertisement_img}}">
					</div>
				</div>

				<input type="hidden" name="staff_id" value="{{ Auth::user()->user_id }}">
		</div>
		<div class="panel-footer">
		<div class="row"> 
			<div class="col-md-6 col-md-offset-3">
				<button type="submit" class="btn btn-success btn-block">Update</button>
			</div>
		</div>
			
			
		</div>
		</form>

	</div>
</div>
</div>

@endsection