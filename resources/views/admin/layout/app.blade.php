<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/images/fav_icon.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/fontawesome/css/all.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />

    <!-- Tags input -->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Datatable css -->
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.dataTables.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/toastr/toastr.css') }}" >
    <!-- Dropify CSS -->
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    @yield('css')

    <title>@yield('title')</title>
</head>
<style type="text/css">
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white !important;
      background-color: #0d6efd;
      padding: 0.2rem;
    }
</style>
<body class="body" id="body">

    <!-- Sidebar Starts Here -->
    @include('admin.layout.sidebar')
    <!-- Sidebar Ends Here -->


    <!-- Header Starts Here -->
    @include('admin.layout.header')
    <!-- Header Ends Here -->

    <!-- Main Content Starts Here -->
    <main class="main px-sm-4 py-5" id="main">
        <div class="container-fluid">




            <!-- Content start -->
            @yield('content')
            <!-- Content end-->


            <!-- Footer Starts Here -->
            @include('admin.layout.footer')
            <!-- Footer Ends Here -->

        </div>
    </main>
    <!-- Main Content Ends Here -->


    <!-- Search Modal -->
    <div class="modal fade p-0" id="searchModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 py-5 rounded-0">

                <div class="text-end px-5">
                    <span class="fs-1" role="button" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>

                <div class="modal-body text-center p-4 py-5 p-sm-5">

                    <h1 class="text-color-dark text-capitalize font-weight-500 mb-5">Search Here</h1>

                    <form action="" class="search-form">
                        <div class="input-group">
                            <input type="search" class="form-control fs-3 px-4 py-2" placeholder="Search..."
                                aria-describedby="basic-addon2">
                            <span class="input-group-text fs-3 bg-brand text-white" id="basic-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @yield('js')
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/script.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/js/sweetalert2.js') }}"></script>
    <!-- Tags input js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <!-- Toast message js file-->
    <script src="{{ asset('admin/toastr/toastr.min.js') }}"></script>
    <!-- Dropify -->
    <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                 height: 150
            });
            $('#summernote2').summernote({height: 150});
            $('#page_text').summernote({height: 250});
        });
    </script>
    <!-- csrf token ajax-->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('script')
    <!-- Data Table Implement -->
    <script>
        let table = new DataTable("#datatable");
        // Dropify image
        $('.dropify').dropify();
    </script>
</body>

</html>
