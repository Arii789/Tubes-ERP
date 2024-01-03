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
                            <canvas id="myBarChart" width="1" height="0"
                                style="display: block; width: 100px; height: 220px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    <div class="card-footer small text-muted" id="lastUpdatedTime">Loading...</div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Data Bahan</div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBahanChart" width="1" height="0"
                                style="display: block; width: 100px; height: 220px;"
                                class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                    <div class="card-footer small text-muted" id="lastUpdatedTimeBahan">Loading...</div>
                </div>
                <div class="col-lg-11">
                    <h6>ERP Perusahaan Alat Rumah Tangga</h6>
                </div><!-- End Left side columns -->
            </div>
    </section>
</main><!-- End #main -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/get-chart-data')
            .then(response => response.json())
            .then(data => {
                const produkLabels = data.produk.map(product => product.nama);
                const produkPrices = data.produk.map(product => product.harga);
                renderBarChart('myBarChart', 'Prices', produkLabels, produkPrices);

                const bahanLabels = data.bahan.map(bahan => bahan.nama);
                const bahanPrices = data.bahan.map(bahan => bahan.harga);
                renderBarChart('myBahanChart', 'Prices', bahanLabels, bahanPrices);
            });

        updateLastUpdatedTime();
        // ...
    });

    function renderBarChart(chartId, label, labels, prices) {
        var ctx = document.getElementById(chartId).getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: label,
                    data: prices,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(255, 0, 0, 0.2)',
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

    function updateLastUpdatedTime() {
        fetch('/get-last-updated-time')
            .then(response => response.json())
            .then(data => {
                const lastUpdatedTimeElement = document.getElementById('lastUpdatedTime');
                const lastUpdatedTimeBahanElement = document.getElementById('lastUpdatedTimeBahan');
                lastUpdatedTimeElement.innerText = `Updated ${formatTime(data.last_updated_time)}`;
                lastUpdatedTimeBahanElement.innerText = `Updated ${formatTime(data.last_updated_time_bahan)}`;
            });
    }

    function formatTime(time) {
        // Implementasi format waktu sesuai kebutuhan Anda
        // Misalnya, menggunakan library seperti 'moment.js' atau atur format secara manual.
        return time; // Sesuaikan dengan format yang sesuai
    }
</script>

