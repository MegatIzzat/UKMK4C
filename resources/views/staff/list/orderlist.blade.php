@extends('layouts.admin.admin')

@section('title','Order List')

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
            <th>Order Completed</th>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Product Purchased</th>     

          </tr>
        </thead>

        @foreach($order->reverse() as $key => $p)
        @if($p->order_status=='Completed' && $p->order_feedback!=null)
        <tr>
          <td>
            {{date('d-M-Y', strtotime($p->order_completed.' + 8 hours'))}}<br>
            {{date('h:i A', strtotime($p->order_completed.' + 8 hours'))}}
          </td><!-- Display in Malaysia time -->
          <td>{{$p->order_id}}</td>

          <td>{{$p->cust_id}}</td>

          
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
        
        </tr>

        @endif
        @endforeach
      </table>

    </div>
  </div>
</div>

<center>{{$order->links()}}</center>

<div class="col-md-offset-4 col-md-4">
  <a href="/" class="btn btn-success btn-block" role="button">Back to Home</a></li>
</div>


@endsection