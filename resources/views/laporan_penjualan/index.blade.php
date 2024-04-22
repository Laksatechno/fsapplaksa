
@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<!-- Extra Header -->
<div class="extraHeader p-0">
    <ul class="nav nav-tabs lined" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#nonppn" role="tab">
                ORDER
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#perorder" role="tab">
               PER PRODUK
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#peroutlet" role="tab">
                PER OUTLET
            </a>
        </li>
    </ul>
</div>
<!-- * Extra Header -->

<!-- App Capsule -->
<div  class="extra-header-active">


    <div class="tab-content mt-1">


        <!-- nonppn tab -->
        <div class="tab-pane fade show active" id="nonppn" role="tabpanel">

            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">
                    <div class="container">
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b class="card-title">Laporan Penjualan NON PPN</b>
                                    </div>
                                    <div class="card-body">
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                
                                        <form action="{{ url('/cari') }}" method="get">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Dari</label>
                                                <input type="date" name="dari" class="form-control datepicker" placeholder="Tanggal">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Sampai</label>
                                                <input type="date" name="sampai" class="form-control datepicker" placeholder="Tanggal">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success btn-sm btn-block"><span class="mdi mdi-printer"> Cetak</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b class="card-title">Laporan Penjualan PPN</b>
                                    </div>
                                    <div class="card-body">
                                        @if (session('error'))
                                            <div class="alert alert-danger">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                
                                        <form action="{{ url('/carippn') }}" method="get">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Dari</label>
                                                <input type="date" name="darippn" class="form-control datepicker" placeholder="Tanggal">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Sampai</label>
                                                <input type="date" name="sampaippn" class="form-control datepicker" placeholder="Tanggal">
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success btn-sm btn-block"><span class="mdi mdi-printer"> Cetak</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- * nonppn tab -->



        <!-- ppn tab -->
        <div class="tab-pane fade" id="perorder" role="tabpanel">
            <div class="wide-block pt-2 pb-2">
                <div class="container">
                    <div class="row" style="margin-top: 40px; ">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <b class="card-title">Laporan Barang</b>
                                        </div>
                                        <a class="btn btn-primary" href="{{url('/barang-print')}}" role="button"><span class="mdi mdi-printer"> Print</span></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                    @endif
                                    <table class="table table-hover table-bordered" id="lapbarang-table" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                {{-- <th>Harga</th> --}}
                                                <th>Stock</th>
                                                <th>Lihat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($products as $product)
                                            <tr>
                                                <!-- MENAMPILKAN VALUE DARI TITLE -->
                                                <td>{{ $product->title }}</td>
                                                {{-- <td>Rp {{ number_format($product->price) }}</td> --}}
                                                <td>{{ $product->stock }}</td>
                                                <td>
                                            <a href="{{ url('/laporan-penjualan/produk/' . $product->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Empty Data</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <!-- * ppn tab -->


        <!-- customer tab -->
        <div class="tab-pane fade" id="peroutlet" role="tabpanel">
            <div class="wide-block pt-2 pb-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 50px;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b class="card-title">LAPORAN OUTLET</b>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="#" method="GET" class="form-inline">
                                              <input class="form-control mr-sm-2" id="search" name="cari" type="search" placeholder="Search" aria-label="Search" value="{{ old('cari') }}">
                                              <img id="loader" src="{{asset('assets/images/loading.gif')}}" width="25" alt=""
                                                style="display:none">
                                            </form>
                                    </div>
                                </div>
                                    </div>
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                    @endif
                                    <table  class="table table-hover table-bordered" id="lapcustomers-table" class="table" cellspacing="0" width="100%">
            
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <td >Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($customers as $customer)
                                                    <tr>
                                                        <td>{{ $customer->name }}</td>
                                                        <td>
                                                            <a href="{{ url('/laporan-penjualan/outlet/' . $customer->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <!-- * customer tab -->
        @include('layouts.topNavBack')
@endsection
