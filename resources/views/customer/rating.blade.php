<html>
<head>
 <title>Orderlist Management K4C</title>  
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
 <link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    <div class="panel panel-primary">
     <div class="panel-heading">Order In Progress
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
            <th>Order ID</th>
            <th>Order Status</th>
            <th>Product Name</th>
            <th>Give Rating</th>
            <th>Product Quantity</th>

          </tr>
        </thead>

        @foreach($order as $key => $p)

        <tr>
          <td>{{$p->order_id}}</td>
          
          <td>{{$p->order_status}}</td>

          @foreach($orderline as $key => $q)
            @if($p->order_id == $q->order_id)
              @foreach($product as $key => $r)
                @if($q->product_id == $r->product_id)
	                <td>{{$r->product_name}}</td>
	                <td>
	                  <div class="btn btn-primary btn-md" id="btn-rating" role="button" data-id="{{$q->product_id}}" data-value="{{$r->product_name}}"> Rate </a>
	              	</td>
                @endif
              @endforeach
              <td>{{$q->quantity}}</td>
              <tr><td></td><td></td>
            @endif
          @endforeach

          </tr>
          @endforeach
        </table>

      </div>
    </div>
  </div>

  <div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel"><strong>Rate This Product</strong></h4>
            </div>
            <div class="modal-body">
            
            <form id="frmRating" name="frmRating" class="form-horizontal">
            	<div class="form-group">
                   <div class="col-sm-9">
                    <label class="hidden" id="product_id"></label>
                   </div>
                 </div>
              <div class="form-group">
                 <label for="inputName" class="col-sm-3 control-label">Product Name</label>
                   <div class="col-sm-9">
                    <label id="product_name"></label>
                   </div>
                 </div>
                <div class="form-group">
                 <label for="inputRating" class="col-sm-3 control-label">Rating</label>
                    <div class="col-sm-9">
                    <input type="number" class="rating rating-loading" id="product_rating" name="product_rating" data-step=0.5 data-size="sm">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-warning" id="btn-submit">Rate!</button>
            {{-- <input type="hidden" id="product_id" name="product_id" value="0"> --}}
            </div>
        </div>
      </div>
  </div>

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/ajaxscript.js')}}"></script>
<script src="{{asset('js/jquery.confirm.js')}}"></script>
<script src="{{asset('js/star-rating.js')}}"></script>

<script>
	var url = "http://127.0.0.1:8000/rating";

	$('.btn-primary').click(function (e) {
		e.preventDefault();
		var id = $(this).attr('data-id');
		var name = $(this).attr('data-value');
		console.log(id);
		console.log(name);
		$('#product_id').text(id);
		$('#product_name').text(name);
		$('#rateModal').modal('show');
		$('#frmRating').trigger("reset");

	});

	$(".btn-warning").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        var formData = {
            product_id: $('#product_id').text(),
            product_rating: $('#product_rating').val(),
        }

        var product_id = $('#product_id').text();
        var product_rating = $('#product_rating').val();

        console.log('product id = ',product_id);
        console.log('product rating = ',product_rating);

        var my_url = url;
        my_url += '/' + product_id;

            $.ajax({
                type: "POST",
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#product_rating').rating('reset');
                    alert("Thank you for your rating!");
                    location.reload();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
</script>

</body>
</html>