
    var url = "ukmk4c.000webhostapp.com/advertisement";
    //display modal form for advertisement editing

    $(document).on('click','.open_modal',function(){
        var advertisement_id = $(this).val();
       
        $.get(url + '/' + advertisement_id, function (data) {
            //success data
            console.log(data);
            $('#advertisement_id').val(data.advertisement_id).prop("disabled", true);
            $('#advertisement_name').val(data.advertisement_name);
            $('#advertisement_img').val(data.advertisement_img);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
    //display modal form for creating new advertisement
    $('#btn_add').click(function(){
        $('#advertisement_id').prop("disabled", false);
        $('#btn-save').val("add");
        $('#frmAdver').trigger("reset");
        $('#myModal').modal('show');
    });

    // delete advertisement and remove it from list
    $(document).on('click','.delete-adver',function(){
        var advertisement_id = $(this).val();

        $.confirm({
            text: "Are you sure you want to delete this advertisement? <strong>This action cannot be undone.</strong>",
            title: "Confirmation required",
            confirm: function(button) {
              
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                type: "DELETE",
                url: url + '/' + advertisement_id,
                success: function (data) {
                    console.log(data);
                    $("#advertisement" + advertisement_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
    
            });
            alert("advertisement successfully deleted");
            },
            cancel: function(button) {
            // nothing to do
            },
            confirmButton: "Yes I am sure",
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-default",
        });
        
    });
    
    //create new advertisement / update existing advertisement
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var formData = {
            advertisement_id: $('#advertisement_id').val(),
            advertisement_name: $('#advertisement_name').val(),
            advertisement_img: $('#advertisement_img').val(),
            staff_id: $('#staff_id').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var advertisement_id = $('#advertisement_id').val();
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + advertisement_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var advertisement = '<tr id="advertisement' + data.advertisement_id + '"><td>' + data.advertisement_id + '</td><td>' + data.advertisement_name + '</td><td>' + data.advertisement_img + '</td>' + '<td>' + data.staff_id + '</td>';
                advertisement += '<td><button class="btn btn-warning btn-xs btn-detail open_modal" value="' + data.advertisement_id + '">Edit</button>';
                advertisement += ' <button class="btn btn-danger btn-xs delete-adver" value="' + data.advertisement_id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#advertisement-list').append(advertisement);
                }else{ //if user updated an existing record
                    $("#advertisement" + advertisement_id).replaceWith(advertisement);  
                }
                $('#frmAdver').trigger("reset");
                $('#myModal').modal('hide');
                location.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });