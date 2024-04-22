{{-- @extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<div class="card-body">
        <h2>Laporan Penjualan - {{ $customer->name }}</h2>

        <h3>Invoices:</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->no_faktur_2023 }}</td>
                        <td>{{ $invoice->tanggal }}</td>
                        <td>
                            @if($invoice->details && $invoice->details->isNotEmpty())
                                @foreach($invoice->details as $detail)
                                    {{ $detail->productDetail->product->tittle }} <br>
                                @endforeach
                            @else
                                No products found
                            @endif
                        </td>
                        <td>
                            @if($invoice->details && $invoice->details->isNotEmpty())
                                @foreach($invoice->details as $detail)
                                    {{ $detail->qty }} <br>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $invoice->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Invoice PPNs:</h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Faktur</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoicePpns as $invoicePpn)
                    <tr>
                        <td>{{ $invoicePpn->id }}</td>
                        <td>{{ $invoicePpn->no_faktur_2023 }}</td>
                        <td>{{ $invoicePpn->tanggal }}</td>
                        <td>
                            @if($invoicePpn->details && $invoicePpn->details->isNotEmpty())
                                @foreach($invoicePpn->details as $detail)
                                    {{ $detail->productDetail->product->tittle }} <br>
                                @endforeach
                            @else
                                No products found
                            @endif
                        </td>
                        <td>
                            @if($invoicePpn->details && $invoicePpn->details->isNotEmpty())
                                @foreach($invoicePpn->details as $detail)
                                    {{ $detail->qty }} <br>
                                @endforeach
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $invoicePpn->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}

{{-- @extends('layouts.master')

@section('content')
@include('layouts.topNavBack')
<div class="container">
    <div class="row" style="margin-top: 2cm; margin-bottom: 3cm">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">LAPORAN ORDER OUTLET</b>
                </div>
                <div class="card-body">
                    <h3>Customer: {{ $customer->name }}</h3>
                
                    <h4>Invoice Details:</h4>
                
                    @php $prevNoFaktur = null; @endphp
                    @foreach ($data as $item)
                        @if ($item->no_faktur !== $prevNoFaktur)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <b>No Faktur: {{ $item->no_faktur }}</b>
                                </div>
                                <div class="card-body">
                                    <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                                    <p><strong>Product Title:</strong> {{ $item->product_title }}</p>
                                    <p><strong>Qty:</strong> {{ $item->qty }}</p>
                                    <p><strong>Total Invoice:</strong> {{ $item->total_invoice }}</p>
                                </div>
                            </div>
                            @php $prevNoFaktur = $item->no_faktur; @endphp
                        @else
                            <div class="card-body">
                                
                                <p><strong>Product Title:</strong> {{ $item->product_title }}</p>
                                <p><strong>Qty:</strong> {{ $item->qty }}</p>
                                <p><strong>Total Invoice:</strong> {{ $item->total_invoice }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!-- resources/views/laporan_penjualan/outlet.blade.php -->

{{-- @extends('layouts.master')

@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <h3>LAPORAN ORDER CUSTOMER : {{ $customer->name }}</h2>


            
        @if (count($data) > 0)
            @foreach ($data as $key => $items)
                <div class="card mb-3">
                    <div class="card-header">
                        NO INVOICE : #{{ $items[0]['no_faktur'] }}</br> 
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $items[0]['tanggal'] }}</br> 
                        Total Harga &nbsp; : {{ $items[0]['total'] }}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item['nama_produk'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <p>Data Kosong</p>
        @endif
    </div>
@endsection --}}


<!-- resources/views/laporan_penjualan/outlet.blade.php -->

@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
    <div class="container">
        <h3>LAPORAN ORDER CUSTOMER : {{ $customer->name }}</h3>
    <div class="card" style="margin-bottom: 20px;m">
        <!-- Add a form for date range filtering -->
        <form action="{{ route('outlet', $customer->id) }}" method="get">
            @csrf
            <div class="form-group">
            <label for="start_date">Dari Tanggal:</label>
            <input type="date" name="start_date" class="form-control datepicker">
            </div>
            <div class="form-group">
            <label for="end_date">Sampai Tanggal:</label>
            <input type="date" name="end_date" class="form-control datepicker"></br>
            </div>
            <button type="submit" class="btn btn-primary btn-sm btn-block">Tampilkan</button>
        </form>
    </div>

        @if (isset($filteredData) && count($filteredData) > 0)
            <!-- Display filtered data -->
            <div class="card">
                <a href="{{ route('generatePdf', ['customerId' => $customer->id, 'startDate' => $startDate, 'endDate' => $endDate]) }}" class="btn btn-danger">CETAK PDF</a>
            </div>
            
            @foreach ($filteredData as $key => $items)
                <div class="card mb-3">
                    <div class="card-header">
                        NO INVOICE : #{{ $items[0]['no_faktur'] }}</br> 
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $items[0]['tanggal'] }}</br> 
                        Total Harga &nbsp; : {{ $items[0]['total'] }}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item['nama_produk'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            <!-- Add a button to generate PDF for the filtered data -->
            
        @elseif (isset($data) && count($data) > 0)
            <!-- Display original data -->
            <div class="card">
                <a href="{{ route('generatePdf', ['customerId' => $customer->id, 'startDate' => null, 'endDate' => null]) }}" class="btn btn-danger">CETAK PDF</a>

            </div>
            @foreach ($data as $key => $items)
                <div class="card mb-3">
                    <div class="card-header">
                        NO INVOICE : #{{ $items[0]['no_faktur'] }}</br> 
                        Tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $items[0]['tanggal'] }}</br> 
                        Total Harga &nbsp; : {{ $items[0]['total'] }}
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item['nama_produk'] }}</td>
                                        <td>{{ $item['qty'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
            <!-- Add a button to generate PDF for the original data -->
            
        @else
            <p>Data Kosong</p>
        @endif
    </div>
@endsection




