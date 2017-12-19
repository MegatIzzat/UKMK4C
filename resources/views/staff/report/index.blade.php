@extends('layouts.admin.admin')

@section('title','Reporting Dashboard')

@section('content')

	<head>
        <style type="text/css">
            body, html
            {
                margin: 0; padding: 0; height: 100%; overflow: hidden;
            }

            #content
            {
                position:absolute; left: 0; right: 0; bottom: 0; top: 0px; 
            }
        </style>
    </head>
    <body>
        <div id="content">
            <iframe width="100%" height="100%" src="https://app.powerbi.com/view?r=eyJrIjoiY2ZmOWEwMDEtNmQzOS00OTY4LWE2YzMtNWQ4YjU0ZjEwYmZhIiwidCI6IjdhODU3ZTA5LWQ5YWQtNDNkMi04OTNlLTMyMTVkZGRkM2EzYiIsImMiOjEwfQ%3D%3D" frameborder="1" allowFullScreen="true" align="middle"></iframe>
        </div>
    </body>

@endsection