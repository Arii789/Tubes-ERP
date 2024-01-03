@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tambah Request For Quotation</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item">Purchasing</li>
                    <li class="breadcrumb-item active">Tambah RFQ</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Data Request For Quotation</h5>

                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('rfq.upload') }}">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Kode RFQ</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kode_rfq" id="kode_rfq" class="form-control" value="{{ $newRFQCode }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Vendor</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" aria-label="Default select example" name="kode_vendor"
                                            id="kode_vendor">
                                            <option selected disabled>Pilih Vendor</option>
                                            @if ($vendors->count())
                                                @foreach ($vendors as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('kode_vendor'))
                                            <span class="text-danger">{{ $errors->first('kode_vendor') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Simpan</button>
                                </div>

                                @if ($errors->any())
                                    <div class="mt-3">
                                        <ul class="list-group">
                                            @foreach ($errors->all() as $error)
                                                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
