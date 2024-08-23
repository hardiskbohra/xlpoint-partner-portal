@extends('layout/master')
@section('title', 'user-listing')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">

@endsection

@section('content')
<!-- BEGIN: Content-->
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
            <div class="content-header row">
                <div class="content-header-left col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h5 class="content-header-title mb-0 pr-3">User Overview</h5>
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
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                        <div class="card-content d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#default">
                                    <i class="bx bx-plus"></i> &nbsp; Add New
                                </button>
                            </div>
                            <div class="ml-2 dropdown">
                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                <div class="dropdown-menu dropdown-menu-right mt-2">
                                    <!--<span class="dropdown-item" data-toggle="modal" data-target="#default"><i class="bx bx-plus mr-1"></i>Add New User</span>-->
                                    <a class="dropdown-item" href="/roles"><i class="bx bx-heart mr-1"></i> Manage Roles</a>
                                    <a class="dropdown-item" href="/permissions"><i class="bx bx-check-shield mr-1"></i> Manage Permissions</a>
                                </div>
                            </div>

                            <!--Basic Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel1">Add New User</h3>
                                            <button type="button" class="close rounded-pill" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.store') }}" method="POST" id="newUserForm" onsubmit="return validateForm(event)">
                                                @csrf
                                                <div class="card-content">
                                                    <div class="card-body pt-0">
                                                        <h6>First Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="first_name" id="userFname" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <span id="userFnameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Last Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="last_name" id="userLname" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <span id="userLnameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Mobile Number</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="number" class="form-control" name="mobile" id="userMobile" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-mobile-alt"></i>
                                                            </div>
                                                            <span id="userMobileError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Username</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="email" id="userUsername" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-face"></i>
                                                            </div>
                                                            <span id="userUsernameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Password</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="password" class="form-control" name="pass" id="userPass" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-lock-open-alt"></i>
                                                            </div>
                                                            <span id="userPassError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Confirm Password</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" id="userConfirmPass" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-lock-alt"></i>
                                                            </div>
                                                            <span id="userConfirmPassError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Role</h6>
                                                        <div class="input-group">
                                                            <select class="form-control" name="role_id" id="userRole">
                                                                <option selected>Choose</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Manager</option>
                                                                <option value="3">Partner</option>
                                                                <option value="4">User</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <label class="input-group-text" for="inputGroupSelect02" style="font-size:12px">Roles</label>
                                                            </div>
                                                        </div>
                                                        <span id="userRoleError" style="color: red;"></span>
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
            <div class="content-body mt-2">
                <!-- users list start -->
                <section class="users-list-wrapper">
                    <div class="users-list-table">
                        <div class="card">
                            <div class="card-content">
                                <form id="filter_form">
                                    <div class="row rounded pt-2 px-2">
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-search">User</label>
                                            <fieldset class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter User" id="users-search">
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-role">Role</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="role_search" id="users-list-role">
                                                    <option selected value="">All</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Manager</option>
                                                    <option value="3">Partner</option>
                                                    <option value="4">User</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-status">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" name="status_search" id="users-list-status">
                                                    <option selected value="">All</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">In Active</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                            <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                            <button type="reset" hidden class="btn btn-primary btn-block glow users-list-search mb-0">Search</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="users-list-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Name</th>
                                                    <th>email</th>
                                                    <th>mobile</th>
                                                    <th>role</th>
                                                    <th>status</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @include('user.partial.list', ['users' => $users])
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
    
    
                        <!-- edit model -->
                            <div class="modal fade text-left" id="editUserModal" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel1">Edit User</h3>
                                            <button type="button" class="close rounded-pill" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <div id="edit-user-form"></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                         <!-- edit model -->
    
                                  

    <!-- END: Content-->
@endsection

