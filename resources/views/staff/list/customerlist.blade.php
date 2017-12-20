@extends('layouts.admin.admin')

@section('title','Customer List')

@section('content')
<div class="col-md-8 col-md-offset-2">
                <!-- Alert -->
                @include('error.flash-message')
                
                <!-- Content Column -->
                @foreach($errors->all() as $key)
                    <li>{{ $key }}</li>
                @endforeach
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customer List</div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th> Customer ID </th>
                                <th> Customer Name </th>
                                <th> Customer Email </th>
                                <!-- <th> Action </th> -->
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($customer as $u)
                            <tr>
                                <td>{{ $u->cust_id }}</td>
                                <td>{{ $u->user->user_name }}</td>
                                <td>{{ $u->cust_email }}</td>
                                <td>
                                    <form class="form-horizontal" method="POST" action="{{ route('staff.resetPassword', $u->cust_id)}}">
                                        {{csrf_field()}}
                                        {{ method_field('POST') }}
                                            <button style="width:100%" class="btn-danger" type="submit"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Reset Password</button>
                                        </td>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
            <center>{{$customer->links()}}</center>
        </div>
    </div>
</div>
@endsection

