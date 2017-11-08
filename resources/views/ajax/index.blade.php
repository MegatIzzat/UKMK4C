@extends('layouts.staff.staff')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Dashboard</div>

                <div class="panel-body">
                    <table class="table table-bordered table-striped table-condensed">
                    <thead>
                    <tr>
                    <th> Customer ID </th>
                    <th> Customer Name </th>
                    <th> Customer Email </th>
                    <th> Action </th>
                    </tr>
                    </thead>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
