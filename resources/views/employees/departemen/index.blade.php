@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees Data Departemen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('employees/departemen') }}">Data Departemen</a></li>
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
            <div class="text-end pb-3">
                <a href="{{ route('departemen.create') }}" class="btn btn-success">Tambah Departemen</a>
            </div>
            @foreach ($departemen as $index => $departemen)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{ route('departemen.edit', $departemen->id) }}">
                        <div class="card mb-3" style="max-width:540px;">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title m-0">{{ $departemen->nama_departemen }}</h5>
                                        <p class="card-text m-0 text-dark">Manager : {{ $departemen->manager }}</p>
                                        <div class="pt-4">
                                            <a href="{{ route('departemen.detail', $departemen->id) }}"
                                                class="btn btn-info">Karyawan</a>
                                        </div>
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
