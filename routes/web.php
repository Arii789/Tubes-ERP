<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BOMController;
use App\Http\Controllers\MoController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\RfqController;

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
// Route::get('bom/input-bom', function () {
//     return view('BOM/input-bom');
// });
// Route::get('bom/bom', function () {
//     return view('BOM/bom');
// });

Route::get('Manufacture/produk', [ProdukController::class, 'index']);
Route::get('Manufacture/input-produk', [ProdukController::class, 'create']);
Route::post('/home/produk/simpan', [ProdukController::class, 'store'])->name('produk-simpan');
Route::get('/home/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::put('/home/produk/update/{id}', [ProdukController::class, 'update'])->name('produk-update');
Route::get('/home/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk-delete');
Route::get('Manufacture/cetak-produk', [ProdukController::class, 'cetakProduk'])->name('cetak-produk');

Route::get('Manufacture/bahan', [BahanController::class, 'index']);
Route::get('Manufacture/input-bahan', [BahanController::class, 'create']);
Route::post('/home/bahan/simpan', [BahanController::class, 'store'])->name('bahan-simpan');
Route::get('/home/bahan/edit/{id}', [BahanController::class, 'edit']);
Route::put('/home/bahan/update/{id}', [BahanController::class, 'update'])->name('bahan-update');
Route::get('/home/bahan/delete/{id}', [BahanController::class, 'destroy'])->name('bahan-delete');
Route::get('Manufacture/cetak-bahan', [BahanController::class, 'cetakBahan'])->name('cetak-bahan');

Route::get('bom/bom', [BOMController::class,'material']);
Route::get('bom/input-bom', [BOMController::class,'materialInput']);
Route::post('bom/input-bom', [BOMController::class,'upload']);
Route::get('bom/input-item-bom/{kode_bom}', [BOMController::class,'materialInputItems']);
Route::post('bom/input-item-bom', [BOMController::class,'uploadList']);
Route::get('bom/bom-delete-item/{kode_bom_list}', [BOMController::class,'deleteList']);
Route::get('bom/bom-delete/{kode_bom}', [BOMController::class,'deleteBom']);
Route::get('bom/cetak-bom', [BOMController::class, 'cetakBom'])->name('cetakBom');

Route::get('Manufacture/mo', [MoController::class,'manufacture']);
Route::get('Manufacture/mo-input', [MoController::class,'manufactureOrder']);
Route::post('Manufacture/mo-input', [MoController::class,'moUpload']);
Route::put('Manufacture/mo/update/{kode_mo}', [MoController::class,'moUpdate']);
// Route::put('/home/mo/confirm/{kode_mo}', [MoController::class,'moConfirm']);
Route::get('Manufacture/mo-ca/{kode_bom}', [MoController::class,'caItems']);
Route::post('Manufacture/mo-produce/{kode_mo}', [MoController::class,'moProduce']);
Route::post('Manufacture/mo-done/{kode_mo}', [MoController::class,'moProsesProduce']);
Route::get('Manufacture/mo-delete/{kode_mo}', [MoController::class,'deleteMo']);
Route::get('Manufacture/mo/cetak', [MoController::class, 'cetakMo'])->name('Mo-cetak');

Route::get('rfq', [RfqController::class,'rfq']);
Route::get('po', [RfqController::class,'po']);
Route::get('rfq-input', [RfqController::class,'rfqInput']);
Route::post('rfq-input', [RfqController::class,'upload']);
Route::get('rfq-input-item/{kode_rfq}', [RfqController::class,'rfqInputItems']);
Route::post('rfq-input-item', [RfqController::class,'rfqUploadItems']);
Route::get('po-input-item/{kode_rfq}', [RfqController::class,'poInputItems']);
Route::post('rfq/save', [RfqController::class,'rfqSaveItems']);
Route::post('po/savePo', [RfqController::class,'poSaveItems']);
Route::post('po/create-bill', [RfqController::class,'poCreateBill']);
Route::get('po-invoice/{kode_rfq}', [RfqController::class,'getPDF']);
Route::get('rfq-delete-item/{kode_rfq_list}', [RfqController::class,'deleteList']);
Route::get('rfq-delete/{kode_rfq}', [RfqController::class,'deleteRfq']);

Route::get('vendor', [VendorController::class, 'index']);
Route::get('vendor/tambah', [VendorController::class, 'create']);
Route::post('vendor/simpan', [VendorController::class, 'store'])->name('vendor-simpan');
Route::get('vendor/edit/{id}', [VendorController::class, 'edit']);
Route::put('vendor/update/{id}', [VendorController::class, 'update'])->name('vendor-update');
Route::get('vendor/delete/{id}', [VendorController::class, 'destroy'])->name('vendor-delete');