<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin_layout.include.head')
    @yield('style')

    <style>
        .invoice {
            font-family: "Cooper Black", serif !important;
            background-color: #1EA185 !important;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 30px;
            padding-left: 5px;
            padding-right: 5px;
        }

        #overlay{	
            position: fixed;
            top: 0;
            z-index: 10000;
            width: 100%;
            height:100%;
            display: none;
            background: rgba(0,0,0,0.6);
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;  
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }

        @keyframes sp-anime {
            100% { 
            transform: rotate(360deg); 
            }
        }

        .is-hide{
            display:none;
        }

        /* .content-header {
            padding: 0px !important;
        } */
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
@include('admin_layout.include.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin_layout.include.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    {{-- <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col --> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>

    <!-- Main Footer -->
    @include('admin_layout.include.footer')
</div>
@include('admin_layout.include.script')
@yield('script')
</body>
</html>
