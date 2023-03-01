@include('admin.include.header')


<!--======================== Add Category Model Start ========================-->

<div class="modal fade" id="Add_products">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/add_product')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Name:</label>
                        <input type="text" name="p_name" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Description:</label>
                        <input type="text" name="p_description" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Price:</label>
                        <input type="text" name="p_price" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Sale Price:</label>
                        <input type="text" name="p_sale_price" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Quantity:</label>
                        <input type="text" name="p_quantity" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Category:</label>
                        <select name="p_category" class="form-control">
                            <option value="">---Select Category---</option>
                            @foreach ($category as $cat)

                            <option value="{{$cat->cat_id}}">{{$cat->cat_title}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Image:</label>
                        <input type="file" name="p_image" class="form-control">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Product Status:</label>
                        <label><input type="radio" name="p_status" value="active">Active</label>
                        <label><input type="radio" name="p_status" value="deactive">Deactive</label>
                    </div>

            </div>
            <div class="modal-footer justify-content-center">
                <button class="button button-primary">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--========================== Add Category Model End ========================-->



<!--Table Striped Light Start-->
<!-- Add Category Model Button -->
<button class="button button-info" data-bs-toggle="modal" data-bs-target="#Add_products"><span>Add Products</span></button>
<!-- Add Category Model Button end -->
<div class="col-lg-12 col-12 mb-30 mt-2">
    <div class="box">
        <div class="box-head">
            <h4 class="title">Products Information</h4>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Product Description</th>
                        <th>Product Price</th>
                        <th>Product Sale Price</th>
                        <th>Product Quantity</th>
                        <th>Product Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp


                    @foreach($products as $pro)

                    <tr>
                        <td> @php echo $counter++; @endphp</td>
                        <td> <img src="{{url('admin_images/')}}/{{$pro->p_image}}" class="img-fluid"> </td>
                        <td>{{$pro->p_title}}</td>
                        <td>
                            @php
                            $cat_id = $pro->category_id;
                            @endphp
                            @foreach ($category as $cat)

                           {{$cat_id = $cat->cat_title}}

                            @endforeach

                        </td>
                        <td>{{$pro->p_description}}</td>
                        <td>{{$pro->p_price}}</td>
                        <td>{{$pro->p_sale_price}}</td>
                        <td>{{$pro->p_quantity}}</td>

                        <td><span class="badge badge-success"> </span></td>

                        <td>
                            <div class="table-action-buttons d-flex">

                                <button class="edit button button-box  button-info" id="" data-bs-toggle="modal" data-bs-target="#edit_category"><i class="zmdi zmdi-edit"></i></button>
                                <form action="" method="post">
                                    @csrf
                                    <button class="delete button button-box button-danger"><i class="zmdi zmdi-delete"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
<!--Table Striped Light End-->



@include('admin.include.footer')