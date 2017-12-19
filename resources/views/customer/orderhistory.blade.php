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
							</td>
							<td>{{$p->order_id}}</td>
							
							<td>
								<div class="row">
									@foreach($orderline as $key => $q)
										@if($p->order_id == $q->order_id)
											@foreach($product as $key => $r)
												@if($q->product_id == $r->product_id)
													{{$r->product_name}}<br>
								

														@if($q->rating_id==null)
														<form class="form-horizontal" method="POST" action="{{ route('customer.sendRating',[$p->order_id, $q->product_id])}}">
															{{csrf_field()}}
															{{ method_field('POST') }}
															<div>
																<table>
																	<td>
																	<input type="number" class="rating" id="product_rating" name="product_rating" data-step=1 data-size="xxs" data-show-clear="false" data-show-caption="false" required>
																	</td>
																	<td>
																		<button class="btn-info" type="submit"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> Rate</button>
																	</td>
																</table>
															</div>
														</form>
														@else

														@foreach($rating as $key => $z)
														@if($q->rating_id == $z->rating_id)
														<div class="ratings">
																<input id="input-3" name="input-3" value="{{$z->product_rating}}" class="rating" data-size="xxs" data-show-clear="false" data-show-caption="false" readonly>
														</div>
														@endif
														@endforeach
														@endif
														<br>
											
												@endif
											@endforeach
										@endif
									@endforeach
								</div>
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
								<textarea name="order_feedback" style="width:100%" rows="3" required></textarea>
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