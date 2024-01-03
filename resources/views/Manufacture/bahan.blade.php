@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <h1>Data Bahan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('/Manufacture/bahan') }}">Manufacturing Bahan</a></li>
            </ol>
        </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Bahan</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <div class="card-body">
                                    <a href="input-bahan"><button type="button" class="btn btn-primary">Tambah
                                            Bahan</button></a>
                                    <a href="cetak-bahan" target="_blank"><button type="button"
                                            class="btn btn-secondary">Cetak Bahan</button></a>
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Barcode</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bahan as $bhn)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{!! DNS1D::getBarcodeHTML("$bhn->bahan_qr", 'PHARMA', 2, 25) !!} P - {{ $bhn->bahan_qr }}</td>
                                                <td>{{ $bhn->nama }}</td>
                                                <td>{{ $bhn->kode }}</td>
                                                <td width="20%">{{ 'Rp. ' . $bhn->harga }}</td>
                                                <td>{{ $bhn->stok }}</td>
                                                <td width="20%">
                                                    <img src="{{ url('/img_bahan/' . $bhn->gambar) }}" width="100%"
                                                        alt="" style="max-width: 7rem;">
                                                </td>
                                                <td>
                                                    <a href="/Manufacture/bahan/edit/{{ $bhn->kode }}">Edit  | </a>
                                                    <a href="/Manufacture/bahan/delete/{{ $bhn->id }}">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
