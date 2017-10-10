@extends('layouts.staff')

@section('title','View Order')

@section('content')
	<div class="container">
		<div class="page-header"><h1>Order Status</h1></div>

		<div class="col-md-12">
			<table class="table table-striped table-hovered table-bordered">
				<thead>
					<td>Order ID</td>
					<td>Order Time</td>
					<td>Product Name</td>
					<td>Quantity</td>
					<td>Status</td>
					<td></td>
				</thead>

				<tbody>
					<tr>
						<td>K0001</td>
						<td>20/05/2017 - 10:56 AM</td>
						<td>Nasi Goreng Pattaya</td>
						<td>1</td>
						<td>Complete</td>
						<td><input type="checkbox" name=""></td>
					</tr>
					<tr>
						<td>K0002</td>
						<td>20/05/2017 - 10:56 AM</td>
						<td>Nasi Goreng Pattaya</td>
						<td>1</td>
						<td>Complete</td>
						<td><input type="checkbox" name=""></td>
					</tr>
					<tr>
						<td>K0002</td>
						<td>20/05/2017 - 10:56 AM</td>
						<td>Nasi Goreng Pattaya</td>
						<td>1</td>
						<td>Complete</td>
						<td><input type="checkbox" name=""></td>
					</tr>
					<tr>
						<td>K0002</td>
						<td>20/05/2017 - 10:56 AM</td>
						<td>Nasi Goreng Pattaya</td>
						<td>1</td>
						<td>Complete</td>
						<td><input type="checkbox" name=""></td>
					</tr>
					<tr>
						<td>K0002</td>
						<td>20/05/2017 - 10:56 AM</td>
						<td>Nasi Goreng Pattaya</td>
						<td>1</td>
						<td>Complete</td>
						<td><input type="checkbox" name=""></td>
					</tr>
				</tbody>
				
			</table>
		</div>
	</div>

@endsection