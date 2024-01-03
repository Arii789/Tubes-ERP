@extends('mainDashboard')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Edit Pembeli</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('/pembeli') }}">Sales Data Pembeli</a></li>
          <li class="breadcrumb-item active"><a> Edit Sales Data Pembeli</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Data Pembeli</h5>
              
                <!-- General Form Elements -->
                <form action="{{ url('pembeli/update/'.$pembeli->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nama Pembeli</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $pembeli->nama }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Contact Person</label>
                  <div class="col-sm-10">
                    <input type="text" name="kontak" id="kontak" class="form-control" value="{{ $pembeli->kontak }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="alamat" id="alamat" style="height: 100px">{{ $pembeli->alamat }}</textarea>
                  </div>
                </div>
                <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Edit Pembeli</button>
                </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection