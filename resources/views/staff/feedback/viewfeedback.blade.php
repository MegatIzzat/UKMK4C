@extends('layouts.admin.admin')

@section('title','Feedback')

@section('content')

  <div class="container">
    <div class="panel panel-primary">
     <div class="panel-heading">Feedback
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

        @foreach($order->reverse() as $key => $p)
        @if($p->order_status=='Completed' && $p->order_feedback!=null)
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


          <td>RM {{number_format($p->total_price, 2)}}</td>

          <td>
            <?php
            $to_time = strtotime($p->order_date);
            $from_time = strtotime($p->order_completed); 
            ?>
            {{round(abs($to_time - $from_time) / 60). " minutes"}}
          </td>

        <td>{{$p->order_feedback}}</td>
        
        </tr>
        @endif
        @endforeach
      </table>

    </div>
  </div>
</div>

<center>{{$order->links()}}</center>




@endsection