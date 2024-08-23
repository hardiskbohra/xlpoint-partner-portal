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

<style>
    .custom-control-label {
        font-weight:normal; font-size:14px;
    }
</style>

@endsection

@section('content')
<div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row align-items-center">
                <div class="content-header-left col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h5 class="content-header-title mb-0 pr-3">Role Overview</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/users">Users</a>
                                    </li>
                                    <li class="breadcrumb-item active">Roles</li>
                                </ol>
                            </div>
                        </div>
                        <div class="card-content">
                            <button type="button" class="btn btn-primary btn-block my-0 compose-btn" data-toggle="modal"
                                data-target="#default">
                                <i class="bx bx-plus"></i>
                                Add New Role
                            </button>

                            <!--Basic Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel1">Add New Role</h3>
                                            <button type="button" class="close rounded-pill" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('roles.store') }}" method="POST" id="newRoleForm" onsubmit="return validateForm(event)">
                                                @csrf
                                                <div class="card-content">
                                                    <div class="card-body pt-0 pb-0">
                                                        <h6>Role Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="role_name" id="roleName" placeholder="Enter role name">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-check-shield"></i>
                                                            </div>
                                                            <span id="roleNameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Role Description</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="role_desc" id="roleDesc" placeholder="Enter role description">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-chat"></i>
                                                            </div>
                                                            <span id="roleDescError" style="color: red;"></span>
                                                        </fieldset>
                                                        <br>
                                                        <h6>Role Permissions</h6>
                                                        <span id="rolePermError" style="color: red;"></span>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <!-- Permission table -->
                                                            <div class="table-responsive">
                                                                <table class="table table-flush-spacing">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-nowrap">
                                                                                Administrator Access 
                                                                                <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip" data-bs-placement="top" title="Allows a full access to the system"></i>
                                                                            </td>
                                                                            <td>
                                                                                <fieldset>
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" class="custom-control-input" name="customCheck" id="selectAll">
                                                                                        <label class="custom-control-label" for="selectAll">Select All</label>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </td>
                                                                        </tr>
                                                                        @foreach ($permissions as $permission)
                                                                        {{-- {{ dd(permission->id);}} --}}
                                                                            <tr>
                                                                                <td class="text-nowrap">{{$permission->name}}</td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <fieldset class="pr-3">
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input type="checkbox" class="custom-control-input" checked name="customCheck" id="{{$permission->name}}-read">
                                                                                                <label class="custom-control-label" for="{{$permission->name}}-read">Read</label>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                        <fieldset class="pr-3">
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input type="checkbox" class="custom-control-input" name="customCheck" id="{{$permission->name}}-write">
                                                                                                <label class="custom-control-label" for="{{$permission->name}}-write">Write</label>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <div class="custom-control custom-checkbox">
                                                                                                <input type="checkbox" class="custom-control-input" name="customCheck" id="{{$permission->name}}-create">
                                                                                                <label class="custom-control-label" for="{{$permission->name}}-create">Create</label>
                                                                                            </div>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="card-footer d-flex">
                                                        <a href="/permissions">Manager Permissions</a>
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
            <p>A role provided access to predefined menus and features so that depending on <br> 
            assigned role an administrator can have access to what user needs.</p>
            
            <!-- Role cards -->
            <div class="row g-4">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-0">
                                <h6 class="fw-normal">Total 4 users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Vinnie Mostowy" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Allen Rieske" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-4.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Julee Rossignol" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">Administrator</h4>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                        class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-0">
                                <h6 class="fw-normal">Total 7 users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-4.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">Partner</h4>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                        class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-0">
                                <h6 class="fw-normal">Total 5 users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-9.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar">
                                    </li>
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Kaith D'souza" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="Avatar">
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">Users</h4>
                                    <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                        class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <!-- Role Table -->
                    <div class="card">
                        <div class="card-datatable table-responsive">
                            <!-- table checkbox start -->
                            <section id="table-chechbox">
                                <div class="card">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="table-extended" class="table table-transparent">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>role</th>
                                                    <th>permissions</th>
                                                    <th>users</th>
                                                    <th>status</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!is_null($roles))
                                                    @foreach ($roles as $role)
                                                    {{-- {{ dd(role->id);}} --}}
                                                        <tr>
                                                            <td></td>
                                                            <td><img class="rounded-circle mr-1" src="./public/app-assets/upload/{{$role->name}}.png" width="50px"><a href="./html/ltr/vertical-menu-template/page-users-view.html">{{$role->name}}</a>
                                                            </td>
                                                            <td>0</td>
                                                            <td>2</td>
                                                            <td>
                                                                @if($role->status == 1)
                                                                    <span class="badge badge-success">Active</span>
                                                                @else
                                                                    <span class="badge badge-danger">Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="text-nowrap">
                                                                    <button class="btn btn-sm btn-icon me-2" data-bs-target="#editPermissionModal" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="bx bx-edit"></i></button>
                                                                    <button class="btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></button>
                                                                </span>
                                                            </td>
                                                        </tr>
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
    // Get the Select All checkbox
    const selectAllCheckbox = document.getElementById('selectAll');
    
    // Add event listener for 'change' event
    selectAllCheckbox.addEventListener('change', function() {
        // Get all checkboxes with the name 'customCheck'
        const checkboxes = document.querySelectorAll('input[name="customCheck"]');
    
        // Set each checkbox to the same state as the Select All checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
</script>

<script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        function validateForm(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Access form fields and their values
            var roleName = document.forms["newRoleForm"]["roleName"].value;
            var roleDesc = document.forms["newRoleForm"]["roleDesc"].value;
            
            // Access error message elements
            var roleNameError = document.getElementById("roleNameError");
            var roleDescError = document.getElementById("roleDescError");
            
            // Initialize a variable to track if the form is valid
            var isValid = true;
        
            // Validate the first name
            if (roleName.trim() === "") {
                roleNameError.innerHTML = "Role name cannot be empty";
                isValid = false;
            } else {
                roleNameError.innerHTML = "";
            }
        
            // Validate the last name
            if (roleDesc.trim() === "") {
                roleDescError.innerHTML = "Role description cannot be empty";
                isValid = false;
            } else {
                roleDescError.innerHTML = "";
            }
            
            const checkboxes = document.querySelectorAll('input[name="customCheck"]');
    
            // Check if at least one checkbox is checked
            const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        
            // If no checkboxes are checked, prevent form submission and alert the user
            if (!isChecked) {
                rolePermError.innerHTML = "Select atleast one permission";
                isValid = false;
            }
            
            // If everything is valid, submit the form
            if (isValid) {
                document.getElementById("newRoleForm").submit();
            }
        }

    </script>

@endsection