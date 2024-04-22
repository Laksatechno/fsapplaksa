<!-- resources/views/invoice/allinvoice.blade.php -->
@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<!-- Extra Header -->
<div class="extraHeader p-0">
    <ul class="nav nav-tabs lined" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#nonppn" role="tab">
                INVOICE PPN GUNGGUNG
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#ppn" role="tab">
                INVOICE PPN
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#customer" role="tab">
                INVOICE CUSTOMER
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
                        <div class="row" style="margin-top: 40px; ">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b class="card-title">Data Semua Invoice PPN GUNGGUNG</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {!! session('success') !!}
                                            </div>
                                        @endif
                                        <table class="table table-hover table-bordered" id="invoice-table" class="table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#INV</th>
                                                    <th>Nama</th>
                                                    <th>Tenggat</th>
                                                    <th>Marketing</th>
                                                    <th>Qty</th>
                                                    {{-- <th>Subtotal</th> --}}
                                                    <th>Diskon</th>
                                                    <th>Total</th>
                                                    <th>Print</th>
                                                    <th><center>Aksi</center></th>
                                                    {{-- <th>Status</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody class="cards">
                                                {{-- @if ($invoice->user->id == Auth::user()->id) --}}
                                                @foreach ($allinvoice as $invoice)
                                                @isset ($invoice->user)
                                                    <tr>
                                                        <td><strong>{{ $invoice->no_faktur_2023 }}</strong></td>
                                                        
                                                        <td>{{ $invoice->customer->name }}</td>
                                                        <td>{{$invoice->tenggat}}</td>
                                                        <td>{{ $invoice->user->name }}</td>
                                                        <td><span class="badge badge-success">{{ $invoice->detail->count() }}</span></td>
                                                        {{-- <td>Rp {{ number_format($invoice->total) }}</td> --}}
                                                        <td>Rp {{ number_format($invoice->diskon) }}</td>
                                                        <td>Rp {{ number_format($invoice->total_price) }}</td>
                                                        <td>
                                                            <a href="{{ route('invoice.print2', $invoice->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                            <a href="{{ route('invoice.print', $invoice->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        </td>
                                                        <td>
                                                            <form class="btn-group" action="{{ route('invoice.destroy', $invoice->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil" ></i></a>
                                                                <a href="{{ route('invoice.kirim', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-truck-delivery"></i></a>
                                                                <button class="btn btn-danger btn-sm " onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can" ></i></button>
                                                            </form>
                                                        </td>
                                                        {{-- <td> 
                                                            <a href="{{ route('invoice.status', $invoice->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin faktur ini sudah lunas?')">Lunas</a>
                                                        </td> --}}
                                                    </tr>
                                                {{-- @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Empty Data</td>
                                                    </tr> --}}
                                                    @endisset
                                                @endforeach
                                                    {{-- @endif --}}
                                            </tbody>
                                        </table>

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
        <div class="tab-pane fade" id="ppn" role="tabpanel">
            <div class="wide-block pt-2 pb-2">
            <div class="container">
                <div class="row" style="margin-top: 40px; ">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row" style="margin-bottom: 10px">
                                    <div class="col-md-12">
                                    <div class="col-md-6">
                                            <b class="card-title">Data Semua Invoice PPN</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                    @endif
                                    <table class="table table-hover table-bordered" id="invoiceppn-table" class="table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#INV</th>
                                                <th>Nam</th>
                                                <th>Marketing</th>
                                                <th>Qty</th>
                                                {{-- <th>Subtotal</th> --}}
                                                <th>Diskon</th>
                                                <th>Total</th>
                                                <th>Print</th>
                                                <th><center>Aksi</center></th>
                                                {{-- <th>Status</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if ($invoice->user->id == Auth::user()->id) --}}
                                            @foreach ($allinvoiceppn as $invoice)
                                            @isset ($invoice->user)
                                                <tr>
                                                    <td><strong>{{ $invoice->no_faktur_2023 }}</strong></td>
                                                    <td>{{ $invoice->customer->name }}</td>
                                                    <td>{{ $invoice->user->name }}</td>
                                                    <td><span class="badge badge-success">{{ $invoice->detailppn->count() }}</span></td>
                                                    {{-- <td>Rp {{ number_format($invoice->total) }}</td> --}}
                                                    <td>Rp {{ number_format($invoice->diskon) }}</td>
                                                    <td>Rp {{ number_format($invoice->total_price) }}</td>
                                                    <td>
                                                        <a href="{{ route('invoiceppn.print', $invoice->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>

                                                    </td>
                                                    <td>
                                                        <form class="btn-group" action="{{ route('invoiceppn.destroy', $invoice->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('invoiceppn.edit', $invoice->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil" ></i></a>
                                                            {{-- <a href="{{ route('invoiceppn.print2', $invoice->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a> --}}
                                                            <a href="{{ route('invoiceppn.pengirimanppn', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-truck-delivery"></i></a>
                                                            <button class="btn btn-danger btn-sm " onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can" ></i></button>
                                                        </form>
                                                    </td>
                                                    {{-- <td> 
                                                        <a href="{{ route('invoiceppn.status', $invoice->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin faktur ini sudah lunas?')">Lunas</a>
                                                    </td> --}}
                                                </tr>
                                            {{-- @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Empty Data</td>
                                                </tr> --}}
                                                @endisset
                                            @endforeach
                                                {{-- @endif --}}
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- * ppn tab -->


        <!-- customer tab -->
        <div class="tab-pane fade" id="customer" role="tabpanel">

            <div class="section full mt-1">
                <div class="wide-block pt-2 pb-2">
                <div class="container">
                    <div class="row" style="margin-top: 40px; ">
                        <div class="col-md-12">

                            <div class="card">
            
                                <div class="card-header">
            
                                    <div class="row">
            
                                        <div class="col-md-6">
            
                                            <b class="card-title">Daftar Semua Pesanan Customer</b>
            
                                        </div>
            
                                    </div>
            
                                </div>
            
                                <div class="table-responsive">
            
                                    @if (session('success'))
            
                                        <div class="alert alert-success">
            
                                            {!! session('success') !!}
            
                                        </div>
            
                                    @endif
            
                                    <table class="table table-hover table-bordered" id="invoicecs-table" class="table" cellspacing="0" width="100%">

            
                                        <thead>
            
                                            <tr>
            
                                                <th>#INV</th>
                                                <th>Nama</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                                <th>Tax</th>
                                                <th>Total Price</th>
                                                <th>Print</th>
                                                <th>Status</th>
                                                <th><center>Action</center></th>
            
                                            </tr>
            
                                        </thead>
            
                                        <tbody>
            
                                            {{-- @if ($invoice->user->id == Auth::user()->id) --}}
            
                                            @foreach ($invoicecustomerall as $invoicecustomers)
            
                                                <tr>
            
                                                    <td><strong>{{ $invoicecustomers->no_faktur }}</strong></td>
            
                                                    <td>{{ $invoicecustomers->user->name }}</td>
            
                                                    <td><span class="badge badge-success">{{ $invoicecustomers->detail_customer->count() }} Item</span></td>
            
                                                    <td>Rp {{ number_format($invoicecustomers->total) }}</td>
            
                                                    <td>Rp {{ number_format($invoicecustomers->tax) }}</td>
            
                                                    <td>Rp {{ number_format($invoicecustomers->total_price) }}</td>
                                                    <td>
                                                                   
                                                        @if ($invoicecustomers->ppn != 0)
                                                        <a href="{{ route('invoicecustomer.print', $invoicecustomers->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        @else
                                                        <a href="{{ route('invoicecustomer.printnonppn', $invoicecustomers->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        @endif
                                                    </td>

                                                    <td><strong>
                                                        <a href="{{ $invoicecustomers->id }}" data-toggle="modal" data-target="#transaksiModal{{ $invoicecustomers->id }}">{{ $invoicecustomers->status }}</a>
                                                        </strong></td>

                                                    <td>
            
                                                        <form class="btn-group" action="{{ route('invoicecustomer.destroy', $invoicecustomers->id) }}" method="POST">
            
                                                            @csrf
            
                                                            <input type="hidden" name="_method" value="DELETE">
 
            
                                                            <a href="{{ route('invoicecustomer.edit', $invoicecustomers->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
            
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can"></i></button>
            
                                                        </form>
            
                                                    </td>
            
                                                    {{-- <td> 
            
                                                        <a href="{{ route('invoice.status', $invoicecustomers->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin faktur ini sudah lunas?')">Lunas</a>
            
                                                    </td> --}}
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @foreach ($invoicecustomerall as $invoicecustomers)
                            <div class="modal fade" id="transaksiModal{{ $invoicecustomers->id }}" tabindex="-1" role="dialog" aria-labelledby="transaksiModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="display: block">
                                            <h5 class="modal-title" id="transaksiModalLabel">Pembayaran Invoice #{{ $invoicecustomers->no_faktur }}</h5>
                                            <h5 class="modal-title" id="transaksiModalLabel">Nama :{{ $invoicecustomers->user->name }}</h5>
                                            
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            @if ($invoicecustomers->photo_path)
                                            <img src="{{ route('photo.show', $invoicecustomers->id) }}" alt="Invoice Photo" style="max-width: 200px;">
                                            
                                        @else
                                            No Photo
                                        @endif
                                        <form action="{{ route('invoicecustomer.updateStatus', $invoicecustomers->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="Disetujui" {{ $invoicecustomers->status === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                    <option value="Ditolak" {{ $invoicecustomers->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm">Update Status</button>
                                        </form>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($invoicecustomerall as $invoicecustomers)
                        <!-- Modal for editing status -->
                            <div class="modal fade" id="editStatusModal{{ $invoicecustomers->id }}" tabindex="-1" role="dialog" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editStatusModalLabel">Edit Status Invoice {{ $invoicecustomers->no_faktur }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Card displaying the invoice number -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">No Invoice: {{ $invoicecustomers->no_faktur }}</h5>
                                                </div>
                                            </div>

                                            <!-- Form for updating status -->
                                            <form action="{{ route('invoicecustomer.updateStatus', $invoicecustomers->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="Disetujui" {{ $invoicecustomers->status === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                        <option value="Ditolak" {{ $invoicecustomers->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
