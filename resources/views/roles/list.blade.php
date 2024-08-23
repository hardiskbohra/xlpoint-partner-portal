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
                                        <div class="toast-bs-container" style="margin-top: -85px;">
                                            <div class="toast-position"></div>
                                        </div>
                                    <!-- update toast method -->
                                         <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
                                            <div class=" toast-header">
                                                <i class="bx bx-bulb"></i>  
                                                <span class="mr-auto toast-title">Bootstrap</span>
                                                <small>0 mins ago</small>
                                                <button type="button" class="close" data-dismiss="toast" aria-label="Close">
                                                    <i class="bx bx-x"></i>
                                                </button>
                                            </div>
                                            <div class="toast-body">
                                                The Luxury Of Traveling With Yacht Charter Companies
                                                Of Traveling With Yacht
                                            </div>
                                        </div>
                                    <!-- update toast method -->
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
                                        <a href="/dashboard">
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
                                            <form action="{{ route('roles.store') }}" method="POST" id="newRoleForm">
                                                @csrf
                                                <div class="card-content">
                                                    <div class="card-body pt-0 pb-0">
                                                        <h6>Role Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="name" id="roleName" placeholder="Enter role name">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-check-shield"></i>
                                                            </div>
                                                            <span id="nameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Role Description</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="description" id="roleDesc" placeholder="Enter role description">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-chat"></i>
                                                            </div>
                                                            <span id="descriptionError" style="color: red;"></span>
                                                        </fieldset>
                                                        <br>
                                                        <h5>Role Permissions</h5>
                                                        <span id="rolePermError" style="color: red;"></span>
                                                        <div class="row g-6">
                                                            @foreach ($permissions as $permission)
                                                                <div class="col-xl-6">
                                                                    <div class="card-body">
                                                                        <div class="d-flex justify-content-between align-items-end">
                                                                            <div class="role-heading">
                                                                                <h5 class="fw-normal">
                                                                                    <div class="custom-control custom-checkbox">
                                                                                        <input type="checkbox" value="{{$permission->id}}" class="custom-control-input" name="customCheck" id="{{$permission->id}}">
                                                                                        <label class="custom-control-label primary" for="{{$permission->id}}">{{ Str::title($permission->name) }} Management</label>
                                                                                    </div>
                                                                                </h5>
                                                                                @foreach ($permission->childPermissions as $child)
                                                                                    <fieldset class="pr-3">
                                                                                        <div class="custom-control custom-checkbox">
                                                                                            <input type="checkbox" value="{{$child->id}}" class="custom-control-input permissions" name="customCheck" id="{{$child->id}}">
                                                                                            <label class="custom-control-label" for="{{$child->id}}">{{$child->name}}</label>
                                                                                        </div>
                                                                                    </fieldset>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="card-footer d-flex">
                                                        <a href="/users">Assign Users</a>
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
                                <div class="card pt-2">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="table-extended" class="table table-transparent">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>role</th>
                                                    <th>description</th>
                                                    <th>permissions</th>
                                                    <th>users</th>
                                                    <th>status</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @include('roles.partial.list', ['roles' => $roles,'permissions' => $permissions])
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
    $(document).ready(function() {

        // Handle child checkbox change
        $('input[type="checkbox"][name="customCheck"]').change(function() {
            var parentCheckbox = $(this).closest('.role-heading').find('input[type="checkbox"].custom-control-input').first();

            // If it's a child checkbox
            if ($(this).closest('fieldset').length > 0) {
                var allChecked = $(this).closest('.role-heading').find('fieldset input[type="checkbox"]').length === 
                    $(this).closest('.role-heading').find('fieldset input[type="checkbox"]:checked').length;
                parentCheckbox.prop('checked', allChecked);
            } else {
                // If it's a parent checkbox
                $(this).closest('.role-heading').find('fieldset input[type="checkbox"]').prop('checked', this.checked);
            }
        });

        // Role form submission
        $('#newRoleForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Get role name and description
            var roleName = $('#roleName').val();
            var roleDesc = $('#roleDesc').val();

            // Get all selected permission IDs
            var selectedPermissions = [];
            $('input.permissions:checked').each(function() {
                selectedPermissions.push($(this).val());
            });

            // Make the AJAX request
            $.ajax({
                url: "{{ route('roles.store') }}", // URL to submit the form
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}", // Include the CSRF token
                    name: roleName,
                    description: roleDesc,
                    status: 1,
                    permissions: selectedPermissions
                },
                success: function (response) {
                    if (response.success) {
                        $('.toast-title').text('Success');
                        $('.toast-body').text(response.message);
                        $('.toast').prependTo('.toast-bs-container .toast-position').toast('show');
                        $('#default').modal('hide');
                        $('#newRoleForm')[0].reset(); // Clear all form fields
                        $('#roleNameError').text('');
                        $('#roleDescError').text('');
                        $('#rolePermError').text('');
                        reloadRolesListing();
                    }
                },
                error: function (xhr) {
                    if(xhr.status == 422) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key + 'Error').text(value);
                        });
                    } else {
                        console.error("Error updating role:", xhr.responseText);
                        showToast('Failed to update role. Please try again.', 'danger');
                    }
                }
            });
        });

        // Clear validation errors on input focus
        $('input').focus(function() {
            $(this).next('span').text('');
        });

        function reloadRolesListing() {
            $.ajax({
                url: "{{ route('roles.index') }}", // URL to fetch the updated roles list
                method: "GET",
                success: function(data) {
                    $('#table-extended tbody').html(data); // Replace the table body with the new content
                },
                error: function(xhr) {
                    console.error("Error loading roles listing:", xhr.responseText);
                    showToast('Failed to load roles listing. Please try again.', 'danger');
                }
            });
        }

        // Status change functionality
        function initializeStatusChange() {
            $(document).off('click', '.delete-record').on('click', '.delete-record', function(e) {
                e.preventDefault();

                var roleId = $(this).data('role-id');
                var newStatus = $(this).data('role-status');

                $.ajax({
                    url: '/update-role-status/' + roleId + '/' + newStatus, // Adjust the URL as needed
                    method: 'POST', // Use PATCH or POST as required by your Laravel route
                    data: {
                        _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                    },
                    success: function(response) {
                        location.reload();
                        $('#deleteModal' + roleId).modal('hide');
                        $('.toast-title').text('Success');
                        $('.toast-body').text(response.message);
                        $('.toast').prependTo('.toast-bs-container .toast-position').toast('show');

                        // Update the modal content dynamically
                        var modalHeader = $('#deleteModal' + roleId + ' .modal-header');
                        var modalBody = $('#deleteModal' + roleId + ' .modal-body');
                        var modalButton = $('#deleteModal' + roleId + ' .delete-record');

                        if (newStatus == 1) {
                            modalHeader.removeClass('bg-primary').addClass('bg-warning');
                            modalHeader.find('.modal-title').text('Delete Role');
                            modalBody.text('You are performing a delete operation for role: ' + roleId + '. Are you sure?');
                            modalButton.removeClass('btn-primary').addClass('btn-warning');
                            modalButton.attr('data-role-status', 0); // Set new status for next click
                        } else {
                            modalHeader.removeClass('bg-warning').addClass('bg-primary');
                            modalHeader.find('.modal-title').text('Active Role');
                            modalBody.text('You are trying to enable the role: ' + roleId + '. Are you sure?');
                            modalButton.removeClass('btn-warning').addClass('btn-primary');
                            modalButton.attr('data-role-status', 1); // Set new status for next click
                        }

                        initializeStatusChange();
                    },
                    error: function(xhr) {
                        console.error("Error updating status:", xhr.responseText);
                        showToast('Failed to update status. Please try again.', 'danger');
                    }
                });
            });
        }

        initializeStatusChange();

        // Handle the Close button click event
        $('.close-modal-btn').on('click', function() {
            var roleId = $(this).data('role-id');
            var switchElement = $('#switch' + roleId);

            // Reset the switch to its original state
            var originalStatus = switchElement.data('role-status');
            switchElement.prop('checked', originalStatus === 1);
        });

        // Handle modal dismissal by clicking outside or pressing the ESC key
        $('.deleteModel').on('hidden.bs.modal', function() {
            var roleId = $(this).attr('id').replace('deleteModal', '');
            var switchElement = $('#switch' + roleId);

            // Reset the switch to its original state
            var originalStatus = switchElement.data('role-status');
            switchElement.prop('checked', originalStatus === 1);
        });

    });

    // Define showToast function if missing
    function showToast(message, type) {
        var toast = $('.toast');
        toast.find('.toast-title').text(type === 'danger' ? 'Error' : 'Success');
        toast.find('.toast-body').text(message);
        toast.prependTo('.toast-bs-container .toast-position').toast('show');
    }
</script>




@endsection