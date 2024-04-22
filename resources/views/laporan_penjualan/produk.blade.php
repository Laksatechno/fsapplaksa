{{-- @extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <h3>LAPORAN PRODUK - {{ $product->title }}</h2>
        <div class="card">
        
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productDetails as $index => $detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $detail->customer_name }}</td>
                        <td>{{ $detail->tanggal }}</td>
                        <td>{{ $detail->qty }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection --}}


{{-- resources/views/laporan_penjualan/produk.blade.php --}}
@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<div class="container">
<div class="card" style="margin-top: 10px; margin-bottom:10px;" >
    <div class="card-header">
    <h2>Detail Produk</h2>
    <p>Nama Produk: {{ $product->title }}</p>
    </div>

        {{-- Add a form for date range selection --}}
        <form action="{{ url('/laporan-penjualan/produk/' . $product->id . '/generate-pdf') }}" method="post">
            @csrf
            <div class="form-group">
            <label for="start_date">Mulai Tanggal:</label>
            <input type="date" name="start_date" class="form-control datepicker" required>
            </div>
            <div class="form-group">
            <label for="end_date">Sampai Tanggal:</label>
            <input type="date" name="end_date" class="form-control datepicker" required></div> 
            <button type="submit" class="btn btn-primary btn-sm btn-block">Cetak PDF</button>
            {{-- <a href="{{ url('/laporan-penjualan/produk/' . $product->id . '/generate-pdf') }}" class="btn btn-primary btn-sm">Cetak PDF</a> --}}
        </form>
    {{-- Display other relevant information about the product --}}

    <h3>Data Invoice</h3>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->no_faktur_2023 }}</td>
                    <td>{{ $invoice->customer->name }}</td>
                    <td>{{ $invoice->tanggal }}</td>
                    {{-- <td>{{ $invoice->invoiceDetails->where('product_detail_id', $product->id)->first()->qty }}</td> --}}
                    <td>{{ $invoice->details->count() }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Data Invoiceppns</h2>
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Customer</th>
                <th>Tanggal</th>
                <th>Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoiceppns as $invoiceppn)
                <tr>
                    <td>{{ $invoiceppn->no_faktur_2023 }}</td>
                    <td>{{ $invoiceppn->customer->name }}</td>
                    <td>{{ $invoiceppn->tanggal }}</td>
                    <td>{{ $invoiceppn->details->count() }}</td>

                    {{-- <td>
                        @if($invoice->invoiceDetails)
                            {{optional( $invoice->invoiceDetails)->where('product_detail_id', $product->id)->first() ? $invoice->invoiceDetails->where('product_detail_id', $product->id)->first()->qty : 'N/A' }}
                        @else
                            N/A
                        @endif
                    </td> --}}
                    
                    {{-- <td>{{ $invoiceppn->invoiceppnDetails->where('product_detail_id', $product->id)->first()->qty }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
