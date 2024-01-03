@extends('mainDashboard')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Data Accounting</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('/accounting') }}">Data Accounting</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Accounting</h5>
                            <a href="/accounting-invoicing"><button type="button" class="btn btn-outline-success">Customer
                                    Invoicing</button></a>
                            <br>
                            <br>
                            <a href="/accounting-bill"><button type="button" class="btn btn-outline-success">Vendor
                                    Bill</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
