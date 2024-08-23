@extends('layout/master')
@section('title', 'XLPoint-Partner Portal')
@section('page-css')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/charts/apexcharts.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/pickers/daterange/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/vendors.min.css">

<link rel="stylesheet" type="text/css" href="./app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="./app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="./app-assets/css/components.css">
<link rel="stylesheet" type="text/css" href="./app-assets/css/themes/dark-layout.css">
<link rel="stylesheet" type="text/css" href="./app-assets/css/themes/semi-dark-layout.css">

<link rel="stylesheet" type="text/css" href="./assets/css/style.css">

@endsection

@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row align-items-center">
                <div class="content-header-left col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h5 class="content-header-title mb-0 pr-3">Permission Overview</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/users">Users</a>
                                    </li>
                                    <li class="breadcrumb-item active">Permissions</li>
                                </ol>
                            </div>
                        </div>
                        <div class="card-content">
                            <!--<button type="button" class="btn btn-primary btn-block my-0 compose-btn" data-toggle="modal"-->
                            <!--    data-target="#default">-->
                            <!--    <i class="bx bx-plus"></i>-->
                            <!--    Add New Permission-->
                            <!--</button>-->

                            <!--Basic Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel1">Add New Permission</h3>
                                            <button type="button" class="close rounded-pill" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('permissions.store') }}" method="POST" id="newPermForm" onsubmit="return validateForm(event)">
                                                @csrf
                                                <div class="card-content">
                                                    <div class="card-body pt-0">
                                                        <h6>Permission Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="permission_name" id="permName" placeholder="Enter permission name">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-check-shield"></i>
                                                            </div>
                                                            <span id="permNameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Permission Description</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="permission_desc" id="permDesc" placeholder="Enter permission description">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-chat"></i>
                                                            </div>
                                                            <span id="permDescError" style="color: red;"></span>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-end pt-0">
                                                    <button type="reset" class="btn btn-light-secondary cancel-btn mr-1">
                                                        <i class='bx bx-x mr-25'></i>
                                                        <span class="d-sm-inline d-none">Clear</span>
                                                    </button>
                                                    <button type="submit" class="btn-send btn btn-primary">
                                                        <i class='bx bx-send mr-25'></i> <span class="d-sm-inline d-none">Submit</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="pt-1 pb-1">A permission provided access to predefined menus and features so that depending on  
            assigned role an administrator can have access to what user needs.</p>
            
            <!-- Role cards -->
            <div class="row g-4 mt-2">
                
                <div class="col-12">
                    <!-- Role Table -->
                    <div class="card">
                        <div class="card-datatable table-responsive pt-2">
                            <!-- table checkbox start -->
                            <section id="table-chechbox">
                                <div class="card">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="table-extended" class="table table-transparent">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Assigned to</th>
                                                    <th>Created date</th>
                                                    <!--<th>action</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!is_null($permissions))
                                                    @foreach ($permissions as $permission)
                                                        @if ($permission->parent_id == null) 
                                                        <tr class="group">
                                                            <td class="text-bold-500 py-1 pl-3 primary" colspan="6">{{$permission->name}}</td>
                                                        </tr>
                                                        @else
                                                        <tr>
                                                            <td class="py-1"></td>
                                                            <td class="text-bold-400 pl-0 py-1">{{$permission->name}}</td>
                                                            <td class="text-bold-300">{{$permission->description}}</td>
                                                            <td>
                                                                @foreach ($permission->roles as $role)
                                                                    @if ($role->name === 'Admin')
                                                                        <span class="badge badge-light-danger">{{$role->name}}</span>
                                                                    @elseif ($role->name === 'Partner')
                                                                        <span class="badge badge-light-primary">{{$role->name}}</span>
                                                                    @else
                                                                        <span class="badge badge-light-warning">{{$role->name}}</span>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td class="text-bold-300">{{$permission->created_at}}</td>
                                                            <td>
                                                                <!--<span class="text-nowrap">-->
                                                                <!--    <button class="btn btn-sm btn-icon me-2" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bx bx-edit"></i></button>-->
                                                                <!--</span>-->
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <tr class="group">
                                                        <td colspan="8" style="text-align:center">No records found!</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </section>
                            <!-- table checkbox ends -->
                        </div>
                    </div>
                    <!--/ Role Table -->
                </div>
            </div>
        </div>
        <!-- / Content -->

@endsection

@section('jqcdn')

<script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="./app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="./app-assets/vendors/js/pickers/daterange/moment.min.js"></script>
<script src="./app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>

<script src="./app-assets/js/scripts/pages/table-extended.js"></script>

<script src="./app-assets/js/scripts/configs/vertical-menu-light.js"></script>
<script src="./app-assets/js/core/app-menu.js"></script>
<script src="./app-assets/js/core/app.js"></script>
<script src="./app-assets/js/scripts/components.js"></script>
<script src="./app-assets/js/scripts/footer.js"></script>

<script src="../../assets/js/app-access-roles.js"></script>
<script src="../../assets/js/modal-add-role.js"></script>

<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
</script>

<script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        function validateForm(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Access form fields and their values
            var permName = document.forms["newPermForm"]["permName"].value;
            var permDesc = document.forms["newPermForm"]["permDesc"].value;
            
            // Access error message elements
            var permNameError = document.getElementById("permNameError");
            var permDescError = document.getElementById("permDescError");
            
            // Initialize a variable to track if the form is valid
            var isValid = true;
        
            // Validate the first name
            if (permName.trim() === "") {
                permNameError.innerHTML = "Permission name cannot be empty";
                isValid = false;
            } else {
                permNameError.innerHTML = "";
            }
        
            // Validate the last name
            if (permDesc.trim() === "") {
                permDescError.innerHTML = "Permission description cannot be empty";
                isValid = false;
            } else {
                permDescError.innerHTML = "";
            }
        
            // If everything is valid, submit the form
            if (isValid) {
                document.getElementById("newPermForm").submit();
            }
        }

    </script>

@endsection