@extends('layouts.admin.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Staff List</div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th> Staff ID </th>
                                <th> Staff Name </th>
                                <th> Staff Email </th>
                                <!-- <th> Action </th> -->
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staff as $s)
                            <tr>
                                <td>{{ $s->staff_id }}</td>
                                <td>{{ $s->user->user_name }}</td>
                                <td>{{ $s->staff_email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>

            <center>{{$staff->links()}}</center>
        </div>
    </div>
</div>
@endsection

