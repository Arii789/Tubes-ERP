<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\RFQ;
use App\Models\RFQList;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RfqController extends Controller
{
    public function rfq()
    {
        $rfq = RFQ::join('vendor', 'rfq.kode_vendor', '=', 'vendor.id')
            ->get(['rfq.*', 'vendor.nama']);
        return view('rfq.rfq', ['rfqs' => $rfq]);
    }

    public function po()
    {
        $rfq = RFQ::join('vendor', 'rfq.kode_vendor', '=', 'vendor.id')
            ->get(['rfq.*', 'vendor.nama']);
        return view('rfq.po', ['rfqs' => $rfq]);
    }

    public function rfqInput()
    {
        $vendors = Vendor::all();
        $lastRfq = RFQ::orderBy('kode_rfq', 'desc')->first(); // Corrected column name
        $lastRfqId = $lastRfq ? intval(substr($lastRfq->kode_rfq, 5)) : 0;
        $newRfqId = $lastRfqId + 1;
        $RfqCode = 'KDRFQ-' . str_pad($newRfqId, 4, '0', STR_PAD_LEFT);
        return view('rfq.rfq-input', ['RfqCode' => $RfqCode, 'vendors' => $vendors]);
    }
    public function upload(Request $request)
    {
        $tanggal = now(); // Use current timestamp

        $request->validate([
            'kode_vendor' => [
                'required',
                Rule::exists('vendor', 'id'), // Validate that 'kode_vendor' exists in the 'vendor' table
            ],
        ]);

        // Retrieve the latest kode_rfq directly from the RFQ model
        $latestRFQ = RFQ::orderBy('kode_rfq', 'desc')->first();

        // Extract the numeric part of the latest kode_rfq and increment it
        $newRFQId = $latestRFQ ? (int)substr($latestRFQ->kode_rfq, 5) + 1 : 1;

        // Build the new kode_rfq
        $newRFQCode = 'KDRFQ-' . str_pad($newRFQId, 4, '0', STR_PAD_LEFT);

        RFQ::create([
            'kode_rfq' => $newRFQCode,
            'kode_vendor' => $request->kode_vendor,
            'tanggal_order' => $tanggal,
            'status' => 1,
            'total_harga' => 0,
            'metode_pembayaran' => 0
        ]);

        return redirect('rfq-input-item/' . $newRFQCode);
    }


    public function rfqInputItems($kode_rfq)
    {
        $rfq = RFQ::join('vendor', 'rfq.kode_vendor', '=', 'vendor.id')
            ->where('rfq.kode_rfq', $kode_rfq)
            ->first(['rfq.*', 'vendor.nama']);
        $rfqList = RFQList::join('bahan', 'rfq_list.kode_bahan', '=', 'bahan.id')
            ->where('rfq_list.kode_rfq', $kode_rfq)
            ->get(['rfq_list.*', 'bahan.nama', 'bahan.harga']);
        $produk = Bahan::all();
        return view('rfq.rfq-input-item', ['rfq' => $rfq, 'rfqList' => $rfqList, 'products' => $produk]);
    }

    public function rfqUploadItems(Request $request)
    {
        RFQList::create([
            'kode_rfq' => $request->kode_rfq,
            'kode_bahan' => $request->kode_bahan,
            'kuantitas' => $request->kuantitas
        ]);
        $product = Bahan::find($request->kode_bahan);
        $harga = $product->harga;
        $rfq = RFQ::find($request->kode_rfq);
        $harga_lama = $rfq->total_harga;
        $harga_baru = $harga_lama + ($harga * $request->kuantitas);

        $rfq->total_harga = $harga_baru;
        $rfq->save();

        return redirect('rfq-input-item/' . $request->kode_rfq);
    }

    public function poInputItems($kode_rfq)
    {
        $rfq = RFQ::join('vendor', 'rfq.kode_vendor', '=', 'vendor.id')
            ->where('rfq.kode_rfq', $kode_rfq)
            ->first(['rfq.*', 'vendor.nama']);
        $rfqList = RFQList::join('bahan', 'rfq_list.kode_bahan', '=', 'bahan.id')
            ->where('rfq_list.kode_rfq', $kode_rfq)
            ->get(['rfq_list.*', 'bahan.nama', 'bahan.harga']);
        $produk = Bahan::all();
        return view('rfq.po-input-item', ['rfq' => $rfq, 'rfqList' => $rfqList, 'products' => $produk]);
    }

    public function deleteList($kode_rfq_list)
    {
        $rfq_list = RFQList::find($kode_rfq_list);
        $product = Bahan::find($rfq_list->kode_bahan);
        $harga = $product->harga;
        $rfq = RFQ::find($rfq_list->kode_rfq);
        $harga_lama = $rfq->total_harga;
        $harga_baru = $harga_lama - ($harga * $rfq_list->kuantitas);

        $rfq->total_harga = $harga_baru;
        $rfq->save();

        $rfq_list->delete();
        return redirect('rfq-input-item/' . $rfq_list->kode_rfq);
    }

    public function rfqSaveItems(Request $request)
    {
        $rfq = RFQ::find($request->kode_rfq);
        $rfq->status = $rfq->status + 1;
        $rfq->save();

        return redirect('rfq-input-item/' . $request->kode_rfq);
    }

    public function poSaveItems(Request $request)
    {
        $rfq = RFQ::find($request->kode_rfq);
        $rfq->status = $rfq->status + 1;
        $rfq->save();

        return redirect('po-input-item/' . $request->kode_rfq);
    }

    public function poCreateBill(Request $request)
    {
        $rfqlist = RFQList::Where('kode_rfq', $request->kode_rfq)->get();

        foreach ($rfqlist as $item) {
            $product = Bahan::find($item->kode_bahan);

            if ($product) {  // Check if the product exists
                $product->stok = $product->stok + $item->kuantitas;
                $product->save();
            } else {
                // Handle the case where the product is not found
                // You can log an error or take appropriate action
            }
        }

        $rfq = RFQ::find($request->kode_rfq);
        $rfq->metode_pembayaran = $request->payment;
        $rfq->status = $rfq->status + 1;
        $rfq->save();

        return redirect('po');
    }


    public function deleteRfq($kode_rfq)
    {
        $rfq_list = RFQList::where('kode_rfq', $kode_rfq);
        $rfq_list->delete();

        $rfq = RFQ::find($kode_rfq);
        $rfq->delete();
        return redirect('rfq/');
    }

    public function getPDF($kode_rfq)
    {
        $rfqList = RFQList::join('bahan', 'rfq_list.kode_bahan', '=', 'bahan.id')
            ->where('rfq_list.kode_rfq', $kode_rfq)
            ->get(['rfq_list.*', 'bahan.nama', 'bahan.harga']);
        $rfq = RFQ::join('vendor', 'rfq.kode_vendor', '=', 'vendor.id')
            ->where('rfq.kode_rfq', $kode_rfq)
            ->get(['rfq.*', 'vendor.nama', 'vendor.alamat']);

        return view('rfq.po-invoice', ['rfqlist' => $rfqList, 'rfq' => $rfq]);

        // $pdf = app('dompdf.wrapper')->loadView('rfq.po-invoice', ['rfqlist' => $rfqList, 'rfq' => $rfq]);
        // return $pdf->stream('invoice-po.pdf');
    }
}
