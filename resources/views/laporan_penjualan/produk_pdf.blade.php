{{-- resources/views/laporan_penjualan/produk_pdf.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Produk PDF</title>
</head>
<body>
    <h1>Laporan Produk</h1>
    <h2>Related Invoices</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Tanggal</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filteredInvoices as $invoice)
                <tr>
                    <td>{{ $invoice->no_faktur_2023 }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ $invoice->tanggal }}</td>
                    <td>{{ $invoice->invoiceDetails->where('product_detail_id', $product->id)->first()->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Related Invoiceppns</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Customer Name</th>
                <th>Tanggal</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filteredInvoiceppns as $invoiceppn)
                <tr>
                    <td>{{ $invoiceppn->no_faktur_2023 }}</td>
                    <td>{{ $invoiceppn->customer->name }}</td>
                    <td>{{ $invoiceppn->tanggal }}</td>
                    <td>{{ $invoiceppn->invoiceppnDetails->where('product_detail_id', $product->id)->first()->qty }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
