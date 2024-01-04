<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BOMController;
use App\Http\Controllers\MoController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RfqController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\SQController;
use App\Http\Controllers\AccountingController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\karyawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/get-chart-data', [ProdukController::class, 'getChartData']);
Route::get('/get-last-updated-time', [ProdukController::class, 'getLastUpdatedTime']);

Route::prefix('Manufacture')->group(function () {
    Route::get('produk', [ProdukController::class, 'index']);
    Route::get('input-produk', [ProdukController::class, 'create']);
    Route::post('produk/simpan', [ProdukController::class, 'store'])->name('produk-simpan');
    Route::get('produk/edit/{kode}', [ProdukController::class, 'edit']);
    Route::put('produk/update/{id}', [ProdukController::class, 'update'])->name('produk-update');
    Route::get('produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk-delete');
    Route::get('cetak-produk', [ProdukController::class, 'cetakProduk'])->name('cetak-produk');

    Route::get('bahan', [BahanController::class, 'index']);
    Route::get('input-bahan', [BahanController::class, 'create']);
    Route::post('bahan/simpan', [BahanController::class, 'store'])->name('bahan-simpan');
    Route::get('bahan/edit/{kode}', [BahanController::class, 'edit']);
    Route::put('bahan/update/{id}', [BahanController::class, 'update'])->name('bahan-update');
    Route::get('bahan/delete/{id}', [BahanController::class, 'destroy'])->name('bahan-delete');
    Route::get('cetak-bahan', [BahanController::class, 'cetakBahan'])->name('cetak-bahan');

    Route::get('mo', [MoController::class, 'manufacture']);
    Route::get('mo-input', [MoController::class, 'manufactureOrder']);
    Route::post('mo-input', [MoController::class, 'moUpload']);
    Route::put('mo/update/{kode_mo}', [MoController::class, 'moUpdate']);
    Route::get('mo-ca/{kode_bom}', [MoController::class, 'caItems']);
    Route::post('mo-produce/{kode_mo}', [MoController::class, 'moProduce']);
    Route::post('mo-done/{kode_mo}', [MoController::class, 'moProsesProduce']);
    Route::get('mo-delete/{kode_mo}', [MoController::class, 'deleteMo']);
    Route::get('mo/cetak', [MoController::class, 'cetakMo'])->name('Mo-cetak');
});

Route::prefix('bom')->group(function () {
    Route::get('bom', [BOMController::class, 'material']);
    Route::get('input-bom', [BOMController::class, 'materialInput']);
    Route::post('input-bom', [BOMController::class, 'upload']);
    Route::get('input-item-bom/{kode_bom}', [BOMController::class, 'materialInputItems']);
    Route::post('input-item-bom', [BOMController::class, 'uploadList']);
    Route::get('bom-delete-item/{kode_bom_list}', [BOMController::class, 'deleteList']);
    Route::get('bom-delete/{kode_bom}', [BOMController::class, 'deleteBom']);
    Route::get('cetak-bom', [BOMController::class, 'cetakBom'])->name('cetakBom');
    Route::get('print-bom-list/{kode_bom}', [BOMController::class, 'printBOMList']);
});

Route::get('rfq', [RfqController::class, 'rfq']);
Route::get('po', [RfqController::class, 'po']);
Route::get('rfq-input', [RfqController::class, 'rfqInput']);
Route::post('rfq-upload', [RfqController::class, 'upload'])->name('rfq.upload');
Route::get('rfq-input-item/{kode_rfq}', [RfqController::class, 'rfqInputItems'])->name('rfq.input.item');
Route::post('rfq-input-item', [RfqController::class, 'rfqUploadItems']);
Route::get('po-input-item/{kode_rfq}', [RfqController::class, 'poInputItems']);
Route::post('rfq/save', [RfqController::class, 'rfqSaveItems']);
Route::post('po/savePo', [RfqController::class, 'poSaveItems']);
Route::post('po/create-bill', [RfqController::class, 'poCreateBill']);
Route::get('po-invoice/{kode_rfq}', [RfqController::class, 'getPDF']);
Route::get('rfq-delete-item/{kode_rfq_list}', [RfqController::class, 'deleteList']);
Route::get('rfq-delete/{kode_rfq}', [RfqController::class, 'deleteRfq']);

