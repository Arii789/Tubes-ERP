@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Bahan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/Manufacture/bahan') }}">Manufacturing Bahan</a></li>
                    <li class="breadcrumb-item active"><a>Manufacturing Edit Bahan</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Data Bahan</h5>

                            <!-- General Form Elements -->
                            <form action="{{ url('/Manufacture/bahan/update/' . $bahan->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Bahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $bahan->nama }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Kode Bahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kode" id="kode" class="form-control"
                                            value="{{ $bahan->kode }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Harga Bahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="harga" id="harga" class="form-control"
                                            value="{{ $bahan->harga }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Gambar Lama</label>
                                    <img src="{{ asset('/img_bahan/' . $bahan->gambar) }}" style="width: 20%" alt="">

                                    <div class="col-sm-10">
                                        <input type="file" name="gambar" id="gambar" class="form-control"
                                            value="{{ asset('/img_bahan/' . $bahan->gambar) }}" style="max-width: 7rem;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Edit Bahan</button>
                                </div>
                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
