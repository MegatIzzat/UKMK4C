@extends('layouts.customer.customer')

@section('title','Manage Profile')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				

				<div class="page-header">
					<h2><center>MANAGE PROFILE</h2><br><br>

				<form class="form-horizontal" method="POST" action="{{route('cust.profile.update',['user' => Auth::user()->user_id] )}}">
				{{csrf_field()}}
				{{method_field('PUT')}}

					<div class="form-group">
						<label for="user_id" class="col-sm-3 control-label"><b>User ID</b></label>
						<div class="col-sm-9">
							<label for="user_id" class="control-label">{{Auth::user()->user_id}}</label>
							<input name="user_id" type="hidden" id="user_id" value="{{Auth::user()->user_id}}">
						</div>
					</div>

					<div class="form-group">
						<label for="cust_balance" class="col-sm-3 control-label"><b>Balance</b></label>
						<div class="col-sm-9">
							<label for="cust_balance" class="control-label">RM {{number_format($customer->cust_balance, 2)}}</label>
						</div>
					</div>

					<div class="form-group">
						<label for="name" class="col-sm-3 control-label"><b>Name</b></label>
						<div class="col-sm-9">
							<input name="name" type="text" class="form-control" id="name" value=" {{Auth::user()->user_name}} " required>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label"><b>Email</b></label>
						<div class="col-sm-9">
							<input name="email" type="email" class="form-control" id="email" value="{{$customer->cust_email}}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cust_pass" class="col-sm-3 control-label"><b>Password</b></label>
						<div class="col-sm-9">
							<input name="password" type="password" class="form-control" id="password"  value="{{$user->password}}" required>
						</div>
					</div>
					<!-- <div class="form-group">
						<label for="cust_pass2" class="col-sm-3 control-label">Confirm Password</label>
						<div class="col-sm-9">
							<input name="cpass2" type="password" class="form-control" id="cust_pass2" placeholder="Your Password" value="" required>
						</div>
					</div> -->

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							
							<button class="btn btn-default" type="submit">Update</button>
						</div>
					</div>
				</form>
				</div>
				</div>
				</div>
			
			
		</div>

@endsection
