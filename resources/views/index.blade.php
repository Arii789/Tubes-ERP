@extends('mainDashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="row">
                <p>Selamat Datang Admin !!!</p>
                <div class="card mb-4">
                    <div class="card-header">Data Produk</div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div><canvas id="myBarChart" width="0" height="1"
                                style="display: block; width: 100px; height: 200px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
                <div class="col-lg-11">
                    <h6>ERP Perusahaan Alat Rumah Tangga</h6>
                    <div class="dropdown">
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manufacture</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="Manufacture/produk">Produk</a>
                            <a class="dropdown-item" href="Manufacture/bahan">Bahan</a>
                            <a class="dropdown-item" href="Manufacture/input-produk">Input Produk</a>
                            <a class="dropdown-item" href="Manufacture/input-bahan">Input Bahan</a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">BOM</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="bom/bom">Data BOM</a>
                            <a class="dropdown-item" href="bom/input-bom">Input BOM </a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manufacture
                            Order</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="Manufacture/mo">Data Manufacture Order</a>
                            <a class="dropdown-item" href="Manufacture/mo-input">Input Manufacture Order</a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Vendor</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="vendor">Data Vendor</a>
                            <a class="dropdown-item" href="vendor/tambah">Input Vendor </a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Request For
                            Quotation</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="rfq">Data RFQ</a>
                            <a class="dropdown-item" href="rfq-input">Input RFQ </a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Purchase Order</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="po">Data Purchase Order</a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pembeli</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="pembeli">Data Pembeli</a>
                            <a class="dropdown-item" href="pembeli/tambah">Tambah Pembeli</a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sales
                            Quotation</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="sq">Data Sales Quotation</a>
                            <a class="dropdown-item" href="sq-input">Tambah Sales Quotation</a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sales Order</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="so">Data Sales Order</a>
                        </div>
                        <button class="btn btn-teal dropdown-toggle btn-info" id="dropdownFadeInUp" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Accounting</button>
                        <div class="dropdown-menu animated--fade-in-up" aria-labelledby="dropdownFadeInUp">
                            <a class="dropdown-item" href="/accounting">Data Accounting</a>
                        </div>

                    </div>

                </div><!-- End Left side columns -->
            </div>
    </section>
</main><!-- End #main -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('/get-chart-data')
            .then(response => response.json())
            .then(data => {
                const labels = data.map(product => product.nama);
                const prices = data.map(product => product.harga);
                renderBarChart(labels, prices);
            });
    });

    function renderBarChart(labels, prices) {
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Prices',
                    data: prices,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>
