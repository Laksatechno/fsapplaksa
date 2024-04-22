<?php

namespace App\Http\Controllers;

// use App\Invoice_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Invoice_detail;
use App\Models\Invoiceppn;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Product_customer_detail;
use App\Models\Customer;

use App\Models\Invoice_DetailPPN;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get(); // 2
        $customers = Customer::with('products.details')->orderBy('created_at', 'DESC')->get();
        return view('laporan_penjualan.index', compact('products','customers'));
    }
    public function produk($id){
        $details = ProductDetail::where('product_id', $id)->get();
        $detailcustomers = Product_customer_detail::where('product_id', $id)->get();
        return view('laporan_penjualan.produk', with(compact('details', 'detailcustomers')));
    }

// app/Http/Controllers/LaporanController.php

// LaporanController.php




// public function showProductDetails($productId)
// {
//     $productDetails = DB::table('invoice_details')
//         ->join('invoices', 'invoice_details.invoice_id', '=', 'invoices.id')
//         ->join('customers', 'invoices.customer_id', '=', 'customers.id')
//         ->select('invoices.id as invoice_no', 'customers.name as customer_name', 'invoices.tanggal', 'invoice_details.qty')
//         ->where('invoice_details.product_id', $productId)
//         ->get();

//     dd($productDetails); // Debugging statement

//     $product = DB::table('products')->find($productId);

//     return view('laporan_penjualan.produk', compact('product', 'productDetails'));
// }

// LaporanController.php


//04-0320224
// public function showProductDetails($productId)
// {
//     // Ambil data dari beberapa tabel

//     $productDetails = DB::table('products')
//         ->join('product_details', 'products.id', '=', 'product_details.id') // Perubahan pada kondisi join
//         ->join('invoice_details', 'product_details.id', '=', 'invoice_details.product_detail_id')
//         ->join('invoices', 'invoice_details.invoice_id', '=', 'invoices.id')
//         ->join('customers', 'invoices.customer_id', '=', 'customers.id')
//         ->select('invoices.id as invoice_id', 'customers.name as customer_name', 'invoices.tanggal', 'invoice_details.qty')
//         ->where('products.id', '=', $productId)
//         ->get();
//         $product = DB::table('products')->find($productId);
//     // Kirim data ke view
//     return view('laporan_penjualan.produk', compact('product','productDetails'));
// }

public function showProduct($productId)
{
    $product = Product::find($productId);

    // Fetch related data from the database
    $customer = Customer::find($product->customer_id);
    $details = ProductDetail::where('product_id', $productId)->get();
    $invoices = Invoice::where('customer_id', $product->customer_id)->get();
    $invoiceppns = Invoiceppn::where('customer_id', $product->customer_id)->get();

    return view('laporan_penjualan.produk', compact('product','details', 'customer', 'invoices', 'invoiceppns'));
}

public function generateProductReport(Request $request, $productId)
{
    $product = Product::find($productId);

    // Add logic to filter data based on the selected date range
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Fetch relevant data from the database based on the date range
    $filteredInvoices = Invoice::where('customer_id', $product->customer_id)
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->get();

    $filteredInvoiceppns = Invoiceppn::where('customer_id', $product->customer_id)
        ->whereBetween('tanggal', [$startDate, $endDate])
        ->get();

    $pdf = PDF::loadView('laporan_penjualan.produk_pdf', compact('filteredInvoices', 'filteredInvoiceppns', 'product'));
    return $pdf->download('laporan_produk.pdf');
}

    // public function outlet()
    // {
    //     $customers = Customer::with('products.details')->orderBy('created_at', 'DESC')->get();
    //     return view('laporan_penjualan.outlet', compact('customers'));
    // }

    // public function outlet($customerId)
    // {
    //     $customer = Customer::find($customerId);

    //     if (!$customer) {
    //         abort(404, 'Customer not found');
    //     }

    //     $invoices = Invoice::where('customer_id', $customerId)->get();
    //     $invoicePpns = Invoiceppn::where('customer_id', $customerId)->get();

    //     return view('laporan_penjualan.outlet', compact('customer', 'invoices', 'invoicePpns'));
    // }
    