Route::prefix('vendor')->group(function () {
    Route::get('', [VendorController::class, 'index']);
    Route::get('tambah', [VendorController::class, 'create']);
    Route::post('simpan', [VendorController::class, 'store'])->name('vendor-simpan');
    Route::get('edit/{id}', [VendorController::class, 'edit']);
    Route::put('update/{id}', [VendorController::class, 'update'])->name('vendor-update');
    Route::get('delete/{id}', [VendorController::class, 'destroy'])->name('vendor-delete');
});

Route::prefix('pembeli')->group(function () {
    Route::get('', [PembeliController::class, 'index']);
    Route::get('tambah', [PembeliController::class, 'create']);
    Route::post('simpan', [PembeliController::class, 'store'])->name('pembeli-simpan');
    Route::get('edit/{id}', [PembeliController::class, 'edit']);
    Route::put('update/{id}', [PembeliController::class, 'update'])->name('pembeli-update');
    Route::get('delete/{id}', [PembeliController::class, 'destroy'])->name('pembeli-delete');
});
// Route::prefix('pembeli')->group(function () {
// });

Route::get('sq', [SQController::class, 'sq']);
Route::get('sq-input', [SQController::class, 'sqInput']);
Route::post('sq-input', [SQController::class, 'upload']);
Route::get('sq-input-item/{kode_sq}', [SQController::class, 'sqInputItems'])->name('sq-input-item');
Route::post('sq-input-item', [SQController::class, 'sqUploadItems']);
Route::post('sq/save', [SQController::class, 'sqSave']);
Route::post('sq/saveSo', [SQController::class, 'sqSaveSo']);
Route::post('sq/invoice', [SQController::class, 'sqCreateInvoice']);
Route::post('sq/delivery', [SQController::class, 'sqDelivery']);
Route::get('sq-delete-item/{kode_sq_list}', [SQController::class, 'deleteListSQ']);
Route::get('sq-delete/{kode_sq}', [SQController::class, 'deleteSQ']);
Route::get('so', [SQController::class, 'so']);
Route::get('so-input-item/{kode_sq}', [SQController::class, 'soInputItems']);
Route::post('so-input-item', [SQController::class, 'soUploadItems']);
Route::get('so-invoice/{kode_sq}', [SQController::class, 'getPDF']);

Route::get('accounting', [AccountingController::class, 'index']);
Route::get('accounting-invoicing', [AccountingController::class, 'invoicing']);
Route::get('accounting-invoicing/tampil-pertanggal/{tglawal}/{tglakhir}', [AccountingController::class, 'tampilInvoicePertanggal']);
Route::get('accounting-invoicing/cetak/', [AccountingController::class, 'cetakLaporan']);
Route::get('accounting-invoicing/cetak-pertanggal/{tglawal}/{tglakhir}', [AccountingController::class, 'cetakLaporanPertanggal']);
Route::get('accounting-bill', [AccountingController::class, 'bill']);
Route::get('accounting-bill/tampil-pertanggal/{tglawal}/{tglakhir}', [AccountingController::class, 'tampilBillPertanggal']);
Route::get('accounting-bill/cetak/', [AccountingController::class, 'cetakLaporanBill']);
Route::get('accounting-bill/cetak-pertanggal/{tglawal}/{tglakhir}', [AccountingController::class, 'cetakLaporanBillPertanggal']);

Route::prefix('employees')->group(function () {
    // karyawan
    Route::get('karyawan', [karyawanController::class, 'index'])->name('employees.karyawan');
    Route::get('karyawan/create', [karyawanController::class, 'create'])->name('karyawan.create');
    Route::post('aryawan/create/store', [karyawanController::class, 'store'])->name('karyawan.store');
    Route::get('karyawan/edit/{id}', [karyawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('karyawan/edit/{id}', [karyawanController::class, 'update'])->name('karyawan.update');
    Route::delete('karyawan/delete/{id}', [karyawanController::class, 'destroy'])->name('karyawan.destroy');

    // departemen
    Route::get('departemen', [DepartemenController::class, 'index'])->name('employees.departemen');
    Route::get('departemen/detail/{id}', [DepartemenController::class, 'show'])->name('departemen.detail');
    Route::get('departemen/create', [DepartemenController::class, 'create'])->name('departemen.create');
    Route::post('departemen/create/store', [DepartemenController::class, 'store'])->name('departemen.store');
    Route::get('departemen/edit/{id}', [DepartemenController::class, 'edit'])->name('departemen.edit');
    Route::put('departemen/edit/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
    Route::delete('departemen/delete/{id}', [DepartemenController::class, 'destroy'])->name('departemen.destroy');
});
