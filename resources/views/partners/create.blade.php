
@extends('layout/master')
@section('title', 'XLPoint-Partner Portal')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/vendors.min.css">
     
    <link rel="stylesheet" type="text/css" href="./app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/themes/semi-dark-layout.css">
     
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/wizard.css">
     
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    
@endsection

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Partner Profile</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Partner</a>
                                    </li>
                                    <li class="breadcrumb-item active">Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="info-tabs-">
                    <div class="row">
                        <div class="col-12">
                            <div class="card icon-tab">
                                <!--<div class="card-header">-->
                                <!--    <h4 class="card-title">Zoho Associate Partner Portal Registration</h4>-->
                                <!--</div>-->
                                <div class="card-content mt-2">
                                    <div class="card-body">
                                        <form action="#" class="wizard-horizontal">
                                            @csrf
                                             <!--Step 1 -->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <span class="fonticon-wrap">
                                                    <i class="livicon-evo" data-options="name:user.svg; size: 40px; style:lines;"></i>
                                                </span>
                                            </h6>
                                             <!--Step 1 end-->
                                             <!--body content of step 1 -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">Personal Details</h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" name="first_name" class="form-control" placeholder="John">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last_name" class="form-control" placeholder="Doe">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="example@company.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Mobile</label>
                                                            <input type="number" class="form-control" placeholder="+918306794646">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h6 class="py-50">Documents</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Profile Photo</label>
                                                            <div class="custom-file">
                                                                <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Proof of ID </label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputGroupFile02">
                                                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Proof of Address</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="inputGroupFile03">
                                                                <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                                 <!--Step 2 -->
                                                <h6>
                                                    <i class="step-icon"></i>
                                                    <span class="fonticon-wrap">
                                                        <i class="livicon-evo" data-options="name:building.svg; size: 40px; style:lines;"></i>
                                                    </span>
                                                </h6>
                                                 <!--Step 2 end-->
                                                 <!--body content of step 2 -->
                                                <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">Company Details</h6>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>Company Name</label>
                                                            <input type="text" class="form-control" placeholder="XYZ Pvt Ltd">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>Website URL</label>
                                                            <input type="text" class="form-control" placeholder="www.company.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>Office Contact Number</label>
                                                            <input type="text" class="form-control" placeholder="+9107923456789">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-group">
                                                            <label>GST Number</label>
                                                            <input type="text" class="form-control" placeholder="Enter GST Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                                 <!--Step 3 -->
                                                <h6>
                                                    <i class="step-icon"></i>
                                                    <span class="fonticon-wrap">
                                                        <i class="livicon-evo" data-options="name:location.svg; size: 40px; style:lines;"></i>
                                                    </span>
                                                </h6>
                                                 <!--Step 3 end-->
                                                 <!--body content of step 3 -->
                                                <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">Address Details</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Address Line 1</label>
                                                            <input type="text" class="form-control" placeholder="Enter Your House no./ Flate no.">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>address line 2</label>
                                                            <input type="text" class="form-control" placeholder="Enter Your Society name / Area name">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Landmark</label>
                                                            <input type="text" class="form-control" placeholder="Enter a LandMark">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>city</label>
                                                            <input type="text" class="form-control" placeholder="Enter Your Ciy">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" placeholder="Enter Your State">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="col-md-">
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <input type="text" class="form-control" placeholder="Enter Your Country">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </fieldset>
                                                 <!--Step 4 -->
                                                <h6>
                                                    <i class="step-icon"></i>
                                                    <span class="fonticon-wrap">
                                                        <i class="livicon-evo" data-options="name:bank.svg; size: 40px; style:lines;"></i>
                                                    </span>
                                                </h6>
                                                 <!--Step 4 end-->
                                                 <!--body content of step 4 -->
                                                <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">Bank Details</h6>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Bank Name</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                                                </div>
                                                                <select class="form-control" id="inputGroupSelect01">
                                                                    <option selected>Choose...</option>
                                                                    <option value="1">Bank of India</option>
                                                                    <option value="2">Bank of Baroda</option>
                                                                    <option value="3">ICICI Bank</option>
                                                                    <option value="4">HDFC Bank</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Account Holder Name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Account Number</label>
                                                            <input type="password" class="form-control" placeholder="Enter Account Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Confirm Account Number</label>
                                                            <input type="text" class="form-control" placeholder="Conifrm Account Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>IFSC Code</label>
                                                            <input type="text" class="form-control" placeholder="Enter IFSC Code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                             <!--Step 5-->
                                            <h6>
                                                <i class="step-icon"></i>
                                                <span class="fonticon-wrap">
                                                    <i class="livicon-evo" data-options="name:briefcase.svg; size: 40px; style:lines;"></i>
                                                </span>
                                            </h6>
                                             <!--Step 5 end-->
                                             <!--body content of step 5 -->
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6 class="py-50">Terms and conditions</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum culpa repellendus laborum maxime
                                                            dignissimos dolor excepturi iusto nemo aspernatur? Qui modi inventore reprehenderit, nostrum
                                                            quaerat libero maiores consequuntur illo veritatis.
                                                        </p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, culpa obcaecati. Qui accusantium
                                                            sit error, dolorem alias incidunt est. Laborum, atque ipsum debitis obcaecati dolor illo magni
                                                            provident harum vitae?
                                                        </p>
                                                        <p>
                                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit omnis, doloribus autem,
                                                            non quam quibusdam harum accusamus voluptatem in perspiciatis consequuntur sint nam debitis
                                                            sapiente ex, optio totam delectus quis.
                                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis placeat in quisquam dolorum
                                                            numquam, rerum expedita corporis eveniet quas nostrum, quia veritatis neque quos sint sit
                                                            exercitationem obcaecati perferendis magnam!
                                                        </p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam consequatur laudantium
                                                            voluptatibus impedit unde. Error eius consequuntur tenetur unde molestias esse doloribus animi,
                                                            temporibus placeat eaque laborum, maiores, ex quo!
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, suscipit placeat accusamus
                                                            voluptas odio est ea accusantium dignissimos et officia, cupiditate aperiam atque facilis?
                                                            Adipisci earum fuga illo odit reiciendis. Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Asperiores nihil necessitatibus sequi placeat tenetur, perspiciatis, excepturi dolor, consectetur
                                                            assumenda amet accusantium velit fuga numquam tempore repellendus voluptatem vitae. Voluptatem,
                                                            hic.
                                                        </p>
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde perspiciatis vero, reprehenderit
                                                            beatae necessitatibus dignissimos animi distinctio illo porro fuga maxime nemo voluptate
                                                            aspernatur tempore? Incidunt consectetur dignissimos blanditiis. Corporis. Lorem ipsum dolor sit
                                                            amet consectetur, adipisicing elit. At, dolore omnis! Architecto dolorem non, earum pariatur,
                                                            molestias voluptatem saepe voluptatibus praesentium expedita cum quae et assumenda. Voluptas
                                                            debitis praesentium quis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque veniam
                                                            ipsa saepe sint necessitatibus incidunt nihil totam delectus, dolor omnis itaque libero sed
                                                            molestiae assumenda non repellat, rerum, eius quia. lorem
                                                        </p>
                                                        <strong>Read all term and conditions carefully.</strong>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="radio">
                                                                <input type="radio" name="bsradio" id="agree">
                                                                <label for="agree" class="text-success">I read all term and conditions and i Agree.</label>
                                                            </div>
                                                            <div class="radio">
                                                                <input type="radio" name="bsradio" id="disagree">
                                                                <label for="disagree" class="text-danger">I am not Agree with it.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                             <!--body content of step 5 end-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('jqcdn')
    <script src="./app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="./app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
     
    <script src="./app-assets/js/scripts/configs/vertical-menu-light.js"></script>
    <script src="./app-assets/js/core/app-menu.js"></script>
    <script src="./app-assets/js/core/app.js"></script>
    <script src="./app-assets/js/scripts/components.js"></script>
    <script src="./app-assets/js/scripts/footer.js"></script>
     
    <script src="./app-assets/js/scripts/forms/wizard-steps.js?v={{Carbon\Carbon::now()->format('h')}}"></script>
    <script src="{{asset('vanguard/assets/js/mls.js?v='. Carbon\Carbon::now()->format('h'))}}"></script>
    
    
@endsection