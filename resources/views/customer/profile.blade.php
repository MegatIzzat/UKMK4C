@extends('layouts.app')

@section('title','Manage Profile')

@section('content')
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="page-header">
					<h2>My Profile</h2>
				</div>
				<form action="manageprofile.php" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="cust_id" class="col-sm-3 control-label">Customer ID</label>
						<div class="col-sm-9">
							<input name="cid" type="text" class="form-control" id="cust_id" placeholder="Customer ID" value="A123456" required disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="cust_pass" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9">
							<input name="cpass" type="password" class="form-control" id="cust_pass" placeholder="Your Password" value="1234567890" required>
						</div>
					</div>
					<div class="form-group">
						<label for="cust_pass2" class="col-sm-3 control-label">Confirm Password</label>
						<div class="col-sm-9">
							<input name="cpass2" type="password" class="form-control" id="cust_pass2" placeholder="Your Password" value="1234567890" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<div class="page-header">
					<h2>My balance</h2>
				</div>
				<form action="manageprofile.php" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="cust_balance" class="col-sm-3 control-label">Balance</label>
						<div class="col-sm-9">
							<input name="cbal" type="text" class="form-control" id="cust_balance" placeholder="Your Balance" value="RM 32" required disabled>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
				<div class="page-header"><h2>Order History</h2></div>

					<table class="table table-striped table-bordered">
						<tr>
							<th>Order Item</th>
							<th>Order Date</th>
							<th>Total Price</th>
							<th>Order Status</th>
						</tr>

						<tr>
							<td>Nasi Goreng Paprik x1</td>
							<td>2017-08-05</td>
							<td>RM5.00</td>
							<td>In Progress</td>
						 </tr>

						 <tr>
							<td>Nasi Goreng Pattaya x2</td>
							<td>2017-07-14</td>
							<td>RM9.00</td>
							<td>Completed</td>
						</tr>

						<tr>
							<td>Mee Goreng x1</td>
							<td>2017-06-11</td>
							<td>RM4.00</td>
							<td>Completed</td>
						</tr>

						 <tr>
							<td>Nasi Putih x1 , Tomyam Ayam x1</td>
							<td>2017-05-09</td>
							<td>RM5.00</td>
							<td>Completed</td>
						</tr>

						 <tr>
							<td>Kuey Teow Ladna x1</td>
							<td>2017-05-05</td>
							<td>RM4.50</td>
							<td>Completed</td>
						 </tr>
					  
					</table>
			</div>
		</div>
	</div>
 


@endsection