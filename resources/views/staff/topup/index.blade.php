@extends('layouts.admin.admin')

@section('title','Topup')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="well">
				@include('error.flash-message')
				@foreach($errors->all() as $key)
            		<li>{{ $key }}</li>
          		@endforeach
				<div>
					<h3 class="text-center">Top Up Account</h3>
				</div>
				<div class="panel-body">
					<form id="frmTopup" action="{{route('staff.topup.update')}}" method="POST">
						{{csrf_field()}}
        				{{-- {{method_field('PUT')}} --}}
						<div class="form-group">
							<input class="form-control input-lg" placeholder="Customer ID" id="cust_id" name="cust_id" type="text">
						</div>
						<div id="topupvalue" class="btn-group-vertical btn-lg" data-toggle="buttons">
							<div class="col-md-12 btn-group-justified">
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="5"> RM 5
							</label>
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="10"> RM 10
							</label>
							
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="15"> RM 15
							</label>
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="20"> RM 20
							</label>
							</div>
							<div class="col-md-12 btn-group-justified">
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="25"> RM 25
							</label>
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="30"> RM 30
							</label>
							
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="35"> RM 35
							</label>
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="40"> RM 40
							</label>
							</div>
							<div class="col-md-12 btn-group-justified">
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="45"> RM 45
							</label>
							<label class="btn btn-primary gradient">
							  <input type="radio" name="topupvalue" value="50"> RM 50
							</label>
							</div>
						</div>

						{{-- <div class="checkbox">
							<label>
								<input name="terms" type="checkbox">I have read and agree to the <a href="#">terms of service</a>

							</label>
						</div> --}}

						<input class="btn btn-lg btn-success btn-block" value="PROCEED" type="submit">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<meta name="_token" content="{!! csrf_token() !!}" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="{{asset('js/jquery.confirm.js')}}"></script>

@endsection