// LaporanController.php


//2
// public function outlet($customerId)
// {
//     $customer = Customer::findOrFail($customerId);
//     $invoices = Invoice::where('customer_id', $customerId)->get();
//     $invoiceppns = Invoiceppn::where('customer_id', $customerId)->get();
//     return view('laporan_penjualan.outlet', compact('customer', 'invoices', 'invoiceppns'));
// }


//lumayan
// public function outlet($customerId)
// {
//     $customer = Customer::find($customerId);

//     if (!$customer) {
//         abort(404); // Handle customer not found
//     }

//     $data = DB::table('invoices')
//     ->where('invoices.customer_id', $customerId)
//     ->select(
//         'invoices.no_faktur_2023 as no_faktur',
//         'invoices.total as total',
//         'invoices.tanggal as tanggal',
//         'products.title as product_title',
//         'invoice_details.qty as qty',
//         'invoices.total as total_invoice'
//     )
//     ->join('invoice_details', 'invoices.id', '=', 'invoice_details.invoice_id')
//     ->join('product_details', 'invoice_details.product_detail_id', '=', 'product_details.id')
//     ->join('products', 'product_details.product_id', '=', 'products.id')
//     ->union(
//         DB::table('invoiceppns')
//             ->where('invoiceppns.customer_id', $customerId)
//             ->select(
//                 'invoiceppns.no_faktur_2023 as no_faktur',
//                 'invoiceppns.total as total',
//                 'invoiceppns.tanggal as tanggal',
//                 'products.title as product_title',
//                 'invoice_detailppns.qty as qty',
//                 'invoiceppns.total as total_invoice'
//             )
//             ->join('invoice_detailppns', 'invoiceppns.id', '=', 'invoice_detailppns.invoiceppn_id')
//             ->join('product_details', 'invoice_detailppns.product_detail_id', '=', 'product_details.id')
//             ->join('products', 'product_details.product_id', '=', 'products.id')
//     )
//     ->get();


//     return view('laporan_penjualan.outlet', compact('customer', 'data'));
// }




// public function outlet($customerId) {
//     // Retrieve data for the selected customer
//     $customer = Customer::findOrFail($customerId);

//     // Get invoices and invoiceppns data for the customer
//     $invoices = Invoice::where('customer_id', $customerId)->get();
//     $invoicePPNs = InvoicePPN::where('customer_id', $customerId)->get();

//     // Additional data retrieval based on relationships
//     $data = [];
//     foreach ($invoices as $invoice) {
//         $invoiceDetails = Invoice_Detail::where('invoice_id', $invoice->id)->get();
//         foreach ($invoiceDetails as $detail) {
//             $productDetail = $detail->productDetails;
//             if ($productDetail) {
//                 $key = $invoice->no_faktur_2023 . '_' . $invoice->tanggal . '_' . $invoice->total;
//                 $data[$key][] = [
//                     'no_faktur' => $invoice->no_faktur_2023,
//                     'tanggal' => $invoice->tanggal,
//                     'nama_produk' => $productDetail->product->title ?? 'N/A',
//                     'qty' => $detail->qty,
//                     'total' => $invoice->total,
//                 ];
//             }
//         }
//     }

//     foreach ($invoicePPNs as $invoicePPN) {
//         $invoiceDetailsPPN = Invoice_DetailPPN::where('invoiceppn_id', $invoicePPN->id)->get();
//         foreach ($invoiceDetailsPPN as $detailPPN) {
//             $productDetailPPN = $detailPPN->productDetails;
//             if ($productDetailPPN) {
//                 $key = $invoicePPN->no_faktur_2023 . '_' . $invoicePPN->tanggal . '_' . $invoicePPN->total;
//                 $data[$key][] = [
//                     'no_faktur' => $invoicePPN->no_faktur_2023,
//                     'tanggal' => $invoicePPN->tanggal,
//                     'nama_produk' => $productDetailPPN->product->title ?? 'N/A',
//                     'qty' => $detailPPN->qty,
//                     'total' => $invoicePPN->total,
//                 ];
//             }
//         }
//     }

