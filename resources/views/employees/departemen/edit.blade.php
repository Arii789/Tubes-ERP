@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees Data Departemen</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('employees/departemen') }}">Data Departemen</a></li>
                    <li class="breadcrumb-item active"><a> Edit Data Departemen</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Departemen</h5>
                <form class="row g-3" method="POST" action="{{ route('departemen.update', $departemen->id) }}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @method('PUT')
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-12">
                        <label for="nama_departemen" class="form-label">Nama Departemen</label>
                        <input type="text" class="form-control form-control-sm" name="nama_departemen" autofocus required
                            value="{{ $departemen->nama_departemen }}">
                    </div>
                    <div class="col-12">
                        <label for="manager" class="form-label">Manager</label>
                        <select class="form-select form-control-sm" id="manager" name="manager" autofocus>
                            <option value="">- Pilih Manager -</option>
                            @foreach ($karyawan as $item)
                                @if ($item->nama !== null)
                                    <option value="{{ $item->nama }}"
                                        {{ $departemen->manager == $item->nama ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
                <div class="col-12 text-end">
                    <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST" class="pt-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
