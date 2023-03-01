@include('admin.include.header')

<!--======================== Add Category Model Start ========================-->

<div class="modal fade" id="Add_category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/add_category')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Category Name:</label>
                        <input type="text" name="name" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Category Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Category Status:</label>
                        <label><input type="radio" name="status" value="active">Active</label>
                        <label><input type="radio" name="status" value="deactive">Deactive</label>
                    </div>

            </div>
            <div class="modal-footer">
                <button class="button button-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--========================== Add Category Model End ========================-->


<!--======================== Edit Category Model Start ========================-->

<div class="modal fade" id="edit_category">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/update_category/')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="data_id" id="data_id">
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Category Name:</label>
                        <input type="text" name="edit_name" id="edit_name" class="form-control" placeholder="Type Here...">
                    </div>
                    <div class="form-group mt-2 mb-2">
                        <label class="col-form-label">Category Image:</label>
                        <input type="file" name="edit_image" class="form-control">
                        <!-- <input type="hidden" name="edit_image_2" id="edit_image"> -->
                        <div class="get_image pt-2"></div>

                    </div>
                    <div class="form-group mt-2 mb-2 ">
                        <label class="col-form-label">Category Status:</label>
                        <div class="get_status"></div>
                        <!-- <label><input type="radio" name="edit_status" class="status"  value="active">Active</label>
                        <label><input type="radio" name="edit_status" value="deactive">Deactive</label> -->
                    </div>

            </div>
            <div class="modal-footer">
                <button class="button button-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--========================== Edit Category Model End ========================-->




<!--Table Striped Light Start-->
<!-- Add Category Model Button -->
<button class="button button-info" data-bs-toggle="modal" data-bs-target="#Add_category"><span>Add Category</span></button>
<!-- Add Category Model Button end -->
<div class="col-lg-12 col-12 mb-30 mt-2">
    <div class="box">
        <div class="box-head">
            <h4 class="title">Category Information</h4>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Category Image</th>
                        <th>Category Name</th>
                        <th>Category Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp

                    @foreach ($category as $cat)

                    <tr>
                        <td> @php echo $counter++; @endphp</td>
                        <td> <img src="{{url('admin_images/')}}/{{$cat->cat_image}}" class="img-fluid"> </td>
                        <td>{{$cat->cat_title}}</td>

                        @if($cat->cat_status == 'active')
                        <td><span class="badge badge-success"> {{$cat->cat_status}} </span></td>

                        @else
                        <td><span class="badge badge-danger"> {{$cat->cat_status}} </span></td>
                        @endif
                        <td>
                            <div class="table-action-buttons d-flex">

                                <button class="edit button button-box  button-info" id="{{$cat->cat_id}}" data-bs-toggle="modal" data-bs-target="#edit_category"><i class="zmdi zmdi-edit"></i></button>
                                <form action="/admin/delete_category/{{$cat->cat_id}}" method="post">
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

<script>
    $(document).ready(function() {
        $(".edit").click(function() {
            var get_id = $(this).attr("id");
            // alert(get_id);

            $.ajax({
                type: "get",
                url: "edit_category/" + get_id,
                success: function(response) {

                    // console.log(response);
                    $("#data_id").val(response.data.cat_id);
                    $("#edit_name").val(response.data.cat_title);
                    var img = '<img src="{{url("/admin_images")}}/'+response.data.cat_image+'" width="100" height="100">';
                    $(".get_image").html(img);
                    // $(".status").html(response.data.cat_status);
                    if (response.data.cat_status == 'active') {
                        $(".get_status").html("<label><input type='radio' name='edit_status' class='status'  value='active' checked>Active</label><label><input type='radio' name='edit_status' value='deactive'>Deactive</label>");
                    }
                    if (response.data.cat_status == 'deactive') {
                        $(".get_status").html("<label><input type='radio' name='edit_status' class='status'  value='active' >Active</label>   <label><input type='radio' name='edit_status' value='deactive' checked>Deactive</label>");
                    }
                }


            });
        });


    });
</script>