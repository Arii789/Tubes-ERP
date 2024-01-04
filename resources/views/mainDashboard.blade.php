<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>


<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">Perusahaan Alat Rumah Tangga</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">

            {{-- Dashboard --}}
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('/*') ? '' : 'collapsed' }}"
                    href="{{ url('/') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- side bar manufacture -->
            <li class="nav-heading">Manufacture</li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('Manufacture/produk*') || request()->is('Manufacture/bahan*') ? '' : 'collapsed' }}"
                    data-bs-target="#manufacture-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Manufacturing</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="manufacture-nav"
                    class="nav-content {{ request()->is('Manufacture/produk*') || request()->is('Manufacture/bahan*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/Manufacture/produk') }}"
                            class="{{ request()->is('Manufacture/produk*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Produk</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/Manufacture/bahan') }}"
                            class="{{ request()->is('Manufacture/bahan*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Bahan</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('bom/bom*') || request()->is('bom/input-bom*') ? '' : 'collapsed' }}"
                    data-bs-target="#BOM-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Bill Of Materials</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="BOM-nav"
                    class="nav-content {{ request()->is('bom/bom*') || request()->is('bom/input-bom*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/bom/bom') }}"
                            class="{{ request()->is('bom/bom*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Bill Of Materials</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('Manufacture/mo*') || request()->is('Manufacture/mo-input*') ? '' : 'collapsed' }}"
                    data-bs-target="#MO-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Manufacture Order</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="MO-nav"
                    class="nav-content {{ request()->is('Manufacture/mo*') || request()->is('Manufacture/mo-input*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/Manufacture/mo') }}"
                            class="{{ request()->is('Manufacture/mo*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Manufacture Order</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Purchasing</li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('vendor*') || request()->is('vendor/tambah*') ? '' : 'collapsed' }}"
                    data-bs-target="#vendor-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Vendor</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="vendor-nav"
                    class="nav-content {{ request()->is('vendor*') || request()->is('vendor/tambah*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/vendor') }}" class="{{ request()->is('vendor*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Vendor</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('rfq*') || request()->is('rfq-input*') ? '' : 'collapsed' }}"
                    data-bs-target="#rfq-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Request For Quotation</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="rfq-nav"
                    class="nav-content {{ request()->is('rfq*') || request()->is('rfq-input*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/rfq') }}" class="{{ request()->is('rfq*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Request For Quotation</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('po*') || request()->is('po-input-item*') ? '' : 'collapsed' }}"
                    data-bs-target="#PO-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Purchase Orders</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="PO-nav"
                    class="nav-content {{ request()->is('po*') || request()->is('po-input-item*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/po') }}" class="{{ request()->is('po*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Purchase Orders</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Sales</li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('pembeli*') || request()->is('pembeli/tambah*') ? '' : 'collapsed' }}"
                    data-bs-target="#pembeli-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Pembeli</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="pembeli-nav"
                    class="nav-content {{ request()->is('pembeli*') || request()->is('pembeli/tambah*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/pembeli') }}" class="{{ request()->is('pembeli*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Pembeli</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('sq*') || request()->is('sq-input*') ? '' : 'collapsed' }}"
                    data-bs-target="#quotation-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Sales Quotation</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="quotation-nav"
                    class="nav-content {{ request()->is('sq*') || request()->is('sq-input*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/sq') }}" class="{{ request()->is('sq*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Sales Quotation</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('so*') || request()->is('so-input-item*') ? '' : 'collapsed' }}"
                    data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Sales Orders</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="order-nav"
                    class="nav-content {{ request()->is('so*') || request()->is('so-input-item*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/so') }}" class="{{ request()->is('so*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Sales Orders</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-heading">Accounting</li>
            <li class="nav-item ">
                <a class="nav-link {{ request()->is('accounting*') || request()->is('accounting-input-item*') ? '' : 'collapsed' }}"
                    data-bs-target="#accounting-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Accounting</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="accounting-nav"
                    class="nav-content {{ request()->is('accounting*') || request()->is('accounting-input-item*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/accounting') }}" class="{{ request()->is('accounting*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Data Accounting</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item ">
                <a class="nav-link {{ request()->is('employees/karyawan*') || request()->is('employees/departemen*') ? '' : 'collapsed' }}"
                    data-bs-target="#employees-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Employees</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="employees-nav"
                    class="nav-content {{ request()->is('employees/karyawan*') || request()->is('employees/departemen*') ? 'collapse show' : 'collapse' }}"
                    data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="{{ url('/employees/karyawan') }}"
                            class="{{ request()->is('employees/karyawan*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Karyawan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/employees/departemen') }}"
                            class="{{ request()->is('employees/departemen*') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Departemen</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
    </aside><!-- End Sidebar-->

    @yield('content')

    <footer id="footer" class="footer">
        <div class="copyright">
            © Copyright <strong><span>Kelompok 9</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Designed by <a href="https://www.tiktok.com/@gamehack3rz">gamehack3rz</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
