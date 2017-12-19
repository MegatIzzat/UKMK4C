@extends('layouts.customer.customer')

@section('title','Order History')

@section('content')
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Order History
		</div>

		<div class="panel-body"> 
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
												<div class="ratings">
												<p>
													<input id="input-3" name="input-3" value="{{$z->product_rating}}" class="rating" data-size="xs" data-show-clear="false" data-show-caption="false" readonly>
												</p>
											</div>
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
	<center>{{$order->links()}}</center>
</div>
<div class="col-md-offset-4 col-md-4">
	<a href="/" class="btn btn-success btn-block" role="button">Back to Home</a></li>
</div>

@endsection