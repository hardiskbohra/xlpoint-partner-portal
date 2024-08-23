@extends('layout/master')
@section('title', 'Documents')
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
                                        <a href="/documents">Documents</a>
                                    </li>
                                    <li class="breadcrumb-item active">List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body mt-2">
                <!-- users list start -->
                <section class="documents-upload-wrapper">
                    <div class="document-upload-table">
                         <!-- New section for PDF file upload -->
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Bank Statements</h5>
                                    <form id="bank-statement-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="bank_statement">Bank Statements (PDF):</label>
                                            <input type="file" class="form-control" id="bank_statement" name="bank_statement[]" accept=".pdf" multiple required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>
                                </div>
                            </div>
                        <!-- End of PDF file upload section -->
                    </div>
                </section>
                <!-- users list ends -->
                
                <!-- document list  -->
                <section class="documents-list-wrapper">
                    <div class="documents-list-table">
                         <!-- New section for PDF file upload -->
                            <div class="card mt-3">
                                <div class="card-body">
                                    <ul id="uploaded-files"></ul>
                                    <button id="convert-excel-btn" style="display: none;" class="btn btn-secondary">Convert to Excel</button>
                                </div>
                            </div>
                        <!-- End of PDF file upload section -->
                    </div>
                </section>
                <!-- document list  -->
            </div>
        </div>
    </div>
    
      
     <!-- loading icon -->
        <div id="loading-icon" style="display: none;">
            <img src="path-to-your-loading-icon.gif" alt="Loading...">
        </div>
     <!-- loading icon -->

    
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

    <script>
      $(document).ready(function() {
        $('#bank-statement-form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission
    
            var formData = new FormData(this);
            $('#loading-icon').show(); // Show loading icon
    
            $.ajax({
                url: '{{ route('upload.bankstatement') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#loading-icon').hide(); // Hide loading icon
    
                    if (response.success) {
                        var fileList = $('#uploaded-files');
                        fileList.empty(); // Clear the list
    
                        $.each(response.file_paths, function(index, filePath) {
                            var fileName = filePath.split('/').pop();
                            fileList.append('<li>' + fileName + '</li>');
                        });
    
                        $('#convert-excel-btn').show(); // Show the "Convert to Excel" button
                    }
                },
                error: function(xhr, status, error) {
                    $('#loading-icon').hide(); // Hide loading icon
                    console.error(xhr.responseText);
                    alert('An error occurred while uploading the files.');
                }
            });
        });
        
        
        //convert to excel button click 
        $('#convert-excel-btn').on('click', function() {
            $.ajax({
                url: '{{ route('convert.to.excel') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    files: $('#uploaded-files li').map(function() {
                        return $(this).text(); // Get file names from the list
                    }).get()
                },
                success: function(response) {
                    // Handle successful Excel conversion
                    alert('Files converted to Excel successfully!');
                },
                error: function(xhr, status, error) {
                    // Handle any errors
                    console.error(xhr.responseText);
                    alert('An error occurred while converting the files to Excel.');
                }
            });
        });
    });
    
    

    </script>
    
    
@endsection
