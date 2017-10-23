<html>
  <head>
   <title>Orderlist Management K4C</title>  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
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
            <th>Product ID</th>
            <th>Quantity</th>
          </tr>
         </thead>


         <tbody id="orderlines-list" name="orderlines-list">
           @foreach ($orderlines as $orderline)
           @if($orderline->order_status=='In Progress')
            <tr id="orderline{{$orderline->order_id}}">
             <td>{{$orderline->order_id}}</td>
             <td>{{$orderline->product_id}}</td>
             <td>{{$orderline->quantity}}</td>
              <td>
              <button class="btn btn-success btn-detail open_modal" value="{{$orderline->order_id}}">Complete</button>
              </td>
            </tr>
            @endif
            @endforeach
        </tbody>
        </table>
       </div>
       </div>

   <!--  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Product</h4>
            </div>
            <div class="modal-body">
            
            <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
              <div class="form-group error">
                 <label for="inputId" class="col-sm-3 control-label">ID</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="product_id" name="id" placeholder="Product ID" value="">
                   </div>
                   </div>
                <div class="form-group error">
                 <label for="inputName" class="col-sm-3 control-label">Name</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="product_name" name="name" placeholder="Product Name" value="">
                   </div>
                   </div>
                 <div class="form-group">
                 <label for="inputPrice" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" id="product_price" name="price" min="0" step="0.1" placeholder="Product Price" value="">
                    </div>
                </div>
                <div class="form-group">
                 <label for="inputCategory" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="category_id" name="category" placeholder="Product Category" value="">
                    </div>
                </div>
                <div class="form-group">
                 <label for="inputImage" class="col-sm-3 control-label">Image</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="product_img" name="img" placeholder="Product Image" value="">
                    </div>
                </div>
                <div class="form-group">
                 <label for="inputRating" class="col-sm-3 control-label">Rating</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" id="product_rating" name="rating" min="0" max="5" step="0.5" placeholder="Product Rating" value="">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
            <input type="hidden" id="product_id" name="product_id" value="0">
            </div>
        </div>
      </div>
  </div>
</div> -->
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajaxscript.js')}}"></script>
    <script src="{{asset('js/jquery.confirm.js')}}"></script>
</body>
</html>