@section('jqcdn')

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="./app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script> --}}
    
    <script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Page Vendor JS-->

    {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></scri    pt> --}}

    {{-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="./app-assets/css/pages/page-users.css">
    <script src="./app-assets/js/scripts/tooltip/tooltip.js"></script>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        function validateForm(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Access form fields and their values
            var userFname = document.forms["newUserForm"]["userFname"].value;
            var userLname = document.forms["newUserForm"]["userLname"].value;
            var userMobile = document.forms["newUserForm"]["userMobile"].value;
            var userUsername = document.forms["newUserForm"]["userUsername"].value;
            var userPass = document.forms["newUserForm"]["userPass"].value;
            var userConfirmPass = document.forms["newUserForm"]["userConfirmPass"].value;
            var userRole = document.forms["newUserForm"]["userRole"].value;
            
            // Access error message elements
            var userFnameError = document.getElementById("userFnameError");
            var userLnameError = document.getElementById("userLnameError");
            var userMobileError = document.getElementById("userMobileError");
            var userUsernameError = document.getElementById("userUsernameError");
            var userPassError = document.getElementById("userPassError");
            var userConfirmPassError = document.getElementById("userConfirmPassError");
            var userRoleError = document.getElementById("userRoleError");
            
            // Initialize a variable to track if the form is valid
            var isValid = true;
        
            // Validate the first name
            if (userFname.trim() === "") {
                userFnameError.innerHTML = "First name cannot be empty";
                isValid = false;
            } else {
                userFnameError.innerHTML = "";
            }
        
            // Validate the last name
            if (userLname.trim() === "") {
                userLnameError.innerHTML = "Last name cannot be empty";
                isValid = false;
            } else {
                userLnameError.innerHTML = "";
            }
        
            // Validate the last name
            if (userMobile.trim() === "") {
                userMobileError.innerHTML = "Mobile number cannot be empty";
                isValid = false;
            } else if (!/^\d{10}$/.test(userMobile)) { 
                userMobileError.innerHTML = "Mobile number is not valid";
                isValid = false;
            }   else {
                userMobileError.innerHTML = "";
            }
        
            // Validate the username
            if (userUsername.trim() === "") {
                userUsernameError.innerHTML = "Username cannot be empty";
                isValid = false;
            } else {
                userUsernameError.innerHTML = "";
            }
        
            // Validate the password
            if (userPass.trim() === "") {
                userPassError.innerHTML = "Password cannot be empty";
                isValid = false;
            } else {
                userPassError.innerHTML = "";
            }
        
            // Validate the confirm password
            if (userConfirmPass.trim() === "") {
                userConfirmPassError.innerHTML = "Confirm password cannot be empty";
                isValid = false;
            } else if (userPass.trim() !== userConfirmPass.trim()) {
                userConfirmPassError.innerHTML = "Password & Confirm password must be equal";
                isValid = false;
            } else {
                userConfirmPassError.innerHTML = "";
            }
        
            // Validate the role
            if (userRole === "Choose") { // Assuming "Choose" is the placeholder value
                userRoleError.innerHTML = "Role cannot be empty";
                isValid = false;
            } else {
                userRoleError.innerHTML = "";
            }
        
            // If everything is valid, submit the form
            if (isValid) {
                document.getElementById("newUserForm").submit();
            }
        }
     
        
        //start edit user functioanlity
        $(document).on('click', '.edit-user-button', function () {
        var userId = $(this).data('user-id');
        var url = "{{ route('users.edit', ':id') }}";
        url = url.replace(':id', userId);
    
        $.ajax({
            url: url,
            method: 'GET',
            success: function (response) {
                $('#edit-user-form').html(response);
                $('#editUserModal').modal('show');
            },
            error: function (xhr) {
                    console.error("Error fetching user data:", xhr.responseText);
                }
            });
        });
        //end edit user functioanlity
        
        
        $(document).ready(function () {
           $(document).on('click', '#updateUser', function () {
                var form = $('#editUserForm'); // Get the form element
                var actionUrl = form.attr('action'); // Get the form action URL
                var formData = form.serialize(); // Serialize the form data
        
                $.ajax({
                    url: actionUrl,
                    method: 'POST',
                    data: formData,
                    beforeSend: function () {
                        // Clear previous errors
                        $('#editUserForm').find('span[id$="Error"]').text('');
                    },
                    success: function (response) {
                        if (response.success) {
                            $('.toast-title').text('Success');
                            $('.toast-body').text(response.message);
                            $('.toast').prependTo('.toast-bs-container .toast-position').toast('show');
                            $('#editUserModal').modal('hide');                           
                        } else {
                            
                            // Handle validation errors
                            $.each(response.errors, function (key, value) {
                                $('#' + key + 'Error').text(value);
                            });
                        }
                    },
                    error: function (xhr) {
                        if(xhr.status == "422")
                        {
                             $.each(xhr.responseJSON.errors, function (key, value) {
                                $('#' + key + 'Error').text(value);
                            });
                            
                        }
                        console.error("Error updating user:", xhr.responseText);
                        // Optionally handle server-side errors
                    }
                });
            });
            
            // Handle search button click  FOrm Filter
            $('#filter_form').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission
        
                // Trigger the search functionality via AJAX
                $('.users-list-search').trigger('click');
            });
            
             $('#users-list-verified, #users-list-role, #users-list-status').change(function() {
                $('.users-list-search').trigger('click');
            });
            $('.users-list-search').on('click', function (e) {
                e.preventDefault();
        
                // Gather filter values
                let search = $('#users-search').val();
                let verified = $('#users-list-verified').val();
                let role = $('#users-list-role').val();
                let status = $('#users-list-status').val();
                
                // AJAX request to filter users
                $.ajax({
                    url: '/users', // Replace with your route for filtering
                    type: 'GET',
                    data: {
                        user_search: search,
                        role_search: role,
                        status_search: status,
                    },
                    success: function (response) {
                        // Update the table body with the filtered data
                        $('#users-list-datatable tbody').html(response);
                    },
                    error: function (xhr) {
                        console.error("Error filtering users:", xhr.responseText);
                    }
                });
            });
            
            $(document).on('click', '.user-status-badge', function() {
                var userId = $(this).data('user-id');
                
                // Show the modal corresponding to the clicked badge
                $('#deleteModal' + userId).modal('show');
            });
        });

        //update user functioanlity


        //status change functionalty
        function initializeStatusChange() {
            $(document).off('click', '.delete-record').on('click', '.delete-record', function(e) {

            e.preventDefault();
        
            var userId = $(this).data('user-id');
            var newStatus = $(this).data('user-status');

            $.ajax({
                url: '/update-user-status/' + userId + '/'+ newStatus, // Adjust the URL as needed
                method: 'POST', // Use PATCH or POST as required by your Laravel route
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token for Laravel
                },
                success: function(response) {
                    location.reload();
                    $('#deleteModal' + userId).modal('hide');
                    $('.toast-title').text('Success');
                    $('.toast-body').text(response.message);
                    $('.toast').prependTo('.toast-bs-container .toast-position').toast('show');
                    
                                // Update the badge based on the new status
                                var badge = $('.user-status-badge[data-user-id="' + userId + '"]');
                                if (newStatus == 1) {
                                    badge.removeClass('badge-danger').addClass('badge-success');
                                    badge.text('Active');
                                    badge.attr('data-user-status', 0); // Update data attribute for future toggles
                                } else {
                                    badge.removeClass('badge-success').addClass('badge-danger');
                                    badge.text('Inactive');
                                    badge.attr('data-user-status', 1); // Update data attribute for future toggles
                                }
                    
                                // Update the modal content dynamically
                                var modalHeader = $('#deleteModal' + userId + ' .modal-header');
                                var modalBody = $('#deleteModal' + userId + ' .modal-body');
                                var modalButton = $('#deleteModal' + userId + ' .delete-record');
                    
                                if (newStatus == 1) {
                                    modalHeader.removeClass('bg-primary').addClass('bg-warning');
                                    modalHeader.find('.modal-title').text('Delete User');
                                    modalBody.text('You are performing a delete operation for user: ' + userId + '. Are you sure?');
                                    modalButton.removeClass('btn-primary').addClass('btn-warning');
                                    modalButton.attr('data-user-status', 0); // Set new status for next click
                                } else {
                                   
                                    
                                    modalHeader.removeClass('bg-warning').addClass('bg-primary');
                                    modalHeader.find('.modal-title').text('Active User');
                                    modalBody.text('You are trying to enable the user: ' + userId + '. Are you sure?');
                                    modalButton.removeClass('btn-warning').addClass('btn-primary');
                                    modalButton.attr('data-user-status', 1); // Set new status for next click
                                }
                                initializeStatusChange();

                },
                error: function(xhr) {
                    console.error("Error updating status:", xhr.responseText);
                    // Show error message (optional)
                    showToast('Failed to update status. Please try again.', 'danger');
                }
            });
        });
        }
        
        initializeStatusChange();
        //status change functioanlity

        $(document).ready(function() {
            // Handle the Close button click event
            $('.close-modal-btn').on('click', function() {
                var userId = $(this).data('user-id');
                var switchElement = $('#switch' + userId);
        
                // Reset the switch to its original state
                var originalStatus = switchElement.data('user-status');
                switchElement.prop('checked', originalStatus === 1);
            });
        
            // Also handle modal dismissal by clicking outside or pressing the ESC key
            $('.deleteModel').on('hidden.bs.modal', function() {
                var userId = $(this).attr('id').replace('deleteModal', '');
                var switchElement = $('#switch' + userId);
        
                // Reset the switch to its original state
                var originalStatus = switchElement.data('user-status');
                switchElement.prop('checked', originalStatus === 1);
            });
        });
    </script>
    
    
@endsection
