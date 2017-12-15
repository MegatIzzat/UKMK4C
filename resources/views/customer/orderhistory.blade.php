@extends('layouts.customer.customer')

@section('title','Order History')

@section('content')
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Order History
		</div>

		<div class="panel-body"> 
			@include('error.flash-message')
			<ul>
				@foreach($errors->all() as $key)
				<li>{{ $key }}</li>
				@endforeach
			</ul>

			<table class="table">
				<thead>
					<tr>
						<th>Order Time</th>
						<th>Order ID</th>
						<th>Product Purchased</th>
						<th>Rating</th>         
						<th>Paid</th>
						<th>Waiting Time</th>
						<th>Feedback</th>
					</tr>
				</thead>

				@foreach($order as $key => $p)
					@if($p->cust_id == Auth::user()->user_id)
						@if($p->order_status=='Completed')
						<tr>
							<td>
								{{date('d-M-Y', strtotime($p->order_date))}}<br>
								{{date('h:i A', strtotime($p->order_date))}}
							</td><!-- Display in Malaysia time -->
							<td>{{$p->order_id}}</td>
							
							<td>
								<div class="row">
									@foreach($orderline as $key => $q)
										@if($p->order_id == $q->order_id)
											@foreach($product as $key => $r)
												@if($q->product_id == $r->product_id)
													<div>{{$r->product_name}}</div>
												@endif
											@endforeach
										@endif
									@endforeach
								</div>
							</td>

							<td>
								@foreach($orderline as $key => $q)
									@if($p->order_id == $q->order_id)
										@foreach($product as $key => $r)
											@if($q->product_id == $r->product_id)
											@if($q->rating_id==null)
											<form class="form-horizontal" method="POST" action="{{ route('customer.sendRating',[$p->order_id, $q->product_id])}}">
												{{csrf_field()}}
												{{ method_field('POST') }}
												<div>
													<input type="number" name="product_rating" min="0" max="5" step="0.5"><button type="submit"> Rate</button>
												</div>
											</form>
											@else

												@foreach($rating as $key => $z)
												@if($q->rating_id == $z->rating_id)
													You rated {{$z->product_rating}} star<br>
												@endif
												@endforeach

											@endif
											@endif
										@endforeach
									@endif
								@endforeach
							</td>


							<td>RM {{number_format($p->total_price, 2)}}</td>

							<td>
								<?php
								$to_time = strtotime($p->order_date);
								$from_time = strtotime($p->order_completed); 
								?>
								{{round(abs($to_time - $from_time) / 60). " minutes"}}
							</td>

							@if($p->order_feedback==null)
							<form class="form-horizontal" method="POST" action="{{ route('customer.sendFeedback',$p->order_id)}}">
							{{csrf_field()}}
							{{ method_field('PUT') }}
							<td>
								<textarea name="order_feedback" style="width:100%" rows="3"></textarea>
								<br>
								<button style="width:100%" class="btn btn-success" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Send Feedback</button>
							</td>
						</form>

						@else
						<td>{{$p->order_feedback}}</td>
							@endif
						</tr>
						@endif
					@endif
				@endforeach
			</table>

		</div>
	</div>
</div>
<div class="col-md-offset-4 col-md-4">
	<a href="/" class="btn btn-success btn-block" role="button">Back to Home</a></li>
</div>

@foreach($order as $key => $p)
@if($p->cust_id == Auth::user()->user_id)
@if($p->order_status=='Completed')
<div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				
				<h4 class="modal-title" id="myModalLabel"><strong>Rate This Product</strong></h4>
			</div>
			
			<div class="modal-body">
				<form id="frmRating" name="frmRating" class="form-horizontal" action="{{route('customer.sendRating', $q->product_id)}}" method="POST">
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-sm-9">
							<input type="hidden" id="product_id" name="product_id" value="{{$q->product_id}}">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputName" class="col-sm-3 control-label">Product Name</label>
						<label class="control-label" id="product_name"></label>
					</div>

					<div class="form-group">
						<label for="inputRating" class="col-sm-3 control-label">Rating</label>
						<div class="col-sm-9">
							<input class="rating rating-loading" id="product_rating" name="product_rating" min="0.5" max="5" data-step=0.5 data-size="sm">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-warning btn-rate" value="{{$q->product_id}}">Rate!</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endif
@endif
@endforeach

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="{{asset('js/ajaxscript.js')}}"></script>
<script src="{{asset('js/jquery.confirm.js')}}"></script>

</body>
</html>

<<<<<<< HEAD
=======
<script>
	$('.btn-primary').click(function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-value');
		// var product_id = id;
		console.log(id);
		console.log(name);
		$('#product_id').val(id);
		$('#product_name').text(name);
		$('#frmRating').trigger("reset");
		$('#rateModal').modal('show');
	});
</script>

>>>>>>> Megat
@endsection