//     // Pass data to the view
//     return view('laporan_penjualan.outlet', compact('customer', 'data'));
// }


public function outlet($customerId, Request $request)
    {
        // Retrieve customer information
        $customer = Customer::findOrFail($customerId);

        // Retrieve invoices and invoicePPNs data for the customer
        $invoices = Invoice::where('customer_id', $customerId)->get();
        $invoicePPNs = InvoicePPN::where('customer_id', $customerId)->get();

        // Combine data from invoices and invoicePPNs
        $data = $this->getData($invoices, $invoicePPNs);

        // Check if the form is submitted with date range
        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Filter data based on the date range
            $filteredData = $this->filterDataByDate($data, $startDate, $endDate);

            // Pass filtered data to the view
            return view('laporan_penjualan.outlet', compact('customer', 'filteredData', 'startDate', 'endDate'));
        }

        // Pass original data to the view
        return view('laporan_penjualan.outlet', compact('customer', 'data'));
    }

    // Generate PDF for outlet data
    public function generatePdf($customerId, $startDate = null, $endDate = null)
    {
        // Retrieve customer information
        $customer = Customer::findOrFail($customerId);

        // Retrieve invoices and invoicePPNs data for the customer
        $invoices = Invoice::where('customer_id', $customerId)->get();
        $invoicePPNs = InvoicePPN::where('customer_id', $customerId)->get();

        // Combine data from invoices and invoicePPNs
        $data = $this->getData($invoices, $invoicePPNs);

        // Check if a date range is provided
        if ($startDate && $endDate) {
            // Filter data based on the date range
            $filteredData = $this->filterDataByDate($data, $startDate, $endDate);
        } else {
            // Use the original data if no date range is provided
            $filteredData = $data;
        }

        // Generate PDF using the filtered data
        $pdf = PDF::loadView('laporan_penjualan.pdf', compact('customer', 'filteredData', 'startDate', 'endDate'));

        // Download the PDF file
        return $pdf->download('laporan.pdf');
    }

    // Retrieve and combine data from invoices and invoicePPNs
    private function getData($invoices, $invoicePPNs)
    {
        $data = [];

        foreach ($invoices as $invoice) {
        $invoiceDetails = Invoice_Detail::where('invoice_id', $invoice->id)->get();
        foreach ($invoiceDetails as $detail) {
            $productDetail = $detail->productDetails;
            if ($productDetail) {
                $key = $invoice->no_faktur_2023 . '_' . $invoice->tanggal . '_' . $invoice->total;
                $data[$key][] = [
                    'no_faktur' => $invoice->no_faktur_2023,
                    'tanggal' => $invoice->tanggal,
                    'nama_produk' => $productDetail->product->title ?? 'N/A',
                    'qty' => $detail->qty,
                    'total' => $invoice->total,
                ];
            }
        }
    }
        

        foreach ($invoicePPNs as $invoicePPN) {
                    $invoiceDetailsPPN = Invoice_DetailPPN::where('invoiceppn_id', $invoicePPN->id)->get();
        foreach ($invoiceDetailsPPN as $detailPPN) {
            $productDetailPPN = $detailPPN->productDetails;
            if ($productDetailPPN) {
                $key = $invoicePPN->no_faktur_2023 . '_' . $invoicePPN->tanggal . '_' . $invoicePPN->total;
                $data[$key][] = [
                    'no_faktur' => $invoicePPN->no_faktur_2023,
                    'tanggal' => $invoicePPN->tanggal,
                    'nama_produk' => $productDetailPPN->product->title ?? 'N/A',
                    'qty' => $detailPPN->qty,
                    'total' => $invoicePPN->total,
                ];
            }
        }
        }

        return $data;
    }

    // Filter data based on date range
    private function filterDataByDate($data, $startDate, $endDate)
    {
        $filteredData = [];

        foreach ($data as $key => $items) {
            $invoiceDate = $items[0]['tanggal'];
            if ($invoiceDate >= $startDate && $invoiceDate <= $endDate) {
                $filteredData[$key] = $items;
            }
        }

        return $filteredData;
    }


