<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Invoice_detail;
use App\Models\ProductDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pengiriman;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    //
    public function index()
    {
        $invoice  = Invoice::with(['user', 'customer', 'detail'])->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.index', compact('invoice'));
    }

    public function create()
    {

        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.create', compact('customers'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,id',
            'tenggat' => 'date',
        ]);
    
        try {
            $latestInvoice = Invoice::orderBy('no_faktur_2023', 'DESC')->select('no_faktur_2023')->first();
            $id = $latestInvoice ? $latestInvoice->no_faktur_2023 + 1 : 1;
            // $tenggat = $request->tenggat;
            $invoice = Invoice::create([
                'customer_id' => $request->customer_id,
                'status' => 0,
                'total' => 0,
                'tenggat' => $request->tenggat,
                'tanggal' => now(),
                'user_id' => Auth::user()->id,
                'no_faktur_2023' => $id,
            ]);
    
            // Uncomment the lines below if you want to send emails
            // Mail::to($invoice->user->email)->send(new \App\Mail\PostMail($invoice->customer->name, 'Laksa Medika Internusa', $invoice->id));
            // Mail::to('laksatechno@gmail.com')->send(new \App\Mail\PostMail($invoice->customer->name, 'Laksa Medika Internusa', $invoice->id));
            // Mail::to('haryokodrajaddwi@gmail.com')->send(new \App\Mail\PostMail($invoice->customer->name, 'Laksa Medika Internusa', $invoice->id));
    
            return redirect(route('invoice.edit', ['id' => $invoice->id]));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    

    public function edit($id)
    {
        $customers = Customer::orderBy('created_at', 'DESC', 'id')->get();
        $invoice = Invoice::with(['product', 'customer', 'detail', 'detail.product_detail'])->find($id);
        $products = Product::orderBy('title', 'ASC', 'customer_id')->get();
        $details = ProductDetail::orderBy('product_id', 'DESC')->get();
        return view('invoice.edit', compact('invoice', 'products', 'details', 'customers'));
    }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'qty' => 'required|integer',
        'diskon' => 'numeric|min:0|max:100',
        'tenggat' => 'date', // Validasi untuk tenggat
        'user_id' => 'int',
    ]);

    try {
        $invoice = Invoice::find($id);
        $detail = ProductDetail::find($request->product_detail_id);
        $invoice_detail = $invoice->detail()->where('product_detail_id', $detail->id)->first();

        if ($invoice_detail) {
            $updatedDiskon = $invoice_detail->diskon + ($request->diskon / 100 * $invoice_detail->price * $request->qty);
            $invoice_detail->update([
                'qty' => $invoice_detail->qty + $request->qty,
                'diskon' => $updatedDiskon,
                'tenggat' => $request->tenggat, // Simpan tenggat dari form
            ]);
        } else {
            $diskon = $request->diskon / 100 * $detail->price * $request->qty;
            Invoice_detail::create([
                'invoice_id' => $invoice->id,
                'product_detail_id' => $request->product_detail_id,
                'price' => $detail->price,
                'tenggat' => $request->tenggat, // Simpan tenggat dari form
                'qty' => $request->qty,
                'diskon' => $diskon,
                'user_id' => $invoice->user_id,
            ]);
        }

        $detail->product->stock -= $request->qty;
        $detail->product->save();

        return redirect()->back()->with(['success' => 'Product Telah Ditambahkan']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}

    public function deleteProduct($id)
    {
        $detail = Invoice_detail::findOrFail($id);
        $jumlah = $detail->qty;
        if ($detail->product_detail) {
            $detail->product_detail->product->stock += $jumlah;
            $detail->product_detail->product->save();
        }
        $detail->delete();
        return redirect()->back()->with(['success' => 'Product telah dihapus']);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $details = $invoice->details;

        foreach ($details as $detail) {
            $inventory = $detail->productDetail->product;
            $inventory->stock += $detail->qty;
            $inventory->save();
            $detail->delete();
        }

        $invoice->forceDelete();
        return redirect()->back()->with('success', 'Data has been deleted');
    }

    public function status($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect()->back()->with(['success' => 'Faktur telah lunas']);
    }

    public function trash()
    {
        $invoice  = Invoice::onlyTrashed()->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.trash', compact('invoice'));
    }

    public function allinvoice()
    {
        $allinvoice  = Invoice::with(['user', 'customer', 'detail'])->orderBy('created_at', 'DESC')->paginate(10);
        return view('invoice.allinvoice', compact('allinvoice'));
    }

    public function invoicenondanppn()
    {
        return view('invoice.invoicenondanppn');
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $customers = Customer::where('name', 'like', "%" . $cari . "%")
            ->paginate(5);

        // mengirim data pegawai ke view index
        // return view('invoice.create', compact('customers'));
        return response()->json($customers);
    }


    public function generateInvoice($id)
    {
        $invoice = Invoice::with(['customer', 'detail', 'detail.product_detail.product'])->find($id);
        // Format nomor invoice
        $noInvoice = 'INVOICE-' . $invoice->no_faktur_2023;
        // Nama customer
        $customerName = str_replace(' ', '_', $invoice->customer->name);
        // Nama file PDF dengan nomor invoice dan nama customer
        $fileName = $noInvoice . '_' . $customerName . '.pdf';
        $pdf = PDF::loadView('invoice.print', compact('invoice'))->setPaper('a4', 'portrait');
        // Untuk menampilkan PDF di browser
        return $pdf->stream($fileName);
    }
    
    public function generateInvoice2($id)
    {
        $invoice = Invoice::with(['customer', 'detail', 'detail.product_detail.product'])->find($id);
        // Format nomor invoice
        $noInvoice = 'INV-' . $invoice->no_faktur_2023;
        // Nama customer
        $customerName = str_replace(' ', '_', $invoice->customer->name);
        // Nama file PDF dengan nomor invoice dan nama customer
        $fileName = $noInvoice . '_' . $customerName . '.pdf';
        $pdf = PDF::loadView('invoice.print2', compact('invoice'))->setPaper('a4', 'portrait');
        // Untuk menampilkan PDF di browser
        return $pdf->stream($fileName);
    }
    
    public function pengiriman($id)
    {
        $invoice = Invoice::with(['product', 'customer', 'detail', 'detail.product_detail', 'pengiriman'])->find($id);
        $products = Product::orderBy('title', 'ASC', 'customer_id')->get();
        $details = ProductDetail::orderBy('product_id', 'DESC')->get();
        return view('invoice.pengiriman', compact('invoice', 'products', 'details'));
    }

    public function savepengiriman(Request $request, $id)
    {
        // dd($request->all());
        
            $invoice = Invoice::find($id);
            $invoice_detail = Invoice_detail::find($request->invoice_detail_id);
            // dd($invoice_detail->product_detail_id);
            $pengirimans = Pengiriman::where('invoice_detail_id', $invoice_detail->id)->first();

                Pengiriman::create([
                    'invoice_id' => $invoice->id,
                    'product_detail_id' => $invoice_detail->product_detail_id,
                    //'product_id' => $request->product_id,
                    'invoice_detail_id' => $request->invoice_detail_id,
                    'qty' => $request->qty,
                    'status'=>$request->status,
                ]);
            $invoice_detail->save();

            return redirect()->back()->with(['success' => 'Product Telah Dikirim']);
    }

    public function deletepengiriman($id)
    {
        $pengirimans = Pengiriman::find($id);
        // dd($pengirimans);
        $details = Invoice_detail::find($pengirimans->invoice_detail_id);
        // dd($details);
        // $details->update([
        //     'qty'=>$details->qty+$pengirimans->qty
        // ]);
        $pengirimans->delete();
        
        return redirect()->back()->with(['success' => 'Product telah dihapus']);
    }
}
