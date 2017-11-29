@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Customer List</div>

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
                                <!-- <td><div class="btn-group">
                                <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Reduce by 1</a></li>
                                </ul>
                            </div></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
