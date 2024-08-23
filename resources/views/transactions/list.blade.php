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
      <!-- BEGIN: Content-->
      <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <h5 class="content-header-title mb-0 pr-3">Transaction Overview</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/users">Transactions</a>
                                    </li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                        <div>
                            <button data-bs-target="#addTransactionModal" data-bs-toggle="modal" class="btn btn-primary text-nowrap add-new-transaction">
                                Add New Transaction
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body mt-2">
                
                <!-- table Marketing campaigns start -->
                <section id="table-Marketing">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <div class="d-inline-block">
                                            <!-- chart-1   -->
                                            <div class="d-flex mr-5 market-statistics-1">
                                                <!-- chart-statistics-1 -->
                                                <div id="table-donut-chart-1"></div>
                                                <!-- data -->
                                                <div class="statistics-data ml-50 my-auto">
                                                    <div class="statistics">
                                                        <span class="font-medium-2 mr-50 text-bold-600">₹25,756</span><span class="text-success">(+16.2%)</span>
                                                    </div>
                                                    <div class="statistics-date"><i class="bx bx-radio-circle font-small-1 text-success mr-25"></i><small class="text-muted">Current Quarter Commission</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-inline-block">
                                            <!-- chart-2 -->
                                            <div class="d-flex mb-1 market-statistics-2">
                                                <!-- chart statistics-2 -->
                                                <div id="table-donut-chart-2"></div>
                                                <!-- data-2 -->
                                                <div class="statistics-data ml-50 my-auto">
                                                    <div class="statistics">
                                                        <span class="font-medium-2 mr-50 text-bold-600">₹5,352</span><span class="text-danger">(-4.9%)</span>
                                                    </div>
                                                    <div class="statistics-date"><i class="bx bx-radio-circle font-small-1 text-success mr-25"></i><small class="text-muted">Last Quarter Commission</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 text-md-right">
                                        <button class="btn btn-primary glow">View Report</button>
                                    </div>
                                </div>
                                <form>
                                    <div class="row rounded py-2 mb-2">
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-verified">Verified</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="users-list-verified">
                                                    <option value="">All</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-role">Profile Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="users-list-role">
                                                    <option value="">All</option>
                                                    <option value="User">Complete</option>
                                                    <option value="Staff">Incomplete</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-status">Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="users-list-status">
                                                    <option value="">All</option>
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
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- table start -->
                            <table id="table-marketing-campaigns" class="table mb-0">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <th>partner name</th>
                                        <th>company name</th>
                                        <th>paid clients</th>
                                        <th>net share</th>
                                        <th>Profile</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="group">
                                        <td class="py-1 pl-3" colspan="8">Incomplete Profiles</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="py-1"><div class="avatar mr-1 bg-primary bg"><span class="avatar-content">{{strtoupper(substr('Hardik Bohra', 0, 2))}}</span></div><a href="">Hardik Bohra</a></td>
                                        <td class="text-bold-300">XLPoint Global Solutions Pvt Ltd</td>
                                        <td class="text-bold-300"><i class="bx bx-trending-up text-success align-middle mr-50"></i><span>5</span>
                                        </td>
                                        <td class="text-bold-300">₹1,934</td>
                                        <td class="text-danger">Incomplete</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> mark as inactive</a>
                                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="group">
                                        <td class="py-1 pl-3" colspan="8">Complete Profiles</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="py-1"><div class="avatar mr-1 bg-primary bg"><span class="avatar-content">{{strtoupper(substr('Suraj Jain', 0, 2))}}</span></div><a href="">Suraj Jain</a></td>
                                        </td>
                                        <td class="text-bold-300">A John Moris & Co.</td>
                                        <td class="text-bold-300"><i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>3</span>
                                        </td>
                                        <td class="text-bold-300">₹564</td>
                                        <td class="text-success">Complete</td>
                                        <td><span class="badge badge-danger">Closed</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> mark as active</a>
                                                    <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- table ends -->
                        </div>
                    </div>
                </section>
                <!-- table Marketing campaigns ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
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
    
    
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    </script>
    
@endsection
