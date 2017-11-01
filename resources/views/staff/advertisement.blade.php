<html>
  <head>
   <title>K4C | Advertisement</title>  
    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/customize.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  </head>
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<div class="col-md-6">
				<h3>Advertisement</h3>
			</div>
			<div class="col-md-3 col-md-offset-3">
				<a class="btn btn-success pull-right" id="btn_add" name="btn_add" role="button">New Advertisement</a>
			</div><br><br>
			
			<hr><hr>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Advertisement Name</th>
						<th>Image</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($advertisement as $adv)
					<tr>
						<td>{{$adv->advertisement_id}}</td>
						<td>{{$adv->advertisement_name}}</td>
						<td>{{$adv->advertisement_img}}</td>
						<td>{{$adv->staff_id}}</td>
						<td width="150">
							<button class="btn btn-warning btn-xs btn-detail" value="{{$adv->advertisement_id}}">
								Update
							</button>
							<a href="" class="btn btn-danger btn-xs delete-adver" value="{{$adv->advertisement_id}}">Delete</a>
						</td>
					</tr>
					@endforeach	
				</tbody>
			</table>
		</div>
	</div>

		<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Create Advertisement</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="frmAdver" name="frmAdver" novalidate="">
					<div class="form-group">
						<label for="inputID" class="col-md-4 control-label">Advertisement ID</label>
						<div class="col-md-6">
							<input id="advertisement_id" type="text" name="advid" class="form-control" placeholder="Advertisement ID">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Advertisement Name</label>
						<div class="col-md-6">
							<input id="advertisement_name" type="text" name="advname" class="form-control" placeholder="Advertisement Name">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Advertisement Image</label>
						<div class="col-md-6">
							<input id="advertisement_img" type="text" name="advimg" class="form-control" placeholder="Advertisement Image">
						</div>
					</div>

					<input type="hidden" id="staff_id" name="staffid" value="{{Auth::user()->user_id}}">
				</form>
				

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btn-save" value="add">Create</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

		</div>
	</div>

	

    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/adver.js')}}"></script>
    <script src="{{asset('js/jquery.confirm.js')}}"></script>
</body>
</html>