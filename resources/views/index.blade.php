@extends('mainDashboard')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                        <!-- Reports -->
                        {{-- <div class="col-12">
                            <div class="card w-100"> <!-- Menambahkan kelas w-100 untuk lebar penuh --> --}}
                                {{-- <div class="card-body">
                                    <h5 class="card-title">Reports <span>/Today</span></h5> --}}
                                    <p>Selamat Datang Admin !!!</p>
                                {{-- </div> --}}
                            {{-- </div>
                        </div><!-- End Reports --> --}}
                    </div>
                </div><!-- End Left side columns -->

            </div>
        </section>


    </main><!-- End #main -->
@endsection
