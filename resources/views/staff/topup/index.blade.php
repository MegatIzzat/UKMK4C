@extends('layouts.admin.admin')

@section('title','Topup')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="well">
				<div>
					<h3 class="text-center">Top Up Account</h3>
				</div>
				<div class="panel-body">
					<form {{-- action="{{route('')}}" --}}>
						<div class="form-group">
							<input class="form-control input-lg" placeholder="Customer ID" id="cust_id" name="cust_id" type="text">
						</div>
						{{-- <div class="form-group">
							<select class="form-control input-lg">
								<option selecterd="">Security Question</option>
							</select>
						</div> --}}
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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="{{asset('js/jquery.confirm.js')}}"></script>


	{{-- <script>
		$(document).on('click','.btn-success',function(){
			var cust_id = $('#cust_id').val();
			console.log(cust_id); 
		});
	</script> --}}

	<script type="text/javascript">

		var url = "http://127.0.0.1:8000/staff/topup";
		$(document).on('click','.btn-success',function(){

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
			}
		})

		var formData = {
			cust_id: $('#cust_id').val(),
			cust_balance: $("input[name=topupvalue]:checked").val(),
		}

		var cust_id = $('#cust_id').val();
		var cust_balance = $("input[name=topupvalue]:checked").val();

		var my_url = url;
		my_url += '/' + cust_id;

		$.confirm({
			text: "<strong>Customer ID: " + cust_id + "<br />" +"Amount to Top Up: RM" + cust_balance + "</strong>" + "<br /> <br /> Are you sure you want to proceed?",
			title: "Confirmation required",
			confirm: function(button) {
			  
			console.log(cust_balance);
			$.ajax({
				type: "PUT",
				url: my_url,
				data: formData,
				dataType: 'json',
				success: function (data) {
					console.log(data);
				},
				error: function (data) {
					console.log('Error:', data);
				}
			
			});
			alert("Top Up Successful");
			location.reload();
			},
			cancel: function(button) {
			},
			confirmButton: "Yes, proceed",
			confirmButtonClass: "btn-danger",
			cancelButtonClass: "btn-default",
		});
		
	});
	</script>

@endsection