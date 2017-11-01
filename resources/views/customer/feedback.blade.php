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
        @if($p->cust_id=='C0002')
        @if($p->order_status=='Completed')
        <tr>
          <td>
            {{date('d-M-Y', strtotime($p->order_date.' + 8 hours'))}}<br>
            {{date('h:i A', strtotime($p->order_date.' + 8 hours'))}}
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
              <div><button class="btn btn-success btn-xs">Rate</button></div>
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
            <textarea id="myDIV" style="width:100%" rows="3"></textarea>
            <br>
            <a class="btn btn-success btn-sm"  role="button" style="width:100%">Send Feedback</a>
          </td>

        </tr>
        @endif
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
