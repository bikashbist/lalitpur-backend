<!doctype html>
<html lang="en">

@include('admin.layout.head')

<body class="bg-light">
    <div id="db-wrapper">
        <!-- navbar vertical -->
        @include('admin.layout.sidebar')
        <!-- Page content -->
        <div id="page-content">
            @include("admin.layout.header")
            <!-- Container fluid -->
            <div class="bg-primary pt-10 pb-21" style="background-image: url('{{ asset('tourism/images/about-banner.jpg') }}');">
            </div>
            <div class="container-fluid mt-n22 px-6">
                @yield('content')
               
            </div>
        </div>
    </div>
    {{-- <div class="position-fixed end-0 bottom-0 p-4">
        <a href="https://dashui.codescandy.com/bootstrap-admin-dashboard-html-template.html" class="btn btn-primary"
            target="_blank">Buy
            Pro</a>
    </div> --}}

    <!-- Scripts -->
    {{-- @@include("partials/buy-template.html") --}}
    @include("admin.layout.script")



</body>

{{-- <body data-topbar="dark">

    <div id="layout-wrapper">

        @include('admin.layout.header')

        @include('admin.layout.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                </div>

            </div>

            @include('admin.layout.footer')

        </div>

    </div>
   
    <div class="rightbar-overlay"></div>

    <script src="{{ asset('admin-dashboard/assets/libs/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('admin-dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('admin-dashboard/assets/libs/metismenu/metisMenu.min.js') }} "></script>
    <script src="{{ asset('admin-dashboard/assets/libs/simplebar/simplebar.min.js') }} "></script>
    <script src="{{ asset('admin-dashboard/assets/libs/node-waves/waves.min.js') }} "></script>



    <script src="{{ asset('admin-dashboard/assets/libs/apexcharts/apexcharts.min.js') }} "></script>

    
    <script
        src="{{ asset('admin-dashboard/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }} ">
    </script>
    <script
        src="{{ asset('admin-dashboard/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }} ">
    </script>


    <script src="{{ asset('admin-dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js') }} "></script>
    <script src="{{ asset('admin-dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }} "></script>

    
    <script src="{{ asset('admin-dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }} ">
    </script>
    <script
        src="{{ asset('admin-dashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }} ">
    </script>

    <script src="{{ asset('admin-dashboard/assets/js/pages/dashboard.init.js') }} "></script>


    <script src="{{ asset('admin-dashboard/assets/js/app.js') }} "></script>
    
    @yield('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    



</body> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>


</html>
