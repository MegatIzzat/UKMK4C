@extends('layouts.admin.admin')

@section('title','Product')

@section('content')

<html>
  <head>
   <title>Product Management K4C</title>  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 
  </head>
<body>
<div class="container">
<div class="panel panel-primary">
 <div class="panel-heading">Product Management
 <button id="btn_add" name="btn_add" class="btn btn-success pull-right">Add New Product</button>
    </div>
      <div class="panel-body">
        @include('error.flash-message')
        <ul>
          @foreach($errors->all() as $key)
            <li>{{ $key }}</li>
          @endforeach
        </ul>
       <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th>Rating</th>
            <th>Actions</th>
          </tr>
         </thead>
         <tbody id="products-list" name="products-list">
           @foreach ($products as $product)
            <tr id="product{{$product->product_id}}">
             <td>{{$product->product_id}}</td>
             <td>{{$product->product_name}}</td>
             <td>RM {{number_format($product->product_price, 2)}}</td>
             <td>{{$product->category_id}}</td>
             <td><div><button class="btn btn-primary btn-sm upload-img" id="btn-img" value="{{$product->product_id}}">Upload</button></div></td>
             <td>{{number_format($product->product_rating, 1)}}</td>
              <td>
              <button class="btn btn-warning btn-detail open_modal" value="{{$product->product_id}}">Edit</button>
              <button class="btn btn-danger btn-delete delete-product" value="{{$product->product_id}}">Delete</button>
              </form>
              </td>
            </tr>
            @endforeach
        </tbody>
        </table>
       </div>
       </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">New Product</h4>
            </div>
            <div class="modal-body">
            
            <form id="frmProducts" name="frmProducts" class="form-horizontal">
              <div class="form-group">
                 <label for="inputId" class="col-sm-3 control-label">ID</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control" id="product_id" name="id" placeholder="Product ID" value="">
                   </div>
                   </div>
                <div class="form-group">
                 <label for="inputName" class="col-sm-3 control-label">Name</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control" id="product_name" name="name" placeholder="Product Name" value="">
                   </div>
                   </div>
                 <div class="form-group">
                 <label for="inputPrice" class="col-sm-3 control-label">Price</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" id="product_price" name="price" min="0" step="0.1" placeholder="Product Price" value="">
                    </div>
                </div>
                <div class="form-group">
                 <label for="inputCategory" class="col-sm-3 control-label">Category</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="category_id" name="category">
                        <option value="0" disabled="true" selected="true">--Select--</option>
                        @foreach($category as $cat)
                          <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                        @endforeach
                      </select>
                    {{-- <input type="text" class="form-control" id="category_id" name="category" placeholder="Product Category" value=""> --}}
                    </div>
                </div>
                <div>
                    <input type="hidden" class="form-control" id="product_img" name="product_img" value="no-image.jpg">
                </div>
                <div class="form-group">
                 <label for="inputRating" class="col-sm-3 control-label">Rating</label>
                    <div class="col-sm-9">
                    <input type="number" class="form-control" id="product_rating" name="rating" readonly="">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save">Add Product</button>
            {{-- <input type="hidden" id="product_id" name="product_id" value="0"> --}}
            </div>
        </div>
      </div>
  </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Product</h4>
      </div>
      <div class="modal-body">
      
      <form id="frmUpdateProducts" name="frmUpdateProducts" class="form-horizontal" action="{{route('staff.product.update', $product->product_id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
           <label for="inputId" class="col-sm-3 control-label">ID</label>
             <div class="col-sm-9">
              <input type="text" class="form-control" id="upproduct_id" name="upproduct_id">
             </div>
        </div>
          <div class="form-group">
           <label for="inputName" class="col-sm-3 control-label">Name</label>
             <div class="col-sm-9">
              <input type="text" class="form-control" id="upproduct_name" name="upproduct_name">
             </div>
             </div>
           <div class="form-group">
           <label for="inputPrice" class="col-sm-3 control-label">Price</label>
              <div class="col-sm-9">
              <input type="number" class="form-control" id="upproduct_price" min="0" step="0.1" name="upproduct_price">
              </div>
          </div>
          <div class="form-group">
           <label for="inputCategory" class="col-sm-3 control-label">Category</label>
              <div class="col-sm-9">
                <select class="form-control" id="upcategory_id" name="upcategory_id">
                  <option value="0" disabled="true" selected="true">--Select--</option>
                  @foreach($category as $cat)
                    <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                  @endforeach
                </select>
              {{-- <input type="text" class="form-control" id="category_id" name="category" placeholder="Product Category" value=""> --}}
              </div>
          </div>
          <div>
              <input type="hidden" class="form-control" id="upproduct_img" name="upproduct_img">
          </div>
          <div class="form-group">
           <label for="inputRating" class="col-sm-3 control-label">Rating</label>
              <div class="col-sm-9">
              <input type="number" class="form-control" id="upproduct_rating" name="upproduct_rating" readonly="">
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-update">Save changes</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Delete Product</h4>
      </div>
      <div class="modal-body">
      
      <form id="frmDeleteProducts" name="frmDeleteProducts" class="form-horizontal" action="{{route('staff.product.delete', $product->product_id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <div class="form-group">
           <label for="inputId" class="col-sm-3 control-label">ID</label>
             <div class="col-sm-9">
              <input type="text" class="form-control" id="deproduct_id" name="deproduct_id" readonly="">
             </div>
        </div>
          <div class="form-group">
           <label for="inputName" class="col-sm-3 control-label">Name</label>
             <div class="col-sm-9">
              <input type="text" class="form-control" id="deproduct_name" name="deproduct_name" readonly="">
             </div>
          </div>
          <div class="modal-footer">
            <p>Are you sure you want to delete this product? <strong>This action cannot be undone.</strong></p>
            <button type="submit" class="btn btn-danger btn-delete">Confirm Delete</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
      </div>
      <div class="modal-body">
      
      <form id="frmUpload" name="frmUpload" class="form-horizontal" action="{{route('staff.product.upload', $product->product_id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- {{method_field('PUT')}} --}}
        <div class="form-group">
           <label class="col-sm-3 control-label">ID</label>
             <div class="col-sm-9">
              <input type="text" class="form-control" id="fileproduct_id" name="fileproduct_id" readonly="">
             </div>
        </div>
          <div class="form-group">
           <label class="col-sm-3 control-label">Name</label>
             <div class="col-sm-9">
              <input type="text" class="form-control" id="fileproduct_name" name="fileproduct_name" readonly="">
             </div>
          </div>
          <div class="form-group">
           <label class="col-sm-3 control-label">Current Image</label>
             <div class="col-sm-9">
              <p class="form-control" id="fileproduct_current" name="fileproduct_current">No Image Available</p>
             </div>
          </div>
          <div class="form-group">
           <label class="col-sm-3 control-label">New Image</label>
             <div class="col-sm-9">
              <input type="file" class="form-control" id="fileproduct_img" name="fileproduct_img" accept="image/jpg, image/jpeg">
             </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

    <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajaxscript.js')}}"></script>
    <script>
      var form = document.getElementById('frmUpload'); 
      var request = new XMLHttpRequest();

      form.addEventListener('submit', function(e) {
         e.preventDefault();
         var formdata = new FormData(form);

         request.open('post', 'product/upload');
         request.addEventListener("load", transferComplete);
         request.send(formdata);
         $('#frmUpload').trigger("reset");
         $('#uploadModal').modal('hide');
         alert("File Successfully Uploaded!");
      });

      function transferComplete(data) {
        console.log("Completed");
      }

    </script>

</body>
</html>

@endsection