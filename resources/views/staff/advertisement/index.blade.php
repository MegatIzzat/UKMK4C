@extends('layouts.admin.admin')

@section('title','Advertisement')

@section('content')

<div class="container">
		<div class="col-md-10 col-md-offset-1">
			

			<div class="col-md-6">
				<h3>Advertisement</h3>
			</div>
			<div class="col-md-3 col-md-offset-3">
				<a class="btn btn-success pull-right" role="button" href="{{route('staff.advertisement.create')}}">New Advertisement</a>
			</div><br><br>
			
			<hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Advertisement Name</th>
						<th>Image</th>
						<th>Staff</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($advertisement as $adv)
					<tr id="advertisement{{$adv->advertisement_id}}">
						<td>{{$adv->advertisement_id}}</td>
						<td>{{$adv->advertisement_name}}</td>
						<td><a href=" {{asset('/img/adv/'.$adv->advertisement_img)}} ">{{$adv->advertisement_img}}</a> </td>
						<td>{{$adv->staff_id}}</td>
						<td width="127">
							

								<a role="button" class="btn btn-warning btn-xs pull-left" href="{{ route('staff.advertisement.edit',$adv->advertisement_id)}}">
									Update
								</a>

							<form method="POST" action="{{route('staff.advertisement.delete', $adv->advertisement_id)}}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<input type="submit" class="btn btn-danger btn-xs pull-right" onclick="return confirm('Are you sure to delete?')" value="Delete">
									
							</form>
						</td>
					</tr>
					@endforeach	
				</tbody>
			</table>
		</div>
	</div>

@endsection