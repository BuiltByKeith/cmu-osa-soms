<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMU | SOMS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <script src="{{ asset('plugins/fontawesome-free/js/all.min.js') }}"></script>
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE JS -->
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    {{-- ION ICONS --}}
    <link rel="stylesheet" href="{{ asset('plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
    <script src="{{ asset('plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>



    {{-- Toaster --}}
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    @vite(['resources/sass/app.scss'])

    <!-- Your custom styles -->

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/file-upload-with-preview/style.css') }}">


    <!-- DataTables & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('plugins/file-upload-with-preview/file-upload-with-preview.iife.js') }}"></script>


    <script src="{{ asset('plugins/inputmask/inputmask.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.js') }}"></script>

    <script src="{{ asset('js/xlsx.full.min.js') }}"></script>


    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    {{-- Font Awesome Icons JS Plugins --}}
    <script src="{{ asset('fontawesome-free-6.5.1-web/js/all.min.js') }}"></script>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js').then(function(registration) {
                console.log('Service Worker registered with scope:', registration.scope);
            }).catch(function(error) {
                console.log('Service Worker registration failed:', error);
            });
        }
    </script>

    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-yellow">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">

                    @php
                        $userRole = '';
                        foreach (auth()->user()->roles as $role) {
                            if ($role->id == 1) {
                                $userRole = 'osa';
                            } elseif ($role->id == 2) {
                                $userRole = 'organization';
                            } elseif ($role->id == 3) {
                                $userRole = 'admin';
                            }
                        }
                    @endphp
                    @if ($userRole == 'osa')
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            {{ Auth::user()->name }}

                        </a>
                    @elseif($userRole == 'organization')
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            {{ Auth::user()->organization->acronym }}

                            @if (auth()->user()->organization->image_path == null)
                                <img src="{{ asset('images/osa.png') }}" class="img-fluid img-circle"
                                    style="width: 25px; height:auto;" alt="Organization Image">
                            @else
                                <img src="{{ asset('storage/' . auth()->user()->organization->image_path) }}"
                                    class="img-fluid img-circle" style="width: 25px; height:auto;"
                                    alt="Organization Image">
                            @endif



                        </a>
                    @elseif($userRole == 'admin')
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            {{ Auth::user()->name }}

                        </a>
                    @endif


                    <div class="dropdown-menu dropdown-menu-right" style="left: inherit; right: 0px;">
                        <a href="{{ route('userProfile', auth()->user()->id) }}" class="dropdown-item">
                            <i class="mr-2 fas fa-file"></i>
                            {{ __('My profile') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="mr-2 fas fa-sign-out-alt"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-3">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('images/osa.png') }}" alt="OSAS Logo" class="brand-image img-circle"
                    style="opacity: 1">
                <span class="brand-text font-weight-light" style="color:white"><strong>OSAS | SOMS</strong></span>
            </a>

            @foreach (Auth::user()->roles as $role)
                @include('layouts.navigations.' . $role->role_name . '_navigation')
            @endforeach
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div id="loadingIndicator"
                style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); z-index: 9999;">
                <div
                    style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                    <div class="row">
                        <div class="spinner-grow ml-1" role="status" style="color:#ffc600">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow ml-1 text-warning" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow ml-1" role="status" style="color: #919f02">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow ml-1" role="status" style="color: #02681e">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow ml-1" role="status" style="color: #00491e">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>


            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">

            <!-- Default to the left -->
            <strong> <a href="https://cmu.edu.ph" target="_blank" style="color: #02681e">CENTRAL MINDANAO UNIVERSITY
                </a>| Software Development
                Department Interns 2023-2024.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->





    <!-- Toaster JS -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Retrieve the validation errors from the PHP code
                const errors = @json($errors->all());

                // Format errors as an unordered list with centered text
                let errorList = `
                <ul style="list-style: none; padding: 0; margin: 0; text-align: center; color: #dc3545;">
                    ${errors.map(error => `<li style="margin-bottom: 10px;">${error}</li>`).join('')}
                </ul>
            `;

                // Display the errors using SweetAlert
                Swal.fire({
                    title: 'Error!',
                    html: errorList, // Use 'html' property to insert HTML content
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#02681e',
                    customClass: {
                        title: 'swal-title',
                        content: 'swal-content',
                        confirmButton: 'swal-confirm',
                        confirmButtonColor: '#00491e'
                    }
                });
            });
        </script>
    @endif

    <script>
        function showLoadingIndicator() {
            $('#loadingIndicator').show();
        }

        // Function to hide loading indicator
        function hideLoadingIndicator() {

            $('#loadingIndicator').hide();

        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    title: 'Success!',
                    icon: 'success',
                    text: "{{ Session::get('success') }}",
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#02681e',
                    customClass: {
                        title: 'swal-title',
                        content: 'swal-content',
                        confirmButton: 'swal-confirm',
                        confirmButtonColor: '#00491e'
                    }
                });
            @elseif (Session::has('error'))
                Swal.fire({
                    title: 'Error!',
                    icon: 'error',
                    text: "{{ Session::get('error') }}",
                    confirmButtonText: 'OK',
                    confirmButtonColor: 'red',
                    customClass: {
                        title: 'swal-title',
                        content: 'swal-content',
                        confirmButton: 'swal-confirm',
                        confirmButtonColor: 'red'
                    }
                });
            @endif
        });
    </script>

    @yield('scripts')
</body>

</html>
