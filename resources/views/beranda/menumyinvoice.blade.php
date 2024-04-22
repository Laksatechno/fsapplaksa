<!-- resources/views/invoice/allinvoice.blade.php -->
@extends('layouts.master')
@section('content')
@include('layouts.topNavBack')
<!-- Extra Header -->
<div class="extraHeader p-0">
    <ul class="nav nav-tabs lined" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#nonppn" role="tab">
                PPN GUNGGUNG
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#ppn" role="tab">
                PPN
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b class="card-title">Riwayat Invoice NONPPN</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {!! session('success') !!}
                                            </div>
                                        @endif
                                        <table class="table table-hover table-bordered" id="mynonppn-table" class="table" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>No Invoice</th>
                                                    <th>Nama</th>
                                                    <th>Marketing</th>
                                                    <th>Total Item</th>
                                                    <th>Subtotal</th>
                                                    <th>Diskon</th>
                                                    <th>Total Price</th>
                                                    <th><center>Aksi</center></th>
                                                    @if(Auth::check())
                                                    @if(auth()->user()->level=="superadmin") 
                                                    <th>Print</th>
                                                    <th>Status</th>
                                                    @endif
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @if ($invoice->user->id == Auth::user()->id) --}}
                                                @foreach ($invoice as $invoices)
                                                @if ($invoices->user->id == Auth::user()->id)
                                                    <tr>
                                                        <td><strong>{{ $invoices->no_faktur_2023 }}</strong></td>
                                                        <td>{{ $invoices->customer->name }}</td>
                                                        <td>{{ $invoices->user->name }}</td>
                                                        <td><span class="badge badge-success">{{ $invoices->detail->count() }} Item</span></td>
                                                        <td>Rp {{ number_format($invoices->total) }}</td>
                                                        <td>Rp {{ number_format($invoices->diskon) }}</td>
                                                        <td>Rp {{ number_format($invoices->total_price) }}</td>
                                                        <td>
                                                            <form class="btn-group" action="{{ route('invoice.destroy', $invoices->id) }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <a href="{{ route('invoice.print', $invoices->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                                <a href="{{ route('invoice.edit', $invoices->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                                
                                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can"></i></button>
                                                            </form>
                                                        </td>
                                                        @if(Auth::check())
                                                        @if(auth()->user()->level=="superadmin") 
                                                        <td>
                                                            <a href="{{ route('invoice.print2', $invoices->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        </td>
                                                        
                                                        <td> 
                                                            <a href="{{ route('invoice.status', $invoices->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin faktur ini sudah lunas?')">Lunas</a>
                                                        </td>
                                                        @endif
                                                        @endif
                                                    </tr>
                                                  
                                                  {{-- <script>window.location = "/invoice/public/invoice/invoice/all";</script> --}}
                                                  {{-- <a href="{{ route('invoice.allinvoice') }}"></a> --}}
                                                {{-- @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Empty Data</td>
                                                    </tr> --}}
                                                    @endif
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b class="card-title">Riwayat Invoice PPN</b>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {!! session('success') !!}
                                        </div>
                                    @endif
                                    <table class="table table-hover table-bordered" id="myppn-table" class="table" cellspacing="0" width="100%">
            
                                        <thead>
                                            <tr>
                                                <th>No Invoice</th>
                                                <th>Nama</th>
                                                <th>Marketing</th>
                                                <th>Total Item</th>
                                                <th>Subtotal</th>
                                                <th>Tax</th>
                                                <th>Total</th>
                                                <th><center>Print</center></th>
                                                <th><center>Edit</center></th>
                                                <th><center>Hapus</center></th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @if ($invoice->user->id == Auth::user()->id) --}}
                                            @foreach ($invoiceppn as $invoices)
                                            @if ($invoices->user->id == Auth::user()->id)
                                                <tr>
                                                    <td><strong>{{ $invoices->no_faktur_2023 }}</strong></td>
                                                    <td>{{ $invoices->customer->name }}</td>
                                                    <td>{{ $invoices->user->name }}</td>
                                                    <td><span class="badge badge-success">{{ $invoices->detailppn->count() }} Item</span></td>
                                                    <td>Rp {{ number_format($invoices->total) }}</td>
                                                    <td>Rp {{ number_format($invoices->tax) }}</td>
                                                    <td>Rp {{ number_format($invoices->total_price) }}</td>
                                                    <td> 
                                                        <form class="btn-group" action="{{ route('invoiceppn.destroy', $invoices->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('invoiceppn.print', $invoices->id) }}" class="btn btn-secondary btn-sm"><i class="mdi mdi-printer"></i></a>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form class="btn-group" action="{{ route('invoiceppn.destroy', $invoices->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('invoiceppn.edit', $invoices->id) }}" class="btn btn-warning btn-sm"><i class="mdi mdi-pencil"></i></a>
                                                        </form>      
                                                    </td>
                                                    <td>
                                                        <form class="btn-group" action="{{ route('invoiceppn.destroy', $invoices->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus faktur ini?')"><i class="mdi mdi-trash-can"></i></button>
                                                        </form>
                                                    </td>
                                                    <td> 
                                                        <a href="{{ route('invoiceppn.status', $invoices->id) }}" class="btn bg-purple btn-sm" onclick="return confirm('Anda yakin faktur ini sudah lunas?')">Lunas</a>
                                                    </td>
                                                </tr>
                                              
                                              {{-- <script>window.location = "/invoice/public/invoice/invoice/all";</script> --}}
                                              {{-- <a href="{{ route('invoice.allinvoice') }}"></a> --}}
                                            {{-- @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Empty Data</td>
                                                </tr> --}}
                                                @endif
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
        <!-- * ppn tab -->


        <!-- customer tab -->

        <!-- * customer tab -->
        @include('layouts.topNavBack')
@endsection
