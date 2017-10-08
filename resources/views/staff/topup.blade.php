@extends('layout.app')

@section('title','Manage Topup')

@section('content')
	<div class="col-md-6 col-md-offset-3">
		<h1>Manage Topup</h1><hr>

		<form class="form-horizontal">
			<div class="form-group">
				<div class="col-md-3">
					<label>Customer ID</label>
				</div>
				<div class="col-md-7">
					<input type="text" name="cust_id" class="form-control" placeholder="A123456">
				</div>
				<div class="col-md-2">
					<button class="btn btn-warning btn-block">Validate</button>
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-3">
					<label>Top up Amount</label>
				</div>
				<div class="col-md-9">
					<select class="form-control">
						<option>RM 5.00</option>
						<option>RM 10.00</option>
						<option>RM 20.00</option>
						<option>RM 30.00</option>
						<option>RM 40.00</option>
						<option>RM 50.00</option>
					</select>
				</div>


			</div>

			<button class="btn btn-block btn-primary">TOP UP</button>
		</form>
		
		
	</div>
@endsection