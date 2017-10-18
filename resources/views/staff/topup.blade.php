<!DOCTYPE html>
<html>
<head>
    <title>Top Up K4C</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/btn-gradient.css" media="all" rel="stylesheet" type="text/css" /> 
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well">
                <div>
                    <h3 class="text-center">Top Up Account</h3>
                </div>
                <div class="panel-body">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control input-lg" placeholder="Customer ID" id="cust_id" name="cust_id" type="text">
                        </div>
                        {{-- <div class="form-group">
                            <select class="form-control input-lg">
                                <option selecterd="">Security Question</option>
                            </select>
                        </div> --}}
                        <div id="topupvalue" class="btn-group-vertical btn-lg" data-toggle="buttons">
                            <div class="col-md-12 btn-group-justified">
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm5" value="5"> RM 5
                            </label>
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm10" value="10"> RM 10
                            </label>
                            </div>
                            <div class="col-md-12 btn-group-justified">
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm15" value="15"> RM 15
                            </label>
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm20" value="20"> RM 20
                            </label>
                            </div>
                            <div class="col-md-12 btn-group-justified">
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm25" value="25"> RM 25
                            </label>
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm30" value="30"> RM 30
                            </label>
                            </div>
                            <div class="col-md-12 btn-group-justified">
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm35" value="35"> RM 35
                            </label>
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm40" value="40"> RM 40
                            </label>
                            </div>
                            <div class="col-md-12 btn-group-justified">
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm45" value="45"> RM 45
                            </label>
                            <label class="btn btn-primary gradient">
                              <input type="radio" name="topup" id="rm50" value="50"> RM 50
                            </label>
                            </div>
                        </div>
                        {{-- <div class="checkbox">
                            <label>
                                <input name="terms" type="checkbox">I have read and agree to the <a href="#">terms of service</a>

                            </label>
                        </div> --}}

                        <input class="btn btn-lg btn-success btn-block" value="PROCEED" type="submit">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/jquery.confirm.js')}}"></script>

    <script type="text/javascript">
        $("#topupvalue :input").change(function() {
            var data = { topup: $('#topupvalue').val(), }
            var id= $(this).attr('id');
            var value= $(this).attr('value');
            console.log(id, value); 
        });
    </script>

    <script>
        $(document).on('click','.btn-success',function(){
            var cust_id = $('#cust_id').val();
            console.log(cust_id); 
        });
    </script>

    {{-- <script type="text/javascript">
        $(document).on('click','.btn-success',function(){
        var cust_id = $('#cust_id').val();
    
        $.confirm({
            text: cust_id,
            title: "Confirmation required",
            confirm: function(button) {
              
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                type: "PUT",
                success: function (data) {
                    console.log(data);
                    cust_balance.replaceWith(value + cust_balance );
                },
                error: function (data) {
                    console.log('Error:', data);
                }
    
            });
            alert("Top Up Successful");
            },
            cancel: function(button) {
            // nothing to do
            },
            confirmButton: "Yes, proceed",
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-default",
        });
        
    });
    </script>
 --}}
</body>
</html>