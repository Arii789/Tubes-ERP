@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Employees Data Karyawan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item "><a href="{{ url('employees/karyawan') }}">Data Karyawan</a></li>
                    <li class="breadcrumb-item active"><a> Edit Data Karyawan</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Karyawan</h5>
                <form class="row g-3" method="POST" action="{{ route('karyawan.update', $karyawan->id) }}"
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
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm" name="nama" autofocus required
                            value="{{ $karyawan->nama }}">
                    </div>
                    <div class="col-12">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" class="form-control form-control-sm" name="posisi" autofocus required
                            value="{{ $karyawan->posisi }}">
                    </div>
                    <div class="col-12">
                        <label for="telp" class="form-label">No Telp</label>
                        <input type="number" class="form-control form-control-sm" name="telp" required
                            value="{{ $karyawan->telp }}">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control form-control-sm" name="email"
                            value="{{ $karyawan->email }}">
                    </div>
                    <div class="col-12">
                        <label for="departemen" class="form-label">Departemen</label>
                        <select class="form-select form-control-sm" id="departemen" name="departemen" autofocus required>
                            <option value="">- Pilih Departemen -</option>
                            @foreach ($departemen as $item)
                                @if ($item->nama_departemen !== null)
                                    <option value="{{ $item->nama_departemen }}"
                                        {{ $karyawan->departemen == $item->nama_departemen ? 'selected' : '' }}>
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
                            @foreach ($managers as $manager)
                                <option value="{{ $manager }}"
                                    {{ $karyawan->manager == $manager ? 'selected' : '' }}>
                                    {{ $manager }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
                <div class="col-12 text-end">
                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="pt-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
