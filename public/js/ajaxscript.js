
    var url = "http://127.0.0.1:8000/productmanagement";
    //display modal form for product editing

    $(document).on('click','.open_modal',function(){
        var product_id = $(this).val();
       
        $.get(url + '/' + product_id, function (data) {
            //success data
            console.log(data);
            $('#product_id').val(data.product_id).prop("disabled", true);
            // $('#product_id').val(data.product_id);
            $('#product_name').val(data.product_name);
            $('#product_price').val(data.product_price);
            $('#category_id').val(data.category_id);
            $('#product_img').val(data.product_img);
            $('#product_rating').val(data.product_rating).prop("displayOnly", true);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        }) 
    });
    //display modal form for creating new product
    $('#btn_add').click(function(){
        $('#product_id').prop("disabled", false);
        $('#btn-save').val("add");
        $('#frmProducts').trigger("reset");
        $('#myModal').modal('show');
    });

    // delete product and remove it from list
    $(document).on('click','.delete-product',function(){
        var product_id = $(this).val();

        $.confirm({
            text: "Are you sure you want to delete this product? <strong>This action cannot be undone.</strong>",
            title: "Confirmation required",
            confirm: function(button) {
              
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            $.ajax({
                type: "DELETE",
                url: url + '/' + product_id,
                success: function (data) {
                    console.log(data);
                    $("#product" + product_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
    
            });
            alert("Product successfully deleted");
            },
            cancel: function(button) {
            // nothing to do
            },
            confirmButton: "Yes I am sure",
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-default",
        });
        
    });
    // $(document).on('click','.delete-product',function(){
    //     var product_id = $(this).val();
    //      $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     })
    //     $.ajax({
    //         type: "DELETE",
    //         url: url + '/' + product_id,
    //         success: function (data) {
    //             console.log(data);
    //             $("#product" + product_id).remove();
    //         },
    //         error: function (data) {
    //             console.log('Error:', data);
    //         }

    //     });
    // });
    //create new product / update existing product
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        e.preventDefault(); 
        var formData = {
            product_id: $('#product_id').val(),
            product_name: $('#product_name').val(),
            product_price: $('#product_price').val(),
            category_id: $('#category_id').val(),
            product_img: $('#product_img').val(),
            product_rating: $('#product_rating').val(),
        }
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var product_id = $('#product_id').val();
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + product_id;
        }
        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var product = '<tr id="product' + data.product_id + '"><td>' + data.product_id + '</td><td>' + data.product_name + '</td><td>' + data.product_price + '</td><td>' + data.category_id + '</td><td>' + data.product_img + '</td><td>' + data.product_rating + '</td>' ;
                product += '<td><button class="btn btn-warning btn-detail open_modal" value="' + data.product_id + '">Edit</button>';
                product += ' <button class="btn btn-danger btn-delete delete-product" value="' + data.product_id + '">Delete</button></td></tr>';
                if (state == "add"){ //if user added a new record
                    $('#products-list').append(product);
                }else{ //if user updated an existing record
                    $("#product" + product_id).replaceWith( product );
                    
                }
                $('#frmProducts').trigger("reset");
                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });