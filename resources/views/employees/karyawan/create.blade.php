@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees Data Karyawan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('employees/karyawan') }}">Data Karyawan</a></li>
                    <li class="breadcrumb-item active"><a> Input Data Karyawan</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Karyawan</h5>
                <form class="row g-3" method="POST" action="{{ route('karyawan.store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="nama" autofocus required
                            value="{{ old('nama') }}">
                    </div>
                    <div class="col-12">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" class="form-control form-control-sm" name="posisi" autofocus required
                            value="{{ old('posisi') }}">
                    </div>
                    <div class="col-12">
                        <label for="telp" class="form-label">No Telp</label>
                        <input type="number" class="form-control form-control-sm" name="telp" required
                            value="{{ old('telp') }}">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control form-control-sm" name="email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="col-12">
                        <label for="departemen" class="form-label">Departemen</label>
                        <select class="form-select form-control-sm" id="departemen" name="departemen" autofocus>
                            <option value="">- Pilih Departemen -</option>
                            @foreach ($departemen as $item)
                                @if ($item->nama_departemen !== null)
                                    <option value="{{ $item->nama_departemen }}">
                                        {{ $item->nama_departemen }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @foreach ($departemen as $item)
                            <input type="hidden" name="id_departemen" value="{{ $item->id }}">
                        @endforeach
                    </div>
                    <div class="col-12">
                        <label for="manager" class="form-label">Manager</label>
                        <select class="form-select form-control-sm" id="manager" name="manager" autofocus>
                            <option value="">- Pilih Manager -</option>
                            @foreach ($manager as $item)
                                @if ($item->nama !== null)
                                    <option value="{{ $item->nama }}">
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
            </div>
        </div>
    </main>
@endsection
