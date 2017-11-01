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
            <th>Order Status</th>
            <th>Product Name</th>
            <th>Product Quantity</th>

          </tr>
        </thead>

        @foreach($order as $key => $p)

        <tr>
          <td>{{$p->order_id}}</td>
          
          @if($p->order_status!='Completed')
          <td>
              <a  href="{{url('/orderstatus/update/'.$p->order_id) }}" class="btn btn-success btn-sm" role="button"> Complete </a>
          </td>
          @else
          <td>{{$p->order_status}}</td>
          @endif

          @foreach($orderline as $key => $q)
            @if($p->order_id == $q->order_id)
              @foreach($product as $key => $r)
                @if($q->product_id == $r->product_id)
                  <td>{{$r->product_name}}</td>
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

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/ajaxscript.js')}}"></script>
<script src="{{asset('js/jquery.confirm.js')}}"></script>
</body>
</html>