<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
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

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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

            <li class="nav-item">
                <a class="nav-link " href="{{ url('/') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <!-- side bar manufacture -->
            <li class="nav-heading">Manufacturing</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#manufacture-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Manufacture</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="manufacture-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('Manufacture/produk') }}">
                            <i class="bi bi-circle"></i><span>Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('Manufacture/bahan') }}">
                            <i class="bi bi-circle"></i><span>Bahan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('Manufacture/input-produk') }}">
                            <i class="bi bi-circle"></i><span>Input Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('Manufacture/input-bahan') }}">
                            <i class="bi bi-circle"></i><span>Input Bahan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            <!-- side bar BOM -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#BOM-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>BOM</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="BOM-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('bom/bom') }}">
                            <i class="bi bi-circle"></i><span>Data Bill Of Materials</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('bom/input-bom') }}">
                            <i class="bi bi-circle"></i><span>Input Bill Of Materials</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#MO-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Manufacture Order</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="MO-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('Manufacture/mo') }}">
                            <i class="bi bi-circle"></i><span>Data Manufacture Order</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('Manufacture/mo-input') }}">
                            <i class="bi bi-circle"></i><span>Input Manufacture Order</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-heading">Purchasing</li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#vendor-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Vendor</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="vendor-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('vendor') }}">
                            <i class="bi bi-circle"></i><span>Data Vendor</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('vendor/tambah') }}">
                            <i class="bi bi-circle"></i><span>Tambah Vendor</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#rfq-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Request For Quotation</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="rfq-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('rfq') }}">
                            <i class="bi bi-circle"></i><span>Data RFQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('rfq-input') }}">
                            <i class="bi bi-circle"></i><span>Tambah RFQ</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#PO-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Purchase Orders</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="PO-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('po') }}">
                            <i class="bi bi-circle"></i><span>Data Purchase Order</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
            <li class="nav-heading">Sales</li>

            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#pembeli-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Pembeli</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="pembeli-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="{{ url('pembeli') }}">
                    <i class="bi bi-circle"></i><span>Data Pembeli</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('pembeli/tambah') }}">
                    <i class="bi bi-circle"></i><span>Tambah Pembeli</span>
                  </a>
                </li>
              </ul>
            </li><!-- End Tables Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#quotation-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Sales Quotation</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="quotation-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="{{ url('sq') }}">
                      <i class="bi bi-circle"></i><span>Data Sales Quotation</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('sq-input') }}">
                      <i class="bi bi-circle"></i><span>Tambah Sales Quotation</span>
                    </a>
                  </li>
                </ul>
              </li><!-- End Forms Nav -->
        
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-menu-button-wide"></i><span>Sales Orders</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="order-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a href="{{ url('so') }}">
                      <i class="bi bi-circle"></i><span>Data Sales Order</span>
                    </a>
                  </li>
                </ul>
            </li><!-- End Forms Nav -->
      
            <li class="nav-heading">Accounting</li>
      
            <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#accounting-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Accounting</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="accounting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="/accounting">
                    <i class="bi bi-circle"></i><span>Data Accounting</span>
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
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
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
