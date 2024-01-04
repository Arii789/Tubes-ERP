@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees Data Departemen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('employees/departemen') }}">Data Departemen</a></li>
                    <li class="breadcrumb-item active"><a> Detail Data Departemen</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            @foreach ($karyawan as $index => $karyawan)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="#">
                        <div class="card mb-3" style="max-width:540px;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-0">{{ $karyawan->nama }}</h5>
                                        <p class="card-text m-0">{{ $karyawan->posisi }}</p>
                                        <p class="card-text m-0">{{ $karyawan->telp }}</p>
                                        <p class="card-text m-0">{{ $karyawan->email }}</p>
                                        <p class="card-text m-0">{{ $karyawan->departemen }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
@endsection
