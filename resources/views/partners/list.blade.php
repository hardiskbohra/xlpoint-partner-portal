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
                            <h5 class="content-header-title mb-0 pr-3">Partner Overview</h5>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">
                                            <i class="bx bx-home-alt"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="/partners">Partners</a>
                                    </li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                        <!--<div>-->
                        <!--    <a href="/create-partner"><button data-bs-target="#addPartnerModal" data-bs-toggle="modal" class="btn btn-primary text-nowrap add-new-partner">-->
                        <!--        Add New Partner-->
                        <!--    </button></a>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="content-body mt-2">
                
                <!-- table Marketing campaigns start -->
                <section id="table-Marketing">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body pb-0">
                                <form>
                                    <div class="row rounded mb-2">
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
                            <table id="table-marketing-campaigns" class="table">
                                <thead>
                                    <tr>
                                        <th>partner name</th>
                                        <th>company name</th>
                                        <th>email</th>
                                        <th>paid clients</th>
                                        <th>net share</th>
                                        <th>Profile</th>
                                        <th>status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!is_null($partners))
                                        @foreach ($partners as $partner)
                                        <tr class="group">
                                            <td class="py-1" colspan="8">Premium</td>
                                        </tr>
                                        <tr>
                                            <td class="py-1">
                                                <div class="avatar mr-1 bg-primary bg"><span class="avatar-content">{{strtoupper(substr($partner->name, 0, 2))}}</span></div>
                                                <a href="/create-partner"><span data-bs-target="#addPartnerModal" data-bs-toggle="modal" class="add-new-partner">
                                                    {{$partner->name}}
                                                </span></a>
                                            </td>
                                            <td class="text-bold-300">{{$partner->name}}</td>
                                            <td class="text-bold-300">{{$partner->email}}</td>
                                            <td class="text-bold-300"><i class="bx bx-trending-up text-success align-middle mr-50"></i><span>5</span></td>
                                            <td class="text-bold-300">₹1,934</td>
                                            <td class="text-danger">
                                                Incomplete
                                            </td>
                                            <td>
                                                @if($partner->status == 1)
                                                    <div class="custom-control custom-switch custom-control-inline mb-1 mt-1">
                                                        <input type="checkbox" class="custom-control-input" id="switch{{$partner->id}}" data-role-id="{{ $partner->id }}" data-toggle="modal" data-role-status="{{ $partner->status }}" data-target="#deleteModal{{$partner->id}}" checked disabled>
                                                        <label class="custom-control-label mr-1" for="switch{{$partner->id}}"></label>
                                                    </div>
                                                @else
                                                    <div class="custom-control custom-switch custom-control-inline mb-1 mt-1">
                                                        <input type="checkbox" class="custom-control-input" id="switch{{$partner->id}}" data-role-id="{{ $partner->id }}" data-toggle="modal" data-role-status="{{ $partner->status }}" data-target="#deleteModal{{$partner->id}}" disabled>
                                                        <label class="custom-control-label mr-1" for="switch{{$partner->id}}"></label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> Delete</a>
                                                    </div>
                                                </div>
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
