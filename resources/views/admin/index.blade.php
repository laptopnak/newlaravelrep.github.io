<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">

<!-- Icon Font CSS -->
<link rel="stylesheet" href="assets/css/vendor/material-design-iconic-font.min.css">
<link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/vendor/themify-icons.css">
<link rel="stylesheet" href="assets/css/vendor/cryptocurrency-icons.css">

<!-- Plugins CSS -->
<link rel="stylesheet" href="assets/css/plugins/plugins.css">

<!-- Helper CSS -->
<link rel="stylesheet" href="assets/css/helper.css">

<!-- Main Style CSS -->
<link rel="stylesheet" href="assets/css/style.css">

<!-- Custom Style CSS Only For Demo Purpose -->
<link id="cus-style" rel="stylesheet" href="assets/css/style-primary.css">


<div class="container">
    <div class="row justify-content-center">


        <!--Default Form Start-->
        <div class="col-lg-6 col-12 mb-30">
            <div class="box">
                <div class="box-head">
                    <h4 class="title">Login Form</h4>
                    
                </div>
                <div class="box-body">
                    <form action="{{url('/admin/index')}}" method="post">
                        @csrf
                        <div class="row mbn-20">

                            <div class="col-12 mb-20">
                                <label for="formLayoutEmail1">Email Address</label>
                                <input type="email" name="email" id="formLayoutEmail1" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12 mb-20">
                                <label for="formLayoutPassword1">Password</label>
                                <input type="password" name="password" id="formLayoutPassword1" class="form-control" placeholder="Password">
                            </div>


                            <div class="col-12 mb-20">
                                <input type="submit" value="Login" class="button button-primary">
                            </div>

                        </div>
                    </form>

                    
                    @if(session('error'))
                    <div class="alert alert-secondary" role="alert">
                        {{session('error')}}
                        <button class="close" data-dismiss="alert"><i class="zmdi zmdi-close"></i></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!--Default Form End-->