//fixx

// public function showOutlet($customerId)
// {
//     $customer = Customer::find($customerId);

//     if (!$customer) {
//         abort(404); // Tampilkan halaman 404 jika customer tidak ditemukan
//     }

//     $invoices = Invoice::where('customer_id', $customerId)->with('details.productDetail.product')->get();
//     $invoiceppns = Invoiceppn::where('customer_id', $customerId)->with('details.productDetail.product')->get();

//     return view('laporan_penjualan.outlet', compact('customer', 'invoices', 'invoiceppns'));
// }



// public function showOutletReport($customerId)
// {
//     $customer = DB::table('customer')->find($customerId);

//     $invoices = DB::table('invoices')
//         ->where('customer_id', $customerId)
//         ->get();

//     $invoiceppns = DB::table('invoiceppns')
//         ->where('customer_id', $customerId)
//         ->get();

//     // Fetching product details and quantities for invoices
//     foreach ($invoices as $invoice) {
//         $invoice->details = DB::table('invoice_detail')
//             ->join('product_details', 'invoice_detail.product_detail_id', '=', 'product_details.id')
//             ->join('products', 'product_details.product_id', '=', 'products.id')
//             ->select('products.title as product_title', 'invoice_detail.qty')
//             ->where('invoice_detail.invoice_id', $invoice->id)
//             ->get();
//     }

//     // Fetching product details and quantities for invoiceppns
//     foreach ($invoiceppns as $invoiceppn) {
//         $invoiceppn->details = DB::table('invoice_detailppns')
//             ->join('product_details', 'invoice_detailppns.product_detail_id', '=', 'product_details.id')
//             ->join('products', 'product_details.product_id', '=', 'products.id')
//             ->select('products.title as product_title', 'invoice_detailppns.qty')
//             ->where('invoice_detailppns.invoiceppn_id', $invoiceppn->id)
//             ->get();
//     }

//     return view('laporan_penjualan.outlet', compact('customer', 'invoices', 'invoiceppns'));
// }



    public function cari(Request $request)
    {
       

        $this->validate($request, [
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        $dari = date('Y-m-d', strtotime($request->dari));
        $sampai = date('Y-m-d', strtotime($request->sampai));

        $invoices = Invoice::with('customer')->whereBetween(
            'tanggal',
            [$dari, $sampai]
            )->withTrashed()->get();

        $total_pemasukan = DB::table('invoices')->whereBetween(
            'tanggal',
            [$dari, $sampai]
        )->sum('total');

        //dd($request->all());
        $pdf = PDF::loadView('laporan_penjualan.cetak', compact('invoices', 'total_pemasukan', 'dari', 'sampai'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }

    public function carippn(Request $request)
    {
       

        $this->validate($request, [
            'darippn' => 'required',
            'sampaippn' => 'required'
        ]);

        $darippn = date('Y-m-d', strtotime($request->darippn));
        $sampaippn = date('Y-m-d', strtotime($request->sampaippn));

        $invoiceppns = Invoiceppn::with('customer')->whereBetween(
            'tanggal',
            [$darippn, $sampaippn]
        )->withTrashed()->get();
        
        $pdf = PDF::loadView('laporan_penjualan.cetakppn', compact('invoiceppns', 'darippn', 'sampaippn'))->setPaper('a4', 'potrait');
        return $pdf->stream();

        // return view(
        //     'laporan_penjualan.cetakppn',
        //     compact('invoiceppns', 'darippn', 'sampaippn')
        // );
    }
    
}
