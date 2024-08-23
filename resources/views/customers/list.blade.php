@extends('layout/master')
@section('title', 'customer-listing')
@section('page-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-analytics.css"> --}}
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}

    {{-- <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"> --}}


@endsection

@section('content')
      <!-- BEGIN: Content-->
      <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row align-items-center">
                <div class="content-header-left col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h5 class="content-header-title mb-0 pr-3">Customer Overview</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/customers">Customers</a>
                                    </li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-primary text-nowrap" data-toggle="modal" data-target="#default">
                                    <i class="bx bx-plus"></i> &nbsp; Add New 
                                </button>
                            </div>
                            <div class="dropdown ml-2">
                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                <div class="dropdown-menu dropdown-menu-right mt-2">
                                    <a class="dropdown-item" href="/roles"><i class="bx bx-import mr-1"></i> Import Customers</a>
                                    <a class="dropdown-item" href="/permissions"><i class="bx bx-export mr-1"></i> Export Customers</a>
                                </div>
                            </div>

                            <!--Basic Modal -->
                            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel1">Add New Customer</h3>
                                            <button type="button" class="close rounded-pill" data-dismiss="modal"
                                                aria-label="Close">
                                                <i class="bx bx-x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('customers.store') }}" method="POST" id="newCustForm" onsubmit="return validateForm(event)">
                                                @csrf
                                                <div class="card-content">
                                                    <div class="card-body pt-0">
                                                        <h6>First Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="first_name" id="custFname" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <span id="custFnameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Last Name</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="text" class="form-control" name="last_name" id="custLname" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-user"></i>
                                                            </div>
                                                            <span id="custLnameError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Mobile Number</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="number" class="form-control" name="mobile" id="custMobile" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-mobile-alt"></i>
                                                            </div>
                                                            <span id="custMobileError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Email</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="email" class="form-control" name="email" id="custEmail" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-face"></i>
                                                            </div>
                                                            <span id="custEmailError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6>Date of Registration</h6>
                                                        <fieldset class="form-group position-relative has-icon-left">
                                                            <input type="date" class="form-control" name="email" id="custRegDate" placeholder="">
                                                            <div class="form-control-position">
                                                                <i class="bx bx-face"></i>
                                                            </div>
                                                            <span id="custRegDateError" style="color: red;"></span>
                                                        </fieldset>
                                                        <h6 class="mt-1">Service</h6>
                                                        <div class="input-group">
                                                            <select class="form-control" name="role_id" id="custService">
                                                                <option selected>Choose</option>
                                                                <option value="1">Zoho Books</option>
                                                                <option value="2">Zoho Billing</option>
                                                                <option value="3">Zoho Payroll</option>
                                                                <option value="4">Zoho Expense</option>
                                                                <option value="5">Zoho Inventory</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <label class="input-group-text" for="inputGroupSelect02" style="font-size:12px">Services</label>
                                                            </div>
                                                        </div>
                                                        <span id="custServiceError" style="color: red;"></span>
                                                        <h6 class="mt-1">Plan</h6>
                                                        <div class="input-group">
                                                            <select class="form-control" name="role_id" id="custPlan">
                                                                <option selected>Choose</option>
                                                                <option value="1">Free</option>
                                                                <option value="2">Standard</option>
                                                                <option value="3">Professional</option>
                                                                <option value="4">Premium</option>
                                                                <option value="5">Enterprise</option>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <label class="input-group-text" for="inputGroupSelect02" style="font-size:12px">Plans</label>
                                                            </div>
                                                        </div>
                                                        <span id="custPlanError" style="color: red;"></span>
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
                    <section id="horizontal-vertical">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <form>
                                        <div class="row border rounded py-2 px-2 mb-2">
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-verified">Verified</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="users-list-verified">
                                                        <option value="">Any</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-role">Role</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="users-list-role">
                                                        <option value="">Any</option>
                                                        <option value="User">User</option>
                                                        <option value="Staff">Staff</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                <label for="users-list-status">Status</label>
                                                <fieldset class="form-group">
                                                    <select class="form-control" id="users-list-status">
                                                        <option value="">Any</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Close">Close</option>
                                                        <option value="Banned">Banned</option>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                                <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-content">
                                        <div class="card-body card-dashboard">
                                            <div class="table-responsive">
                                                <table class="table wrap scroll-horizontal-vertical">
                                                    <thead>
                                                        <tr>
                                                            <th>name</th>
                                                            <th>email</th>
                                                            <th>phone</th>
                                                            <th>service</th>
                                                            <th>plan</th>
                                                            <th>Registration date</th>
                                                            <th>Renewal date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="py-1"><div class="avatar mr-1 bg-primary bg"><span class="avatar-content">{{strtoupper(substr('Hardik Bohra', 0, 2))}}</span></div><a href="">Hardik Bohra</a></td>
                                                            <td class="text-bold-300">hardikbohra@xlpointglobal.com</td>
                                                            <td class="text-bold-300">9876543456</td>
                                                            <td class="text-bold-300">Books</td>
                                                            <td class="text-bold-300">Professional</td>
                                                            <td class="text-bold-300">2024-08-06</td>
                                                            <td class="text-bold-300">2025-08-06</td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                                                        <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> transaction history</a>
                                                                        <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <!-- users list ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@section('jqcdn')

    <!-- BEGIN: Page Vendor JS-->
    {{-- <script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="./app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script> --}}
    <!-- END: Page Vendor JS-->

    {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></scri    pt> --}}

    {{-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="./app-assets/css/pages/page-users.css">

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    </script>
@endsection
