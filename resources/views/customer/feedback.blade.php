

<html>
<head>
 <title>Order History K4C</title>  
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
</head>
<body>
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
            <th>Order Date</th>
            <th>Order ID</th>
            <th>Product Purchased</th>
            <th>Paid</th>
            <th>Waiting Time</th>
            <th>Feedback</th>


          </tr>
        </thead>

        @foreach($order as $key => $p)
        @if($p->cust_id=='C0003')
        <tr>
          <td>{{$p->order_date}}</td>
          <td>{{$p->order_id}}</td>
          



          <td>
            <?php $x=0; ?>  
            @foreach($orderline as $key => $q)
            @if($p->order_id == $q->order_id)
            @foreach($product as $key => $r)

            @if($q->product_id == $r->product_id)
            <?php $x+=1; ?>
            @if($x>1)
            ,
            @endif
            {{$r->product_name}}

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
            echo round(abs($to_time - $from_time) / 60). " minutes"; 
            ?>
          </td>

          <td>
            <textarea rows="3"></textarea>
            <br>
            <a class="btn btn-success btn-sm" role="button" href="">Send Feedback</a>
          </td>

        </tr>
        @endif
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