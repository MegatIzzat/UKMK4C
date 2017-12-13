@extends('layouts.customer.customer')

@section('title','Manage Profile')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				

				<div class="page-header">
					<h2>My Profile</h2>

				<form class="form-horizontal" method="POST" action="{{route('cust.profile.update',['user' => Auth::user()->user_id] )}}">
				{{csrf_field()}}
				{{method_field('PUT')}}

					<div class="form-group">
						<label for="user_id" class="col-sm-3 control-label">Customer ID</label>
						<div class="col-sm-9">
							<input name="user_id" type="text" class="form-control" id="user_id" value="{{Auth::user()->user_id}}" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Customer Name</label>
						<div class="col-sm-9">
							<input name="name" type="text" class="form-control" id="name" value=" {{Auth::user()->user_name}} " required>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Customer Email</label>
						<div class="col-sm-9">
							<input name="email" type="email" class="form-control" id="email" value="{{$user->email}}" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cust_pass" class="col-sm-3 control-label">Password</label>
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
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="page-header">
					<h2>My balance</h2>
				</div>
				<form action="update" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="cust_balance" class="col-sm-3 control-label">Balance (RM)</label>
						<div class="col-sm-9">
							<input name="cust_balance" type="text" class="form-control" id="cust_balance" value= "{{number_format($customer->cust_balance, 2)}}" readonly="">
						</div>
					</div>
				</form>
				<div class="form-group">
						
		</div> </div>

		<!-- <div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="page-header">

					<h2>Order History</h2>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<button class="btn btn-warning btn-block" type="submit" name="update" >View Order History</button>
						</div>
					</div>
			
		</div>
		</div> -->
		</div>

@endsection